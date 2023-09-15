<template>
    <nav>
        <!--? search icon div-->
        <div class="searchIcon" @click="toggleSearch">
            <i class="fa-solid fa-magnifying-glass search-icon" style="margin: 0 auto;"></i>
            <p>search...</p>
        </div>
        <!--? admin profile div-->
        <div class="admin">
            <div class="notification dropbtn" @click="toggleNotificationDropdown">
                <i class="fa-regular fa-bell"></i>
                <div class="notificationDropdown" :class="{ 'show': isNotificationDropdownVisible }">
                    <div class="notification-dropdown-content">
                        <div class="notification-title">
                            <h5>notifications</h5>
                            <a href="">view all</a>
                        </div>
                        <li>
                            <img src="/zayd.jpg" alt="">
                            <div>
                                <h5>notification title</h5>
                                <RouterLink to="/">Notification content</RouterLink>
                            </div>
                        </li>
                        <li>
                            <img src="/zayd.jpg" alt="">
                            <div>
                                <h5>notification title</h5>
                                <RouterLink to="/">Notification content</RouterLink>
                            </div>
                        </li>
                    </div>
                </div>
            </div>
            <div class="admin-profile dropbtn" @click="toggleAdminDropdown">
                <div class="img">
                    <img src="/zayd.jpg" alt="">
                </div>
                <p>zayd inani</p>
                <i class="fa-solid fa-chevron-down"></i>
                <div class="profileDropdown" :class="{ 'show': isAdminDropdownVisible }">
                    <div class="profile-dropdown-content">
                        <li>
                            <i class="fa-regular fa-user"></i>
                            <RouterLink to="/">profile</RouterLink>
                        </li>
                        <li>
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <RouterLink to="/">sign out</RouterLink>
                        </li>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--? search input div-->
    <div v-if="isSearchActive" class="search-container" @click="closeSearch">
        <form class="search-form" @click.stop>
            <input type="text" id="search-bar" placeholder="Search posts, tags, and authors" @click.stop>
        </form>
    </div>
</template>

<script setup>
    import { ref } from 'vue';

    const isSearchActive = ref(false);
    const isNotificationDropdownVisible = ref(false);
    const isAdminDropdownVisible = ref(false);

    // Toggle open and close for search bar
    const toggleSearch = () => {
        isSearchActive.value = !isSearchActive.value;
    };
    const closeSearch = () => {
        isSearchActive.value = false;
    };

    // Toggle open and close for Notification dropdown
    const toggleNotificationDropdown = () => {
        isNotificationDropdownVisible.value = !isNotificationDropdownVisible.value;
    };

    // Toggle open and close for Admin profile dropdown
    const toggleAdminDropdown = () => {
        isAdminDropdownVisible.value = !isAdminDropdownVisible.value;
    };

    // Close Notification dropdown when clicking outside of it
    document.body.addEventListener('click', (e) => {
        if (!e.target.closest('.notification')) {
            isNotificationDropdownVisible.value = false;
        }
    });

    // Close Admin profile dropdown when clicking outside of it
    document.body.addEventListener('click', (e) => {
        if (!e.target.closest('.admin-profile')) {
            isAdminDropdownVisible.value = false;
        }
    });
</script>



<style lang="scss" scoped>
    @import '../../styles/_variables';

    nav {
        height: 4.5rem;
        width: 87%;
        position: fixed; 
        top: 0; 
        right: 0;
        padding: 0 2rem;
        @include flex(space-between, center, _, _);
        background-color: $dashSecondary;
        .searchIcon{
            width: 6.5rem;
            cursor: pointer;
            @include flex(space-between, center, _, _);
            .search-icon{
                color: $nav-links;
                padding-right: .5rem;
            }      

        }
        .admin {
            width: fit-content;
            height: 90%;

            @include flex(space-between, center, _, 2rem);
            .notification{
                height: 2.2rem;
                width: 2.2rem;
                border-radius: 50%;
                background-color: $dashMain;
                @include flex(center, center, _, _);
                cursor: pointer;
            }
            .admin-profile {
                @include flex(space-between, center, _, 1rem);
                cursor: pointer;
                .img{
                    height: 2.2rem;
                    width: 2.2rem;
                    border-radius: 50%;
                    img{
                        height: 2.2rem;
                        width: 2.2rem;
                        border-radius: 50%;

                    }
                }

            }
        }
    }

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
        .search-form {
            width: 490px;
            border-radius: 10px;
            margin-top: 5rem;
        }
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
    .profileDropdown {
        position: absolute;
        display: none;
        
        &.show {
            display: block;
        }
        .dropbtn {
            cursor: pointer;
        }
        .profile-dropdown-content {
            position: absolute;
            width: 180px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            top: 2.3rem;
            li {
                padding: .5rem 1rem;
                @include flex(_, center, _, _);
                transition: 0.3s ease-in-out;
                background-color: $dashSecondary;

                &:hover { 
                    background-color: $dashLinkHover;
                }
                i {
                    margin-right: 1rem;
                }
                a{
                    text-decoration: none;
                    color: $nav-links;
                    display: block;
                    transition: 0.3s ease-in-out;
                    
                }
            }
        }
    }
    .notificationDropdown {
        position: absolute;
        display: none;
        &.show {
            display: block;
        }
        .dropbtn {
            cursor: pointer;
        }
        .notification-dropdown-content {
            position: absolute;
            width: 300px;
            right: 0rem;
            border-bottom: 1px solid $borders;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 7px;
            top: 2.3rem;
            .notification-title{
                width: 100%;
                @include flex(space-between, center, _, _);
                height: 3rem;
                background-color: $dashSecondary;
                padding: .5rem 1rem;
                border-bottom: 1px solid $borders;

                a{
                    font-size: 12px;
                    color: white;
                }
            }
            li {
                
                background-color: $dashSecondary;
                padding: .5rem 1rem;
                transition: 0.3s ease-in-out;
                display: flex;
                @include flex(_, center, _, _);

                img{
                    height: 2.5rem;
                    border-radius: 50%;
                    margin-right: 1rem;
                }
                &:hover { 
                    background-color: $dashLinkHover;
                }
                a{
                    text-decoration: none;
                    color: $nav-links;
                    display: block;
                    font-size: 12px;
                    transition: 0.3s ease-in-out;
                    height: auto;                            width: 100%;
                    overflow: hidden;
                    display: -webkit-box;
                    -webkit-line-clamp: 2; 
                    -webkit-box-orient: vertical;
                    text-overflow: ellipsis;
                }
            }
        }
    }
    @media screen and (max-width: 1024px) {
        nav {
            width: 82%;
        }
    }
    @media screen and (max-width: 768px) {
        nav {
            width: 95%;
        }
    }
    @media screen and (max-width: 425px) {
        nav {
            width: 90%;
            .searchIcon {
                width: 2rem;
                height: 2rem;
                i {
                    font-size: 18px;
                }
                p {
                   display: none;
                }
            }
            .admin {
                .admin-profile {
                    i, p {
                        display: none
                    }
                }
                @include flex(flex-end, center, _, .5rem);


            }
            
        }
        .profileDropdown {

            .profile-dropdown-content {
                right: -3rem;
                li{ 
                    i{
                        display: block;
                    }
                }
                
            }
        }
        .notificationDropdown {
            .notification-dropdown-content {
                right: -4rem;
            }
        }
    }
    @media screen and (max-width: 375px) {

    }
    @media screen and (max-width: 320px) {
        .notificationDropdown {
            .notification-dropdown-content {
                right: -5rem;
            }
        }
    }
    

</style>
