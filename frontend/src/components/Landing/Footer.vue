<template>
  <footer class="bg-gray-800 text-white py-8 text-center">
    <p>&copy; {{ currentYear }} TGRUPIFY. Todos los derechos reservados.</p>
  </footer>
</template>

<script>
export default {
  name: 'Footer',
  computed: {
    currentYear() {
      return new Date().getFullYear();
    }
  }
}
</script>

<style scoped>
footer {
  background-color: #2d3748;
  color: #fff;
}
</style>