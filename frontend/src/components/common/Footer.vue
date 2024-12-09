<template>
  <footer class="bg-primary text-white py-8 text-center">
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
  background-color: var(--primary-color);
  color: #fff;
}
</style>