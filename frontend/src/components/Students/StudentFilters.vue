<script setup>
defineProps({
  searchQuery: String,
  selectedGrade: String,
  selectedStatus: String
})

defineEmits(['update:searchQuery', 'update:selectedGrade', 'update:selectedStatus'])
</script>

<template>
  <div class="bg-white rounded-lg shadow p-4 mb-6">
    <div class="flex flex-wrap gap-4">
      <div class="flex-1 min-w-[200px]">
        <input
          :value="searchQuery"
          @input="$emit('update:searchQuery', $event.target.value)"
          type="text"
          placeholder="Buscar por nombre o email..."
          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
        />
      </div>
      <div class="flex space-x-4">
        <select
          :value="selectedGrade"
          @change="$emit('update:selectedGrade', $event.target.value)"
          class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
        >
          <option value="all">Todos los cursos</option>
          <option value="1">1º ESO</option>
          <option value="2">2º ESO</option>
          <option value="3">3º ESO</option>
          <option value="4">4º ESO</option>
        </select>
        <select
          :value="selectedStatus"
          @change="$emit('update:selectedStatus', $event.target.value)"
          class="px-4 py-2 border rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
        >
          <option value="all">Todos los estados</option>
          <option value="active">Activos</option>
          <option value="inactive">Inactivos</option>
        </select>
      </div>
    </div>
  </div>
</template>