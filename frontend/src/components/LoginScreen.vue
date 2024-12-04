<template>
    <div class="login">
      <h1>Iniciar sesión</h1>
      <form @submit.prevent="handleLogin">
        <div class="form-group">
          <label for="username">Usuario</label>
          <input type="text" id="username" v-model="username" placeholder="Introduce tu usuario" required />
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" v-model="password" placeholder="Introduce tu contraseña" required />
        </div>
        <button type="submit" class="btn-login">Empezar</button>
      </form>
    </div>
  </template>
  
  <script>
  import { useAppStore } from '@/stores/app'; // Importamos el store de Pinia para gestionar el estado
  
  export default {
    name: 'LoginForm',
    data() {
      return {
        username: '',
        password: '',
      };
    },
    methods: {
      handleLogin() {
        const appStore = useAppStore();
        appStore.setCurrentUser({ username: this.username, role: 'student' });
  
        // Redirigir a la vista principal después del login
        this.$router.push('/home');
      }
    }
  };
  </script>
  
  <style scoped>
  .login {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  
  .form-group {
    margin-bottom: 15px;
  }
  
  input {
    width: 100%;
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #45a049;
  }
  </style>
  