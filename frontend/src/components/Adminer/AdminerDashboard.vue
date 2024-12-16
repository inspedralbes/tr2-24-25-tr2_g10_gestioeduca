<template>
    <div class="flex h-screen bg-gray-100">
      <!-- Sidebar -->
      <aside :class="[
        'bg-primary text-white transition-all duration-300',
        isMenuOpen ? 'w-64' : 'w-16',
        'lg:w-64' 
      ]">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b border-white/20">
          <h1 v-if="isMenuOpen" class="text-xl font-bold">Panel Admin</h1>
          <button @click="toggleMenu"
            class="lg:hidden text-white p-2 rounded-md hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path v-if="!isMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
              <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
  
        <!-- Navigation -->
        <nav :class="[isMenuOpen ? 'mt-4' : 'mt-2']">
          <router-link v-for="item in menuItems" :key="item.path" :to="item.path"
            class="flex items-center px-4 py-3 text-white transition-colors duration-200 hover:bg-white/10 hover:text-gray-200"
            :class="{ 'bg-primary/80': $route.path === item.path }">
            <component :is="item.icon" class="w-5 h-5 mr-3" />
            <span v-if="isMenuOpen">{{ item.name }}</span>
          </router-link>
        </nav>
      </aside>
  
      <!-- Main Content -->
      <main class="flex-1 overflow-y-auto">
        <div class="p-8">        
          <router-view></router-view>
        </div>
      </main>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import {
    HomeIcon,
    UserIcon,
    UserGroupIcon,
    DocumentTextIcon,
    UsersIcon,
    ArrowLeftStartOnRectangleIcon
  } from '@heroicons/vue/24/outline'
  
  const isMenuOpen = ref(true)
  
  const menuItems = [
    { name: 'Dashboard', path: '/adminer/dashboard', icon: HomeIcon },
    { name: 'Gestió Alumnes', path: '/adminer/students', icon: UserIcon },
    { name: 'Gestió Professors', path: '/adminer/teachers', icon: UserGroupIcon },
    { name: 'Gestió Formularis', path: '/adminer/forms', icon: DocumentTextIcon },
    { name: 'Gestió Grups', path: '/adminer/groups', icon: UsersIcon },
    { name: 'Tancar Sessió', path: '/tancar-sessio', icon: ArrowLeftStartOnRectangleIcon }
  ]
  
  const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value
  }
  </script>