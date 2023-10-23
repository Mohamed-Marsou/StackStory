<script setup>
    import { ref, onMounted, computed } from 'vue';
    import Tag from '../../components/blog/tags.vue';
    import { useTagStore } from '../../stores/tagStore'
    import { useArticleStore } from '../../stores/articleStore';
    import { api } from '../../http/axois'

    const articleStore = useArticleStore();
    const tagsStore = useTagStore();
    const latestArticles = ref([]);
    const articles = ref([]);
    const tags = computed(() => tagsStore.tags);

    onMounted(async () => {
        await articleStore.fetchLatestThreeArticles();
        latestArticles.value = articleStore.articles;
        await articleStore.fetchArticles(); 
        articles.value = articleStore.articles;
    });
    const formData = ref({
        name: '',
        email: '',
    });
    const featuredArticles = computed(() => {
        return articles.value 
        .filter((article) => article.is_featured)
        .slice(0, 3);
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
    <aside>
        <div class="side-posts">
            <h1>featured posts</h1>
            <div v-for="(article, index) in featuredArticles" :key="index" class="side-articles">
                <div class="side-article">
                    <div class="side-img-container">
                        <img :src="articleStore.getCoverImageSrc(article.images)" alt="">
                    </div>
                    <div class="side-article-info">
                        <a :href="article.link">{{ article.article_title }}</a>
                        <div class="article-date">
                            <div class="time">
                                <i class="fa-regular fa-clock"></i>
                                <p>3 min read</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tags">
            <h1>tags</h1>
            <div class="tags-container">
                <Tag v-for="tag in tags" :key="tag.id" :tag-name="tag.tag_name" :tag-color="tag.color" />
            </div>
        </div>
        <div class="side-posts">
            <h1>latest posts</h1>
            <div class="side-articles">
                <div v-for="article in latestArticles" :key="article.id" class="side-article">
                    <div class="side-img-container">
                        <img :src="articleStore.getCoverImageSrc(article.images)" alt="">
                    </div>
                    <div class="side-article-info">
                        <a :href="article.link">{{ article.article_title }}</a>
                        <div class="article-date">
                            <!---->
                            <div class="time">
                                <i class="fa-solid fa-user"></i>
                                <p>{{ article.author.first_name + ' ' + article.author.last_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="newsletter">
            <h1>newsletter</h1>
            <p>Get the latest posts delivered straight to your inbox.</p>
            <form @submit.prevent="subscribe">
                <div>
                    <input v-model="formData.name" type="text" placeholder="your name" required/>.
                    <input v-model="formData.email" type="email" placeholder="your email address" required/>                
                </div>
                <button type="submit">subscribe</button>
            </form>
        </div>
        <div class="socials">
            <h1>follow us</h1>
            <div class="slot">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-linkedin"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-x-twitter"></i>
            </div>
        </div>
    </aside>
</template>

<style lang="scss" scoped>
@import '../src/styles/_variables.scss';

aside {
    top: 1rem;
    position: sticky;
    margin: 0 1.5rem;
    padding: 1.5rem;
    border-radius: 15px;
    background-color: $secondary;
    box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);

    .side-posts {
        h1 {
            font-weight: 600;
            line-height: 1.2;
            font-size: 1.3rem;
            text-transform: uppercase;
            transition: .3s ease-in-out;
            cursor: pointer;
            position: relative;
            &::after {
                position: absolute;
                content: '';
                bottom: -4px;
                left: 0;
                width: 0;
                height: 2px;
                background: $accents;
                transition: .3s ease-in-out;
            }

            &:hover::after {
                width: 11rem;
            }
        }

        .side-articles {
            .side-article {
                a {
                    text-decoration: none;
                    color: $text-headings;
                    transition: .2s ease-in-out;
                    cursor: pointer;
                    height: 4rem;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    padding: 1rem 0;
                    position: relative;

                }

                margin-top: 2rem;
                @include flex(space-between, center, _, _);
                height: 5.5rem;

                .side-img-container {
                    height: 100%;
                    width: 30%;

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

                .side-article-info {
                    @include flex(space-between, flex-start, column, _);
                    height: 100%;
                    font-weight: 500;
                    line-height: 1.5;
                    margin-bottom: 0.5rem;
                    font-size: 1rem;
                    width: 65%;
                    text-overflow: ellipsis;
                    display: -webkit-box;
                    -webkit-line-clamp: 2;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                    height: auto;
                }
            }
        }
    }

    .tags {
        margin: 2rem 0;

        h1 {
            font-weight: 600;
            line-height: 1.2;
            font-size: 1.2rem;
            margin: 0 0 2rem 0;

        }

        .tags-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin: 1rem 0;
        }
    }

    .newsletter {
        padding: 1.5rem;
        text-transform: capitalize;
        margin: 2rem 0;
        text-align: center;
        background-color: $accents;
        border-radius: 15px;

        h1 {
            font-size: 32px;
            margin: 0 0 1rem 0;
        }

        p {
            font-size: 20px;
            margin: 0 0 1rem 0;

        }

        form {
            div {
                display: flex;
                flex-direction: column;

                input {
                    height: 48px;
                    padding: .8rem;
                    border-radius: 35px;
                    outline: none;
                    border: none;
                    margin: .7rem;
                }
            }

            button {
                height: 48px;
                padding: .8rem;
                border-radius: 35px;
                outline: none;
                border: none;
                margin: .7rem;
                width: 90%;
            }

            button {
                font-size: 18px;
                letter-spacing: .1rem;
                cursor: pointer;
                transition: .3s ease-in-out;

                &:hover {
                    background-color: #ffeaf2;
                }
            }

            input::placeholder {
                color: #999;
                font-size: 18px;
            }
        }
    }

    .socials {
        .slot {
            width: 100%;
            height: 3rem;
            @include flx($jc: flex-start);
            gap: 1vw;
            padding: 2.5rem 0;

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

@media screen and (max-width: 768px) {
    aside {
        margin: 0rem;
        width: 100% !important;
        border-radius: 0 !important;

        .newsletter {
            form {
                div {
                    margin: 0 auto;
                    display: flex;
                    flex-direction: row;
                    justify-content: center;
                    width: 90%;

                    input {
                        width: 50%;
                    }
                }

            }
        }
    }
}

@media screen and (max-width: 425px) {
    aside {
        margin: 0rem;

        .newsletter {
            padding: 1rem;

            form {
                div {

                    flex-direction: column;
                    width: 100%;

                    input {
                        width: 90%;
                    }

                }

            }
        }
    }
}

@media screen and (max-width: 425px) {
    aside {
        .newsletter {
            padding: 1rem .5rem;
        }
    }
}</style>

