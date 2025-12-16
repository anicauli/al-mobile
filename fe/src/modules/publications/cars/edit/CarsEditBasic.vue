<template>
  <div v-if="loaded">
    <Heading :title="title" :breadcrumbs="breadcrumbs" />

  </div>
</template>

<script setup>
import Heading from "@/components/Heading.vue";
import {computed, onMounted, ref} from "vue";
import {useRoute} from "vue-router";
import {getPublication} from "@/services/publications/getPublication.js";
const route = useRoute()

const title = computed(() => {
  return publication.value ? `Edit "${publication.value.title}" basics` : 'Create "car" publication';
})

const breadcrumbs = computed(() => {
  const res = [
    {
      title: 'Publications',
      to: '/'
    },
    {
      title: 'Cars',
      to: '/cars'
    }
  ]
  if (publication.value) {
    res.push({ title: 'Edit basics' })
  } else {
    res.push({ title: 'Create' })
  }
  return res
})

const loaded = ref(false)
const publication = ref(null)
onMounted(async() => {
  if (route.params.id) {
    publication.value = (await getPublication(route.params.id)).data
  }
  loaded.value = true
})
</script>
