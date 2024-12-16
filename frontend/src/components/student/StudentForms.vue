<template>
  <div class="space-y-6">
    <h2 class="text-2xl font-bold">Formularios</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="form in forms" :key="form.id" 
        class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-2">{{ form.title }}</h3>
        <p class="text-gray-600 mb-4">{{ form.description }}</p>
        <div class="flex justify-between items-center">
          <span class="text-sm text-gray-500">Fecha límite: {{ form.dueDate }}</span>
          <button 
            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90"
            @click="handleFormClick(form.id)">
            Completar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router' 

const router = useRouter() 

const forms = ref([
  {
    id: 1,
    title: 'Evaluación del Curso',
    description: 'Formulario para evaluar el contenido y metodología del curso',
    dueDate: '20 Mayo'
  },
  {
    id: 2,
    title: 'Encuesta de Satisfacción',
    description: 'Comparte tu opinión sobre las instalaciones y servicios',
    dueDate: '25 Mayo'
  },
  {
    id: 3,
    title: 'Autoevaluación',
    description: 'Reflexiona sobre tu desempeño en el curso',
    dueDate: '30 Mayo'
  },
  {
    id: 4,
    title: 'CESC- Conducta y Experiencias Sociales en Clase',
    description: 'Formulario para la detección e intervención en casos de acoso escolar',
    dueDate: '20 Mayo'
  },
  {
    id: 5,
    title: 'Evaluación de Sociagrama',
    description: 'Formulario para evaluar la estructura de las relaciones grupales',
  }
])

const handleFormClick = (formId) => {
  if (formId === 4) {
    // Redirigir al formulario CESC
    router.push({ name: 'formCecs' })
  } else if (formId === 5) {
    // Redirigir al formulario Sociograma
    router.push({ name: 'sociogramTest' })
  } else {
    console.log(`Formulario con ID ${formId} no tiene una ruta específica.`)
  }
}
</script>