import { createRouter, createWebHistory } from 'vue-router';
import LandingComponent from '@/components/Landing/LandingComponent.vue';
import LoginView from '../views/LoginView.vue';
import GroupList from '../views/Groups/GroupList.vue';
import FormList from '../views/Forms/FormList.vue';
import StudentDashboard from '@/components/student/StudentDashboard.vue';

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
      meta: { requiresAuth: true },
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
      path: '/studentProfile/:id',
      name: 'studentProfile',
      component: () => import('../components/StudentProfile/StudentProfileComponent.vue'),
      meta: { requiresAuth: true },
    },
    {
      path: '/formularios',
      name: 'FormList',
      component: FormList,
      meta: { requiresAuth: true },
    },
    {
      path: '/teacherProfile/:id',
      name: 'teacherProfile',
      component: () => import('../components/TeacherProfile/TeacherProfileComponent.vue'),
      meta: { requiresAuth: true },
    },
    {
      path: '/groupsProfile/:id',
      name: 'groupsProfile',
      component: () => import('../components/GroupsProfile/GroupProfileComponent.vue'),
      meta: { requiresAuth: true },
    },
    {
      path: '/studentsList',
      name: 'studentsList',
      component: () => import('../components/modules/user/StudentsListComponent.vue'),
      meta: { requiresAuth: true },
    },
    {
      path: '/teachersList',
      name: 'teachersList',
      component: () => import('../components/modules/user/TeachersListComponent.vue'),
      meta: { requiresAuth: true },
    },
    {
      path: '/groupsList',
      name: 'groupsList',
      component: () => import('../components/modules/user/GroupsListComponent.vue'),
      meta: { requiresAuth: true },
    },
    {
      path: '/grupos',
      name: 'GroupList',
      component: GroupList,
      meta: { requiresAuth: true },
    },
    {
      path: '/dashboard',
      name: 'dashboard',
      component: () => import('../views/DashboardView.vue'),
      meta: { requiresAuth: true },
    },
    {
      path:'/formCecs',
      name:'formCecs',
      component: () => import('../components/FormCecs/FormCecsComponent.vue'),
    },
    {
      path: '/tancar-sessio',
      name: 'tancarSessio',
      component: () => import('../components/pages/TancarSessioComponent.vue'),
      meta: { requiresAuth: true },
    },
  ],
});

// Global navigation guard
router.beforeEach((to, from, next) => {
  const isAuthenticated = !!localStorage.getItem('user'); // Verifica si hay datos del usuario
  if (to.meta.requiresAuth && !isAuthenticated) {
    next('/login'); // Redirige al login si no está autenticado
  } else {
    next(); // Permite el acceso
  }
});

export default router;