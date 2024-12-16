<template>
    <div class="space-y-6">
      <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold">Gestió de Formularis</h1>
        <button @click="showAddModal = true" 
          class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary/90 flex items-center space-x-2">
          <PlusIcon class="w-5 h-5" />
          <span>Nou Formulari</span>
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
            <tr v-for="form in forms" :key="form.id">
              <td class="px-6 py-4 whitespace-nowrap">{{ form.title }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ form.type }}</td>
              <td class="px-6 py-4 whitespace-nowrap">{{ form.status }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-right space-x-2">
                <button @click="editForm(form)" 
                  class="text-primary hover:text-primary/80">
                  <PencilIcon class="w-5 h-5" />
                </button>
                <button @click="deleteForm(form.id)" 
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
            {{ showEditModal ? 'Editar' : 'Nou' }} Formulari
          </h2>
          <form @submit.prevent="handleSubmit" class="space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700">Títol</label>
              <input v-model="form.title" type="text" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Tipus</label>
              <select v-model="form.type" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                <option value="Evaluación">Evaluación</option>
                <option value="Encuesta">Encuesta</option>
                <option value="Test">Test</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700">Estat</label>
              <select v-model="form.status" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                <option value="Activo">Activo</option>
                <option value="Borrador">Borrador</option>
                <option value="Cerrado">Cerrado</option>
              </select>
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
  
  const headers = ['Títol', 'Tipus', 'Estat']
  const forms = ref([
    { id: 1, title: 'Evaluación Trimestral', type: 'Evaluación', status: 'Activo' },
    { id: 2, title: 'Encuesta de Satisfacción', type: 'Encuesta', status: 'Borrador' }
  ])
  
  const showAddModal = ref(false)
  const showEditModal = ref(false)
  const form = ref({
    title: '',
    type: '',
    status: ''
  })
  
  const editForm = (formData) => {
    form.value = { ...formData }
    showEditModal.value = true
  }
  
  const deleteForm = (id) => {
    if (confirm('¿Estás seguro de que quieres eliminar este formulario?')) {
      forms.value = forms.value.filter(f => f.id !== id)
    }
  }
  
  const handleSubmit = () => {
    if (showEditModal.value) {
      const index = forms.value.findIndex(f => f.id === form.value.id)
      forms.value[index] = { ...form.value }
    } else {
      forms.value.push({
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
      title: '',
      type: '',
      status: ''
    }
  }
  </script>