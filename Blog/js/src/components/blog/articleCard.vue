<template>
    <div class="article">
        <div class="img-container">
            <img src="/wow.jpg" alt="">
        </div>
        <div class="article-info">
            <div class="tags">
              <Tag  />
            </div>
            <div class="article-text">
                <a href="">never let sgsd gsgfsdggdsg gw w your memories be grater than your dreams</a>
                <p>Before long the dfasdfdsdgs gggsdsearchl ight discovered some distance away a schooner with all sails set, apparently the same vessel which had been noticed earlier in the evening</p>
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
    </div>
</template>

<script setup>
import Tag from './tags.vue'
</script>

<style lang="scss" scoped>
    @import '../src/styles/_variables.scss';

    .article{
        width: 100%;
        @include flex(space-between, _, _, _);

        height: 20rem;
        padding: 1.5rem;
        background-color: $secondary;
        border-radius: 15px;
        margin-bottom: 1.5rem;
        box-shadow:  0 10px 10px rgba(0, 0, 0, 0.2);
        .img-container {
          width: 35%;
          border-radius: 15px;

          img{
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            transition: 0.3s ease-in-out;
            &:hover {
              transform: scale(1.02);
            }
          }
        }
        .article-info {
          width: 62%;
          .article-text{
            text-transform: capitalize;
              margin: 1rem 0;
              a {
                text-decoration: none;
                color: $text-headings;
                font-size: 30px;
                font-weight: 600;
                line-height: 1.2;
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis;
                -webkit-line-clamp: 2; 
                height: auto; 
                display: -webkit-box;
                transition: .2s ease-in-out;
                cursor: pointer;
                &:hover {
                  border-bottom: 2px solid $accents;
                }
              }
              p {
                font-size: 16px;
                margin: 1.25rem 0;
                line-height: 1.8;
                color: $text-paragraphs;
                height: 5rem;
                text-overflow: ellipsis;
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 3; // Number of lines to display before ellipsis
                -webkit-box-orient: vertical;
                text-overflow: ellipsis;
              }
          }
        }
    }
    @media screen and (max-width: 1024px) {
          .article{
            height: 22rem;
            .img-container {
              width: 35%;
              height: 15rem;
            }
          }
        
      
    }
    @media screen and (max-width: 425px) {

        .article{
          @include flex(_, _, column, _);
          height: 35rem;
          padding: .7rem;
          .img-container {
          width: 100%;

          img{
            width: 100%;
            height: 100%;
          }
        }
        .article-info {
          width: 100%;
          .article-text{
            text-transform: capitalize;
            margin: 1rem 0;
            a {
              font-size: 22px;
            }
            p {
              font-size: 14px;
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