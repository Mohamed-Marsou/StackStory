<script setup>
  import { computed } from 'vue'; 
  import Nav from './components/blog/Nav.vue';
  import Footer from './components/blog/Footer.vue';
  import dashNav from './components/dashboard/nav.vue';
  import './styles/_variables.scss';
  import { useRouter, RouterView } from 'vue-router'
  const router = useRouter();
  // Determine when to show the normal nav and dashboard nav
  const showNormalNav = computed(() => {
    return router.currentRoute.value.name !== 'auth' && router.currentRoute.value.name !== 'dash';
  });
  const showDashboardNav = computed(() => {
    return router.currentRoute.value.name === 'dash';
  });
  // Determine when to show the footer
  const showFooter = computed(() => {
    return router.currentRoute.value.name !== 'dash'; 
  });
</script>

<template>
  <div id="main-container-box">
    <Nav v-if="showNormalNav" />
    <dashNav v-if="showDashboardNav" />
    <RouterView />
    <Footer v-if="showFooter"/>
  </div>
</template>


<style lang="scss" scoped>
  
</style>
