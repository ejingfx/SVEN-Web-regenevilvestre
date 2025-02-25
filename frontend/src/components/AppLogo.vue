<template>
  <a
    :class="buttonClass"
    :href="url"
    v-smooth-scroll
  >
    <div class="app-logo__img">
      <img alt="Pawtastic" src="../assets/images/logo.png">
    </div>
    <span class="app-logo__text">PAWTASTIC</span>
  </a>
</template>

<script>
import { computed, defineComponent } from 'vue'

export default defineComponent({
  name: 'AppLogo',
  props: {
    url: {
      type: String,
      default: '#top'
    },
    className: {
      type: String,
      default: ''
    }
  },
  setup (props) {
    const buttonClass = computed(() => {
      return props.className.trim() === ''
        ? 'app-logo'
        : `app-logo app-logo--${props.className.trim()}`
    })

    return {
      buttonClass
    }
  }
})
</script>

<style lang="scss" scoped>
.app-logo {
  display: flex;
  align-content: center;
  justify-content: center;
  color: #fff;
  text-decoration: none;
}
.app-logo__img {
  display: flex;
  position: relative;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  background-color: #fff;
  margin-right: 20px;

  @include phone {
    width: 40px;
  height: 40px;
    margin-right: 10px;
  }

  img {
    position: absolute;
    top: 50%;
    left: 50%;
    height: 60px;
    width: 60px;
    max-height: 60px;
    max-width: 60px;
    border-radius: 50%;
    transform: translateX(-50%) translateY(-50%);

    @include phone {
      height: 100%;
      width: 100%;
      max-height: 100%;
      max-width: 100%;
    }
  }
}
.app-logo__text {
  display: flex;
  align-self: center;
  justify-content: center;
}

// MODIFIER
.app-logo--alt {
  justify-content: start;
  margin-bottom: 40px;

  .app-logo__img {
    background-color: pink;
  }
}
</style>
