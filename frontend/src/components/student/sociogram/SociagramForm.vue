<script setup>
import { ref, onMounted } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const formId = ref(route.params.formId); // Capturamos el ID del formulario
const formTitle = ref('');
const formComponents = ref([]);

onMounted(() => {
  // Simular contenido basado en el formulario seleccionado
  if (formId.value === "1") {
    formTitle.value = "Formulario 1: Evaluación";
    formComponents.value = ["Pregunta 1", "Pregunta 2"];
  } else if (formId.value === "2") {
    formTitle.value = "Formulario 2: Sociograma";
    formComponents.value = ["Gráfico 1", "Pregunta 1"];
  } else if (formId.value === "3") {
    formTitle.value = "Formulario 3: Autoevaluación";
    formComponents.value = ["Pregunta 1", "Reflexión"];
  } else if (formId.value === "4") {
    formTitle.value = "Formulario 4: Evaluación del Curso";
    formComponents.value = ["Pregunta 1", "Pregunta 2", "Feedback"];
  }
});
</script>

<template>
  <div>
    <h1>{{ formTitle }}</h1>
    <ul>
      <li v-for="component in formComponents" :key="component">
        {{ component }}
      </li>
    </ul>
  </div>
</template>
