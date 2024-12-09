<script setup>
import { googleAuthCodeLogin } from "vue3-google-login";

const gestioGoogleLogin = async () => {
  try {
    const response = await googleAuthCodeLogin();
    console.log('Login amb Google correctament!', response);
    //Enviar token al backend
  } catch (error) {
    console.error('Error al iniciar sessio amb Google:', error);
  }
};
</script>

<template>
  <div class="social-login">
    <button
      class="social-button"
      @click="gestioGoogleLogin"
      aria-label="Entra amb Google"
    >
      <img 
        src="/icons/google.svg" 
        alt="Google icon"
      >
      <span>Google / @inspedralbes.cat</span>
    </button>
  </div>
</template>

<style scoped>

</style>