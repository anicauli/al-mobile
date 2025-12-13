import { defineStore } from 'pinia'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null,
  }),

  actions: {
    setJwt (token) {
      localStorage.setItem('jwt', JSON.stringify(token))
    },
    getJwt () {
      return localStorage.getItem('jwt') ? JSON.parse(localStorage.getItem('jwt')) : null
    },
    setUser (user) {
      this.user = user
    },
    getUser () {
      return this.user
    }
  }
})
