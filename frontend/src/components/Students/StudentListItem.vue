<script setup>
import { useRouter } from 'vue-router'
import { PencilIcon, TrashIcon } from '@heroicons/vue/24/outline'
import { useStudentsStore } from '@/stores/studentsStore'
import { onMounted, computed } from 'vue'

const studentsStore = useStudentsStore()

onMounted(() => {
  // Llamar a la API al montar el componente
  studentsStore.fetchStudents()
})

// Usar propiedad computada para obtener los estudiantes desde el store de forma reactiva
const students = computed(() => studentsStore.students)

const router = useRouter()

const viewProfile = (studentId) => {
  router.push(`/alumnos/${studentId}`)
}

</script>

<template>
  <tr class="border-b hover:bg-gray-50 cursor-pointer" v-for="student in students" :key="student.id" @click="viewProfile(student.id)">
    <td class="py-4">
      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
          {{ student.name.split(' ').map(n => n[0]).join('').toUpperCase() }}
        </div>
        <span>{{ student.name }}</span>
      </div>
    </td>
    <td>{{ student.course }}</td>
    <td>{{ student.division }}</td>
    <td>
      <div class="flex items-center">
        <div class="w-20 bg-gray-200 rounded-full h-2.5">
          <div class="bg-primary h-2.5 rounded-full" :style="`width: ${student.attendance}%`"></div>
        </div>
        <span class="ml-2">{{ student.attendance }}%</span>
      </div>
    </td>
    <td>
      <div class="flex space-x-2">
        <button class="p-1 hover:text-primary" @click.stop>
          <PencilIcon class="w-5 h-5" />
        </button>
        <button class="p-1 hover:text-danger" @click.stop>
          <TrashIcon class="w-5 h-5" />
        </button>
      </div>
    </td>
  </tr>
</template>
