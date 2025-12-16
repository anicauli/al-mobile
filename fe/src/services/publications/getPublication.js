import axios from "axios";
import {getApiUrl} from "@/utils/api.js";

export const getPublication = async (publicationId) => {
  return await axios.get(getApiUrl(`publication/${publicationId}`))
}
