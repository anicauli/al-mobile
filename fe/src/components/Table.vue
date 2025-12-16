<template>
  <v-card flat>
    <v-card-title class="d-flex justify-end">
      <v-chip
        v-for="(filter, i) in activeFilters"
        :key="i"
        closable
        color="primary"
        class="ma-1"
        @click:close="clearFilter(filter.key)"
      >
        <v-icon start>mdi-filter</v-icon>
        {{ filter.label }}:
        <strong v-if="['select'].includes(filter.type)">
          {{ (filterOptions[filter.key] || []).find(o => o.value === filter.value)?.label }}
        </strong>
        <strong v-else-if="['select_multiple'].includes(filter.type)">
          {{ (filterOptions[filter.key] || []).filter(o => filter.value.includes(o.value)).map(o => o.label) }}
        </strong>
        <strong v-else>{{ filter.value }}</strong>
      </v-chip>

      <slot name="actions" />

      <v-btn icon variant="tonal" color="primary" @click="openFilters">
        <v-icon>mdi-filter-variant</v-icon>
      </v-btn>
    </v-card-title>
    <v-data-table-server
      v-model:items-per-page="itemsPerPage"
      :headers="fields"
      :items="serverItems"
      :items-length="totalItems"
      :loading="loading"
      :search="search"
      item-value="name"
      @update:options="loadItems"
    ></v-data-table-server>
  </v-card>

  <v-navigation-drawer
    v-model="filtersOpened"
    location="right"
    temporary
    width="600"
  >
    <v-card flat>
      <v-card-title>Filters</v-card-title>
      <v-divider />

      <v-card-text>
        <v-row>
          <v-col v-for="filter in internalFilters" cols="12" :md="filter.md || 6">
            <!-- TEXT -->
            <v-text-field
              v-if="filter.type === 'text'"
              :label="filter.label"
              :placeholder="filter.placeholder || filter.label"
              v-model="filter.value"
              @update:model-value="handleFilterChange"
            />

            <!-- NUMBER -->
            <v-text-field
              v-if="filter.type === 'number'"
              :label="filter.label"
              :placeholder="filter.placeholder || filter.label"
              v-model.number="filter.value"
              type="number"
              @update:model-value="handleFilterChange"
            />

            <!-- SELECT (single) -->
            <v-select
              v-if="filter.type === 'select'"
              :label="filter.label"
              :placeholder="filter.placeholder || filter.label"
              v-model="filter.value"
              :items="filterOptions[filter.key] || []"
              item-title="label"
              item-value="value"
              @update:model-value="handleFilterChange"
            />

            <!-- SELECT (multiple) -->
            <v-select
              v-if="filter.type === 'select_multiple'"
              :label="filter.label"
              :placeholder="filter.placeholder || filter.label"
              v-model="filter.value"
              :items="filterOptions[filter.key] || []"
              item-title="label"
              item-value="value"
              multiple
              chips
              @update:model-value="handleFilterChange"
            />

            <!-- BOOLEAN CHECKBOX -->
            <v-checkbox
              v-if="filter.type === 'checkbox'"
              :label="filter.label"
              :placeholder="filter.placeholder || filter.label"
              v-model="filter.value"
              color="primary"
              @update:model-value="handleFilterChange"
            />
          </v-col>
        </v-row>
        <v-row>
          <v-col cols="12">
            <v-btn color="primary" block @click="handleFiltersSubmit">Apply</v-btn>
          </v-col>
        </v-row>
      </v-card-text>
    </v-card>
  </v-navigation-drawer>
</template>

<script setup>
import {ref, watch} from 'vue'
import axios from 'axios'
import {cloneDeep, get, set} from "lodash"
const props = defineProps({
  url: String,
  fields: Array,
  filters: {
    type: Array,
    required: false,
    default: []
  },
})

const internalFilters = ref(cloneDeep(props.filters))
const filterOptions = ref({})
setFilterOptions()
function setFilterOptions () {
  const _filterOptions = {}
  const _internalFilters = []
  const selectTypes = ['select', 'select_multiple']
  let index = -1
  for (const filter of internalFilters.value) {
    index++
    _internalFilters[index] = filter

    if (!selectTypes.includes(filter.type)) continue;

    if (typeof filter.options === 'function') {
      _filterOptions[filter.key] = filter.options(internalFilters.value)
    } else if (filter.options) {
      _filterOptions[filter.key] = filter.options
    } else {
      _filterOptions[filter.key] = []
    }

    const optionValues = _filterOptions[filter.key].map(o => o.value)
    const filterValues = Array.isArray(filter.value) ? filter.value : [filter.value]
    for (const fv of filterValues) {
      if (!optionValues.includes(fv)) {
        _internalFilters[index].value = Array.isArray(filter.value) ? [] : null
        break
      }
    }
  }
  filterOptions.value = _filterOptions
  internalFilters.value = _internalFilters
}

watch(
  () => props.filters,
  newVal => {
    internalFilters.value = cloneDeep(newVal)
    setFilterOptions()
  },
  { deep: true }
)

function handleFilterChange () {
  setFilterOptions()
}


const activeFilters = ref([])
function handleFiltersSubmit () {
  activeFilters.value = internalFilters.value.filter(f => {
    if (Array.isArray(f.value)) {
      return f.value.length
    }

    if (f.type === 'number') {
      return f.value !== null && f.value !== undefined
    }

    return Boolean(f.value)
  })
}

function clearFilter(key) {
  internalFilters.value = props.filters.map(f =>
    f.key === key ? { ...f, value: Array.isArray(f.value) ? [] : '' } : f
  )
  setFilterOptions()
  handleFiltersSubmit()
}

const itemsPerPage = ref(5)
const search = ref('')
const serverItems = ref([])
const loading = ref(true)
const totalItems = ref(0)
async function loadItems ({ page, itemsPerPage, sortBy }) {
  loading.value = true
  const res = await axios.post(
    props.url,
    {
      table: {
        pagination: {
          page: page - 1,
          pageSize: itemsPerPage
        },
        orders: sortBy.map(sort => {
          const field = props.fields.find(f => f.key === sort.key)
          return {
            field: field && field.order_key ? field.order_key : sort.key,
            sort: sort.order
          }
        })
      }
    }
  )

  const results = res.data.results
  // Check if there are format functions given for the table fields.
  for (const field of props.fields) {
    if (field.format) {
      for (const result of results) {
        const value = get(result, field.key)
        const formattedValue = field.format(value, result)
        set(result, field.key, formattedValue)
      }
    }
  }

  serverItems.value = results
  totalItems.value = res.data.total
  loading.value = false
}

const filtersOpened = ref(false);
function openFilters () {
  filtersOpened.value = true;
}

</script>
