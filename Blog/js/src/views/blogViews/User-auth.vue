<script setup>
import { ref } from 'vue'
import { RouterLink } from 'vue-router'

const showLoginFrom = ref(true)


const switchForm = () => {
  showLoginFrom.value = !showLoginFrom.value
  console.log("sq");
}
</script>
<template>
    <div class="auth-bg-box">
        <!-- Login from  -->
        <div class="bx" v-if="showLoginFrom">
        <div class="nav-back">
            <RouterLink :to="{name : 'home'}">
                <i class="fa-solid fa-arrow-left"></i>
                Back Home
            </RouterLink>
        </div>
        <h2>Blog name</h2>
        <h3>Welcome back!</h3>
        <p>Sign into your account for full access</p>
        <input type="text" placeholder="Email address">
        <input type="password" placeholder="Password">
        <button>Login</button>
        <h5>
            Don't have an account yet?
            <a @click="switchForm">Sign in</a>
        </h5>
    </div>
    <!-- Register from  -->
    <div class="bx" v-else>
        <div class="nav-back">
            <a>
                <i class="fa-solid fa-arrow-left"></i>
                Back Home
            </a>
        </div>
        <h2>Blog name</h2>
        <h3>Register</h3>
        <p>Get access to members only content</p>
        <input type="text" placeholder="Full name">
        <input type="text" placeholder="Email address">
        <input type="password" placeholder="Password">
        <button>Register</button>
        <h5>
            Already have an account?
            <a @click="switchForm">
                Register 
            </a>
        </h5>
    </div>

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

.bx {
    width: 30rem;
    height: 80vh;
    border-radius: 20px;
    position: relative;
    background: $secondary;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
    @include flx($jc: flex-start);
    flex-direction: column;
    padding: 1rem 5px;
    gap: 1rem;

    .nav-back {
        position: absolute;
        top: -2.7rem;
        right: 50%;
        transform: translateX(50%);
        background: $secondary;
        padding: 5px 20px;
        border-radius: 20px;

        a {
            font-size: .8rem;

            &:hover {
                color: #fff;
            }
        }
    }

    h2 {
        color: azure;
        margin: 1rem 0 ;
        text-transform: uppercase;
    }

    >input {
        border: 1px solid $borders;
        background: transparent;
        padding: 0 15px;
        width: 82%;
        height: 3rem;
        border-radius: 50px;
        color: #fff;
    }

    button {
        width: 80%;
        height: 3rem;
        border-radius: 50px;
        color: #fff;
        border: none;
        background: $accents;
        text-transform: uppercase;
        font-weight: bold;
        cursor: pointer;
        margin-top: 1rem;

        &:hover {
            background: #fff;
            border: 2px solid $accents;
            color: $accents;
        }
    }

    >h5 {
        font-size: .8rem;

        a {
            color: $accents;
            cursor: pointer;

            &:hover {
                text-decoration: underline;
            }
        }
    }
}

@media screen and (max-width:525px) {
    .auth-bg-box {
        >.bx {
            width: 100%;
            border-radius: 0;
            position: relative;
            background: $secondary;
            box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);
            @include flx($jc: flex-start);
            flex-direction: column;
            padding: 1rem 5px;
        }
    }
}
@media screen and (max-width:330px) {
    .bx {

    >input {
        width: 92%;
        height: 2.8rem;
    }
    p{
        font-size: .8rem;
    }
    button {
        width: 92%;
        height: 2.8rem;
        border-radius: 50px;
    }
}
}
</style>