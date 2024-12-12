import { createRouter, createWebHistory } from 'vue-router'
import LandingComponent from '@/components/Landing/LandingComponent.vue'
import LoginView from '../views/LoginView.vue'
import GroupList from '../views/Groups/GroupList.vue'

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
    {
      path:'/formCecs',
      name:'formCecs',
      component: () => import('../components/FormCecs/FormCecsComponent.vue'),
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
      path: '/studentProfile/:id',
      name: 'studentProfile',
      component: () => import('../components/StudentProfile/StudentProfileComponent.vue'),
    },

    {
      path: '/teacherProfile/:id',
      name: 'teacherProfile',
      component: () => import('../components/TeacherProfile/TeacherProfileComponent.vue'),
    },

    {
      path: '/groupsProfile/:id',
      name: 'groupsProfile',
      component: () => import('../components/GroupsProfile/GroupProfileComponent.vue'),
    },
    {
      path: '/studentsList',
      name: 'studentsList',
      component: () => import('../components/modules/user/StudentsListComponent.vue'),
    },
    {
      path: '/teachersList',
      name: 'teachersList',
      component: () => import('../components/modules/user/TeachersListComponent.vue'),
    },
    {
      path: '/groupsList',
      name: 'groupsList',
      component: () => import('../components/modules/user/GroupsListComponent.vue'),
    },
    {
      path: '/grupos',
      name: 'GroupList',
      component: GroupList
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/DashboardView.vue'),
    },
    {
      path: '/tancar-sessio', // Nueva ruta para cerrar sesión
      name: 'tancarSessio',
      component: () => import('../components/pages/TancarSessioComponent.vue'), // Asegúrate de que este componente exista
    },
  ],
});

export default router
