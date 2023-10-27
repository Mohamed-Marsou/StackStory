<script setup>
  import { Swiper, SwiperSlide } from 'swiper/vue';
  import 'swiper/css';
  import { defineProps } from 'vue';
  import { useArticleStore } from '../../stores/articleStore'
  const articleStore = useArticleStore();
  const { articles } = defineProps(['articles']);

</script>

<template>
    <swiper :navigation="true" :modules="modules" class="mySwiper">
        <swiper-slide v-for="(article, index) in articles" :key="index">

        <div class="hero-container">
            <div class="hero">
              <div class="hero-info">
                <div class="tags">
                  <div class="tag" v-for="(tag, tagIndex) in article.tags" :key="tagIndex">
                    <div :style="{ backgroundColor: tag.color }" class="tag-color"></div>
                    <p class="tag-content">{{ tag.tag_name }}</p>
                  </div>
                </div>
                <div class="hero-text">
                    <a>{{ article.article_title }}</a>
                    <p>{{ article.article_summary }}</p>

                </div>
                <div class="article-date">
                  <div class="date">
                    <i class="fa-regular fa-calendar"></i>
                    <p>{{ articleStore.formatDate(article.published_at) }}</p>
                  </div>
                  <!---->
                  <div class="time">
                    <i class="fa-solid fa-user"></i>
                    <p>{{ article.author.first_name + ' ' + article.author.last_name }}</p>
                  </div>
                </div>
              </div>
              <div class="hero-img">
                <div class="img-container">
                  <img :src="articleStore.getCoverImageSrc(article.images)" alt="">
                </div>
              </div>
            </div>
            <!--
                <div class="nav-arrows">
                  <i class="fa-solid fa-arrow-left" @click="prevSlide"></i>
                  <i class="fa-solid fa-arrow-right" @click="nextSlide"></i>
                </div>
              -->
          </div>
        </swiper-slide>
    </swiper>
</template>



<style lang="scss" scoped>
    @import '../../styles//variables';
    .tags{
      width: 100%;
      display: flex;
      gap: 1rem;
      .tag{
        width: fit-content;
        padding: .2rem .7rem;
        border-radius: 50px;
        background-color: $light-grey-tags;
        transition: .5s ease-in-out;
        color: $text-paragraphs;
        text-transform: capitalize;
        cursor: pointer;
        @include flex(_, center, _, _);
        &:hover{
          background-color: $light-grey-tags-hover;
        }
        .tag-color{
          width: 0.5rem;
          height: 0.5rem;
          border-radius: 50%;
          margin-right: 8px;
        }
      }
    }
  .swiper-button-prev,
  .swiper-button-next {
    // color: $text-paragraphs; 
    // width: 20px;
    // height: 20px; 
    display: none; //* for now
  }
  
  .hero-container {
    @include flex(_, center, column, _);
    width: 100%;
    .hero {
      width: 95%;
      height: fit-content;
      margin: 2rem;
      @include flex(space-between, flex-start, _, _);
      
      .hero-info {
        width: 42%;
        height: 100%;

        .hero-text {
          text-transform: capitalize;
          margin: 1rem 0;

          a {
            font-size: 2.3rem;
            font-weight: 600;
            transition: .2s ease-in-out;
            cursor: pointer;
            color: #BCBCBC;

            &:hover {
              color: $text-headings;
            }
          }

          p {
            font-size: 1rem;
            margin: 1.25rem 0;
            line-height: 1.8;
            color: $text-paragraphs;
            height: 6.5rem;
            text-overflow: ellipsis;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3; // Number of lines to display before ellipsis
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
          }

        }

        .article-date {
          p {
            &:hover {
              color: $text-headings;
            }
          }
        }

      }

      .hero-img {
        width: 55%;
        height: 100%;
        @include flex(_, flex-end, column, _);

        .img-container {
          width: 100%;
          padding: 1rem;
          height: 60vh;
          background: $secondary;
          border-radius: 15px;
          z-index: 110;
          overflow: hidden;
          position: relative;

          img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            z-index: 1;
            transform-origin: center;
            transition: transform 0.3s;

            &:hover {
              transform: scale(1.02);
              cursor: pointer;
            }
          }
        }
      }
    }

    .nav-arrows {
      width: 5rem;
      @include flex(space-around, center, _, _);
      font-size: 18px;
      color: $text-paragraphs;
      margin: .5rem 0;

    }
  }
</style>