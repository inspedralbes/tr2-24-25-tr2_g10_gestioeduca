<template>
    <div class="bg-white rounded-lg shadow-lg p-6">
      <h3 class="text-xl font-semibold mb-6 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        Formularios Pendientes
      </h3>
      <div class="space-y-4">
        <div v-for="form in forms" :key="form.id" 
          class="p-4 bg-gray-50 rounded-lg hover:bg-primary/5 transition-all cursor-pointer">
          <div class="flex items-center justify-between">
            <div>
              <h4 class="font-semibold text-gray-900">{{ form.title }}</h4>
              <p class="text-sm text-gray-500">{{ form.description }}</p>
            </div>
            <span class="px-3 py-1 text-xs font-medium rounded-full" :class="form.urgencyColor">
              {{ form.urgency }}
            </span>
          </div>
          <div class="mt-3 flex justify-between items-center">
            <button class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-primary/90 transition-colors">
              Completar
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  const forms = [
    {
      id: 1,
      title: 'Evaluación del Curso',
      description: 'Formulario para evaluar el contenido y metodología',
      urgency: 'Urgente',
      urgencyColor: 'bg-red-100 text-red-800',
    },
    {
      id: 2,
      title: 'Encuesta de Satisfacción',
      description: 'Comparte tu opinión sobre las instalaciones',
      urgency: 'Normal',
      urgencyColor: 'bg-blue-100 text-blue-800',
    },
    {
      id: 3,
      title: 'Autoevaluación',
      description: 'Reflexiona sobre tu desempeño',
      urgency: 'Próximo',
      urgencyColor: 'bg-green-100 text-green-800',
    }
  ];
  </script>