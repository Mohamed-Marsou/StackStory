<!--! Always use  ""<script setup>"" COMPOSITION API SYNTAX ALWAYS -->
<script setup>
import { RouterLink, RouterView } from 'vue-router'

</script>
<template>
    <div class="home-main">
        <h1>Best Blog Ever !!</h1>
        <h2>sgsg</h2>
        <RouterLink :to="{ name: 'contact' }">Go to Contact us</RouterLink>
        <br />
        <RouterLink :to="{ name: 'authors' }">Go to authors</RouterLink>
    </div>
</template>

<style lang="scss">
    .home-main{
    width: 100%;
    min-height: 100vh;
    }
</style>