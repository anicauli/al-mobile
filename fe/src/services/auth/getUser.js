import {useAuthStore} from "@/store/useAuthStore.js";
import axios from "axios";
import {getApiUrl} from "@/utils/api.js";

export const getUser = async () => {
  const { getJwt, getUser, setUser } = useAuthStore()
  const user = getUser()
  if (user) return user

  const jwt = getJwt()
  if (!jwt) return null

  try {
    const res = await axios.get(getApiUrl('auth/user'))
    const user = res.data
    setUser(user)
    return user
  } catch (e) {
    console.error(e)
  }

  return null
}
