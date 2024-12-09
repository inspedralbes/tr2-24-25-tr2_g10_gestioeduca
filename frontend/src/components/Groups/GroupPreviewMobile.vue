<script setup>
import { computed } from 'vue'

const props = defineProps({
  groups: {
    type: Array,
    required: true
  }
})

const getGroupStats = (students) => {
  if (!students.length) return { performance: 0, attendance: 0 }
  
  const performance = students.reduce((sum, s) => sum + s.performance, 0) / students.length
  const attendance = students.reduce((sum, s) => sum + s.attendance, 0) / students.length
  
  return { performance, attendance }
}
</script>

<template>
  <div class="space-y-4">
    <div
      v-for="group in groups"
      :key="group.id"
      class="bg-white rounded-lg shadow-md p-4"
    >
      <!-- Group Header -->
      <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">{{ group.name }}</h3>
        <div class="text-sm text-gray-500">
          {{ group.students.length }} estudiantes
        </div>
      </div>

      <!-- Students List -->
      <div class="space-y-2">
        <div
          v-for="student in group.students"
          :key="student.id"
          class="bg-gray-50 rounded-lg p-3"
        >
          <div class="flex justify-between items-center">
            <span class="font-medium">{{ student.name }}</span>
            <div class="flex space-x-3 text-sm">
              <span class="text-success">{{ student.performance }}%</span>
              <span class="text-primary">{{ student.attendance }}%</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Group Stats -->
      <div class="mt-4 pt-4 border-t space-y-2">
        <div class="flex justify-between items-center text-sm">
          <span class="text-gray-500">Rendimiento promedio:</span>
          <span class="font-medium">
            {{ getGroupStats(group.students).performance.toFixed(1) }}%
          </span>
        </div>
        <div class="flex justify-between items-center text-sm">
          <span class="text-gray-500">Asistencia promedio:</span>
          <span class="font-medium">
            {{ getGroupStats(group.students).attendance.toFixed(1) }}%
          </span>
        </div>
      </div>
    </div>
  </div>
</template>