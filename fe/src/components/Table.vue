<template>
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
</template>

<script setup>
import {ref} from 'vue'
import axios from 'axios'
const props = defineProps({
  url: String,
  fields: Array
})

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
    },
    {
      headers: {
        'Authorization': 'Bearer 7160e8ff-238d-4e9c-9f43-d6d53ca6c902|ybDgv6FnFyquuDfwjt42xqEhaRDKpOZCDQpZfp4a163f84f9',
      },
    }
  )

  serverItems.value = res.data.results.map(item => {
    for (const kItem in item) {
      const field = props.fields.find(f => f.key === kItem)
      if (field && field.format) {
        item[kItem] = field.format(item[kItem], item)
      }
    }
    return item
  })
  totalItems.value = res.data.total
  loading.value = false
}
</script>
