import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/blogViews/home.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home',
      redirect: '/'
    },
    {
      path: '/',
      name: 'home',
      component: HomeView
      ,meta: { title: 'Home ' }
    },
    {
      path: '/contact',
      name: 'contact',
      component: () => import('../views/blogViews/Contact.vue'),
      meta: {
        title: 'Contact Us' 
      }
    },
    {
      path: '/authors',
      name: 'authors',
      component: () => import('../views/blogViews/Authors.vue'),
      meta: {
        title: 'Authors' 
      }
    },
    {
      path: '/faq',
      name: 'faq',
      component: () => import('../views/blogViews/Faq.vue'),
      meta: {
        title: 'FAQ' 
      }
    },
    {
      path: '/auth',
      name: 'auth',
      component: () => import('../views/blogViews/User-auth.vue'),
      meta: {
        title: 'User Authentication' 
      }
    },
  ]
});
router.beforeEach((to, from, next) => {
  document.title = to.meta.title || 'Your Default Title';
  next();
});
export default router;
