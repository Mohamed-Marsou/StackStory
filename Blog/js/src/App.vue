<template>
  <div id="main-container-box">
    <Nav />
    <RouterView />

  </div>
</template>

<script setup>
  import Nav from './components/blog/Nav.vue';
  import './styles/global.scss';
  import { RouterLink, RouterView } from 'vue-router'
</script>


<style lang="scss" scoped>

</style>
