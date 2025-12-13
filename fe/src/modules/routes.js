import { createRouter, createWebHistory } from 'vue-router'
import publicationRoutes from '@/modules/publications/routes.js'
import {getUser} from "@/services/auth/getUser.js";
const routes = [
  {
    path: '/login',
    name: 'login',
    component: () => import('@/modules/login/LoginIndex.vue'),
    beforeEnter: async () => {
      const user = await getUser()
      if (user) {
        return { name: 'publication' }
      }
    }
  },
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
