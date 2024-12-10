<template>
    <div class="space-y-6">
      <h2 class="text-2xl font-bold">Mis Materias</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div v-for="subject in subjects" :key="subject.id" 
          class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
          <h3 class="text-lg font-semibold mb-2">{{ subject.name }}</h3>
          <p class="text-gray-600 mb-4">{{ subject.teacher }}</p>
          <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500">Promedio:</span>
            <span class="font-semibold text-primary">{{ subject.grade }}</span>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const subjects = ref([
    { 
      id: 1, 
      name: 'Mathemathics', 
      teacher: 'Prof. María López',
    },
    { 
      id: 2, 
      name: 'Historia', 
      teacher: 'Prof. Juan Pérez',
    },
    { 
      id: 3, 
      name: 'Ciencias', 
      teacher: 'Prof. Ana Martínez',
    }
  ])
  </script>