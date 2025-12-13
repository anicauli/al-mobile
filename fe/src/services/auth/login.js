import axios from "axios";
import {getApiUrl} from "@/utils/api.js";
import {useAuthStore} from "@/store/useAuthStore.js";

export const login = async (email, password) => {
  const res = await axios.post(getApiUrl('auth/login'), {
    email,
    password,
  })
  const { setJwt } = useAuthStore()
  setJwt(res.data)
}
