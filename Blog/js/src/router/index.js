import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/blogViews/Home.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/contact-us',
      name: 'contact',
      component: () => import('../views/blogViews/Contact.vue')
    },
    {
      path: '/authors',
      name: 'authors',
      component: () => import('../views/blogViews/Authors.vue')
    },
    {
      path: '/auth',
      name: 'auth',
      component: () => import('../views/blogViews/User-auth.vue')
    },
  ]
})

export default router
