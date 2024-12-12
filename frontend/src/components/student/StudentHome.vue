<template>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    <!-- INSIGNIAS -->
    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-lg font-semibold mb-4">Mis Insignias</h3>
      <div class="space-y-4">
        <div class="flex items-center space-x-3">
          <!-- Icono de Insignia 1 -->
          <i class="text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4"></path>
            </svg> 
          </i>
          <span>Insignia de Participación</span>
        </div>
        <div class="flex items-center space-x-3">
          <!-- Icono de Insignia 2 -->
          <i class="text-green-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14"></path>
            </svg>
          </i>
          <span>Insignia de Asistencia</span>
        </div>
        <div class="flex items-center space-x-3">
          <!-- Icono de Insignia 3 -->
          <i class="text-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12"></path>
            </svg>
          </i>
          <span>Insignia de Logro</span>
        </div>
      </div>
    </div>

    <!-- ACTIVIDADES -->
    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-lg font-semibold mb-4">Próximas Actividades</h3>
      <div class="space-y-4">
        <div v-for="activity in activities" :key="activity.id" class="border-b pb-3">
          <p class="font-medium">{{ activity.name }}</p>
          <p class="text-sm text-gray-500">{{ activity.date }}</p>
        </div>
      </div>
    </div>


    <!-- GRUPOS -->
    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-lg font-semibold mb-4">Mis grupos</h3>
      <div class="space-y-4">
        <div v-for="announcement in announcements" :key="announcement.id" class="border-b pb-3">
          <p class="font-medium">{{ announcement.title }}</p>
          <p class="text-sm text-gray-500">{{ announcement.date }}</p>
        </div>
      </div>
    </div>
    
  </div>
</template>

<script setup>
import { ref } from 'vue'

const activities = ref([
  { id: 1, name: 'Entrega Matemáticas', date: '15 de Mayo' },
  { id: 2, name: 'Examen Historia', date: '18 de Mayo' },
  { id: 3, name: 'Presentación Ciencias', date: '20 de Mayo' }
])

const subjects = ref([
  { id: 1, name: 'Matemáticas', grade: '8.5' },
  { id: 2, name: 'Historia', grade: '9.0' },
  { id: 3, name: 'Ciencias', grade: '8.7' }
])

const announcements = ref([
  { id: 1, title: 'Reunión de padres', date: '10 de Mayo' },
  { id: 2, title: 'Excursión al museo', date: '25 de Mayo' },
  { id: 3, title: 'Día del deporte', date: '1 de Junio' }
])
</script>
