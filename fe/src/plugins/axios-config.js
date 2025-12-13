import {markRaw} from "vue";
import axios from "axios";
import {useAuthStore} from "@/store/useAuthStore.js";

export const axiosConfig = () => {
  return markRaw({
    install (app) {
      axios.defaults.withCredentials = false

      axios.interceptors.request.use(config => {
        // Attach JWT
        const { getJwt } = useAuthStore()
        const jwt = getJwt()
        if (!config.headers.Authorization && jwt) {
          config.headers.Authorization = `Bearer ${jwt.access_token}`
        }

        return config
      }, error => {
        return Promise.reject(error)
      })

      axios.interceptors.response.use(response => {
        return response
      }, async error => {
        if (error.response && error.response.status === 401) {
          // Manage the logout or the token renew.
        }

        return Promise.reject(error)
      })
    }
  })
}
