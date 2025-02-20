import axios from 'axios'

const axiosInstance = axios.create({
  baseURL: process.env.VUE_APP_API_URL || 'localhost/api',
  timeout: 120000
})

export default {
  install (app) {
    app.config.globalProperties.$axios = axiosInstance
  }
}

export { axiosInstance }
