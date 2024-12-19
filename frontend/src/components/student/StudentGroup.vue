<template>
  <div class="space-y-6">
    <h2 class="text-2xl font-bold">Mis Grupos</h2>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <div v-for="group in groups" :key="group.id" 
        class="bg-white rounded-lg shadow p-6">
        <div class="flex justify-between items-start mb-4">
          <div>
            <h3 class="text-lg font-semibold">{{ group.name }}</h3>
            <p class="text-gray-600">{{ group.subject }}</p>
          </div>
          <span :class="getdivisionClass(group.division)">
            {{ group.division }}
          </span>
        </div>

        <div class="mb-4">
          <button 
            @click="toggleMembers(group.id)"
            class="flex items-center text-primary hover:text-primary/80"
          >
            <span>{{ group.isExpanded ? 'Ocultar' : 'Ver' }} integrantes</span>
            <ChevronDownIcon 
              class="w-5 h-5 ml-1 transform transition-transform"
              :class="{ 'rotate-180': group.isExpanded }"
            />
          </button>
        </div>

        <div v-if="group.isExpanded" class="space-y-3 animate-fade-in">
          <div v-for="member in group.members" :key="member.id"
            class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
            <div class="flex items-center space-x-3">
              <div class="w-8 h-8 bg-primary/20 rounded-full flex items-center justify-center text-sm font-medium text-primary">
                {{ member.initials }}
              </div>
              <span>{{ member.name }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { ChevronDownIcon } from '@heroicons/vue/24/outline'

const groups = ref([
  {
    id: 1,
    name: 'Grupo Proyecto Historia',
    subject: 'Historia',
    division: 'Activo',
    isExpanded: false,
    members: [
      { id: 1, name: 'Ana García', initials: 'AG' },
      { id: 2, name: 'Carlos Ruiz', initials: 'CR'},
      { id: 3, name: 'María López', initials: 'ML' }
    ]
  },
  {
    id: 2,
    name: 'Equipo Matemáticas',
    subject: 'Algebra',
    division: 'Pendiente',
    isExpanded: false,
    members: [
      { id: 4, name: 'Juan Pérez', initials: 'JP' },
      { id: 5, name: 'Laura Martínez', initials: 'LM' },
      { id: 6, name: 'Pedro Sánchez', initials: 'PS' }
    ]
  },
  {
    id: 3,
    name: 'Laboratorio Ciencias',
    subject: 'Biology',
    division: 'Próximo',
    isExpanded: false,
    members: [
      { id: 7, name: 'Sofia Rodríguez', initials: 'SR' },
      { id: 8, name: 'Diego Moreno', initials: 'DM' },
      { id: 9, name: 'Elena Pérez', initials: 'EP' }
    ]
  }
])

const toggleMembers = (groupId) => {
  const group = groups.value.find(g => g.id === groupId)
  if (group) {
    group.isExpanded = !group.isExpanded
  }
}

const getdivisionClass = (division) => {
  const classes = {
    'Activo': 'bg-green-100 text-green-800',
    'Pendiente': 'bg-yellow-100 text-yellow-800',
    'Próximo': 'bg-blue-100 text-blue-800'
  }
  return `px-3 py-1 rounded-full text-sm font-medium ${classes[division] || ''}`
}
</script>

<style scoped>
.animate-fade-in {
  animation: fadeIn 0.2s ease-out forwards;
}

</style>
