<template>
  <div>
    <Heading title="Cars" :breadcrumbs="breadcrumbs" />

    <Table
      :url="getApiUrl('publication/list/car')"
      :fields="fields"
      :filters="filters"
    >
      <template #actions>
        <router-link to="/create">
          <v-btn icon variant="tonal" color="primary" class="mr-2">
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </router-link>
      </template>
    </Table>
  </div>
</template>

<script setup>
import Heading from "@/components/Heading.vue";
import {ref} from "vue";
import Table from "@/components/Table.vue";
import {getApiUrl} from "@/utils/api.js";

const breadcrumbs = ref([
  {
    title: 'Publications',
    to: '/'
  },
  {
    title: 'Cars',
    to: '/cars'
  },
])

const fields = ref([
  {
    key: 'publication.title',
    title: 'Title',
    sortable: true
  },
  {
    key: 'make',
    title: 'Make',
    sortable: true
  },
  {
    key: 'model',
    title: 'Model',
    sortable: true
  },
  {
    key: 'price',
    title: 'Price',
    sortable: true
  },
  {
    key: 'publication.created_at',
    title: 'Created',
    sortable: true,
    format: (data) => new Date(data).toLocaleString('en-GB', {
      year: 'numeric',
      month: '2-digit',
      day: '2-digit',
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit'
    })
  }
])

const filters = ref([
  {
    key: 'make',
    field: 'make',
    label: 'Make',
    type: 'select',
    filter_type: 1,
    options: [
      { label: 'Mercedes Benz', value: 'mercedes_benz' },
      { label: 'BMW', value: 'bmw' },
      { label: 'Audi', value: 'audi' },
    ]
  },
  {
    key: 'model',
    field: 'model',
    label: 'Model',
    type: 'select_multiple',
    filter_type: 8,
    options: (filters) => {
      const makeFilter = filters.find(v => v.key === 'make')
      return {
        mercedes_benz: [
          { label: 'C Class', value: 'c_class' },
          { label: 'E Class', value: 'e_class' },
        ],
        bmw: [
          { label: 'Seria 3', value: 'seria_3' },
          { label: 'Seria 5', value: 'seria_5' },
        ],
        audi: [
          { label: 'A4', value: 'a4' },
          { label: 'A6', value: 'a6' },
        ],
      }[makeFilter.value] || []
    }
  },
  {
    key: 'power_hp_gte',
    field: 'power_hp',
    label: 'Power HP >=',
    type: 'number',
    filter_type: 3
  },
  {
    key: 'power_hp_lte',
    field: 'power_hp',
    label: '<= Power HP',
    type: 'number',
    filter_type: 5
  },
])
</script>
