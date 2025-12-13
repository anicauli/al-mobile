<template>
  <div>
    <Heading title="Create Publication" :breadcrumbs="breadcrumbs" />

  </div>
</template>

<script setup>
import Heading from "@/components/Heading.vue";
import {ref} from "vue";

const breadcrumbs = ref([
  {
    title: 'Publications',
    to: '/'
  },
  {
    title: 'Create',
  },
])
</script>
