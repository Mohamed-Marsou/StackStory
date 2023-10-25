<script setup>
    import { ref, onMounted, computed } from 'vue';

    import AUthorBox from '../../components/blog/Author-slot.vue'
    import { useAdminStore } from '../../stores/adminStore'; 
    const adminStore = useAdminStore();
    const admins = computed(() => adminStore.admins);
    console.log(adminStore.admins)
    onMounted(async () => {
        await adminStore.fetchAdmins();
    });
</script>
<template>
    <div class="authors-main">
        <AUthorBox v-for="admin in admins" 
            :key="admin.id" 
            :adminFirstName="admin.first_name" 
            :adminLastName="admin.last_name"
            :adminImageUrl="admin.image_url"
            :AdminWebSite="admin.web_link"
            :adminFacebook="admin.facebook_link"
            :adminLinkedIn="admin.linkedin_link"
            :adminInstagram="admin.instagram_link"
            :adminX="admin.x_link"
            :adminSummary="admin.summary"
            :articleCount="admin.articles_count"

        />
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