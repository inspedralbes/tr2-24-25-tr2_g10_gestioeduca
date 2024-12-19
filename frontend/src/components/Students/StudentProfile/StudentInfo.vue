<script setup>
defineProps({
  name: {
    type: String,
    required: true
  },
  course: {
    type: String,
    required: true
  },
  email: {
    type: String,
    required: true
  }
})
</script>

<template>
  <div class="flex-1">
    <h2 class="text-2xl font-bold text-gray-900">{{ name }}</h2>
    <div class="mt-1 text-gray-500">{{ course }}</div>
    <div class="mt-1 text-gray-500">{{ email }}</div>
  </div>
</template>