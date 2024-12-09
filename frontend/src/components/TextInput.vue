<script setup>
defineProps({
  modelValue: String,
  placeholder: String,
  hasError: Boolean
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
  <div class="input-wrapper">
    <input
      type="text"
      :value="modelValue"
      @input="emit('update:modelValue', $event.target.value)"
      :placeholder="placeholder"
      :class="{ 'error': hasError }"
    >
  </div>
</template>

<style scoped>

</style>