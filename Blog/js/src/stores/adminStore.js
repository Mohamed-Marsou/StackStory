import { defineStore } from 'pinia'
import { api } from '../http/axois'

// Create the store
export const useAdminStore = defineStore('admin', {
  id: 'admin',
  state: () => ({
    admins: []
  }),

  actions: {
    async fetchAdmins() {
      try {
        const response = await api.get('/admins')
        this.admins = response.data
        console.log(response.data)
      } catch (error) {
        console.error('Error fetching admins:', error)
      }
    }
  }
})
