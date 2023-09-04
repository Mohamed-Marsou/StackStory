<script setup>
import AUthorBox from '../../components/blog/Author-slot.vue'
</script>
<template>
    <div class="authors-main">
       <AUthorBox v-for="(item, index) in 3" :key="index" />
    </div>
</template>

<style lang="scss">
@import '../../styles/variables';
    .authors-main{
        width: 100%;
        min-height: 100vh;
        @include flex( flex-start, center, row ,1vw);
        flex-wrap: wrap;
        padding: 1rem 2vw;
    
}
@media screen  and (max-width: 1024px){
    .authors-main{
        justify-content: center;
    }
}
</style>