<template>
  <div class="space-y-6">
    <h2 class="text-2xl font-bold">Mis Materias</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <div v-for="subject in subjects" :key="subject.id" 
        class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
        <div class="flex items-center space-x-4 mb-4">
          <component :is="subject.icon" class="w-8 h-8 text-primary" />
          <div>
            <h3 class="text-lg font-semibold">{{ subject.name }}</h3>
            <p class="text-gray-600">{{ subject.teacher }}</p>
          </div>
        </div>
        <div class="space-y-2">
          <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500">Progreso</span>
          </div>
          <div class="w-full bg-gray-200 rounded-full h-2 mt-2">
            <div class="bg-primary rounded-full h-2" :style="{ width: `${subject.progress}%` }"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { 
  CalculatorIcon, 
  BeakerIcon, 
  BookOpenIcon, 
  GlobeAltIcon,
  AcademicCapIcon,
  HeartIcon,
  CurrencyDollarIcon
} from '@heroicons/vue/24/outline'

const subjects = ref([
  { 
    id: 1, 
    name: 'Algebra', 
    teacher: 'Prof. María López',
    progress: 75,
    icon: CalculatorIcon
  },
  { 
    id: 2, 
    name: 'Calculus', 
    teacher: 'Prof. Juan Pérez',
    progress: 65,
    icon: AcademicCapIcon
  },
  { 
    id: 3, 
    name: 'Science', 
    teacher: 'Prof. Ana Martínez',
    progress: 85,
    icon: BeakerIcon
  },
  { 
    id: 4, 
    name: 'Literature', 
    teacher: 'Prof. Carlos Ruiz',
    progress: 80,
    icon: BookOpenIcon
  },
  { 
    id: 5, 
    name: 'History', 
    teacher: 'Prof. Laura García',
    progress: 70,
    icon: GlobeAltIcon
  },
  { 
    id: 6, 
    name: 'Biology', 
    teacher: 'Prof. David Sánchez',
    progress: 88,
    icon: HeartIcon
  },
  { 
    id: 7, 
    name: 'Economics', 
    teacher: 'Prof. Elena Torres',
    progress: 78,
    icon: CurrencyDollarIcon
  }
])

</script>
