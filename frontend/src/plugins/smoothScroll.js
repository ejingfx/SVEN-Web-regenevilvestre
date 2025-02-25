import VueSmoothScroll from 'vue3-smooth-scroll'

export default {
  install (app) {
    app.use(VueSmoothScroll, {
      duration: 300,
      updateHistory: false,
      easingFunction: 'easeInOutCubic'
    })
  }
}
