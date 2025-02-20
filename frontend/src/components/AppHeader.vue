<template>
  <header class="app-header">
    <AppLogo />
    <div class="app-header__menu">
      <nav class="menu">
        <ul class="menu__list">
          <li class="menu__item"><a class="menu__link" href="#about">About us</a></li>
          <li class="menu__item"><a class="menu__link" href="#form">Schedule a visit</a></li>
        </ul>
      </nav>
    </div>
  </header>
</template>

<script>
import AppLogo from '@/components/AppLogo.vue'

export default {
  name: 'AppHeader',
  components: {
    AppLogo
  }
}
</script>

<style lang="scss" scoped>
.app-header {
  position: relative;
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  margin-top: 50px;
  z-index: 1;

  @include phone {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    margin-top: 0;
    padding: 20px 10px 0;
    z-index: 99 !important;
  }
}
.app-header__menu {
  padding-right: 10em;

  @include phone {
    padding-right: 0;
  }
}
</style>
