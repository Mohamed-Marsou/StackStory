<!-- TODO WORK ON VIEW SWITCH  -->
<!-- TODO WORK ON VIEW SWITCH  -->
<!-- TODO WORK ON VIEW SWITCH  -->
<script setup>
import Login from '../../components/blog/auth/Login-form.vue'
import Register from '../../components/blog/auth/Register-form.vue'
import { ref } from 'vue'

const isLogin = ref(true)


const switchForm = () => {
  isLogin.value = !isLogin.value
  console.log("object");
}
</script>
<template>
    <div class="auth-bg-box">
        <Login v-if="isLogin" @toggleLogin="switchForm" />
        <Register v-else @toggleLogin="switchForm" />
    </div>
</template>

<style lang="scss">
@import '../../styles/variables';

.auth-bg-box {
    width: 100%;
    height: 100vh;
    @include flx();
    color: $text-paragraphs; 
}
</style>