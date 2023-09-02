<template>
  <div id="main-container-box">
    <Nav />
    <RouterView />
    <Footer />
  </div>
</template>

<script setup>
  import Nav from './components/blog/Nav.vue';
  import Footer from './components/blog/Footer.vue'
  import { RouterLink, RouterView } from 'vue-router'
</script>


<style lang="scss" scoped>
  
</style>
