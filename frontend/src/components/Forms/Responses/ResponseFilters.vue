<script setup>
defineProps({
  searchQuery: String,
  selectedGrade: String,
  selectedStatus: String
})

defineEmits(['update:searchQuery', 'update:selectedGrade', 'update:selectedStatus'])
</script>

<template>
  <div class="flex space-x-4">
    <input
      :value="searchQuery"
      @input="$emit('update:searchQuery', $event.target.value)"
      type="text"
      placeholder="Buscar por nombre..."
      class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
    />
    
    <select
      :value="selectedGrade"
      @change="$emit('update:selectedGrade', $event.target.value)"
      class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
    >
      <option value="all">Todos los cursos</option>
      <option value="1º ESO">1º ESO</option>
      <option value="2º ESO">2º ESO</option>
      <option value="3º ESO">3º ESO</option>
      <option value="4º ESO">4º ESO</option>
    </select>

    <select
      :value="selectedStatus"
      @change="$emit('update:selectedStatus', $event.target.value)"
      class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
    >
      <option value="all">Todos los estados</option>
      <option value="completed">Completados</option>
      <option value="partial">Parciales</option>
    </select>
  </div>
</template>