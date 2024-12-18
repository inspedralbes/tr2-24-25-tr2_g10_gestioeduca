<script setup>
import { useRouter } from 'vue-router'
import { PencilIcon, TrashIcon } from '@heroicons/vue/24/outline'

const props = defineProps({
  student: {
    type: Object,
    required: true
  }
})

const router = useRouter()

const viewProfile = () => {
  router.push(`/alumnos/${props.student.id}`)
}
</script>

<template>
  <tr class="border-b hover:bg-gray-50 cursor-pointer" @click="viewProfile">
    <td class="py-4">
      <div class="flex items-center space-x-3">
        <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
          {{ student.name.split(' ').map(n => n[0]).join('').toUpperCase() }}
        </div>
        <span>{{ student.name }}</span>
      </div>
    </td>
    <td>{{ student.grade }}</td>
    <td>
      <div class="flex items-center">
        <div class="w-20 bg-gray-200 rounded-full h-2.5">
          <div class="bg-primary h-2.5 rounded-full" :style="`width: ${student.attendance}%`"></div>
        </div>
        <span class="ml-2">{{ student.attendance }}%</span>
      </div>
    </td>
    <td>
      <div class="flex items-center">
        <div class="w-20 bg-gray-200 rounded-full h-2.5">
          <div class="bg-success h-2.5 rounded-full" :style="`width: ${student.performance}%`"></div>
        </div>
        <span class="ml-2">{{ student.performance }}%</span>
      </div>
    </td>
    <td>
      <span class="px-3 py-1 rounded-full text-sm" 
            :class="student.status === 'active' ? 'bg-success/10 text-success' : 'bg-warning/10 text-warning'">
        {{ student.status === 'active' ? 'Activo' : 'Inactivo' }}
      </span>
    </td>
    <td>
      <div class="flex space-x-2">
        <button class="p-1 hover:text-primary" @click.stop>
          <PencilIcon class="w-5 h-5" />
        </button>
        <button class="p-1 hover:text-danger" @click.stop>
          <TrashIcon class="w-5 h-5" />
        </button>
      </div>
    </td>
  </tr>
</template>