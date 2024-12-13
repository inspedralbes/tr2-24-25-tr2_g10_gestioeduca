<script setup>
import { ref, computed, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import {
  UserGroupIcon,
  UserIcon,
  StarIcon,
  HeartIcon,
  LightBulbIcon,
  ClipboardDocumentCheckIcon,
  UserPlusIcon,
  CheckCircleIcon
} from '@heroicons/vue/24/outline';

const router = useRouter();
const students = ref([]);

onMounted(async () => {
  try {
    const response = await fetch('/students.json');
    if (!response.ok) throw new Error('Error al cargar los estudiantes');
    const data = await response.json();
    // Transformar los datos al formato necesario (solo nombre y apellido)
    students.value = data.map(student => `${student.name} ${student.surname}`);
  } catch (error) {
    console.error('Error:', error);
  }
});

const sections = [
  {
    title: '¿Con quién prefieres trabajar?',
    description: 'Selecciona 3 compañeros/as con los que prefieres trabajar en clase',
    icon: UserGroupIcon,
    selectionKey: 'preferredWorkPartners',
    maxSelections: 3
  },
  {
    title: '¿Con quién prefieres no trabajar?',
    description: 'Selecciona 3 compañeros/as con los que prefieres evitar trabajar',
    icon: UserIcon,
    selectionKey: 'avoidWorkPartners',
    maxSelections: 3
  },
  {
    title: 'Liderazgo',
    description: 'Selecciona 2 compañeros/as que consideras buenos líderes',
    icon: StarIcon,
    selectionKey: 'potentialLeaders',
    maxSelections: 2
  },
  {
    title: 'Empatía',
    description: 'Selecciona 2 compañeros/as que muestran más empatía',
    icon: HeartIcon,
    selectionKey: 'empathicPeople',
    maxSelections: 2
  },
  {
    title: 'Creatividad',
    description: 'Selecciona 2 compañeros/as que consideras más creativos',
    icon: LightBulbIcon,
    selectionKey: 'creativePeople',
    maxSelections: 2
  }
];

const selections = ref({
  preferredWorkPartners: [],
  avoidWorkPartners: [],
  potentialLeaders: [],
  empathicPeople: [],
  creativePeople: []
});

const currentSection = ref(0);
const showResults = ref(false);

const currentSectionData = computed(() => sections[currentSection.value]);

const handleClassmateSelection = (name) => {
  const currentSelections = selections.value[currentSectionData.value.selectionKey];
  
  if (currentSection.value === 1) {
    if (selections.value.preferredWorkPartners.includes(name)) {
      return;
    }
  }

  if (currentSelections.includes(name)) {
    selections.value[currentSectionData.value.selectionKey] = 
      currentSelections.filter(n => n !== name);
  } else if (currentSelections.length < currentSectionData.value.maxSelections) {
    selections.value[currentSectionData.value.selectionKey] = [...currentSelections, name];
  }
};

const isClassmateSelectable = (name) => {
  if (currentSection.value === 1) {
    return !selections.value.preferredWorkPartners.includes(name);
  }
  return true;
};

const nextSection = () => {
  const currentSelections = selections.value[currentSectionData.value.selectionKey];
  if (currentSelections.length === currentSectionData.value.maxSelections) {
    if (currentSection.value < sections.length - 1) {
      currentSection.value++;
    } else {
      showResults.value = true;
    }
  }
};

const prevSection = () => {
  if (currentSection.value > 0) {
    currentSection.value--;
  }
};

const handleFinish = () => {
  // Save the form as completed in localStorage
  const completedForms = JSON.parse(localStorage.getItem('completedForms') || '[]');
  completedForms.push('sociogram');
  localStorage.setItem('completedForms', JSON.stringify(completedForms));
  
  // Navigate back to forms dashboard
  router.push('/student/forms');
};
</script>

<template>
  <div class="max-w-4xl mx-auto">
    <div v-if="!showResults" class="bg-white rounded-lg shadow-lg p-6">
      <h1 class="text-2xl font-bold mb-4 text-center">
        Cuestionario Sociométrico
      </h1>
      
      <div class="mb-6">
        <h2 class="text-xl font-semibold flex items-center gap-3">
          <component :is="currentSectionData.icon" 
            class="w-6 h-6 text-primary" />
          {{ currentSectionData.title }}
        </h2>
        <p class="text-gray-600 mt-2">
          {{ currentSectionData.description }}
        </p>
        <div v-if="currentSection === 1" class="bg-yellow-50 p-2 rounded mt-2 text-sm">
          Nota: No puedes seleccionar los compañeros que marcaste como preferidos
        </div>
      </div>

      <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
        <button
          v-for="name in students"
          :key="name"
          @click="handleClassmateSelection(name)"
          :disabled="!isClassmateSelectable(name)"
          :class="[
            'p-3 rounded-lg transition-all text-sm',
            selections[currentSectionData.selectionKey].includes(name)
              ? 'bg-blue-100 border-2 border-blue-500'
              : isClassmateSelectable(name)
                ? 'bg-gray-100 hover:bg-gray-200'
                : 'bg-red-50 text-red-600 cursor-not-allowed opacity-50'
          ]"
        >
          {{ name }}
          <CheckCircleIcon
            v-if="selections[currentSectionData.selectionKey].includes(name)"
            class="inline ml-2 w-4 h-4 text-blue-600"
          />
        </button>
      </div>

      <div class="flex justify-between mt-6">
        <button 
          v-if="currentSection > 0"
          @click="prevSection"
          class="bg-gray-200 px-4 py-2 rounded-lg hover:bg-gray-300"
        >
          Anterior
        </button>
        <button 
          @click="nextSection"
          class="bg-primary text-white px-4 py-2 rounded-lg ml-auto hover:bg-primary/90"
          :disabled="selections[currentSectionData.selectionKey].length !== currentSectionData.maxSelections"
        >
          {{ currentSection === sections.length - 1 ? 'Ver Resultados' : 'Siguiente' }}
        </button>
      </div>

      <div class="mt-4 text-center">
        <p class="text-gray-600">
          Sección {{ currentSection + 1 }} de {{ sections.length }}
        </p>
      </div>
    </div>

    <div v-else class="space-y-6">
      <div class="bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold mb-6 text-center">Resumen de tus respuestas</h2>
        <div class="space-y-6">
          <div v-for="section in sections" :key="section.title" class="border-b pb-4">
            <div class="flex items-center gap-2 mb-2">
              <component :is="section.icon" class="w-5 h-5 text-primary" />
              <h3 class="font-semibold">{{ section.title }}</h3>
            </div>
            <div class="flex flex-wrap gap-2">
              <span 
                v-for="name in selections[section.selectionKey]" 
                :key="name"
                class="bg-gray-100 px-3 py-1 rounded-full text-sm"
              >
                {{ name }}
              </span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="flex justify-center">
        <button
          @click="handleFinish"
          class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-primary/90 font-semibold"
        >
          Finalizar
        </button>
      </div>
    </div>
  </div>
</template>