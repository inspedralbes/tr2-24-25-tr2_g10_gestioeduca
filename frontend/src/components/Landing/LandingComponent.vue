<template>
  <div class="bg-white">
    <NavBar @show-contact="showContactForm" />
    <ContactForm :is-visible="isContactFormVisible" @close="closeContactForm" />
    <HeroSection />
    <ImageCarousel />
    <EducationSection />
    <Footer />
  </div>
</template>

<script>
import NavBar from './NavBar.vue'
import ContactForm from './ContactForm.vue'
import HeroSection from './HeroSection.vue'
import ImageCarousel from './ImageCarousel.vue'
import EducationSection from './EducationSection.vue'
import Footer from './Footer.vue'

export default {
  name: 'LandingComponent',
  components: {
    NavBar,
    ContactForm,
    HeroSection,
    ImageCarousel,
    EducationSection,
    Footer
  },
  data() {
    return {
      isContactFormVisible: false
    }
  },
  methods: {
    showContactForm() {
      this.isContactFormVisible = true
    },
    closeContactForm() {
      this.isContactFormVisible = false
    }
  }
}
</script>