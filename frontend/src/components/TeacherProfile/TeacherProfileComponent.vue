<template>
    <div class="student-profile-wrapper">
      <div class="student-profile">
        <!-- Encabezado del perfil del estudiante -->
        <ProfileHeader :studentName="studentName" :studentTagline="studentTagline" />
    
        <!-- Detalles personales -->
        <ProfileDetails :bio="studentBio" />
    
        <!-- Sección de educación -->
        <ProfileSubjects :educationList="education" />
      </div>
  
      <!-- Pie de página -->
      <Footer />
    </div>
  </template>
    
  <script>
  import ProfileHeader from './ProfileHeader.vue';
  import ProfileDetails from './ProfileDetails.vue';
  import ProfileSubjects from './ProfileSubjects.vue';
  import Footer from '../common/Footer.vue'; 
    
  export default {
    name: 'StudentProfileComponent',
    components: {
      ProfileHeader,
      ProfileDetails,
      ProfileSubjects,
      Footer,
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
  
    
  /* Encabezado del perfil */
  .student-profile-header h1 {
    font-size: 2.5rem; 
    text-align: center;
  }
    
  /* Títulos y texto del perfil */
  .student-profile h2 {
    margin-top: 20px;
    color: #333;
    font-size: 2rem; 
    text-align: center;
  }
    
  .student-profile-details p,
  .student-profile-education li {
    font-size: 1.2rem; 
    text-align: center; 
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
  