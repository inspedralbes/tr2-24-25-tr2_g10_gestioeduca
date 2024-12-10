<template>
    <div class="space-y-6">
      <h2 class="text-2xl font-bold">Mi Grupo</h2>
      <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Grupo A</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          <div v-for="member in groupMembers" :key="member.id" 
            class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
            <div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center">
              {{ member.initials }}
            </div>
            <div>
              <p class="font-medium">{{ member.name }}</p>
              <p class="text-sm text-gray-500">{{ member.role }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const groupMembers = ref([
    { id: 1, name: 'Ana García', initials: 'AG', role: 'Líder' },
    { id: 2, name: 'Carlos Ruiz', initials: 'CR', role: 'Secretario' },
    { id: 3, name: 'María López', initials: 'ML', role: 'Miembro' },
    { id: 4, name: 'Juan Pérez', initials: 'JP', role: 'Miembro' }
  ])
  </script>