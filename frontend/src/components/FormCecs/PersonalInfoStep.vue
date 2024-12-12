<template>
    <div class="space-y-4">
      <h2 class="text-2xl font-bold text-blue-700 mb-4">Información Personal</h2>
      
      <div>
        <label class="block mb-2">Nombre</label>
        <input 
          :value="studentName" 
          @input="updateStudentName"
          type="text" 
          required 
          class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Introduce tu nombre"
        />
      </div>
      
      <div>
        <label class="block mb-2">Género</label>
        <div class="flex space-x-4">
          <label class="flex items-center">
            <input 
              type="radio" 
              value="nen" 
              :checked="gender === 'nen'"
              @change="updateGender('nen')"
              required 
              class="mr-2"
            /> Niño
          </label>
          <label class="flex items-center">
            <input 
              type="radio" 
              value="nena" 
              :checked="gender === 'nena'"
              @change="updateGender('nena')"
              required 
              class="mr-2"
            /> Niña
          </label>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  const props = defineProps({
    studentName: {
      type: String,
      required: true
    },
    gender: {
      type: String,
      default: null
    }
  })
  
  const emit = defineEmits(['update:studentName', 'update:gender'])
  
  const updateStudentName = (event) => {
    emit('update:studentName', event.target.value)
  }
  
  const updateGender = (value) => {
    emit('update:gender', value)
  }
  </script>