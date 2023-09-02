<template>
    <div class="img">
        <img src="/wow.jpg" alt="">
    </div>
    <div class="container">
        <div class="article-container">
            <div class="article">
                <div class="tags">
                    <Tag />
                </div>
                <div class="title">
                    <h1>Never let your memories be greater than your dreams</h1>
                </div>
                <div class="data">
                    <div class="author">
                        <i class="fa-regular fa-user"></i>
                        <p>zayd inani</p>
                    </div>
                    <div class="date">
                        <i class="fa-regular fa-calendar"></i>        
                        <p>may 2, 2022</p>
                    </div>
                    <!---->
                    <div class="time">
                        <i class="fa-regular fa-clock"></i>
                        <p>3 min read</p>
                    </div>
                </div>
                <div class="article-content">
                    <p>Before long the searchlight discovered some distance away a schooner with all sails set, apparently the same vessel which had been noticed earlier in the evening. The wind had by this time backed to the east, and there was a shudder amongst the watchers on the cliff as they realized the terrible danger in which she now was. Between her and the port lay the great flat reef on which so many good ships have from time to time suffered, and, with the wind blowing from its present quarter, it would be quite impossible that she should fetch the entrance of the harbour.</p>
                    <h2>Wherever you go, go with all your heart</h2>
                    <p>It was now nearly the hour of high tide, but the waves were so great that in their troughs the shallows of the shore were almost visible, and the schooner, with all sails set, was rushing with such speed that, in the words of one old salt, "she must fetch up somewhere, if it was only in hell.</p>
                    <div class="smallImg">
                        <img src="/wow.jpg" alt="" @click="expandImage">
                    </div>
                    <div class="large" v-if="isImageExpanded">
                        <img :class="imageClass" :src="'/wow.jpg'" alt="" @click="shrinkImage">
                    </div>
                    <h2>Wherever you go, go with all your heart</h2>
                    <p>It was now nearly the hour of high tide, but the waves were so great that in their troughs the shallows of the shore were almost visible, and the schooner, with all sails set, was rushing with such speed that, in the words of one old salt, "she must fetch up somewhere, if it was only in hell.</p>
                </div>
            </div>
            <div class="share">
               <h2>share this article</h2>
            </div>
            <div class="authors">
                <!--? add authors here-->

            </div>
            <div class="latest-new-posts">
                <div class="new-post">
                    <p>newer post</p>
                    <div>
                        <img src="/wow.jpg" alt="">
                        <div class="info">
                            <a href="">Autumn is a second spring when every leaf is a flower</a>
                            <div class="time">
                                <i class="fa-regular fa-clock"></i>
                                <p>3 min read</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="new-post">
                    <p>older post</p>
                    <div>
                        <img src="/wow.jpg" alt="">
                        <div class="info">
                            <a href="">Autumn is a second spring when every leaf is a flower</a>
                            <div class="time">
                                <i class="fa-regular fa-clock"></i>
                                <p>3 min read</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="also-like">
                <h1>you might also like</h1>
                <div class="liked-articles-container">
                    <div class="like-article">
                        <img src="/wow.jpg" alt="">
                        <div>
                            <a href="">Don't listen to what they say, go see</a>
                            <div class="time">
                                    <i class="fa-regular fa-clock"></i>
                                    <p>3 min read</p>
                            </div>
                        </div>
                    </div>
                    <div class="like-article">
                        <img src="/wow.jpg" alt="">
                        <div>
                            <a href="">Don't listen to what they say, go see</a>
                            <div class="time">
                                <i class="fa-regular fa-clock"></i>
                                <p>3 min read</p>
                            </div>
                        </div>
                    </div>
                    <div class="like-article">
                        <img src="/wow.jpg" alt="">
                        <div>
                            <a href="">Don't listen to what they say, go see</a>
                            <div class="time">
                                    <i class="fa-regular fa-clock"></i>
                                    <p>3 min read</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="members">
                <div class="comment">
                    <h1>member discussion</h1>
                    <p>0 comments</p>
                </div>
                <div class="member-content">
                    <h1>start the conversation</h1>
                    <p>become a member of neon to start commenting.</p>
                    <a class="btn" href="">sign up now</a>
                    <p class="sign-in">already a member? <a href="">sign in</a></p>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <sideBar />
        </div>
    </div>
</template>

