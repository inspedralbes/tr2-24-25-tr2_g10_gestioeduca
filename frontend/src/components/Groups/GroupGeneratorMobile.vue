<script setup>
import { ref, computed } from 'vue'
import { generateGroups } from '@/components/utils/groupGenerator.js'

const props = defineProps({
  students: {
    type: Array,
    required: true
  }
})

const emit = defineEmits(['generate'])

const groupSize = ref(4)
const balanceBy = ref('none')
const generatedGroups = ref([])

const balanceOptions = [
  { value: 'none', label: 'Aleatorio' },
  { value: 'performance', label: 'Rendimiento' },
  { value: 'attendance', label: 'Asistencia' }
]

const handleGenerate = () => {
  try {
    const options = {
      groupSize: groupSize.value,
      balanceBy: balanceBy.value === 'none' ? null : balanceBy.value
    }
    
    const groups = generateGroups(props.students, options)
    generatedGroups.value = groups
    emit('generate', groups)
  } catch (error) {
    console.error('Error al generar grupos:', error)
  }
}
</script>

<template>
  <div class="bg-white rounded-lg shadow-md p-4">
    <h2 class="text-lg font-semibold mb-4">Generador de Grupos</h2>
    
    <div class="space-y-4">
      <!-- Group Size -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
          Tamaño de los grupos
        </label>
        <input
          v-model.number="groupSize"
          type="number"
          min="2"
          :max="students.length"
          class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary focus:border-transparent"
        />
      </div>
      
      <!-- Balance Option -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
          Equilibrar por
        </label>
        <select
          v-model="balanceBy"
          class="w-full px-3 py-2 border rounded-md focus:ring-2 focus:ring-primary focus:border-transparent"
        >
          <option
            v-for="option in balanceOptions"
            :key="option.value"
            :value="option.value"
          >
            {{ option.label }}
          </option>
        </select>
      </div>

      <!-- Generate Button -->
      <button
        @click="handleGenerate"
        class="w-full btn btn-primary"
      >
        Generar Grupos
      </button>
    </div>
  </div>
</template>