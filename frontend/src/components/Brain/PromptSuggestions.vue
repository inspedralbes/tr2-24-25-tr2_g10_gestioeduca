<script setup>
import { ref } from 'vue';

const suggestions = [
  "¿Cómo puedo identificar situaciones de bullying en mi clase?",
  "¿Qué estrategias hay para mejorar la integración del grupo?",
  "¿Cómo puedo ayudar a un alumno que está aislado?",
  "Necesito ideas para actividades de trabajo en equipo",
];

const emit = defineEmits(['select']);

const handleSelect = (suggestion) => {
  emit('select', suggestion);
};
</script>

<template>
  <div class="px-4 py-2 space-x-2 flex flex-wrap gap-2">
    <button
      v-for="suggestion in suggestions"
      :key="suggestion"
      @click="handleSelect(suggestion)"
      class="text-xs px-3 py-1 rounded-full bg-gray-100 hover:bg-gray-200 text-gray-600 transition-colors"
    >
      {{ suggestion }}
    </button>
  </div>
</template>