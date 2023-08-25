<template>
    <header>
        <!--? normal header-->
        <div class="logo">
            <img src="/logo.png" alt="">
        </div>
        <div class="nav-links">
            <ul>
                <li class="nav-li">
                    <RouterLink to="/features">Features</RouterLink>
                </li>
                <li class="nav-li">
                    <RouterLink to="/style">Style</RouterLink>
                </li>
                <li class="nav-li">
                    <RouterLink to="/tags">Tags</RouterLink>
                </li>
                <li class="nav-li">
                    <RouterLink to="/authors">Authors</RouterLink>
                </li>
                <li>
                    <div class="dropdown">
                        <a class="dropbtn">more</a>
                        <div class="dropdown-content">
                            <li>
                                <RouterLink to="/">Authors</RouterLink>
                            </li>
                            <li>
                                <RouterLink to="/">Authors</RouterLink>
                            </li>
                            <li>
                                <RouterLink to="/">Authors</RouterLink>
                            </li>
                            <li>
                                <RouterLink to="/">Authors</RouterLink>
                            </li>
                        </div>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>                    
                </li>
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <li class="nav-li">
                    <RouterLink to="/more">sign in </RouterLink>
                </li>
                <RouterLink class="btn" to="/more">become member</RouterLink>
            </ul>
        </div>
        <!-- ? mobile nav -->
        <button :class="['hamburger', isMenuActive ? 'is-active' : '']" @click="toggleMenu">
            <div class="bar"></div>
        </button>
        <nav :class="['mobile-nav', isMenuActive ? 'is-active' : '']" id="mobile-nav">
            <ul>
                <li><RouterLink to="/" @click="closeMenu">Features</RouterLink></li>
                <li><RouterLink to="/" @click="closeMenu">styles</RouterLink></li>
                <li><RouterLink to="/" @click="closeMenu">tags</RouterLink></li>
                <li><RouterLink to="/" @click="closeMenu">authors</RouterLink></li>
                <li><RouterLink to="/" @click="closeMenu">posts</RouterLink></li>
                <li><RouterLink to="/" @click="closeMenu">contact</RouterLink></li>
                <li><RouterLink to="/" @click="closeMenu">sign in</RouterLink></li>
                <RouterLink class="btn" to="/">become member</RouterLink>
                <i class="fa-solid fa-magnifying-glass search-icon" style="margin: 0 auto;"></i>
            </ul>
        </nav>
    </header>
</template>

<script setup>
    import "../../styles/nav.scss"
    import { ref } from 'vue';
    import { RouterLink } from 'vue-router';
    const isMenuActive = ref(false);

    const toggleMenu = () => {
        isMenuActive.value = !isMenuActive.value;
    };

    const closeMenu = () => {
        isMenuActive.value = false;
    };
</script>

<style scoped>

</style>