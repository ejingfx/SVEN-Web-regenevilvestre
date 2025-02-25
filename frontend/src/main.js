import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axiosPlugin from './plugins/axios'
import smoothScroll from './plugins/smoothScroll'

const app = createApp(App)
app
  .use(router)
  .use(axiosPlugin)
  .use(smoothScroll)
  .mount('#app')
