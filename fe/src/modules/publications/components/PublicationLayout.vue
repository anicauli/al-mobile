<template>
  <v-layout
    class="overflow-visible publication-layout"
    style="height: 56px;"
  >
    <v-bottom-navigation
      v-model="value"
      active
    >
      <v-btn v-for="routeItem in routeItems">{{ routeItem.title }}</v-btn>
    </v-bottom-navigation>
  </v-layout>
</template>

<script setup>
import {ref, watch} from 'vue'
import {useRouter} from "vue-router";

const router = useRouter()
const value = ref(0)
const lastValue = ref(0)
const routeItems = [
  { routeName: 'cars-list', title: 'Cars' },
]

watch(value, (newVal, oldVal) => {
  if (newVal === null || newVal === undefined) {
    value.value = lastValue.value
    router.push({ name: routeItems[value.value].routeName })
    return
  }

  router.push({ name: routeItems[newVal].routeName })
  lastValue.value = newVal
})
</script>

<style>
.publication-layout > header {
  box-shadow: none !important;
  border-bottom: 1px solid lightgray;
}
</style>
