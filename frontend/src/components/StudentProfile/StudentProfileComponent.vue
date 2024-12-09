<template>
  <div class="student-profile-wrapper">
    <!-- Indicador de carga -->
    <div v-if="isLoading" class="loading">
      <p>Carregant...</p>
    </div>

    <!-- Perfil del estudiante -->
    <div v-else class="student-profile">
      <ProfileHeader :studentName="studentName" />
    </div>

    <!-- Pie de página -->
    <Footer />
  </div>
</template>

<script>
import ProfileHeader from './studentProfile/ProfileHeader.vue';
import ProfileDetails from './ProfileDetails.vue';
import ProfileEducation from './ProfileEducation.vue';
import Footer from '../common/Footer.vue'; 
import { useRoute } from 'vue-router';

export default {
  name: 'StudentProfileComponent',
  components: {
    ProfileHeader,
    ProfileDetails,
    ProfileEducation,
    Footer,
  },
  data() {
    return {
      isLoading: true,  
      studentName: '',
      studentTagline: 'Aspiring Web Developer',
      studentBio: '',
      education: [],
    };
  },
  created() {
    const route = useRoute();
    const studentId = route.params.id;

    // Fetch para obtener datos del estudiante
    this.fetchStudentData(studentId);
  },
  methods: {
    async fetchStudentData(id) {
      try {
        // Llamada al archivo JSON o API
        const response = await fetch('../public/students.json');
        if (!response.ok) throw new Error('Error al cargar los datos');

        const students = await response.json();

        // Buscar el estudiante por su ID
        const student = students.find(s => s.id_student === id);
        if (!student) throw new Error('Estudiante no encontrado');

        // Asignar los datos al estado
        this.studentName = `${student.name} ${student.surname}`;
        this.studentBio = student.teacherComments || 'Sin comentarios adicionales.';
        this.education = student.skills || [];
      } catch (error) {
        console.error('Error al cargar datos del estudiante:', error);
      } finally {
        this.isLoading = false;
      }
    },
  },
};
</script>

<style scoped>
.student-profile-wrapper {
  display: flex;
  flex-direction: column;
  min-height: 100vh; 
  width: 100vw; 
  background-color: #f8f9fa;
  margin: 0;
  padding: 0;
}

.student-profile {
  flex: 1; 
  width: 100%; 
  background-color: #ffffff;
  padding: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  overflow-y: auto;
}

.loading {
  text-align: center;
  font-size: 1.5rem;
  padding: 20px;
  color: #007bff;
}
</style>
