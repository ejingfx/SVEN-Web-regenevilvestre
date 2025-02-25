<template>
  <section class="not-found">
    <div class="not-found__inner">
      <h1>ERROR 404 | PAGE NOT FOUND</h1>
      <div>
        <router-link to="/">Go Back Home</router-link>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'NotFound'
}
</script>

<style lang="scss" scoped>
.not-found {
  display: block;
  width: 100%;
  height: 100%;
}
.not-found__inner {
  width: 100vw;
  height: 100vh;
  border-color: 1px solid;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;

  h1 {
    margin-bottom: 20px;
  }

  a {
    text-decoration: none;
  }
}
</style>
