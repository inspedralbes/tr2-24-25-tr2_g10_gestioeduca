<script setup>
import { ref } from 'vue';
import SocialLogin from './SocialLogin.vue';
import PasswordInput from './PasswordInput.vue';
import TextInput from './TextInput.vue';

const username = ref('');
const password = ref('');
const isLoading = ref(false);
const msgError = ref('');

// Valida el formulari
const validateForm = () => {
  if (!username.value) {
    msgError.value = "El nom d'usuari és obligatori";
    return false;
  }
  if (!password.value) {
    msgError.value = 'La contrasenya és obligatoria';
    return false;
  }
  return true;
};

// Envia el formulari de login
const gestioSubmit = async (e) => {
  e.preventDefault();
  msgError.value = '';
  
  if (!validateForm()) return;
  
  isLoading.value = true;
  try {
    // Envia el formulari i espera 1 segon per a la resposta amb les dades introduïdes
    await new Promise(resolve => setTimeout(resolve, 1000));
    console.log('Formulari enviat:', { username: username.value, password: password.value });
  } catch (err) {
    msgError.value = "No s'ha pogut iniciar la sessió. Si us plau, torna-ho a provar.";
  } finally {
    isLoading.value = false;
  }
};
</script>

<template>
  <div class="login-container">
    <div class="login-content">
      <div class="login-header">
        <h1 class="bg-red-500">Benvingut!</h1>
        <p>Gestió d'informació académica</p>
      </div>

      <form @submit="gestioSubmit" class="login-form">
        <TextInput
          v-model="username"
          placeholder="Nom d'usuari"
          :has-msgError="msgError && !username"
        />

        <PasswordInput
          v-model="password"
          :has-msgError="msgError && !password"
        />

        <div class="forgot-password">
          <a href="#">Heu oblidat la contrasenya?</a>
        </div>

        <button 
          type="submit" 
          class="sign-in-button"
          :disabled="isLoading"
        >
          {{ isLoading ? 'Iniciant sessió...' : 'Iniciar sessió' }}
        </button>

        <div v-if="msgError" class="msgError-message">
          {{ msgError }}
        </div>

        <div class="divider"></div>

        <SocialLogin />
      </form>
    </div>
  </div>
</template>

<style scoped>
  @import '@/assets/output.css';
</style>