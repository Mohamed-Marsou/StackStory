<script setup>
    //import "../../styles/nav.scss"
    import { ref } from 'vue';
    import { RouterLink } from 'vue-router';
    //import searchBar from './searchBar.vue'
    const isMenuActive = ref(false);
    const isSearchActive = ref(false);
    // toggle close and open sidebar for mobile nav
    const toggleMenu = () => {
        isMenuActive.value = !isMenuActive.value;
    };
    const closeMenu = () => {
        isMenuActive.value = false;
    };
    //toggle open and close for search bar and
    const toggleSearch = () => {
        isSearchActive.value = !isSearchActive.value;
    };
    const closeSearch = () => {
        isSearchActive.value = false;
    };

</script>

<template>
    <header>
        <!--? normal header-->
        <div class="logo">
            <img src="/logo.png" alt="">
        </div>
        <div class="nav-links">
            <ul>
                <li class="nav-li">
                    <RouterLink :to="{ name: 'home' }">home</RouterLink>
                </li>
                <li class="nav-li">
                    <RouterLink :to="{ name: 'authors' }">authors</RouterLink>
                </li>
                <li class="nav-li">
                    <RouterLink :to="{ name: 'contact' }">contact</RouterLink>
                </li>
                <li class="nav-li">
                    <RouterLink :to="{ name: 'faq' }">FAQ</RouterLink>
                </li>
                <!--drop down menu 
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
                -->
                <i class="fa-solid fa-magnifying-glass search-icon" style="margin: 0 auto;" @click="toggleSearch"></i>
                <RouterLink class="btn" to="/auth">sign up</RouterLink>

            </ul>
        </div>
        <!-- ? mobile nav -->
        <button :class="['hamburger', isMenuActive ? 'is-active' : '']" @click="toggleMenu">
            <div class="bar"></div>
        </button>
        <nav :class="['mobile-nav', isMenuActive ? 'is-active' : '']" id="mobile-nav">
            <ul>
                <li><RouterLink :to="{ name: 'home' }" @click="closeMenu">home</RouterLink></li>
                <li><RouterLink :to="{ name: 'authors' }" @click="closeMenu">authors</RouterLink></li>
                <li><RouterLink :to="{ name: 'contact' }" @click="closeMenu">contact</RouterLink></li>
                <li><RouterLink :to="{ name: 'faq' }" @click="closeMenu">FAQ</RouterLink></li>
                <RouterLink class="btn" :to="{ name: 'auth' }">sign up</RouterLink>
                <i class="fa-solid fa-magnifying-glass search-icon" style="margin: 0 auto;" @click="toggleSearch"></i>
            </ul>
        </nav>
        <div v-if="isSearchActive" class="search-container" @click="closeSearch">
            <form class="search-form" @click.stop>
                <input type="text" id="search-bar" placeholder="Search posts, tags, and authors" @click.stop>
            </form>
        </div>
    </header>
</template>

