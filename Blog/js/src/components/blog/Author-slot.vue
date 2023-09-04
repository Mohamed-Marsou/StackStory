<script setup>
import { ref } from "vue"
const description = ref('Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit suscipit,nam cupiditate vero officiis .Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit suscipit,Lorem ipsum '
);

const isExpanded = ref(false);

const toggleDescription = () => {
    isExpanded.value = !isExpanded.value;
};
</script>
<template>
    <div class="author-box">
        <div class="img-side">
            <img src="https://img.freepik.com/free-photo/young-bearded-man-with-striped-shirt_273609-5677.jpg?w=740&t=st=1693168030~exp=1693168630~hmac=30c16eec3211868d3dbf8f5ea024940645f050042623bb55fa4360e7fbf94172"
                alt="author-img">
        </div>
        <div class="ctx">
            <div>

                <h2>
                    Mohammed Marsou
                    <p>
                        <i class="fa-solid fa-feather"></i>
                        5 posts
                    </p>
                </h2>
                <div class="slot">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                    <i class="fa-solid fa-link"></i>
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

            >i {
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