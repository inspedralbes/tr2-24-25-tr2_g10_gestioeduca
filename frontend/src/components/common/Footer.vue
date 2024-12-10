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
  background-color:  rgb(0 173 238 / 0.9);
  color: #fff;
}
</style>