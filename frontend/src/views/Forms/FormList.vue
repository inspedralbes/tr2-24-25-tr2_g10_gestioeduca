<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { 
  PlusIcon, 
  FunnelIcon,
  DocumentDuplicateIcon,
  PencilIcon,
  TrashIcon,
  EyeIcon,
  UserGroupIcon
} from '@heroicons/vue/24/outline'

const router = useRouter()
const searchQuery = ref('')
const selectedStatus = ref('all')
const selectedDate = ref('all')
const showAssignModal = ref(false)
const selectedForm = ref(null)

const forms = ref([
  {
    id: 1,
    title: 'Evaluación Trimestral',
    description: 'Evaluación del primer trimestre',
    status: 'active',
    responses: 24,
    createdAt: '2024-02-15'
  },
  {
    id: 2,
    title: 'Cuestionario de Hábitos de Estudio',
    description: 'Evaluación de hábitos y técnicas de estudio',
    status: 'active',
    responses: 12,
    createdAt: '2024-02-20'
  }
])

const students = ref([
  {
    id: 1,
    name: 'Ana García',
    grade: '1º ESO'
  },
  {
    id: 2,
    name: 'Carlos Rodríguez',
    grade: '2º ESO'
  },
  {
    id: 3,
    name: 'Laura Martínez',
    grade: '1º ESO'
  }
])

const navigateToCreate = () => {
  router.push({ name: 'CreateForm' })
}

const openAssignModal = (form) => {
  selectedForm.value = form
  showAssignModal.value = true
}

const handleFormAssigned = (assignments) => {
  console.log('Form assigned to students:', assignments)
  alert('Formulario asignado correctamente a los estudiantes seleccionados')
}
</script>

<template>
  <div class="p-4 sm:p-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
      <h1 class="text-2xl font-bold">Formularios</h1>
      <button 
        @click="navigateToCreate"
        class="btn btn-primary flex items-center justify-center space-x-2 w-full sm:w-auto"
      >
        <PlusIcon class="w-5 h-5" />
        <span>Nuevo Formulario</span>
      </button>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-lg shadow p-4 mb-6">
      <div class="flex flex-col sm:flex-row gap-4">
        <div class="flex-1">
          <input
            v-model="searchQuery"
            type="text"
            placeholder="Buscar formularios..."
            class="w-full px-4 py-2 border rounded-lg"
          />
        </div>
        <div class="flex flex-col sm:flex-row gap-4">
          <select
            v-model="selectedStatus"
            class="px-4 py-2 border rounded-lg"
          >
            <option value="all">Todos los estados</option>
            <option value="active">Activos</option>
            <option value="draft">Borradores</option>
            <option value="closed">Cerrados</option>
          </select>
          <select
            v-model="selectedDate"
            class="px-4 py-2 border rounded-lg"
          >
            <option value="all">Todas las fechas</option>
            <option value="today">Hoy</option>
            <option value="week">Esta semana</option>
            <option value="month">Este mes</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Forms List -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
      <!-- Mobile View -->
      <div class="block sm:hidden">
        <div class="divide-y">
          <div
            v-for="form in forms"
            :key="form.id"
            class="p-4 hover:bg-gray-50"
          >
            <div class="mb-2">
              <h3 class="font-medium text-gray-900">{{ form.title }}</h3>
              <p class="text-sm text-gray-500">{{ form.description }}</p>
            </div>
            <div class="flex items-center justify-between mb-2">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                :class="{
                  'bg-green-100 text-green-800': form.status === 'active',
                  'bg-gray-100 text-gray-800': form.status === 'draft',
                  'bg-red-100 text-red-800': form.status === 'closed'
                }">
                {{ form.status }}
              </span>
              <span class="text-sm text-gray-500">
                {{ new Date(form.createdAt).toLocaleDateString() }}
              </span>
            </div>
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500">
                {{ form.responses }} respuestas
              </span>
              <div class="flex space-x-2">
                <button 
                  class="p-2 text-primary bg-primary/10 rounded-full"
                  @click="openAssignModal(form)"
                  title="Asignar a estudiantes"
                >
                  <UserGroupIcon class="w-5 h-5" />
                </button>
                <button class="p-2 text-gray-400 hover:text-primary">
                  <PencilIcon class="w-5 h-5" />
                </button>
                <button class="p-2 text-gray-400 hover:text-danger">
                  <TrashIcon class="w-5 h-5" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Desktop View -->
      <div class="hidden sm:block overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Título
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Estado
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Respuestas
              </th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Fecha
              </th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                Acciones
              </th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="form in forms" :key="form.id" class="hover:bg-gray-50">
              <td class="px-6 py-4">
                <div class="text-sm font-medium text-gray-900">{{ form.title }}</div>
                <div class="text-sm text-gray-500">{{ form.description }}</div>
              </td>
              <td class="px-6 py-4">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
                  :class="{
                    'bg-green-100 text-green-800': form.status === 'active',
                    'bg-gray-100 text-gray-800': form.status === 'draft',
                    'bg-red-100 text-red-800': form.status === 'closed'
                  }">
                  {{ form.status }}
                </span>
              </td>
              <td class="px-6 py-4 text-sm text-gray-500">
                {{ form.responses }}
              </td>
              <td class="px-6 py-4 text-sm text-gray-500">
                {{ new Date(form.createdAt).toLocaleDateString() }}
              </td>
              <td class="px-6 py-4 text-right text-sm font-medium">
                <div class="flex justify-end space-x-3">
  
                  <button class="text-gray-400 hover:text-primary">
                    <EyeIcon class="w-5 h-5" />
                  </button>
                  <button class="text-gray-400 hover:text-primary">
                    <PencilIcon class="w-5 h-5" />
                  </button>
                  <button class="text-gray-400 hover:text-primary">
                    <DocumentDuplicateIcon class="w-5 h-5" />
                  </button>
                  <button class="text-gray-400 hover:text-danger">
                    <TrashIcon class="w-5 h-5" />
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Assignment Modal -->
    <AssignFormModal
      v-model="showAssignModal"
      :form="selectedForm"
      :students="students"
      @assigned="handleFormAssigned"
    />
  </div>
</template>