<script setup>
    import sideBar from '../../components/blog/sideBar.vue';
    import Tag from '../../components/blog/tags.vue'
    import { ref, computed } from 'vue';

    const isImageExpanded = ref(false);

    const expandImage = () => {
    isImageExpanded.value = true;
    };

    const shrinkImage = () => {
    isImageExpanded.value = false;
    };

    const imageClass = computed(() => ({
    'big-img-expanded': isImageExpanded.value,
    'big-img': !isImageExpanded.value,
    }));
</script>

<style lang="scss" scoped>
    @import '../../styles/_variables.scss';
    .img { 
        width: 92vw;
        margin: 2rem;
        height: 70vh;
        padding: 1rem;
        background-color: $secondary;
        border-radius: 15px;
        margin: 0 auto;
        box-shadow:  0 10px 10px rgba(0, 0, 0, 0.2);


        img {
            width: 100%;
            height: 100%;
            border-radius: 15px;
            object-fit: cover;
        }
    }
    .container {
        display: flex;
        flex-direction: row;
        margin: 2rem;
        .article-container{
            display: flex;
            flex-direction: column;
            width: 70%;

            .article {
                background-color: $secondary;
                border-radius: 15px;
                padding: 2rem 4rem;
                width: 100%;
                box-shadow:  0 10px 10px rgba(0, 0, 0, 0.2);

                .title {
                    h1{
                        font-weight: 600;
                        line-height: 1.2;
                        margin: 0.67em 0;
                        font-size: 44px;
                        color: #f1f1f1;
    
                    }
                }
                .data{ 
                    display: flex;
                    margin-bottom: 2rem;
                    flex-wrap: wrap;
                    gap: 1.5rem;
                    div {
                        margin: 0 1rem;
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        color: #808182;
                        i{
                            margin-right: .5rem;
                        }
                    }
                }
                .article-content{
                    height: fit-content;
                    p {
                        color: #afb0b0;
                    }
                    h2 {
                        margin: 2rem 0;
                        color: #f1f1f1;
                    }
                    .smallImg{
                        width: 100%;
                        img {
                            width: 100%;
                            margin: 2rem 0 0 0;
                            border-radius: 15px;
                            cursor: zoom-in;
                        }
                    }
                    .large {
                        position: fixed; 
                        top: 0; 
                        left: 0; 
                        width: 100vw;
                        height: 100vh;
                        background-color: $main;
                        z-index: 1000;
                        display: flex; 
                        justify-content: center; 
                        align-items: center; 
                        
                        img {
                            width: 60%; 
                            height: auto; 
                            max-height: 80vh; 
                            display: block; 
                            margin: 0 auto; 
                            border-radius: 15px;
                            cursor: zoom-out;

                        }
                    }
                }

            }
        }
        .share{
            width: 100%;
            margin: 2rem 0;
            text-align: center;
            padding: 1.5rem 0;
            background-color: $secondary;
            border-radius: 15px;
            box-shadow:  0 10px 10px rgba(0, 0, 0, 0.2);

        }
        .authors{
            width: 100%;
            padding: 1.5rem 0;
            background-color: $secondary;
            border-radius: 15px;
            box-shadow:  0 10px 10px rgba(0, 0, 0, 0.2);

        }
        .latest-new-posts{
            display: flex;
            justify-content: space-between;
            margin: 2rem 0;
            .new-post {
                box-shadow:  0 10px 10px rgba(0, 0, 0, 0.2);
                width: 47%;
                background-color: $secondary;
                padding: 1.5rem ;
                border-radius: 15px;
                p:nth-child(1){
                    color: $text-paragraphs;
                    margin-bottom: 1rem;
                }
                div{
                    display: flex;
                    justify-content: space-around;

                    img{
                        width: 6rem;
                        height: 6rem;
                        object-fit: cover;
                        border-radius: 15px;
                    }
                    .info{
                        display: flex;
                        width: 65%;
                        justify-content: space-around;
                        flex-direction: column;
                        a {
                            color: white;
                            transition: .3s ease-in-out;
                            text-decoration: none;
                            &:hover {
                                border-bottom: 1px solid $accents;
                            }
                        }
                        .time{
                            width: 60%;
                            display: flex;
                            align-items: center;
                            color: $time-date;
                        }
                    }
                }

            }
        }
        .also-like{
            background-color: $secondary;
            padding: 1.5rem 1.5rem 3rem 1.5rem;
            border-radius: 15px;
            box-shadow:  0 10px 10px rgba(0, 0, 0, 0.2);

            h1 {
                text-align: center;
                margin: 0 0 1rem 0;
                font-size: 1.25rem;
            }
            .liked-articles-container{
                display: flex;
                justify-content: space-between;
                .like-article{
                    width: 30%;
                    div {
                        a {
                            color: white;
                            text-decoration: none;
                            transition: .3s ease-in-out;
                            &:hover {
                                border-bottom: 1px solid $accents;
                            } 
                        }
                        .time {
                            margin-top: .5rem;
                            display: flex;
                            align-items: center;
                            width: 47%;
                            color: $time-date;
                            justify-content: space-between;
                        }
                    }
                    img {
                        width: 100%;
                        height: 70%;
                        object-fit: cover;
                        margin: 0 0 1rem 0;
                        border-radius: 15px;
                    }
        
                }
                
            }
            
        }
        .members{
            height: fit-content;
            margin: 2rem 0;
            padding: 2rem ;
            text-transform: capitalize;
            background-color: $secondary;
            border-radius: 15px;
            box-shadow:  0 10px 10px rgba(0, 0, 0, 0.2);

            .comment{
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 1rem;
                h1 {
                    font-size: 2rem;
                    font-weight: 600;

                } 
                p {
                    color: $text-paragraphs;
                }

            }
            .member-content{
                border-top: 1px solid $text-paragraphs;
                border-bottom: 1px solid $text-paragraphs;
                height: 80%;
                padding: 3rem 2rem;
                text-align: center;
                h1 {
                    font-size: 1.5rem;
                    margin-bottom: 1rem;
                    color: $text-headings;
                }   
                p {
                    font-size: 1rem;
                    margin-bottom: 2rem;
                    color: $text-paragraphs;
                }
                .btn{
                    color: white;
                    text-decoration: none;
                    background-color: $accents;
                    padding: .7rem;
                    border-radius: 15px;
                    margin: 1rem 0;
                    cursor: pointer;
                    transition: .3s ease-in-out;
                    &:hover {
                        background-color: $accents-hover;
                    }
                }
                .sign-in{
                    margin: 2rem;
                    a{
                        color: $accents;
                        text-decoration: none;
                    }
                }
            }
        }
    }

    @media screen and (max-width: 1024px) {
        .img { 
            height: 40vh;

        }
        .container {
            .latest-new-posts{
                .new-post {

                    div{

                        .info{
                            a {
                                font-size: 14px;
                            }
                            .time{
                                width: 100%;
                            }
                        }
                    }
    
                }
            }
            .also-like{
            .liked-articles-container{
                .like-article{
                    div {
                        .time {
                            width: 70%;
                        }
                    }

                }
                
            }
            
            }
        }
    }
    @media screen and (max-width: 768px) {
        .container {
            flex-direction: column;
            .article-container{
                width: 100%;
            }
        }
        .sidebar{
            width: 100%;
        }
    }
    @media screen and (max-width: 425px) {
        .img{
            width: 88vw;
            height: 50%;
        }
        .container {
            margin: 1rem;
            .article-container{
                .article {
                    padding: 2rem 1.5rem;
                }
            }
            .latest-new-posts{
                flex-direction: column;
                gap: 1rem;
                .new-post {
                    width: 100%;
                }
            }
            .also-like{
                .liked-articles-container{
                    flex-wrap: wrap;
                    .like-article{
                        width: 100%;
                        margin-bottom: 1rem;
                        div {
                            .time {
                                width: 40%;
                            }
                        }
                    }
                }
            }
            .members{
                .comment{

                    h1 {
                        font-size: 1.2rem;

                    } 
                }
                .member-content{
                    h1 {
                        font-size: 1.2rem;
                    }   
                    p {
                        font-size: .8rem;
                    }
                }
            }
        }
    }
    @media screen and (max-width: 375px) {
        .container {
        .article-container{
            .article {
                .title {
                    h1{
                        font-size: 34px;
                    }
                }
                .data{ 
                    gap: .5rem;
                }
            }
        }
        .members{
            .comment{
                flex-direction: column;
                h1 {
                    font-size: 1.5rem;
                    font-weight: 600;
                } 
            }
        }
    }
    }
    @media screen and (max-width: 320px) {
        .container {
            .also-like{
                .liked-articles-container{
                    .like-article{
                        margin-bottom: 3rem;
                        div {
                            .time {
                                width: 50%;
                            }
                        }
                    }
                }

            }
            .members{
                .comment{
                    h1 {
                        font-size: 1rem;
                    } 
                }
                .member-content{
                    padding: 3rem 0rem;
                }
            }
        }
    }
</style>