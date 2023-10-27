<script setup>
  import { ref, defineProps } from 'vue';
  import { useArticleStore } from '../../stores/articleStore' 
  const articleStore = useArticleStore(); 
  const coverImage = articleStore.getCoverImageSrc(props.images);

  const props = defineProps({
    images: Array,     
    tags: Array,       
    title: String,     
    summary: String,   
    date: String, 
    authorFirstName: String,
    authorLastName: String,
  });
</script>

<template>
  <div class="article">
    <div class="img-container">
      <img v-if="coverImage" :src="coverImage" alt="">

    </div>
    <div class="article-info">
      <div class="tags">
        <div class="tag" v-for="(tag, index) in props.tags" :key="index">
          <div :style="{ backgroundColor: tag.color }" class="tag-color"></div>
          <p class="tag-content">{{ tag.name }}</p>
        </div>
      </div>
      <div class="article-text">
        <a href="#">{{ title }}</a>      
        <p>{{ summary }}</p>

      </div>
      <div class="article-date">
        <div class="date">
          <i class="fa-regular fa-calendar"></i>
          <p>{{ articleStore.formatDate(props.date) }}</p>
        </div>
        <!---->
        <div class="time">
          <i class="fa-solid fa-user"></i>
          <p>{{ authorFirstName + ' ' +authorLastName }}</p>

        </div>
      </div>
    </div>
  </div>
</template>



<style lang="scss" scoped>
@import '../src/styles/_variables.scss';
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
.article {
  width: 100%;
  @include flex(space-between, _, _, _);

  height: 20rem;
  padding: 1.5rem;
  background-color: $secondary;
  border-radius: 15px;
  margin-bottom: 1.5rem;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.2);

  .img-container {
    width: 35%;
    border-radius: 15px;

    img {
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

    .article-text {
      text-transform: capitalize;
      margin: 1rem 0;

      a {

        color: rgba(245, 245, 245, 0.741);
        text-decoration: none;
        font-size: 1.5rem;
        font-weight: 600;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 2;
        height: auto;
        display: -webkit-box;
        transition: .2s ease-in-out;
        cursor: pointer;
        position: relative;

        &:hover {
          color: $text-headings;
        }
      }

      p {
        font-size: .9rem;
        margin: 1.5rem 0;
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
  .article {
    width: 98%;
    height: 22rem;

    .img-container {
      width: 35%;
      height: 15rem;
    }
  }


}

@media screen and (max-width: 550px) {

  .article {
    @include flex(_, _, column, _);
    height: 35rem;
    padding: .7rem;

    .img-container {
      width: 100%;

      img {
        width: 100%;
        height: 100%;
      }
    }

    .article-info {
      width: 100%;

      .article-text {
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

    .date,
    .time {
      padding: .5rem .5rem;
      font-size: .100;
      line-height: 1;

    }
  }
}
</style>
