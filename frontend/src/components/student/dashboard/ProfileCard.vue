<template>
  <div class="bg-white rounded-lg shadow-lg p-6">
    <div class="flex flex-col items-center">
      <div class="relative group">
        <img :src="avatarUrl" alt="Avatar" class="w-24 h-24 rounded-full object-cover mb-4">
        <div class="absolute inset-0 bg-black bg-opacity-50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer"
          @click="triggerFileInput">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
      </div>
      <input type="file" ref="fileInput" class="hidden" @change="handleFileChange" accept="image/*">
      <h2 class="text-2xl font-bold text-gray-800">{{ studentName }}</h2>
      <p class="text-gray-600">{{ studentClass }}</p>
      <p class="text-gray-500 text-sm">{{ studentEmail }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
  studentName: {
    type: String,
    default: 'Ana García'
  },
  studentClass: {
    type: String,
    default: '1º ESO A'
  },
  studentEmail: {
    type: String,
    default: 'ana.garcia@inspedralbes.cat'
  }
});

const avatarUrl = ref('https://api.dicebear.com/7.x/avataaars/svg?seed=Ana');
const fileInput = ref(null);

const triggerFileInput = () => {
  fileInput.value.click();
};

const handleFileChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      avatarUrl.value = e.target.result;
    };
    reader.readAsDataURL(file);
  }
};
</script>