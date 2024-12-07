import { createRouter, createWebHistory } from 'vue-router'

import LandingComponent from '@/components/Landing/LandingComponent.vue'
import LoginView from '../views/LoginView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'landing',
      component: LandingComponent,
    },
    {
      path: '/login',
      name: 'login',
      component: LoginView,
    },
    // {
    //   path: '/login',
    //   name: 'login',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
    //   component: () => import('../components/LoginComponent.vue'),
    // },
      {
        path: '/studentProfile',
        name: 'studentProfile',
        component: () => import('../components/StudentProfile/StudentProfileComponent.vue'),
      },
      
      {
      path: '/studentTeacher',
      name: 'studentTeacher',
      component: () => import('../components/TeacherProfile/TeacherProfileComponent.vue'),
      },
  
    // {
    //   path: '/groupProfile',
    //   name: 'groupProfile',
    //   component: () => import('../components/GroupsComponent.vue'),
    // },
      {
        path: '/studentsList',
        name: 'studentsList',
        component: () => import('../components/StudentsListComponent.vue'),
      },
      {
        path: '/dashboard',
        name: 'dashboard',
        component: () => import('../components/Dashboard/DashboardComponent.vue'),
      },
      {
        path: '/tancar-sessio', // Nueva ruta para cerrar sesión
        name: 'tancarSessio',
        component: () => import('../components/pages/TancarSessioComponent.vue'), // Asegúrate de que este componente exista
      },
    ],
  });

export default router
