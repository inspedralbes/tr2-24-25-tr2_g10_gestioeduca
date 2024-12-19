<script setup>
import StudentAvatar from './StudentAvatar.vue'
import SkillTags from './SkillTags.vue'
import StudentInfo from './StudentInfo.vue'
import { useStudentSkills } from '../../../composables/useStudentSkills'

const props = defineProps({
  student: {
    type: Object,
    required: true
  }
})

const { getSkillLevel, getSkillColor } = useStudentSkills()
</script>

<template>
  <div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-6">
      <div class="flex items-start space-x-6">
        <StudentAvatar
          :name="student.name"
          :image="student.image"
          class="flex-shrink-0"
        />
        
        <StudentInfo
          :name="student.name"
          :course="student.course"
          :email="student.email"
        />
      </div>

      <div class="mt-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Habilidades Blandas</h3>
        <SkillTags
          :skills="student.skills"
          :get-level="getSkillLevel"
          :get-color="getSkillColor"
        />
      </div>
    </div>
  </div>
</template>