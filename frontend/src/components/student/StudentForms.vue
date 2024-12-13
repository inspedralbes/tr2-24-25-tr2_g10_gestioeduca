<template>
  <div class="space-y-6">
    <h2 class="text-2xl font-bold">Formularios</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="form in forms" :key="form.id" 
        class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-semibold mb-2">{{ form.title }}</h3>
        <p class="text-gray-600 mb-4">{{ form.description }}</p>
        <div class="flex justify-between items-center">
          <button 
            v-if="form.id === 1 && !isFormCompleted('sociogram')" 
            @click="startSociogram"
            class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary/90"
          >
            Completar
          </button>
          <div 
            v-else-if="form.id === 1 && isFormCompleted('sociogram')"
            class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg flex items-center gap-2"
          >
            <CheckCircleIcon class="w-5 h-5 text-green-500" />
            Completado
          </div>
          <button 
            v-else 
            class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg cursor-not-allowed"
            disabled
          >
            Próximamente
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import { CheckCircleIcon } from '@heroicons/vue/24/outline';

const router = useRouter();
const forms = ref([
  {
    id: 1,
    title: 'Evaluación de Sociagrama',
    description: 'Formulario para evaluar la estructura de las relaciones grupales',
  }
]);

const isFormCompleted = (formId) => {
  const completedForms = JSON.parse(localStorage.getItem('completedForms') || '[]');
  return completedForms.includes(formId);
};

const startSociogram = () => {
  router.push('/student/forms/sociogram');
};
</script>