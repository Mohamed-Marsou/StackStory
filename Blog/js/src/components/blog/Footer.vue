<script setup>
    import Tag from '../../components/blog/tags.vue';
    import { ref, onMounted, computed } from 'vue';
    import { useArticleStore } from '../../stores/articleStore';
    import { useTagStore } from '../../stores/tagStore'
    import { api } from '../../http/axois'

    const articleStore = useArticleStore();
    const latestArticles = ref([]);
    const tagsStore = useTagStore();
    const tags = computed(() => tagsStore.tags);

    onMounted(async () => {
        await tagsStore.fetchTags();
        await articleStore.fetchLatestThreeArticles();
        latestArticles.value = articleStore.articles;
    });
    const scrollToTop = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
    };
    const formData = ref({
        email: '',
    });

    const subscribe = async () => {
        console.log(formData.value); 
        try {
            const response = await api.post('/subscribe', formData.value);
            console.log(response.data.message);
        } catch (error) {
            console.error('Error:', error);
        }
    };
</script>

<template>
  <footer>
    <div class="main-rows">
        <div class="first-row">
            <div class="news-letter">
                <h1>newsletter</h1>
                <p>Get the latest posts delivered straight to your inbox.</p>
                <form @submit.prevent="subscribe">
                    <input v-model="formData.email" type="email" placeholder="your email address" required/>                
                    <button type="submit">subscribe</button>
                </form>
            </div>
            <div class="follow-us">
                <h1>follow us</h1>
                <div class="slot">
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-linkedin"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-x-twitter"></i>
                </div>
            </div>
        </div>
            <div class="second-row">
                <h1>latest posts</h1>
                <div class="side-articles">
                    <div v-for="article in latestArticles" :key="article.id" class="side-article">
                        <div class="side-img-container">
                            <img :src="articleStore.getCoverImageSrc(article.images)" alt="">
                        </div>
                    <div class="side-article-info">
                        <a :href="article.link">{{ article.article_title }}</a>
                        <div class="footer-article-date">
                            <!---->
                            <div class="footer-time">
                                <i class="fa-solid fa-user"></i>
                                <p>{{ article.author.first_name + ' ' + article.author.last_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="third-row">
            <h1>tags</h1>
            <div class="tags">
                <Tag v-for="tag in tags" :key="tag.id" :tag-name="tag.tag_name" :tag-color="tag.color" />
            </div>
            <div class="policy">
                <div>
                    <RouterLink :to="{ name: 'faq' }">FAQ</RouterLink>
                </div>
                <div>
                    <RouterLink :to="{ name: 'contact' }">contact</RouterLink>
                </div>
            </div>
        </div>
    </div>
    <div class="last-row">
        <p>&copy; 2023 Your Company. All rights reserved.</p>
        <div class="top" @click="scrollToTop">
            <i class="fa-solid fa-arrow-up"></i>
            <p>scroll to top</p>
        </div>
    </div>
  </footer>
</template>

<style lang="scss" scoped>
    @import '../src/styles/_variables.scss';
    .smooth-scroll {
        scroll-behavior: smooth;
    }
    footer {
        height: fit-content;
        background-color: $secondary;
        padding: 3rem 2rem;
        display: flex;
        flex-direction: column;
        h1 {
            font-weight: 600;
            line-height: 1.2;
            margin-bottom: 2rem;
            font-size: 1.25rem;
        }
        p{ 
            line-height: 1.5;
            margin-bottom: 2rem;
            font-size: 16px;
            color: $text-paragraphs;
        }
        .main-rows {
            display: flex;
            width: 100%;
            height: 90%;
            justify-content: space-between;
            text-transform: capitalize;
            .first-row{
                width: 30%;
                .news-letter{
                    input {
                        height: 48px;
                        padding: .8rem;
                        border-radius: 35px 0 0 35px;
                        outline: none;
                        border: none;
                        margin: 0 0 2rem 0;
                        width: 60%;
                        color: white;
                        background-color: transparent;
                        border: 1px solid $time-date-icons;
                    }
                    input::placeholder {
                        color: #999; 
                        font-size: 18px;
                    }
                    button {
                        height: 48px;
                        width: 30%;
                        border-radius:0 35px 35px 0;
                        outline: none;
                        border: none;
                        font-size: 17px;
                        background-color: $accents;
                        color: white;
                        cursor: pointer;
                        transition: .3s ease-in-out;
                        &:hover {
                            background-color: $accents-hover;
                        }
                    }
                }
                .follow-us{
                    .slot {
                        width: 100%;
                        height: 3rem;
                        @include flx($jc: flex-start);
                        gap: 1vw;

                        >i {
                            background: $main;
                            padding: 8px;
                            border-radius: 50%;
                            font-size: 1.5rem;
                            cursor: pointer;
                            transition: .3s ease-in-out;

                            &:hover {
                                transform: translateY(-5px);
                            }
                        }

                        .fa-facebook {
                            color: rgb(0, 136, 255);
                        }

                        .fa-instagram {
                            color: #C82966;
                        }
                    }

                }
            }
            .second-row{
                width: 30%;
                .side-articles{

                    .side-article{
                        margin-top: 2rem;
                        @include flex(space-between, center, _, _);
                        height: 5.5rem;
                        overflow: hidden;
                        width: 100%;
                        a{
                            text-decoration: none;
                            color: $text-headings;
                            transition: .2s ease-in-out;
                            cursor: pointer;
                            height: auto;                            width: 100%;
                            overflow: hidden;
                            display: -webkit-box;
                            -webkit-line-clamp: 2; 
                            -webkit-box-orient: vertical;
                            text-overflow: ellipsis;
                            
                            &:hover {
                                border-bottom: 2px solid $accents;
                            }
                        }

                        .side-img-container {
                            height: 100%;
                            width: 25%;

                            img {
                                height: 100%;
                                width: 100%;
                                object-fit: cover;
                                border-radius: 15px;
                                transition: 0.3s ease-in-out;
                                &:hover {
                                    transform: scale(1.02);
                                }
                            }
                        }
                        .side-article-info{
                            @include flex(space-between, flex-start, column, _);
                            height: 100%;
                            font-weight: 500;
                            line-height: 1.5;
                            margin-bottom: 0.5rem;
                            font-size: 1rem;
                            width: 70%;
                            .footer-article-date{
                                height: 2rem;
                                width: 50%;
                                .footer-time {   
                                    height: 100%;
                                    display: flex;
                                    align-content: center;
                                    align-items: center;
                                    justify-content: space-evenly;
                                    width: 100%;
                                    p {
                                        margin-top: 2rem;
                                        color: $time-date;

                                    } 
                                    i{
                                        
                                        margin-right: .5rem;
                                        color: $time-date-icons;
                                    }
                                }
                            }

                        }
                    }

                }
            }
            .third-row{
                width: 30%;
                .tags{
                    display: flex;
                    gap: 1rem;
                    flex-wrap: wrap;
                    .tag {
                        padding: .2rem .7rem;
                        
                        height: 2rem;
                        align-items: center;
                        p {
                            margin-top: 2rem;
                        }
                    }

                }
                .policy{
                    margin-top: 2rem;
                    display: flex;
                    gap: 1.5rem;
                    flex-wrap: wrap;
                    div {
                        width: fit-content;
                        a {
                            color: $text-paragraphs;
                            text-decoration: none;
                            transition: .3s ease-in-out;
                            &:hover {
                                border-bottom: 1px solid $accents;
                            }
                        }
                    }
                }
            }
        }
        .last-row {
            display: flex;
            justify-content: space-between;
            height: 2rem;
            .top{
                display: flex;
                align-items: center;
                cursor: pointer;
                transition: .3s ease-in-out;
                &:hover {
                    border-bottom: 1px solid $accents;
                }
                i{
                    color: $text-paragraphs;
                }
                p {
                    margin: .05rem 0 0 1rem;
                }
            }
        }
    }
    @media screen and (max-width: 1024px) {
        footer {
            height: fit-content;
            .main-rows {
                flex-direction: column;
                .first-row{
                width: 100%;
                
                }
                .second-row{
                    width: 50%;
                    h1{
                        margin-top: 2rem;
                    }
                }
                .third-row{
                    width: 100%;
                    h1{
                        margin-top: 2rem;
                    }
                    .policy {
                        margin: 2rem 0;
                    }
                }
            }
        }
    }
    @media screen and (max-width: 425px) {
        footer {
            padding: 1rem 2vw;
            .main-rows {
                .second-row{
                    width: 100%;
                }

            }
            .last-row {
                flex-direction: column;
                margin: 0 0 2rem 0;
            }
        }
        footer > div.main-rows > div.first-row > div.news-letter > div{
            margin: 0 !important;
            >input{
                width: 80%;
            }
            >button{
                width: 20%;
                font-size: .8rem;
            }
        }
    }
    @media screen and (max-width: 375px) {
        footer {
            .last-row {
                margin: 0 0 4rem 0;
            }
            .main-rows{
                .second-row{
                    .side-articles{
                        .side-article{
                            .side-article-info{
    
                                .footer-article-date{
                                    width: 70%;
                                }
                            }
                        }
                    }
                }

            }
        }

        footer > div.main-rows > div.first-row > div.news-letter > div{
            >input{
                width: 70%;
            }
            >button{
                width:30%;
                font-size: .8rem;
            }
        }
    }
    @media screen and (max-width: 320px) {
        footer {
            .footer-time {   
                width: 150%;
            }
        }
    }
</style>