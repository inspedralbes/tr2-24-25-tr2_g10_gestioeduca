<template>
    <div class="bg-white rounded-lg shadow-lg p-6">
      <h3 class="text-xl font-semibold mb-6 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        Mis Grupos
      </h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div v-for="group in groups" :key="group.id" 
          class="p-4 bg-gray-50 rounded-lg hover:bg-primary/5 transition-all cursor-pointer">
          <div class="flex items-center justify-between mb-3">
            <h4 class="font-semibold text-gray-900">{{ group.name }}</h4>
            <span class="px-2 py-1 text-xs font-medium rounded-full" :class="group.statusColor">
              {{ group.status }}
            </span>
          </div>
          <div class="flex -space-x-2 overflow-hidden mb-3">
            <img v-for="member in group.members" :key="member.id"
              :src="member.avatar"
              :alt="member.name"
              class="inline-block h-8 w-8 rounded-full ring-2 ring-white"
              :title="member.name">
          </div>
          <div class="flex justify-between items-center text-sm text-gray-500">
            <span>{{ group.subject }}</span>
            <span>{{ group.nextMeeting }}</span>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  const groups = [
    {
      id: 1,
      name: 'Grupo Proyecto Historia',
      status: 'Activo',
      statusColor: 'bg-green-100 text-green-800',
      subject: 'Historia',
      members: [
        { id: 1, name: 'Ana G.', avatar: 'https://api.dicebear.com/7.x/avataaars/svg?seed=Ana' },
        { id: 2, name: 'Carlos R.', avatar: 'https://api.dicebear.com/7.x/avataaars/svg?seed=Carlos' },
        { id: 3, name: 'María L.', avatar: 'https://api.dicebear.com/7.x/avataaars/svg?seed=Maria' }
      ]
    },
    {
      id: 2,
      name: 'Equipo Matemáticas',
      status: 'Pendiente',
      statusColor: 'bg-yellow-100 text-yellow-800',
      subject: 'Matemáticas',
      members: [
        { id: 4, name: 'Juan P.', avatar: 'https://api.dicebear.com/7.x/avataaars/svg?seed=Juan' },
        { id: 5, name: 'Laura M.', avatar: 'https://api.dicebear.com/7.x/avataaars/svg?seed=Laura' },
        { id: 6, name: 'Pedro S.', avatar: 'https://api.dicebear.com/7.x/avataaars/svg?seed=Pedro' }
      ]
    },
    {
      id: 3,
      name: 'Laboratorio Ciencias',
      status: 'Próximo',
      statusColor: 'bg-blue-100 text-blue-800',
      subject: 'Ciencias',
      members: [
        { id: 7, name: 'Sofia R.', avatar: 'https://api.dicebear.com/7.x/avataaars/svg?seed=Sofia' },
        { id: 8, name: 'Diego M.', avatar: 'https://api.dicebear.com/7.x/avataaars/svg?seed=Diego' },
        { id: 9, name: 'Elena P.', avatar: 'https://api.dicebear.com/7.x/avataaars/svg?seed=Elena' }
      ]
    }
  ];
  </script>