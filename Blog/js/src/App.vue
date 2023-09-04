<script setup>
  import Nav from './components/blog/Nav.vue';
  import './styles/global.scss';
  import { useRouter, RouterView } from 'vue-router'
  const router = useRouter();
</script>
<template>
  <div id="main-container-box">
    <Nav  v-if="router.currentRoute.value.name  !== 'auth'" />
    <RouterView />

  </div>
</template>

<style lang="scss" scoped>

</style>
