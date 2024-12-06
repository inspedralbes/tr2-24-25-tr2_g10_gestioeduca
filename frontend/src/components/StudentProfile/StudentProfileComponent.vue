<template>
    <div class="student-profile-wrapper">
      <div class="student-profile">
        <!-- Encabezado del perfil del estudiante -->
        <ProfileHeader :studentName="studentName" :studentTagline="studentTagline" />
  
        <!-- Detalles personales -->
        <ProfileDetails :bio="studentBio" />
  
        <!-- Sección de educación -->
        <ProfileEducation :educationList="education" />
      </div>
    </div>
  </template>
  
  <script>
  import ProfileHeader from './ProfileHeader.vue';
  import ProfileDetails from './ProfileDetails.vue';
  import ProfileEducation from './ProfileEducation.vue';
  
  export default {
    name: 'StudentProfileComponent',
    components: {
      ProfileHeader,
      ProfileDetails,
      ProfileEducation,
    },
    data() {
      return {
        studentName: 'John Doe',
        studentTagline: 'Aspiring Web Developer',
        studentBio: 'A passionate learner who loves to build web applications.',
        education: [
          'Computer Science B.Sc. - University of Example',
          'Front-End Developer Bootcamp - Example Academy',
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  .student-profile-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh; /* Ya ocupa toda la altura de la ventana */
  width: 100vw; /* Ya ocupa todo el ancho de la ventana */
  background-color: #f8f9fa;
  margin: 0; /* Elimina márgenes del contenedor */
  padding: 0; /* Asegura que no haya padding */
}

.student-profile {
  width: 100%; /* Asegura que el ancho ocupe todo */
  height: 100%; /* Nueva propiedad para ocupar toda la altura */
  background-color: #ffffff;
  box-shadow: none; /* Opcional: elimina sombras si no son necesarias */
  border-radius: 0; /* Opcional: elimina bordes redondeados */
  padding: 30px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  overflow-y: auto;
}

  
  /* Encabezado del perfil */
  .student-profile-header h1 {
    font-size: 2.5rem; /* Tamaño de fuente ajustado */
    text-align: center;
  }
  
  /* Títulos y texto del perfil */
  .student-profile h2 {
    margin-top: 20px;
    color: #333;
    font-size: 2rem; /* Tamaño de fuente ajustado */
    text-align: center;
  }
  
  .student-profile-details p,
  .student-profile-education li {
    font-size: 1.2rem; /* Tamaño de fuente ajustado */
    text-align: center; /* Alineación centrada */
  }
  
  /* Responsividad */
  @media (max-width: 768px) {
    .student-profile {
      max-width: 90%;
      padding: 20px;
    }
  
    .student-profile h2 {
      font-size: 1.5rem;
    }
  
    .student-profile-header h1 {
      font-size: 2rem;
    }
  
    .student-profile-details p,
    .student-profile-education li {
      font-size: 1rem;
    }
  }
  </style>
  