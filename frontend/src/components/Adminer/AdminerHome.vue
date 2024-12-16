<template>
    <div class="space-y-6">
      <h1 class="text-2xl font-bold">Dashboard Administrador</h1>
      
      <!-- Stats Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div v-for="stat in stats" :key="stat.name" class="bg-white p-6 rounded-lg shadow-md">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm text-gray-500">{{ stat.name }}</p>
              <p class="text-2xl font-semibold">{{ stat.value }}</p>
            </div>
            <div :class="`bg-${stat.color}/10 p-3 rounded-full`">
              <component :is="stat.icon" class="w-6 h-6" :class="`text-${stat.color}`" />
            </div>
          </div>
          <div class="mt-4 flex items-center" v-if="stat.trend">
            <span :class="stat.trend > 0 ? 'text-success' : 'text-danger'">
              {{ stat.trend > 0 ? '+' : '' }}{{ stat.trend }}%
            </span>
            <span class="text-gray-500 ml-2">vs last month</span>
          </div>
        </div>
      </div>
  
      <!-- Recent Activity -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-semibold mb-4">Activitat Recent</h2>
        <div class="space-y-4">
          <div v-for="activity in recentActivity" :key="activity.id" 
            class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
            <div class="flex items-center space-x-4">
              <div :class="`bg-${activity.color}/10 p-2 rounded-full`">
                <component :is="activity.icon" class="w-5 h-5" :class="`text-${activity.color}`" />
              </div>
              <div>
                <p class="font-medium">{{ activity.title }}</p>
                <p class="text-sm text-gray-500">{{ activity.time }}</p>
              </div>
            </div>
            <span :class="`text-${activity.color} text-sm font-medium`">{{ activity.status }}</span>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import {
    UserGroupIcon,
    UserIcon,
    DocumentTextIcon,
    UsersIcon,
    PlusIcon,
    PencilIcon,
    TrashIcon
  } from '@heroicons/vue/24/outline'
  
  const stats = [
    {
      name: 'Total Alumnes',
      value: '256',
      icon: UserGroupIcon,
      color: 'primary',
      trend: 12
    },
    {
      name: 'Total Professors',
      value: '32',
      icon: UserIcon,
      color: 'success',
      trend: 5
    },
    {
      name: 'Formularis Actius',
      value: '15',
      icon: DocumentTextIcon,
      color: 'warning',
      trend: -2
    },
    {
      name: 'Grups',
      value: '45',
      icon: UsersIcon,
      color: 'danger',
      trend: 8
    }
  ]
  
  const recentActivity = [
    {
      id: 1,
      title: 'Nou alumne registrat',
      time: 'Fa 5 minuts',
      icon: PlusIcon,
      color: 'success',
      status: 'Completat'
    },
    {
      id: 2,
      title: 'Formulari actualitzat',
      time: 'Fa 15 minuts',
      icon: PencilIcon,
      color: 'warning',
      status: 'En procés'
    },
    {
      id: 3,
      title: 'Grup eliminat',
      time: 'Fa 1 hora',
      icon: TrashIcon,
      color: 'danger',
      status: 'Eliminat'
    }
  ]
  </script>