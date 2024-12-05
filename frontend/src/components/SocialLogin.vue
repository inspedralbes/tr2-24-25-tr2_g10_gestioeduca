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
    <button class="social-button" @click="gestioGoogleLogin" aria-label="Entra amb Google">
      <img src="/icons/google.svg" alt="Google icon">
      <span>Google / @inspedralbes.cat</span>
    </button>
  </div>
</template>

<style scoped>
.social-login {
  display: flex;
  justify-content: center;
  width: 100%;
}

.social-button {
  width: 100%;
  height: 2.75rem;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 0.75rem;
  background: var(--input-background);
  cursor: pointer;
  transition: all 0.2s;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 0.75rem;
  font-size: 0.875rem;
  color: var(--text-primary);
  font-weight: 500;
}

.social-button:hover {
  border-color: var(--primary-color);
  transform: translateY(-2px);
}

.social-button img {
  width: 1.25rem;
  height: 1.25rem;
  opacity: 0.8;
}
</style>