<template>
  <div class="bg-white rounded-lg shadow-lg p-6">
    <h3 class="text-xl font-semibold mb-6 flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
      </svg>
      Próximas Actividades
    </h3>
    <div class="space-y-4">
      <div v-for="activity in activities" :key="activity.id" 
        class="flex items-center p-4 bg-gray-50 rounded-lg hover:bg-primary/5 transition-all transform hover:scale-102 cursor-pointer">
        <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full" :class="activity.bgColor">
          <component :is="activity.icon" class="w-6 h-6" :class="activity.iconColor" />
        </div>
        <div class="ml-4 flex-grow">
          <h4 class="text-sm font-semibold text-gray-900">{{ activity.name }}</h4>
          <p class="text-sm text-gray-500">{{ activity.date }}</p>
        </div>
        <div class="ml-4 flex-shrink-0">
          <span class="px-3 py-1 text-xs font-medium rounded-full" :class="activity.statusColor">
            {{ activity.status }}
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { 
  BookOpenIcon, 
  PresentationChartBarIcon, 
  BeakerIcon, 
  UserGroupIcon 
} from '@heroicons/vue/24/solid';

const activities = [
  {
    id: 1,
    name: 'Entrega Matemáticas',
    date: '15 de Mayo - 14:30',
    icon: BookOpenIcon,
    bgColor: 'bg-blue-100',
    iconColor: 'text-blue-500',
    status: 'Pendiente',
    statusColor: 'bg-yellow-100 text-yellow-800'
  },
  {
    id: 2,
    name: 'Presentación Historia',
    date: '18 de Mayo - 10:00',
    icon: PresentationChartBarIcon,
    bgColor: 'bg-green-100',
    iconColor: 'text-green-500',
    status: 'Preparado',
    statusColor: 'bg-green-100 text-green-800'
  },
  {
    id: 3,
    name: 'Experimento Ciencias',
    date: '20 de Mayo - 11:30',
    icon: BeakerIcon,
    bgColor: 'bg-purple-100',
    iconColor: 'text-purple-500',
    status: 'Próximo',
    statusColor: 'bg-purple-100 text-purple-800'
  },
  {
    id: 4,
    name: 'Trabajo en Grupo',
    date: '22 de Mayo - 09:00',
    icon: UserGroupIcon,
    bgColor: 'bg-red-100',
    iconColor: 'text-red-500',
    status: 'Importante',
    statusColor: 'bg-red-100 text-red-800'
  }
];
</script>

<style scoped>
.hover\:scale-102:hover {
  transform: scale(1.02);
}
</style>