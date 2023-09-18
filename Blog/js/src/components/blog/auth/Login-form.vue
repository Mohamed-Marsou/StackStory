<script setup>
import { defineEmits } from 'vue'

const { toggleLogin } = defineEmits(['toggleLogin'])
</script>
<template>
    <div class="bx">
        <div class="nav-back">
            <RouterLink :to="{ name: 'home' }">
                <i class="fa-solid fa-arrow-left"></i>
                Back Home
            </RouterLink>
        </div>
        <h2>Blog name</h2>
        <h3>Welcome back!</h3>
        <p>Sign into your account for full access</p>
        <input type="text" placeholder="Email address">
        <input type="password" placeholder="Password">
        <button>Sumbit</button>
        <h5>
            Don't have an account yet?
            <a @click="toggleLogin">Sign in</a>
        </h5>
    </div>
</template>
<style lang="scss">
@import '../../../styles/variables';

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
            color: white;
            &:hover {
                color: #fff;
            }
        }
    }

    h2 {
        color: azure;
        margin: 1rem 0 2rem 0;
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
</style>