<style lang="scss" scoped>
    @import '../../styles/_variables.scss';
    /*? normal header styles*/
    header {
        height: 4.5rem;
        margin: 2.5rem 2rem;
        border-radius: 20px;
        padding: 0 1rem;
        background-color: $secondary;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.3);
        @include flex(space-between, center, _, _);
        .logo{
            height: 90%;
            img{
                height: inherit;
            }
        }
        .nav-links{
            @include reset-list-styles();
            ul{
                .nav-li{
                    transition: .3s ease-in-out;
                    height: 1.5rem;
                    position: relative;
                    &::after{
                        position: absolute;
                        content: '';
                        bottom: -1px ;
                        left: 0;
                        width: 0;
                        height: 2px;
                        transform: translateX(-5%);
                        background: $accents;
                        transition: .3s ease-in-out;
                        }
                        &:hover::after{
                            width: 120%;
                        }
                    a{
                        color: $nav-links;
                    }

                }
                .dropdown {
                    position: relative;
                    display: inline-block;
                    a {
                        color: $nav-links;
                    }
                    &:hover {
                        display: block;
                    }
                    i{
                        color: $nav-links;
                        font-size: 12px;
                        margin: 0 5px;
                        cursor: pointer;
                    }
                    .dropbtn {
                        cursor: pointer;
                    }
                    .dropdown-content {
                        display: none;
                        position: absolute;
                        background-color: $secondary;
                        min-width: 160px;
                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                        z-index: 1;
                        border: 1px solid $borders;
                        border-radius: 7px;
                        &:hover {
                            display: block;
                        }
                        li {
                            a{
                                color: $nav-links;
                                margin: 12px 16px;
                                text-decoration: none;
                                display: block;
                                height: 2rem;
                                transition: 0.3s ease-in-out;
                            }
                        }
                    }
                }
                .dropdown:hover .dropdown-content {display: block;}
                
                .search-icon{
                    color: $nav-links;
                    cursor: pointer;
                    transition: .3s ease-in-out;

                    &:hover{
                        color: $accents;
                    }
                }
                @include flex(space-evenly, center, row, 2rem);
                .btn{
                    padding: .5rem 1rem;
                    color: white;
                    text-decoration: none;
                    background-color: $accents;
                    border-radius: 25px;
                    transition: 0.2s ease-in-out;
                    &:hover{
                        background-color: $accents-hover;
                    }
                }

            }
        }
        /*? hamburger and mobile nav styles*/
        /*!--------------------------hamburger menu--------------------*/
        .hamburger {
            display: block;
            margin: 15px;
            width: 30px;
            cursor: pointer;
            appearance: none;
            background: none;
            outline: none;
            border: none;
            top: 5px;
            z-index: 100;
            .bar, &::after, &::before {
                content: '';
                display: block;
                width: 100%;
                height: 2px;
                background-color: $nav-links;
                margin: 6px 0px;
                transition: 0.4s;
            }
            &.is-active {
                &::before {
                    transform: rotate(-45deg) translate(-2px, 3px);
                }
            
                .bar {
                    opacity: 0;
                }
            
                &::after {
                    transform: rotate(45deg) translate(-9px, -9px);
                }
            }
        }
        
        /*!--------------------------mobile nav--------------------*/

        .mobile-nav {
            @include reset-list-styles;
            position: fixed;
            top: 1.5rem;
            right: 1.5rem;
            width: 40%;
            z-index: 99;
            background-color: $secondary;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s ease-in-out;
            padding: 1rem;
            border-radius: 15px;
            border: 1px solid $borders;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            transform: translateY(100%); 
            transition: opacity 0.4s ease-in-out, transform 0.4s cubic-bezier(0.2, 1, 0.3, 1); /* Use cubic-bezier for smoother animation */
            overflow: hidden; 
            ul {
            color: $nav-links;
            @include flex(flex-start, flex-start, column, 1rem);
                li {
                    position: relative;
                    &::after{
                        position: absolute;
                        content: '';
                        bottom: -1px ;
                        left: 0;
                        width: 0;
                        height: 2px;
                        transform: translateX(-5%);
                        background: $accents;
                        transition: .3s ease-in-out;
                        }
                        &:hover::after{
                            width: 120%;
                        }
                    a {
                        color: $nav-links;
                        transition: 0.3s ease-in-out;
                        
                    }
                }
                .btn {
                    padding: .5rem 1rem;
                    color: white;
                    text-decoration: none;
                    background-color: $accents;
                    border-radius: 25px;
                    transition: 0.2s ease-in-out;
                    width: 100%;
                    text-align: center;
                    &:hover {
                        background-color: $accents-hover;
                    }
                }
                .search-icon{
                    color: $nav-links;
                    cursor: pointer;
                    transition: .3s ease-in-out;
                    &:hover{
                        color: $accents;
                    }
                }
            }
        }
        
        .mobile-nav.is-active {
            opacity: 1;
            pointer-events: auto;
            transform: translateY(25%); 
            transition: opacity 0.4s ease-in-out, transform 0.4s cubic-bezier(0.2, 1, 0.3, 1);
        }
        
        /*? media queries*/
        /*?1st one just for hamburger menu*/
        @media screen and (max-width: 800px) {
            .mobile-nav{
                display: block;
            }
            .hamburger{
                display: block;
            }
            .nav-links{
                display: none;
            }

        }
        @media screen and (min-width: 800px) {

            .hamburger{
                display: none;
            }


        }
    }
    @media screen and (max-width: 800px) {
        header {
            height: 4rem;
            margin: 2rem 1.5rem;
        }
    }
    @media screen and (max-width: 425px) {
        header {
            .mobile-nav {
                width: 60%;
            }
        }
    }
    @media screen and (max-width: 375px) {
        header {
            margin: 1.5rem .5rem 0 ;
        }
    }
    @media screen and (max-width: 320px) {
        header {
            .mobile-nav {
                width: 80%;
            }
        }
    }

    /*search bar */
      
    .search-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        @include flex(center, flex-start, _,_);
        backdrop-filter: blur(2px) saturate(150%);
        -webkit-backdrop-filter: blur(2px) saturate(150%);
        z-index: 9999;
    }
  
    .search-form {
        width: 490px;
        border-radius: 10px;
        margin-top: 5rem;
    }
  
    input#search-bar {
        width: 100%;
        height: 65px;
        padding-left: 60px; 
        border-radius: 10px;
        font-size: 1rem;
        border: 1px solid #D0CFCE;
        outline: none;
        background-image: url('http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png');
        background-size: 50px 50px;
        background-position: 10px center;
        background-repeat: no-repeat;
        &:focus {
            border: 1px solid $accents;
            transition: 0.35s ease;
            color: black;
            &::-webkit-input-placeholder {
                transition: opacity 0.45s ease;
                opacity: 0;
            }
            &::-moz-placeholder {
                transition: opacity 0.45s ease;
                opacity: 0;
            }
            &:-ms-placeholder {
                transition: opacity 0.45s ease;
                opacity: 0;
            }
        }
    }
</style>