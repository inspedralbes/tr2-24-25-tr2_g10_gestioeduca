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
        <TextInput v-model="username" placeholder="Nom d'usuari" :has-msgError="msgError && !username" />

        <PasswordInput v-model="password" :has-msgError="msgError && !password" />

        <div class="forgot-password">
          <a href="#">Heu oblidat la contrasenya?</a>
        </div>

        <button type="submit" class="sign-in-button" :disabled="isLoading">
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

.login-container {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 1rem;
}

.login-content {
  width: 100%;
  max-width: 380px;
  background: var(--card-background);
  padding: 2rem 1.5rem;
  border-radius: 1.25rem;
  backdrop-filter: blur(10px);
}

.login-header {
  text-align: center;
  margin-bottom: 2rem;
}

h1 {
  font-size: 1.75rem;
  font-weight: 600;
  color: var(--text-primary);
  margin-bottom: 0.5rem;
}

p {
  color: var(--text-secondary);
}

.login-form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

.forgot-password {
  text-align: right;
  margin-top: -0.5rem;
}

.forgot-password a {
  color: var(--text-secondary);
  font-size: 0.875rem;
  text-decoration: none;
}

.sign-in-button {
  background: var(--primary-color);
  color: white;
  border: none;
  padding: 0.875rem;
  border-radius: 0.75rem;
  font-weight: 500;
  font-size: 1rem;
  cursor: pointer;
  transition: opacity 0.2s;
  margin-top: 0.5rem;
}

.sign-in-button:hover {
  opacity: 0.9;
}

.sign-in-button:disabled {
  opacity: 0.7;
  cursor: not-allowed;
}

.error-message {
  color: #ff4d4f;
  font-size: 0.875rem;
  text-align: center;
}

.divider {
  position: relative;
  margin: 1.5rem 0;
  height: 1px;
  background: rgba(0, 0, 0, 0.1);
}

@media (min-width: 768px) {
  .login-content {
    padding: 2.5rem;
  }
}
</style>