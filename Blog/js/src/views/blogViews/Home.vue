<script setup>
import articleCard from '../../components/blog/articleCard.vue';
import sideBar from '../../components/blog/sideBar.vue';
import Hero from '../../components/blog/homeCarousel.vue'
import Tag from '../../components/blog/tags.vue';
import { ref, onMounted } from 'vue';
import { useArticleStore } from '../../stores/articleStore';
const articleStore = useArticleStore();
const articles = ref([]); 
const latestArticles = ref([]);
const isLoading = ref(false);
const currentPage = ref(articleStore.currentPage);

onMounted(async () => {
  await articleStore.fetchArticles();
  articles.value = articleStore.articles;
  await articleStore.fetchLatestThreeArticles();
  latestArticles.value = articleStore.articles.slice(0, 3);
});
const loadMore = async () => {
  isLoading.value = true;
  try {
    await articleStore.fetchArticles(currentPage.value + 1);
    currentPage.value += 1;
    articles.value = [...articles.value, ...articleStore.articles];
  } catch (error) {
    console.error('Error loading more articles:', error);
  } finally {
    isLoading.value = false;
  }
};

</script>

<template>
  <div>
    <div class="hero-carousel-container">
      <Hero :articles="latestArticles" />
    </div>
    <div class="main-section">
      <div class="articles">
        <articleCard
          v-for="article in articles"
          :key="article.id" 
          :images="article.images"
          :tags="article.tags.map(tag => ({ name: tag.tag_name, color: tag.color }))"
          :title="article.article_title"
          :summary="article.article_summary"
          :date="article.published_at"
          :authorFirstName="article.author.first_name"
          :authorLastName="article.author.last_name"
        />  
        <div v-if="!isLoading" class="more">
          <button class="btn" @click="loadMore">load more</button>
        </div>

        <div v-else class="costum_loder_spinner">
          <span class="loader"></span>
        </div>
      </div>
      <div class="sidebar">
        <sideBar />
      </div>
    </div>
  </div>
</template>


<style lang="scss">
@import '../src/styles/_variables.scss';


.main-section {
  display: flex;
  margin: 2rem;

  .articles {
    width: 65%;

    .more {
      display: flex;
      margin: 1rem 0;

      .btn {
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

        &:hover {
          background-color: $accents-hover;
        }
      }
    }
  }

}

@media screen and (max-width: 1024px) {
  .hero-carousel-container {
    .hero-container {
      .hero {
        @include flex(space-between, flex-start, column-reverse, _);

        .hero-img {
          width: 100%;
        }

        .hero-info {
          width: 90%;
          margin-top: 1rem;
        }
      }
    }
  }

  .main-section {
    width: 100%;
    margin: 1rem auto !important;

    .articles {
      width: 60%;
      padding: 10px;
    }

    .sidebar {
      width: 40%;

      aside {
        width: 95%;
        margin: .5rem auto;
      }
    }
  }
}

@media screen and (max-width: 768px) {
  .main-section {
    flex-direction: column;

    .articles {
      width: 100%;
    }

    .sidebar {
      width: 100%;
    }
  }

}

@media screen and (max-width: 425px) {
  .hero-carousel-container {
    .hero-container {
      .hero {
        @include flex(space-between, center, column-reverse, _);

        .hero-info {
          .hero-text {
            a {
              font-size: 28px;
            }
          }
        }

        .hero-img {
          .img-container {
            height: 30%;
          }
        }
      }
    }
  }


}

@media screen and (max-width: 375px) {
  .main-section {
    margin: .7rem;
  }

  .article-date {

    .date,
    .time {
      padding: .5rem .5rem;
      font-size: .100;
      line-height: 1;

    }
  }
}

.costum_loder_spinner {
  width: 100%;
  height: 15rem;
  @include flx();

  .loader {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: inline-block;
    border-top: 4px solid #FFF;
    border-right: 4px solid transparent;
    box-sizing: border-box;
    animation: rotation 1s linear infinite;
  }

  .loader::after {
    content: '';
    box-sizing: border-box;
    position: absolute;
    left: 0;
    top: 0;
    width: 48px;
    height: 48px;
    border-radius: 50%;
    border-bottom: 4px solid #FB2576;
    border-left: 4px solid transparent;
  }

  @keyframes rotation {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }
}</style>