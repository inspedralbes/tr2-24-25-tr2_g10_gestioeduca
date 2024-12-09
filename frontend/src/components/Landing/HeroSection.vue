<template>
  <div class="bg-white">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <div class="text-left space-y-6">
          <h1 class="text-5xl font-bold tracking-tight">
            <span class="text-primary">GRUP</span><span class="text-gray-900"></span>IFY<br/>
          </h1>
          <h2 class="text-3xl font-bold tracking-tight">
            <span class="text-primary">Auto</span><span class="text-gray-900">matiza</span> tu colegio,<br/>
            <span class="text-primary">Insp</span><span class="text-gray-900">ira</span> el aprendizaje.
          </h2>
          <p class="text-xl text-gray-600 mt-6">
            Facilita la formación de grupos de trabajo en clases, 
            asegurando la inclusión, equilibrio y transparencia en la asignación, para analizar y mejorar el proceso.
          </p>
          
          <div class="flex gap-4 mt-8">
            <router-link to="/login" class="px-6 py-3 bg-primary text-white rounded hover:bg-primary/90 transition-colors">
              Empieza ahora 
            </router-link>
          </div>
        </div>

        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-primary/10 to-primary/5 p-8">
          <div class="carousel-container">
            <div class="carousel-track">
              <div v-for="(image, index) in images" :key="index" class="carousel-item">
                <img :src="image.url" :alt="image.alt" class="carousel-image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'HeroSection',
  data() {
    return {
      images: [
        {
          url: '../../../public/img/img1.jpg',
          alt: 'Dashboard'
        },
        {
          url: '../../../public/img/img2.jpg',
          alt: 'Students'
        },
        {
          url: '../../../public/img/img4.jpg',
          alt: 'Reports'
        },
        {
          url: '../../../public/img/img3.jpg',
          alt: 'Analytics'
        }
      ]
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
  animation: smoothScroll 20s linear infinite;
}

.carousel-item {
  flex: 0 0 100%;
  padding: 0 0.5rem;
}

.carousel-image {
  width: 100%;
  height: 300px;
  object-fit: cover;
  border-radius: 1rem;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

@keyframes smoothScroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-400%);
  }
}

@media (max-width: 1024px) {
  .carousel-container {
    margin-top: 2rem;
  }
}
</style>