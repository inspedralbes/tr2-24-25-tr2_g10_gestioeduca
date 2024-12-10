<template>
  <div class="flex flex-col min-h-screen w-full bg-white">
    <!-- Navegador -->
    <ProfileHeader />

    <!-- Indicador de carga -->
    <div v-if="isLoading" class="loading">
      <p>Carregant...</p>
    </div>

    <!-- Mensaje de error -->
    <div v-else-if="error" class="error-message text-red-500 text-center">
      <p>{{ error }}</p>
    </div>

    <!-- Perfil del estudiante -->
    <div
      v-else
      class="student-profile rounded-md mx-auto mt-10 max-w-5xl pt-[3.5rem] pb-0 bg-white"
    >
      <div class="text-center">
        <!-- Nombre y apellidos -->
        <h1 class="text-4xl font-bold text-gray-900">{{ studentName }}</h1>
        <!-- Curso -->
        <p class="text-lg text-indigo-600 mt-2">{{ studentCurs }}</p>
      </div>

      <div class="mt-8 text-center">
        <!-- Avatar -->
        <img
          class="w-40 h-40 rounded-full mx-auto"
          :src="getAvatar(studentId)"
          alt="Avatar del estudiante"
        />
      </div>
    </div>

    <!-- Botones de ProfileEducation -->
    <ProfileEducation />

    <!-- Pie de página -->
    <Footer />
  </div>
</template>

<script>
import Footer from "../common/Footer.vue";
import ProfileHeader from "./ProfileHeader.vue";
import ProfileEducation from "./ProfileEducation.vue";
import { useRoute } from "vue-router";

export default {
  name: "StudentProfileComponent",
  components: {
    Footer,
    ProfileHeader,
    ProfileEducation,
  },
  data() {
    return {
      isLoading: true,
      error: null,
      studentId: null,
      studentName: "",
      studentCurs: "",
    };
  },
  created() {
    const route = useRoute();
    this.studentId = route.params.id; 
    this.fetchStudentData(this.studentId);
  },
  methods: {
    async fetchStudentData(id) {
      try {
        const response = await fetch("/students.json");
        if (!response.ok) throw new Error("Error al cargar los datos");

        const students = await response.json();
        const student = students.find((s) => s.id_student === id); 
        if (!student) throw new Error("Estudiante no encontrado");

        this.studentName = `${student.name} ${student.surname}`;
        this.studentCurs = student.curs || "Curso no especificado.";
      } catch (error) {
        this.error = error.message;
      } finally {
        this.isLoading = false;
      }
    },
    getAvatar(id) {
      return id ? `https://api.dicebear.com/5.x/adventurer/svg?seed=${id}` : "/default-avatar.jpg";
    },
  },
};
</script>

<style scoped>
.loading {
  text-align: center;
  font-size: 1.5rem;
  padding: 20px;
  color: #007bff;
}

.error-message {
  font-size: 1.2rem;
  color: red;
  padding: 20px;
}
</style>
