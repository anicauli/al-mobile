<template>
  <PublicationLayout />
  <router-view/>
  <div v-if="route.name === 'publication'">
    TODO: Add something beautiful, an image or something like that.
  </div>
</template>

<script setup>
import PublicationLayout from "@/modules/publications/components/PublicationLayout.vue";
import {useRoute} from "vue-router";

const route = useRoute()
</script>
