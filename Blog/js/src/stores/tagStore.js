import { defineStore } from 'pinia'
import { api } from '../http/axois'

export const useTagStore = defineStore({
  id: 'tag',
  state: () => ({
    tags: []
  }),
  actions: {
    async fetchTags() {
      try {
        const response = await api.get('/tags')
        this.tags = response.data
      } catch (error) {
        console.error('Error fetching tags:', error)
      }
    }
  }
})
