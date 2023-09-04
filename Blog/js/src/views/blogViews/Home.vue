<template>
  <div class="hero-carousel-container">
      <swiper :navigation="true" :modules="modules" class="mySwiper">
        <swiper-slide>
          <div class="hero-container">
            <div class="hero">
              <div class="hero-info">
                <div class="tags">
                  <Tag  />
                </div>
                <div class="hero-text">
                  <a>never let your memories be grater than your dreams</a>
                  <p>Before long the dfasdfdsdgs gggsdsearchl ight discovered some distance away a schooner with all sails set, apparently the same vessel which had been noticed earlier in the evening</p>
                </div>
                <div class="article-date">
                  <div class="date">
                    <i class="fa-regular fa-calendar"></i>        
                    <p>may 2, 2022</p>
                  </div>
                  <div class="time">
                    <i class="fa-regular fa-clock"></i>
                    <p>3 min read</p>
                  </div>
                </div>
              </div>
              <div class="hero-img">
                <div class="img-container">
                  <img src="/wow.jpg" alt="">
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
        <swiper-slide>
          <div class="hero-container">
            <div class="hero">
              <div class="hero-info">
                <div class="tags">
                  <div class="tag">
                    <div class="tag-color"></div>
                    <p class="tag-content">travel</p>
                  </div>
                </div>
                <div class="hero-text">
                  <a>never let your memories be grater than your dreams</a>
                  <p>Before long the dfasdfdsdgsgggsdsearchlight discovered some distance away a schooner with all sails set, apparently the same vessel which had been noticed earlier in the evening</p>
                </div>
                <div class="article-date">
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
              </div>
              <div class="hero-img">
                <div class="img-container">
                  <img src="/wow.jpg" alt="">
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
  </div>
  <div class="main-section">
    <div class="articles">
      <articleCard />
      <articleCard />
      <articleCard />
      <articleCard />
      <articleCard />
      <articleCard />
      <div class="more">
        <button class="btn">load more</button>
      </div>
    </div>
    <div class="sidebar">
      <sideBar />
    </div>
  </div>
</template>

<!--! Always use  ""<script setup>"" COMPOSITION API SYNTAX ALWAYS -->
<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import sideBar from '../../components/blog/sideBar.vue';
import articleCard from '../../components/blog/articleCard.vue';
import Tag from '../../components/blog/tags.vue';
import 'swiper/css/navigation';
import { Navigation } from 'swiper/modules';

</script>


<style lang="scss">
  @import '../src/styles/_variables.scss';
  .hero-carousel-container {
      .swiper-button-prev,
      .swiper-button-next {
        color: $text-paragraphs; 
        width: 20px;
        height: 20px; 
      }
      .hero-container{
        @include flex(_, center, column, _);
        .hero{
          width: 95%;
          height: fit-content;
          margin: 2rem;
          @include flex(space-between, flex-start, _, _);
          .hero-info{
            width: 42%;
            height: 100%;
            .hero-text{
              text-transform: capitalize;
              margin: 1rem 0;
              a {
                font-size: 44px;
                font-weight: 600;
                line-height: 1.2;
                transition: .2s ease-in-out;
                cursor: pointer;
                &:hover {
                  border-bottom: 2px solid $accents;
                }
              }
              p {
                font-size: 1.125rem;
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

          }
          .hero-img{
            width: 55%;
            height: 100%;
            @include flex(_, flex-end, column, _);
            .img-container{
              width: 100%;
              padding: 1rem;
              height: 60vh;
              background: $secondary;
              border-radius: 15px;
              z-index: 110;
              overflow: hidden; 
              position: relative;
              img{
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
        .nav-arrows{
          width: 5rem;
          @include flex(space-around, center, _, _);
          font-size: 18px;
          color: $text-paragraphs;
          margin: .5rem 0;
      
        }
      }
  }
  .main-section{
    display: flex;
    margin: 2rem;

    .articles{
      width: 65%;

      .more{
        display: flex;
        margin: 1rem 0;
        .btn{
          padding: .8rem 1.5rem;
          margin: 0 auto;
          font-size: 18px;
          color: white;
          text-decoration: none;
          background-color: $accents;
          border-radius: 25px;
          transition: 0.2s ease-in-out;
          border: none;
          cursor: pointer;
          &:hover{
            background-color: $accents-hover;
          }
        }
      }
    }

  }
  @media screen and (max-width: 1024px) {
      .hero-carousel-container {
        .hero-container{
          .hero{
            @include flex(space-between, flex-start, column-reverse, _);
            .hero-img{
              width: 100%;
            }
            .hero-info{
              width: 90%;
              margin-top: 1rem;
            }
          }
        }
      }

  }
  @media screen and (max-width: 768px) {
    .main-section{
      flex-direction: column;
      .articles{
        width: 100%;
      }
      .sidebar {
      width: 100%;
      }
    }

  }
  @media screen and (max-width: 425px) {
      .hero-carousel-container {
        .hero-container{
          .hero{
            @include flex(space-between, center, column-reverse, _);
  
            .hero-info{
              .hero-text{
                a {
                  font-size: 28px;
                }
              }
            }
            .hero-img{
              .img-container{
                height: 30%;
              }
            }
          }
        }
      }

    
  }
  @media screen and (max-width: 375px) {
  .article-date {
    .date , .time{
      padding: .5rem .5rem;
      font-size: .100;
      line-height: 1;

    }
  }
  }
</style>