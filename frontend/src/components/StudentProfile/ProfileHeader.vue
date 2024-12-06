<template>
  <header class="sticky top-0 z-50 bg-white shadow-md w-full">
    <nav class="flex items-center justify-between px-6 py-4 lg:px-8 lg:py-6" aria-label="Global">
      <div class="flex lg:flex-1">
        <router-link to="/" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Logo">
        </router-link>
      </div>
      <!-- Mobile menu button -->
      <div class="flex lg:hidden">
        <button @click="toggleMenu" type="button"
          class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
          <span class="sr-only">Open main menu</span>
          <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path v-if="!isMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16" />
            <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <!-- Desktop navigation -->
      <div class="hidden lg:flex lg:flex-1 lg:justify-end space-x-8">
        <!-- New buttons added here -->
        <button @click="$emit('show-asignatures')" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">
          Asignatures
        </button>
        <button @click="$emit('show-enquestes')" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">
          Enquestes
        </button>
        <button @click="$emit('show-contact')" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">
          Tancar Sessió
        </button>
      </div>
    </nav>

    <!-- Mobile menu -->
    <div v-show="isMenuOpen" class="lg:hidden">
      <div class="px-2 pt-2 pb-3 space-y-1">
        <button @click="handleContactClick"
          class="block w-full text-left px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-indigo-600">
          Contacto
        </button>
        <router-link to="/login"
          class="block px-3 py-2 text-base font-medium text-gray-900 hover:bg-gray-100 hover:text-indigo-600"
          @click="isMenuOpen = false">
          Empezar
        </router-link>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: 'NavBar',
  data() {
    return {
      isMenuOpen: false
    }
  },
  methods: {
    toggleMenu() {
      this.isMenuOpen = !this.isMenuOpen;
    },
    handleContactClick() {
      this.isMenuOpen = false;
      this.$emit('show-contact');
    }
  }
}
</script>

<style scoped>
/* Ajusta la altura de la barra de navegación y la separación de los elementos */
header {
  height: 80px; /* Aumenta la altura de la barra de navegación */
}

nav {
  width: 100%; /* Asegura que la barra de navegación ocupe todo el ancho */
}

@media (max-width: 1024px) {
  nav {
    padding: 0 20px; /* Ajusta el relleno para dispositivos más pequeños */
  }
}

@media (min-width: 1025px) {
  .lg\\:px-8 {
    padding-left: 40px; /* Espacio adicional para dispositivos grandes */
    padding-right: 40px; /* Espacio adicional para dispositivos grandes */
  }
}

/* Botones adicionales con margen entre ellos */
.hidden.lg\\:flex > button {
  margin-right: 20px; /* Espacio entre los botones */
}

/* Ajuste de los botones de la barra para que se vean bien en móviles */
.lg\\:hidden {
  padding: 10px; /* Ajusta el padding de los elementos de la barra */
}
</style>
