import { createRouter, createWebHistory } from 'vue-router'
import publicationRoutes from '@/modules/publications/routes.js'
const routes = [
  {
    path: '/',
    name: 'publication',
    component: () => import("@/modules/publications/PublicationIndex.vue"),
    children: publicationRoutes
  },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
})

export default router
