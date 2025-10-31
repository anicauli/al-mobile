<template>
  <div>
    <Heading title="Publications" :breadcrumbs="breadcrumbs" />

    <router-link to="/create">Create</router-link>

    <Table
      :url="getApiUrl('publication/list')"
      :fields="[
        {
          key: 'title',
          title: 'Title',
          sortable: true
        },
        {
          key: 'car.make',
          title: 'Make',
          sortable: true
        },
        {
          key: 'car.model',
          title: 'Model',
          sortable: true
        },
        {
          key: 'car.price',
          title: 'Price',
          sortable: true
        },
        {
          key: 'created_at',
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
        },
      ]"
    />
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
  }
])
</script>
