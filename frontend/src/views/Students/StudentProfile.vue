<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import StudentProfile from '../../components/Students/StudentProfile/StudentProfile.vue'
import FormAssignments from '../../components/Students/StudentProfile/FormAssignments.vue'

const route = useRoute()
const student = ref(null)
const formAssignments = ref([
  {
    id: 1,
    formId: 1,
    formTitle: 'Evaluación Trimestral de Matemáticas',
    assignedDate: '2024-03-10',
    dueDate: '2024-03-17',
    division: 'pending'
  },
  {
    id: 2,
    formId: 2,
    formTitle: 'Cuestionario de Hábitos de Estudio',
    assignedDate: '2024-03-05',
    dueDate: '2024-03-12',
    division: 'completed'
  },
  {
    id: 3,
    formId: 3,
    formTitle: 'Evaluación de Física y Química',
    assignedDate: '2024-02-28',
    dueDate: '2024-03-07',
    division: 'expired'
  }
])

onMounted(async () => {
  // In a real application, this would be an API call
  // For now, we'll use mock data
  student.value = {
    id: Number(route.params.id),
    name: 'Ana García',
    course: '1º ESO A',
    email: 'ana.garcia@escuela.edu',
    image: '',
    skills: {
      Colaboración: 85,
      Comunicación: 78,
      Responsabilidad: 92,
      Liderazgo: 70,
      'Resolución de Problemas': 88,
      'Pensamiento Crítico': 82,
      Adaptabilidad: 75,
      Empatía: 90
    }
  }
})
</script>

<template>
  <div class="p-6">
    <div class="mb-6">
      <h1 class="text-2xl font-bold">Perfil del Estudiante</h1>
    </div>

    <div v-if="student" class="space-y-6">
      <StudentProfile :student="student" />
      <FormAssignments :assignments="formAssignments" />
    </div>
    <div v-else class="text-center py-8 text-gray-500">
      Cargando perfil...
    </div>
  </div>
</template>