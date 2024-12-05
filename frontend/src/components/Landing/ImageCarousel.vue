<template>
  <div class="bg-gray-100 py-20">
    <div class="mx-auto max-w-7xl px-6">
      <h2 class="text-3xl font-semibold text-gray-900 mb-8 text-center">
        Acció Finançada pel Ministeri d'Educació, Formació Professional i Esports i per la Unió Europea - NextGenerationUE
      </h2>
      <div class="carousel-container">
        <div class="carousel-track">
          <template v-for="(image, index) in duplicatedImages" :key="`${index}-${image.url}`">
            <div class="carousel-item">
              <img :src="image.url" :alt="image.alt" class="carousel-image">
            </div>
          </template>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ImageCarousel',
  data() {
    return {
      images: [
        { url: 'https://via.placeholder.com/800x500?text=Image+1', alt: 'Image 1' },
        { url: 'https://via.placeholder.com/800x500?text=Image+2', alt: 'Image 2' },
        { url: 'https://via.placeholder.com/800x500?text=Image+3', alt: 'Image 3' },
        { url: 'https://via.placeholder.com/800x500?text=Image+4', alt: 'Image 4' },
        { url: 'https://via.placeholder.com/800x500?text=Image+5', alt: 'Image 5' },
        { url: 'https://via.placeholder.com/800x500?text=Image+6', alt: 'Image 6' }
      ]
    }
  },
  computed: {
    duplicatedImages() {
      return [...this.images, ...this.images]
    }
  }
}
</script>

<style scoped>
.carousel-container {
  width: 100%;
  overflow: hidden;
  position: relative;
}

.carousel-track {
  display: flex;
  width: fit-content;
  animation: scroll 40s linear infinite;
}

.carousel-track:hover {
  animation-play-state: paused;
}

.carousel-item {
  flex: 0 0 300px;
  padding: 0 1rem;
  transition: transform 0.3s ease;
}

.carousel-item:hover {
  transform: scale(1.05);
}

.carousel-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

@media (max-width: 640px) {
  .carousel-item {
    flex: 0 0 250px;
  }
}
</style>