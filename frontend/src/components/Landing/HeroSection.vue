<template>
  <div class="text-center py-16">
    <h1 class="text-5xl font-bold text-gray-900">Bienvenido a GRUPIFY</h1>
    <p class="mt-4 text-lg text-gray-600">Explora nuestros servicios y productos.</p>
    <p class="mt-4 text-lg text-gray-600">
      Nuestro objetivo principal es facilitar la formación de grupos de trabajo en clases,
      asegurando la inclusión, equilibrio y transparencia en la asignación, mientras proporciona a los tutores
      herramientas visuales para analizar y mejorar el proceso.
    </p>
    <div class="mt-8">
      <router-link to="/login">
        <button
          class="rounded-md bg-indigo-600 px-6 py-2 text-white font-semibold hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-400">
          Empezar
        </button>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HeroSection'
}
</script>