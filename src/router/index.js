import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Crear from '../components/Crear.vue'
import Buscar from '../components/Buscar.vue'
import View from '../components/View.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/crear',
    name: 'Crear',
    component: Crear
  },
  {
    path: '/buscar',
    name: 'Buscar',
    component: Buscar
  },
  {
    path: '/view',
    name: 'View',
    component: View
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
