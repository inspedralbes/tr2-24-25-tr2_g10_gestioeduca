<template>
    <div class="bg-white pt-24">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <ul role="list" class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12 xl:gap-16">
          <li v-for="person in people" :key="person.name" class="flex flex-col items-center text-center">
            <img class="w-40 h-40 rounded-full mx-auto" :src="person.imageUrl" alt="Foto del profesor" />
            <h3 class="mt-6 text-3xl font-semibold tracking-tight text-gray-900">{{ person.name }}</h3>
            <p class="mt-4 text-lg font-semibold text-indigo-600">{{ person.subject }}</p>
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script setup>
  const people = [
    {
      name: 'John Doe',
      subject: 'Història',
      imageUrl: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80',
    },
  ];
  </script>
  
  <style scoped>
  /* Asegura que las imágenes se vean centradas y con un diseño atractivo */
  ul {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 12px; /* Espacio entre las tarjetas */
  }
  
  li {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
  
  img {
    width: 150px;
    height: 150px;
    border-radius: 50%; /* Hace la imagen circular */
    object-fit: cover; /* Asegura que la imagen mantenga su proporción */
  }
  
  h3 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
  }
  
  p {
    font-size: 1rem;
  }
  </style>
  