<template>
    <v-card>
        <v-layout>
            <v-app-bar v-if="authenticated" color="primary">
<!--              <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>-->
              <v-toolbar-title>Al Mobile</v-toolbar-title>
            </v-app-bar>

<!--            <v-navigation-drawer-->
<!--              v-if="authenticated"-->
<!--              v-model="drawer"-->
<!--              :location="$vuetify.display.mobile ? 'bottom' : undefined"-->
<!--              temporary-->
<!--            >-->
<!--              <v-list-->
<!--                  v-model:selected="selectedRoute"-->
<!--                  :items="items"-->
<!--                  selectable-->
<!--                  mandatory-->
<!--              ></v-list>-->
<!--            </v-navigation-drawer>-->

            <v-main class="overflow-auto h-screen" :class="`${authenticated ? 'pa-4 padding-top-64-px' : ''}`">
              <router-view v-if="loaded" />
            </v-main>
        </v-layout>
    </v-card>
</template>

<script setup>
import {onMounted, ref, watch} from 'vue'
import appRouter from "@/modules/routes.js";
import { useRouter } from 'vue-router'
import {getUser} from "@/services/auth/getUser.js";

const router = useRouter()

appRouter.isReady().then(() => {
    if (authenticated.value) {
      const route = appRouter.currentRoute.value
      selectedRoute.value = [route.matched[0].name]
    }
})

router.afterEach(() => {
    if (authenticated.value) {
      const route = appRouter.currentRoute.value
      selectedRoute.value = [route.matched[0].name]
    }
})


const selectedRoute = ref(['publication'])
const items = [
    {
        title: 'Publications',
        value: 'publication',
    },
]

const drawer = ref(false)
watch(selectedRoute, (newVal, oldVal) => {
    if (newVal && newVal[0] && authenticated.value) {
        if (oldVal && oldVal[0] === newVal[0]) return
        router.push({ name: newVal[0] })
    }
})

const loaded = ref(false)
const authenticated = ref(false)

onMounted(async() => {
  const user = await getUser()
  setTimeout(async () => {
    if (!user) {
      await router.push({ name: 'login' })
    } else {
      authenticated.value = true
      // await router.push({ name: 'publication' })
    }
    loaded.value = true;
  }, 200);
})
</script>

<style>
  .padding-top-64-px {
    padding-top: 64px !important;
  }
</style>
