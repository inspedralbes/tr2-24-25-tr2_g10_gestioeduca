<template>
    <div class="landing">
      <h1>GRUPIFY</h1>
      <p>Haz clic en el siguiente botón para empezar</p>
      <router-link to="/login">
        <button class="btn-start">Empezar</button>
      </router-link>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LandingScreen',
  };
  </script>
  
  <style scoped>
  .landing {
    text-align: center;
    margin-top: 50px;
  }
  .btn-start {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  .btn-start:hover {
    background-color: #45a049;
  }
  </style>
  