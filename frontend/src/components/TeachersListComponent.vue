<script setup>
import { useRouter } from 'vue-router';
import { ref, onMounted } from 'vue';

const teachers = ref([]);
onMounted(async () => {
    const response = await fetch('../public/teachers.json');
    const router = useRouter();
    teachers.value = await response.json();
});
// Función para obtener iniciales del nombre y apellido
const getInitials = (name, surname) => {
    if (!name || !surname) return "";
    return `${name[0]}${surname[0]}`.toUpperCase();
}
</script>

<template>
    <div class="bg-white py-12 sm:py-16 w-full min-h-screen flex items-center justify-center">
        <div class="mx-auto grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-12 px-6 lg:px-8">
            <div v-for="teacher in teachers" :key="teacher.id_teacher" class="bg-gray-100 p-4 rounded-lg shadow-md">
                <!--student card-->
                <div class="flex flex-col items-center">
                    <div class="card-container">
                        <div
                            class="flex items-center justify-center w-10 h-10 bg-blue-500 text-white text-lg font-semibold rounded-full"
                        >
                            {{ getInitials(teacher.name, teacher.surname) }}
                        </div>
                        <div class="text-center">
                            <h3 class="text-base font-semibold text-gray-900">{{ teacher.name }} {{ teacher.surname }}
                            </h3>
                            <p class="text-sm text-gray-600">{{ teacher.email }}</p>
                            <button @click="viewStudentDetails(teacher)" class="mt-4 bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none
                            focus:ring-2 focus:ring-blue-400">
                                Fitxa Professor/a
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    min-height: 100vh;
}

.avatar {
    width: 50%;
    max-width: 80px;
    height: 50%;
    object-fit: cover;
    margin-bottom: 8px;
}
</style>