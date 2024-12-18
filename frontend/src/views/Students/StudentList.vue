<script setup>
import { ref, onMounted } from 'vue'
import { PlusIcon } from '@heroicons/vue/24/outline'
import StudentListComponent from '../../components/Students/StudentList.vue'
import StudentFilters from '../../components/Students/StudentFilters.vue'
import { useStudentSearch } from '../../composables/useStudentSearch'

const students = ref([])
onMounted(async () => {
  try {
    const response = await fetch('http://localhost:8000/api/users')
    if (response.ok) {
      const data = await response.json()
      // Filtrar estudiantes solo con rol 2
      students.value = data.filter(student => student.role_id === 2)
    } else {
      console.error('Error fetching students:', response.statusText)
    }
  } catch (error) {
    console.error('Error fetching students:', error)
  }
}) 

const {
  searchQuery,
  selectedGrade,
  selectedStatus,
  filteredStudents
} = useStudentSearch(students)
</script>

<template>
  <div class="p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Gestión de Alumnos</h1>
      <button class="btn btn-primary flex items-center space-x-2">
        <PlusIcon class="w-5 h-5" />
        <span>Nuevo Alumno</span>
      </button>
    </div>

    <StudentFilters
      v-model:searchQuery="searchQuery"
      v-model:selectedGrade="selectedGrade"
      v-model:selectedStatus="selectedStatus"
    />

    <StudentListComponent :students="filteredStudents" />
  </div>
</template>