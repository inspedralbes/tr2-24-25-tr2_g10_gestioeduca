<template>
    <div class="bg-white rounded-lg shadow-lg p-6">
      <h3 class="text-xl font-semibold mb-6 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
        </svg>
        Mis Insignias
      </h3>
      <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        <div v-for="badge in badges" :key="badge.id" 
          class="group relative flex flex-col items-center p-4 bg-gray-50 rounded-lg hover:bg-primary/5 transition-colors cursor-pointer"
          @mouseenter="showTooltip(badge.id)"
          @mouseleave="hideTooltip">
          <div class="w-16 h-16 flex items-center justify-center rounded-full" :class="badge.bgColor">
            <component :is="badge.icon" class="w-8 h-8" :class="badge.iconColor" />
          </div>
          <span class="mt-2 text-sm font-medium text-gray-700">{{ badge.name }}</span>
          <div v-if="activeTooltip === badge.id" 
            class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-2 bg-gray-900 text-white text-sm rounded shadow-lg z-10">
            {{ badge.description }}
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 rotate-45 w-2 h-2 bg-gray-900"></div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue';
  import { 
    StarIcon,
    BoltIcon,
    AcademicCapIcon,
    UserGroupIcon,
    ChartBarIcon,
    ClockIcon 
  } from '@heroicons/vue/24/solid';
  
  const activeTooltip = ref(null);
  
  const badges = [
    {
      id: 1,
      name: 'Excelencia',
      icon: StarIcon,
      bgColor: 'bg-yellow-100',
      iconColor: 'text-yellow-500',
      description: 'Otorgado por mantener un promedio superior a 9'
    },
    {
      id: 2,
      name: 'Velocidad',
      icon: BoltIcon,
      bgColor: 'bg-blue-100',
      iconColor: 'text-blue-500',
      description: 'Completaste todas las tareas antes del plazo'
    },
    {
      id: 3,
      name: 'Sabiduría',
      icon: AcademicCapIcon,
      bgColor: 'bg-purple-100',
      iconColor: 'text-purple-500',
      description: 'Dominio excepcional en múltiples materias'
    },
    {
      id: 4,
      name: 'Colaboración',
      icon: UserGroupIcon,
      bgColor: 'bg-green-100',
      iconColor: 'text-green-500',
      description: 'Excelente trabajo en equipo'
    },
    {
      id: 5,
      name: 'Progreso',
      icon: ChartBarIcon,
      bgColor: 'bg-red-100',
      iconColor: 'text-red-500',
      description: 'Mejora constante en el rendimiento'
    },
    {
      id: 6,
      name: 'Puntualidad',
      icon: ClockIcon,
      bgColor: 'bg-indigo-100',
      iconColor: 'text-indigo-500',
      description: '100% de asistencia puntual'
    }
  ];
  
  const showTooltip = (id) => {
    activeTooltip.value = id;
  };
  
  const hideTooltip = () => {
    activeTooltip.value = null;
  };
  </script>