<template>
  <a
    :class="buttonClass"
    :href="link"
    v-smooth-scroll
  >
    <span class="schedule__text">
      {{ text }}
    </span>
  </a>
</template>

<script>
import { defineComponent, computed } from 'vue'

export default defineComponent({
  name: 'ScheduleButton',
  props: {
    text: {
      type: String,
      default: 'Schedule a visit'
    },
    url: {
      type: String,
      default: '#'
    },
    className: {
      type: String,
      default: ''
    }
  },
  setup (props) {
    // Computed property for the button's class
    const buttonClass = computed(() => `schedule schedule--${props.className}`)

    // Computed property for the link
    const link = computed(() => props.url)

    return {
      buttonClass,
      link
    }
  }
})
</script>

<style lang="scss" scoped>
.schedule {
  display: inline-block;
  padding: 10px 20px;
  border-radius: 30px;
  outline: none;
  border-color: transparent;
  background-color: #fff;
  text-decoration: none;
}
.schedule__text {
  color: #333;
}

// MODIFIER
.schedule--dark {
  background-color: $default-blue;

  .schedule__text {
    color: #fff;
  }
}
</style>
