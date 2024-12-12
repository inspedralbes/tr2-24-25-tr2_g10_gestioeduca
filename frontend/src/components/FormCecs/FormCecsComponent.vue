<template>
    <div class="min-h-screen bg-blue-50 flex items-center justify-center p-4">
      <div class="w-full max-w-2xl bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Progress Bar Component -->
        <ProgressBar 
          v-if="questions.length > 0"
          :current-step="currentStep" 
          :total-steps="questions.length"
        />
  
        <form @submit.prevent="submitStep" class="p-6">
          <!-- Personal Info Step -->
          <PersonalInfoStep 
            v-if="currentStep === -1"
            :student-name="studentName"
            :gender="gender"
            @update:student-name="studentName = $event"
            @update:gender="gender = $event"
          />
  
          <!-- Question Steps -->
          <QuestionStep 
            v-else
            :question="questions[currentStep]"
            :question-index="currentStep"
            :students="students"
            :selected-students="responses[currentStep]"
            @update:selected-students="updateResponses($event)"
          />
  
          <!-- Navigation Controls -->
          <div class="flex justify-between mt-6">
            <button 
              type="button" 
              @click="previousStep" 
              v-if="currentStep > -1"
              class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-full"
            >
              Atrás
            </button>
            
            <button 
              type="submit" 
              class="ml-auto bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded-full"
            >
              {{ currentStep === questions.length - 1 ? 'Enviar' : 'Siguiente' }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import ProgressBar from './ProgressBar.vue'
  import PersonalInfoStep from './PersonalInfoStep.vue'
  import QuestionStep from './QuestionStep.vue'
  
  // Estado del formulario
  const studentName = ref('')
  const gender = ref(null)
  const currentStep = ref(-1)
  const students = ref([])
  const responses = ref([])
  const questions = ref([])
  
  // Cargar preguntas desde el archivo JSON
  onMounted(async () => {
    try {
      // Cargar preguntas desde public/questionsCesc.json
      const [questionsResponse, studentsResponse] = await Promise.all([
        fetch('/questionsCesc.json'),
        fetch('/students.json')
      ])
      
      questions.value = await questionsResponse.json()
      students.value = await studentsResponse.json()
  
      // Inicializar respuestas para las preguntas
      responses.value = questions.value.map(() => [])
    } catch (error) {
      console.error('Error cargando datos:', error)
    }
  })
  
  // Método para actualizar respuestas
  const updateResponses = (selectedStudents) => {
    responses.value[currentStep.value] = selectedStudents
  }
  
  // Método para avanzar/enviar
  const submitStep = () => {
    // Validación de selección de 3 estudiantes
    if (currentStep.value >= 0 && responses.value[currentStep.value].length !== 3) {
      alert('Por favor, selecciona 3 estudiantes')
      return
    }
  
    // Último paso: envío de formulario
    if (currentStep.value === questions.value.length - 1) {
      // Validación final
      if (!studentName.value || !gender.value) {
        alert('Por favor, completa la información personal')
        return
      }
  
      const formData = {
        studentName: studentName.value,
        gender: gender.value,
        responses: responses.value
      }
  
      console.log('Formulario completo:', formData)
      // Aquí podrías enviar los datos al backend
      alert('Cuestionario enviado correctamente')
      return
    }
  
    // Avanzar al siguiente paso
    currentStep.value++
  }
  
  // Método para retroceder
  const previousStep = () => {
    if (currentStep.value > -1) {
      currentStep.value--
    }
  }
  </script>
  
  <style scoped>
  input:checked + label {
    @apply bg-blue-500 text-white;
  }
  </style>