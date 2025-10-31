<template>
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
    <h1>{{ title }}</h1>
    <v-breadcrumbs :items="breadcrumbs"></v-breadcrumbs>
  </div>
</template>
<script setup lang="ts">
defineProps({
  title: String,
  breadcrumbs: Array<String>,
})
</script>
