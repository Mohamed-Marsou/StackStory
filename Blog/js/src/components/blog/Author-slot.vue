<script setup>
    import { ref, defineProps, computed } from 'vue';
    import { imagesApi } from '../../http/axois'

    const description = ref(props.adminSummary)
    const isExpanded = ref(false);
    const toggleDescription = () => {
        isExpanded.value = !isExpanded.value;
    };
    const props = defineProps({
        adminFirstName: String,     
        adminLastName: String,
        adminImageUrl: String,
        AdminWebSite: String,
        adminFacebook: String,
        adminLinkedIn: String,
        adminInstagram: String,
        adminSummary: String,
        adminX: String,
        articleCount: Number,
    });
    // Function to get the cover image URL
    const getAuthorImageSrc = computed(() => {
        return props.adminImageUrl
        ? imagesApi.defaults.baseURL + props.adminImageUrl
        : imagesApi.defaults.baseURL + 'images/default.jpg';
    });
</script>
<template>
    <div class="author-box">
        <div class="img-side">
            <img :src="getAuthorImageSrc"
                alt="author-img">
        </div>
        <div class="ctx">
            <div>

                <h2>
                    {{ props.adminFirstName + ' ' + props.adminLastName }} 
                    <p>
                        <i class="fa-solid fa-feather"></i>
                        {{ articleCount }} posts
                    </p>
                </h2>
                <div class="slot">
                    <a :href="adminFacebook" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a :href="adminLinkedIn" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                    <a :href="adminInstagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a :href="adminX" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                    <a :href="AdminWebSite" target="_blank"><i class="fa-solid fa-link"></i></a>
                </div>
            </div>
            <div>
                <p>
                    {{ isExpanded ? description : description.slice(0, 150) + '...' }}
                    <small @click="toggleDescription($e)">{{ isExpanded ? 'Read less' : 'Read more' }}</small>
                </p>
            </div>
        </div>
    </div>
</template>
<style lang="scss">
@import '../../styles/variables';

.author-box {
    width: 46vw;
    min-height: 14.5rem;
    background: $secondary;
    border-radius: 10px;
    display: flex;
    overflow: hidden;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);

    .img-side {
        width: 35%;
        height: 14.5rem;

        @include flx();

        >img {
            width: 85%;
            height: 85%;
            object-fit: cover;
            border-radius: 15px;
        }
    }

    .ctx {
        width: 65%;
        min-height: 14.5rem;

        @include flx($ai: flex-start);
        flex-direction: column;
        padding: 15px 5px;
        gap: 2rem;

        h2 {
            font-size: 1.2rem;
            padding: 5px 0;

            p {
                display: inline-block;
                font-size: .7rem;
                font-weight: normal;
                color: $time-date;
                margin-top: 5px;
                text-transform: uppercase;
                text-decoration: underline;
                user-select: none;
            }
        }

        .slot {
            width: 100%;
            height: 3rem;
            @include flx($jc: flex-start);
            gap: 1vw;
            a{
                i {
                    background: $main;
                    padding: 8px;
                    border-radius: 50%;
                    font-size: 1rem;
                    cursor: pointer;
                    transition: .3s ease-in-out;
    
                    &:hover {
                        transform: translateY(-5px);
                    }
                }

                .fa-facebook {
                    color: rgb(0, 136, 255);
                }
    
                .fa-instagram,
                .fa-link {
                    color: #C82966;
                }
            }

        }

        p {
            font-size: .85rem;

            small {
                padding: 0 5px;
                cursor: pointer;

                &:hover {
                    text-decoration: underline;
                }
            }
        }
    }
}

@media screen and (max-width: 1024px) {
    .author-box {
        width: 97%;
        margin-top: 1rem;

        .ctx {
            h2 {
                font-size: 1.4rem;
            }
        }
    }
}

@media screen and (max-width: 768px) {
    .author-box {
        width: 97%;
        margin-top: 1rem;
        flex-direction: column;

        .img-side {
            width: 95%;
            height: 15rem;
            margin: 0 auto;

            >img {
                width: 40%;
                height: 95%;
            }
        }

        .ctx {
            width: 95%;
            margin: 0 auto;
            min-height: 10rem;
            @include flx($ai: center);
            gap: 1rem;

            h2 {
                font-size: 1.3rem;
            }

            .slot {
                @include flx($jc: center);
                gap: 2vw;
            }
        }
    }
}
@media screen and (max-width: 500px) {
    .author-box {
        width: 97%;
        margin-top: 1rem;
        flex-direction: column;

        .img-side {
            width: 95%;
            height: 15rem;
            margin: .5rem auto;

            >img {
                width: 80%;
                height: 95%;
            }
        }
      
    }
}
</style>