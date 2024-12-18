<script setup>
defineProps({
  skills: {
    type: Object,
    required: true
  },
  getColor: {
    type: Function,
    required: true
  }
})
</script>

<template>
  <div class="flex flex-wrap gap-2">
    <div
      v-for="(value, skill) in skills"
      :key="skill"
      class="px-3 py-1 rounded-full text-sm font-medium"
      :class="[`bg-${getColor(value)}/10 text-${getColor(value)}`]"
    >
      {{ skill }}
    </div>
  </div>
</template>