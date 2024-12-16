<template>
    <div class="space-y-6">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Gestió de Grups</h1>
        <button @click="showAddModal = true" 
          class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 flex items-center space-x-2">
          <PlusIcon class="w-5 h-5" />
          <span>Nou Grup</span>
        </button>
      </div>
  
      <!-- Table -->
      <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th v-for="header in headers" :key="header" 
                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                {{ header }}
              </th>
              <th class="px-6 py-3 text-right">Accions</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="group in groups" :key="group.id">
              <td class="px-6 py-4 whitespace-nowrap">{{ group.name }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ group.course }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ group.members }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                <button @click="editGroup(group)" 
                  class="text-primary hover:text-primary/80">
                  <PencilIcon class="w-5 h-5" />
                </button>
                <button @click="deleteGroup(group.id)" 
                  class="text-danger hover:text-danger/80">
                  <TrashIcon class="w-5 h-5" />
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <!-- Add/Edit Modal -->
      <div v-if="showAddModal || showEditModal" 
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded-lg w-full max-w-md">
          <h2 class="text-xl font-semibold mb-4">
            {{ showEditModal ? 'Editar' : 'Nou' }} Grup
          </h2>
          <form @submit.prevent="handleSubmit" class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Nom del Grup</label>
              <input v-model="form.name" type="text" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Curs</label>
              <select v-model="form.course" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                <option value="1º ESO">1º ESO</option>
                <option value="2º ESO">2º ESO</option>
                <option value="3º ESO">3º ESO</option>
                <option value="4º ESO">4º ESO</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Número de Membres</label>
              <input v-model="form.members" type="number" required min="1"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
            </div>
            <div class="flex justify-end space-x-3">
              <button type="button" @click="closeModal"
                class="px-4 py-2 text-gray-700 hover:text-gray-900">
                Cancel·lar
              </button>
              <button type="submit"
                class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90">
                {{ showEditModal ? 'Actualitzar' : 'Crear' }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  import { PlusIcon, PencilIcon, TrashIcon } from '@heroicons/vue/24/outline'
  
  const headers = ['Nom', 'Curs', 'Membres']
  const groups = ref([
    { id: 1, name: 'Grupo A', course: '1º ESO', members: 25 },
    { id: 2, name: 'Grupo B', course: '2º ESO', members: 28 }
  ])
  
  const showAddModal = ref(false)
  const showEditModal = ref(false)
  const form = ref({
    name: '',
    course: '',
    members: ''
  })
  
  const editGroup = (group) => {
    form.value = { ...group }
    showEditModal.value = true
  }
  
  const deleteGroup = (id) => {
    if (confirm('¿Estás seguro de que quieres eliminar este grupo?')) {
      groups.value = groups.value.filter(g => g.id !== id)
    }
  }
  
  const handleSubmit = () => {
    if (showEditModal.value) {
      const index = groups.value.findIndex(g => g.id === form.value.id)
      groups.value[index] = { ...form.value }
    } else {
      groups.value.push({
        id: Date.now(),
        ...form.value
      })
    }
    closeModal()
  }
  
  const closeModal = () => {
    showAddModal.value = false
    showEditModal.value = false
    form.value = {
      name: '',
      course: '',
      members: '',
    }
  }
  </script>