<script setup>
import { ref } from 'vue'
import { PlusIcon } from '@heroicons/vue/24/outline'
import StudentListComponent from '../../components/Students/StudentList.vue'
import StudentFilters from '../../components/Students/StudentFilters.vue'
import { useStudentSearch } from '../../composables/useStudentSearch'

const students = ref([
  {
    id: 1,
    name: 'Ana García',
    email: 'ana.garcia@escuela.edu',
    grade: '1º ESO',
    attendance: 95,
    performance: 88,
    status: 'active'
  },
  {
    id: 2,
    name: 'Carlos Rodríguez',
    email: 'carlos.rodriguez@escuela.edu',
    grade: '2º ESO',
    attendance: 92,
    performance: 76,
    status: 'active'
  },
  {
    id: 3,
    name: 'Laura Martínez',
    email: 'laura.martinez@escuela.edu',
    grade: '1º ESO',
    attendance: 98,
    performance: 94,
    status: 'active'
  },
  {
    id: 4,
    name: 'Miguel Sánchez',
    email: 'miguel.sanchez@escuela.edu',
    grade: '3º ESO',
    attendance: 85,
    performance: 79,
    status: 'inactive'
  }
])

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