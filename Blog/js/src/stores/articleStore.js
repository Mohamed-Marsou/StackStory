import { defineStore } from 'pinia'
import { api } from '../http/axois'
import { imagesApi } from '../http/axois'

export const useArticleStore = defineStore({
  id: 'article',
  state: () => ({
    articles: [],
    currentPage: 1
  }),
  actions: {
    async fetchArticles(page = 1) {
      try {
        const response = await api.get('/articles', { params: { page } })
        if (response.data.data) {
          this.articles = response.data.data.map((article) => ({
            ...article,
            imgSrc: article.images.length > 0 ? api + article.images[0].image_path : ''
          }))
        } else {
          console.error('No data in the response.')
        }
      } catch (error) {
        console.error('Error fetching articles:', error)
      }
    },
    async fetchLatestThreeArticles() {
      try {
        const response = await api.get('/latest-articles') // Make sure the URL is correct
        if (response.data) {
          this.articles = response.data.map((article) => ({
            ...article,
            imgSrc:
              article.images && article.images.length > 0 ? api + article.images[0].image_path : ''
          }))
        } else {
          console.error('No data in the response.')
        }
        console.log(response.data)
      } catch (error) {
        console.error('Error fetching latest three articles:', error)
      }
    },
    // Create a function to get the cover image URL
    getCoverImageSrc(images) {
      const coverImage = images.find((image) => image.is_cover)
      return coverImage
        ? imagesApi.defaults.baseURL + coverImage.image_path
        : imagesApi.defaults.baseURL + 'images/default.jpg'
    },
    // formate dates
    formatDate(date) {
      if (date) {
        const options = { year: 'numeric', month: '2-digit', day: '2-digit' }
        return new Date(date).toLocaleDateString('en-US', options).split('/').join('-')
      }
    }
  }
})
