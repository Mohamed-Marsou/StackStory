<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
<div id="main-container-box">
  <!-- TODO MAKE NAV BAR AND USE HERE -->
  <!-- Nav bar  -->
  <RouterView />
  <!-- TODO MAKE Footer AND USE HERE -->
  <!-- Footer  -->
</div>
</template>
<style lang="scss" scoped>
// <!-- TODO MAKE GLOBAL SCSS STYLES LIKE MIXINS FONT FAMILY COLORS AND INCLUDE IT HERE  -->
#main-container-box{
  width: 100%;
  min-height: 100vh;
}
</style>
