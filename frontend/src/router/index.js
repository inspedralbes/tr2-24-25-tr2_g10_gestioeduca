import { createRouter, createWebHistory } from 'vue-router'

import LandingComponent from '@/components/Landing/LandingComponent.vue'
import LoginView from '../views/LoginView.vue'
import GroupList from '../views/Groups/GroupList.vue'
import StudentDashboard from '@/components/student/StudentDashboard.vue'

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
      path: '/student',
      component: StudentDashboard,
      children: [
        {
          path: '',
          redirect: '/student/dashboard'
        },
        {
          path: 'dashboard',
          name: 'studentHome',
          component: () => import('@/components/student/StudentHome.vue')
        },
        {
          path: 'subjects',
          name: 'studentSubjects',
          component: () => import('@/components/student/StudentSubjects.vue')
        },
        {
          path: 'group',
          name: 'studentGroup',
          component: () => import('@/components/student/StudentGroup.vue')
        },
        {
          path: 'forms',
          name: 'studentForms',
          component: () => import('@/components/student/StudentForms.vue')
        }
      ]
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/DashboardView.vue'),
    },
    {
      path: '/studentsList',
      name: 'alumnos',
      component: () => import('../components/StudentsListComponent.vue'),
    },
    {
      path: '/grupos',
      name: 'GroupList',
      component: GroupList
    },
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
    {
      path: '/teachersList',
      name: 'teachersList',
      component: () => import('../components/TeachersListComponent.vue'),
    },
    {
      path: '/tancar-sessio', // Nueva ruta para cerrar sesión
      name: 'tancarSessio',
      component: () => import('../components/pages/TancarSessioComponent.vue'), // Asegúrate de que este componente exista
    },
  ],
});

export default router
