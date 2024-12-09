<script setup>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router';
import Sidebar from '@/components/Layout/Sidebar.vue'
import MainLayout from '@/components/Layout/MainLayout.vue';

const router = useRouter();
const userData = ref(null);

onMounted(() => {
    // Get user data from localStorage
    const storedUser = localStorage.getItem('user');
    if (storedUser) {
        userData.value = JSON.parse(storedUser);
    } else {
        // If no user data, redirect to login
        router.push('/login');
    }
});
</script>

<template>
    <Sidebar />
    <div class="dashboard-container">
        <div v-if="userData" class="welcome-section">
            <h1>Benvingut, {{ userData.name }}!</h1>
            <img :src="userData.picture" alt="Profile picture" class="profile-picture" v-if="userData.picture">
            <p>{{ userData.email }}</p>
        </div>
        <div v-else>
            <p>Carregant...</p>
        </div>
    </div>
</template>

<style scoped>
.dashboard-container {
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.welcome-section {
    text-align: center;
    margin-bottom: 2rem;
    padding: 2rem;
    background: var(--card-background, #ffffff);
    border-radius: 1rem;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.profile-picture {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 1rem 0;
    border: 3px solid var(--primary-color, #4a90e2);
}

h1 {
    color: var(--text-primary, #333);
    margin-bottom: 1rem;
}

p {
    color: var(--text-secondary, #666);
    font-size: 1.1rem;
}
</style>