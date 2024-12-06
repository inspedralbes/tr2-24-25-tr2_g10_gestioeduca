<template>
  <div class="student-profile-wrapper">
    <!-- Indicador de carga -->
    <div v-if="isLoading" class="loading">
      <p>Carregant...</p>
    </div>

 
    <div v-else class="student-profile">
    
      <ProfileHeader :studentName="studentName" :studentTagline="studentTagline" />

     
      <ProfileDetails :bio="studentBio" />

     
      <ProfileEducation :educationList="education" />
    </div>

    <!-- Pie de página -->
    <Footer />
  </div>
</template>

<script>
import ProfileHeader from './ProfileHeader.vue';
import ProfileDetails from './ProfileDetails.vue';
import ProfileEducation from './ProfileEducation.vue';
import Footer from '../Landing/Footer.vue'; 

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
    
    setTimeout(() => {
      this.studentName = 'John Doe'; 
      this.studentBio = 'A passionate learner who loves to build web applications.';  
      this.education = [
        'Computer Science B.Sc. - University of Example',
        'Front-End Developer Bootcamp - Example Academy',
      ];  
      this.isLoading = false;  
    }, 2000); 
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
