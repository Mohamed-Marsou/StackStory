// api.js
import axios from 'axios'

const api = axios.create({
  baseURL: 'http://127.0.0.1:8000/api' // base API URL
})

const imagesApi = axios.create({
  baseURL: 'http://127.0.0.1:8000/' // base URL for images
})

export { api, imagesApi }
