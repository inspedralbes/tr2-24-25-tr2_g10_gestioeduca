<script setup>
import { ref, computed } from 'vue'
import { useRoute } from 'vue-router'
import { 
  ArrowDownTrayIcon, 
  ChatBubbleLeftRightIcon,
  ChartBarIcon,
  EyeIcon
} from '@heroicons/vue/24/outline'
import ResponsesTable from '../../components/Forms/Responses/ResponsesTable.vue'
import ResponseStats from '../../components/Forms/Responses/ResponseStats.vue'
import ResponseFilters from '../../components/Forms/Responses/ResponseFilters.vue'
import ResponseDetails from '../../components/Forms/Responses/ResponseDetails.vue'
import BulkActionsMenu from '../../components/Forms/Responses/BulkActionsMenu.vue'
import { useFormAnalyticsStore } from '../../stores/formAnalytics'

const route = useRoute()
const formAnalyticsStore = useFormAnalyticsStore()
const showResponseDetails = ref(false)
const selectedResponse = ref(null)
const selectedResponses = ref([])
const searchQuery = ref('')
const selectedGrade = ref('all')
const selectedStatus = ref('all')

// Mock data - In a real app, this would come from an API
const form = ref({
  id: route.params.id,
  title: 'Evaluación Trimestral',
  description: 'Evaluación del primer trimestre',
  questions: [
    {
      id: 1,
      title: '¿Cómo valorarías tu comprensión de la materia?',
      type: 'multiple',
      options: [
        { text: 'Excelente', value: 4 },
        { text: 'Buena', value: 3 },
        { text: 'Regular', value: 2 },
        { text: 'Necesito ayuda', value: 1 }
      ]
    },
    {
      id: 2,
      title: '¿Qué temas necesitas reforzar?',
      type: 'text'
    },
    {
      id: 3,
      title: '¿Qué aspectos de la clase te resultan más útiles?',
      type: 'checkbox',
      options: [
        { text: 'Explicaciones teóricas', value: 0 },
        { text: 'Ejercicios prácticos', value: 1 },
        { text: 'Trabajo en grupo', value: 2 },
        { text: 'Material complementario', value: 3 }
      ]
    }
  ]
})

const responses = ref([
  {
    id: 1,
    studentId: 1,
    studentName: 'Ana García',
    grade: '1º ESO',
    submittedAt: '2024-03-10T10:30:00',
    status: 'completed',
    answers: [
      { questionId: 1, value: 'Buena' },
      { questionId: 2, value: 'Necesito reforzar álgebra y ecuaciones' },
      { questionId: 3, value: ['Ejercicios prácticos', 'Trabajo en grupo'] }
    ]
  },
  {
    id: 2,
    studentId: 2,
    studentName: 'Carlos Rodríguez',
    grade: '2º ESO',
    submittedAt: '2024-03-11T09:15:00',
    status: 'completed',
    answers: [
      { questionId: 1, value: 'Regular' },
      { questionId: 2, value: 'Geometría y trigonometría' },
      { questionId: 3, value: ['Explicaciones teóricas', 'Material complementario'] }
    ]
  },
  {
    id: 3,
    studentId: 3,
    studentName: 'Laura Martínez',
    grade: '1º ESO',
    submittedAt: '2024-03-11T11:45:00',
    status: 'partial',
    answers: [
      { questionId: 1, value: 'Excelente' },
      { questionId: 2, value: 'Ninguno en particular' }
    ]
  }
])

const filteredResponses = computed(() => {
  return responses.value.filter(response => {
    const matchesSearch = response.studentName.toLowerCase().includes(searchQuery.value.toLowerCase())
    const matchesGrade = selectedGrade.value === 'all' || response.grade === selectedGrade.value
    const matchesStatus = selectedStatus.value === 'all' || response.status === selectedStatus.value
    return matchesSearch && matchesGrade && matchesStatus
  })
})

const handleViewResponse = (response) => {
  selectedResponse.value = response
  showResponseDetails.value = true
}

const handleExportCSV = () => {
  const csvContent = generateCSV(responses.value)
  downloadCSV(csvContent, `${form.value.title}_responses.csv`)
}

const handleExportJSON = () => {
  const jsonContent = JSON.stringify(responses.value, null, 2); // Formato legible con 2 espacios de indentación
  downloadJSON(jsonContent, `${form.value.title}_responses.json`);
}

const handleExportPDF = () => {
  console.log('Exporting to PDF...')
}

const handleBulkAction = async (action) => {
  if (action === 'analyze') {
    await formAnalyticsStore.analyzeResponses(form.value.id, selectedResponses.value)
  } else if (action === 'export') {
    handleExportCSV()
  }
}

const generateCSV = (responses) => {
  const headers = ['Estudiante', 'Curso', 'Fecha', 'Estado']
  form.value.questions.forEach(q => headers.push(q.title))
  
  const rows = responses.map(response => {
    const row = [
      response.studentName,
      response.grade,
      new Date(response.submittedAt).toLocaleString(),
      response.status
    ]
    
    form.value.questions.forEach(question => {
      const answer = response.answers.find(a => a.questionId === question.id)
      row.push(answer ? Array.isArray(answer.value) ? answer.value.join('; ') : answer.value : '')
    })
    
    return row
  })
  
  return [headers, ...rows].map(row => row.join(',')).join('\n')
}

const downloadCSV = (content, filename) => {
  const blob = new Blob([content], { type: 'text/csv;charset=utf-8;' })
  const link = document.createElement('a')
  link.href = URL.createObjectURL(blob)
  link.download = filename
  link.click()
}

const downloadJSON = (content, filename) => {
  const blob = new Blob([content], { type: 'application/json;charset=utf-8;' })
  const link = document.createElement('a')
  link.href = URL.createObjectURL(blob)
  link.download = filename
  link.click()
}
</script>

<template>
  <div class="p-6">
    <div class="flex justify-between items-start mb-6">
      <div>
        <h1 class="text-2xl font-bold">{{ form.title }}</h1>
        <p class="text-gray-500">{{ form.description }}</p>
      </div>
      
      <div class="flex space-x-3">
        <button 
          class="btn bg-white hover:bg-gray-50 text-gray-700 border flex items-center space-x-2"
          @click="handleExportCSV"
        >
          <ArrowDownTrayIcon class="w-5 h-5" />
          <span>CSV</span>
        </button>
        <button 
          class="btn bg-white hover:bg-gray-50 text-gray-700 border flex items-center space-x-2"
          @click="handleExportJSON"
        >
          <ArrowDownTrayIcon class="w-5 h-5" />
          <span>JSON</span>
        </button>
        <button 
          class="btn bg-white hover:bg-gray-50 text-gray-700 border flex items-center space-x-2"
          @click="handleExportPDF"
        >
          <ArrowDownTrayIcon class="w-5 h-5" />
          <span>PDF</span>
        </button>
      </div>
    </div>

    <ResponseStats :responses="responses" />

    <div class="flex justify-between items-center mb-6">
      <ResponseFilters
        v-model:searchQuery="searchQuery"
        v-model:selectedGrade="selectedGrade"
        v-model:selectedStatus="selectedStatus"
      />
      
      <BulkActionsMenu
        :selected-count="selectedResponses.length"
        @action="handleBulkAction"
      />
    </div>

    <ResponsesTable
      :responses="filteredResponses"
      v-model:selected="selectedResponses"
      @view="handleViewResponse"
    />

    <ResponseDetails
      v-model="showResponseDetails"
      :response="selectedResponse"
      :form="form"
    />
  </div>
</template>
