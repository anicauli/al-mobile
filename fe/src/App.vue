<template>
    <v-card>
        <v-layout>
            <v-app-bar color="primary">
                <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

                <v-toolbar-title>Al Mobile</v-toolbar-title>
            </v-app-bar>

            <v-navigation-drawer
                v-model="drawer"
                :location="$vuetify.display.mobile ? 'bottom' : undefined"
                temporary
            >
                <v-list
                    v-model:selected="selectedRoute"
                    :items="items"
                    selectable
                    mandatory
                ></v-list>
            </v-navigation-drawer>

            <v-main style="height: 100vh;">
                <v-card-text>
                    <router-view />
                </v-card-text>
            </v-main>
        </v-layout>
    </v-card>
</template>

<script setup>
import {ref, watch} from 'vue'
import appRouter from "@/modules/routes.js";
import { useRouter } from 'vue-router'

const router = useRouter()

appRouter.isReady().then(() => {
    const route = appRouter.currentRoute.value
    selectedRoute.value = [route.matched[0].name]
})

router.afterEach(() => {
    const route = appRouter.currentRoute.value
    selectedRoute.value = [route.matched[0].name]
})

const selectedRoute = ref(['publication'])
const items = [
    {
        title: 'Publications',
        value: 'publication',
    },
]

const drawer = ref(false)
const group = ref(null)

watch(group, () => {
    drawer.value = false
})
watch(selectedRoute, (newVal, oldVal) => {
    if (newVal && newVal[0]) {
        if (oldVal && oldVal[0] === newVal[0]) return
        router.push({ name: newVal[0] })
    }
})
</script>
