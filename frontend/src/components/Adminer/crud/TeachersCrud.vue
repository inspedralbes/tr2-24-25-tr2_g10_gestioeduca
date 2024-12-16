<template>
    <div class="space-y-6">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Gestió de Professors</h1>
        <button @click="showAddModal = true" 
          class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 flex items-center space-x-2">
          <PlusIcon class="w-5 h-5" />
          <span>Afegir Professor</span>
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
            <tr v-for="teacher in teachers" :key="teacher.id">
              <td class="px-6 py-4 whitespace-nowrap">{{ teacher.name }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ teacher.email }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ teacher.subject }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                <button @click="editTeacher(teacher)" 
                  class="text-primary hover:text-primary/80">
                  <PencilIcon class="w-5 h-5" />
                </button>
                <button @click="deleteTeacher(teacher.id)" 
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
            {{ showEditModal ? 'Editar' : 'Afegir' }} Professor
          </h2>
          <form @submit.prevent="handleSubmit" class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Nom</label>
              <input v-model="form.name" type="text" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Email</label>
              <input v-model="form.email" type="email" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Assignatura</label>
              <select v-model="form.subject" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                <option value="Matemáticas">Matemáticas</option>
                <option value="Lengua">Lengua</option>
                <option value="Historia">Historia</option>
                <option value="Ciencias">Ciencias</option>
              </select>
            </div>
            <div class="flex justify-end space-x-3">
              <button type="button" @click="closeModal"
                class="px-4 py-2 text-gray-700 hover:text-gray-900">
                Cancel·lar
              </button>
              <button type="submit"
                class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90">
                {{ showEditModal ? 'Actualitzar' : 'Afegir' }}
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
  
  const headers = ['Nom', 'Email', 'Assignatura']
  const teachers = ref([
    { id: 1, name: 'María López', email: 'maria@example.com', subject: 'Matemáticas' },
    { id: 2, name: 'Juan Pérez', email: 'juan@example.com', subject: 'Historia' }
  ])
  
  const showAddModal = ref(false)
  const showEditModal = ref(false)
  const form = ref({
    name: '',
    email: '',
    subject: ''
  })
  
  const editTeacher = (teacher) => {
    form.value = { ...teacher }
    showEditModal.value = true
  }
  
  const deleteTeacher = (id) => {
    if (confirm('¿Estás seguro de que quieres eliminar este profesor?')) {
      teachers.value = teachers.value.filter(t => t.id !== id)
    }
  }
  
  const handleSubmit = () => {
    if (showEditModal.value) {
      const index = teachers.value.findIndex(t => t.id === form.value.id)
      teachers.value[index] = { ...form.value }
    } else {
      teachers.value.push({
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
      email: '',
      subject: ''
    }
  }
  </script>