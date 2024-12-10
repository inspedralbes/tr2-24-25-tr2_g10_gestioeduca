<template>
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-lg font-semibold mb-4">Próximas Actividades</h3>
      <div class="space-y-4">
        <div v-for="activity in activities" :key="activity.id" class="border-b pb-3">
          <p class="font-medium">{{ activity.name }}</p>
          <p class="text-sm text-gray-500">{{ activity.date }}</p>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-lg font-semibold mb-4 hover:text-gray-900 hover:bg-gray-100">Materias</h3>
      <div class="space-y-4">
        <div v-for="subject in subjects" :key="subject.id" class="flex justify-between items-center">
          <span>{{ subject.name }}</span>
          <span class="text-sm text-gray-500">{{ subject.grade }}</span>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
      <h3 class="text-lg font-semibold mb-4">Anuncios</h3>
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