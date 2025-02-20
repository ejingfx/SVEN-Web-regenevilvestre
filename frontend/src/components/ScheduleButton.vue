<template>
  <a
    :class="buttonClass"
    :href="link"
  >
    <span class="schedule__text">
      {{ text }}
    </span>
  </a>
</template>
<script>
export default {
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
  computed: {
    buttonClass () {
      return `schedule schedule--${this.className}`
    },
    link () {
      return this.url
    }
  }
}
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
