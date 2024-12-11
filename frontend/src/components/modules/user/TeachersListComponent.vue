<script setup>
import { useRouter } from 'vue-router';
import { ref, onMounted } from 'vue';
import ProfileHeader from '../../StudentProfile/ProfileHeader.vue';
import Footer from '../../common/Footer.vue';

const isLoading = ref(true);
const router = useRouter();
const teachers = ref([]);

onMounted(async () => {
  try {
    const response = await fetch('http://localhost:8000/api/users');
    if (!response.ok) throw new Error('Error dades.');
    teachers.value = await response.json();
  } catch (error) {
    console.error(error);
  } finally {
    isLoading.value = false;
  }
});

const viewTeacherDetails = (id) => {
  router.push({ name: 'teacherProfile', params: { id } });
};

// Función para obtener iniciales del nombre y apellido
const getInitials = (name, surname) => {
  if (!name || !surname) return "";
  return `${name[0]}${surname[0]}`.toUpperCase();
}
</script>

<template>
  <!-- Indicador de carga -->
  <div v-if="isLoading" class="loading">
    <p>Carregant...</p>
  </div>

  <div v-else class="flex flex-col min-h-screen">
    <!-- Cabecera del perfil -->
    <ProfileHeader />

    <!-- Lista de profesores -->
    <div class="teacher-list-wrapper bg-white flex-grow py-12 sm:py-16">
      <div class="mx-auto grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12 px-6 lg:px-8">
        <div v-for="teacher in teachers" :key="teacher.id_teacher" class="bg-gray-100 p-4 rounded-lg shadow-md">
          <!-- Tarjeta del profesor -->
          <div class="flex flex-col items-center">
            <div class="card-container">
              <div
                class="flex items-center justify-center w-10 h-10 bg-blue-500 text-white text-lg font-semibold rounded-full"
              >
                {{ getInitials(teacher.name, teacher.last_name) }}
              </div>
              <div class="text-center">
                <h3 class="text-base font-semibold text-gray-900">{{ teacher.name }} {{ teacher.last_name }}</h3>
                <p class="text-sm text-gray-600">{{ teacher.email }}</p>
                <button @click="viewTeacherDetails(teacher.id_teacher)" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none
                        focus:ring-2 focus:ring-blue-400">
                  Fitxa Professor/a
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pie de página -->
    <Footer />
  </div>
</template>

<style scoped>
.card-container {
  border: 2px solid #ccc;
  border-radius: 8px;
  width: 200px;
  height: 200px;
  padding: 16px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s;
}

.card-container:hover {
  transform: scale(1.05);
}

.bg-white {
  display: flex;
  justify-content: center;
  align-items: center;
}

.avatar {
  width: 50%;
  max-width: 80px;
  height: 50%;
  object-fit: cover;
  margin-bottom: 8px;
}

/* Estilo de la lista de profesores */
.teacher-list-wrapper {
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  flex-grow: 1; /* Hace que la lista crezca para llenar el espacio disponible */
}

.loading {
  text-align: center;
  font-size: 1.2rem;
  font-weight: bold;
  color: #555;
}
</style>
