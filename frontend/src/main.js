import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axiosPlugin from './plugins/axios'

createApp(App)
  .use(router)
  .use(axiosPlugin)
  .mount('#app')
