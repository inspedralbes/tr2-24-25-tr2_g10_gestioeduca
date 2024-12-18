import { ref, computed } from 'vue'

export function useStudentSearch(students) {
  const searchQuery = ref('')
  const selectedGrade = ref('all')
  const selectedStatus = ref('all')

  const filteredStudents = computed(() => {
    return students.value.filter(student => {
      const matchesSearch = student.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
                          student.email.toLowerCase().includes(searchQuery.value.toLowerCase())
      
      const matchesGrade = selectedGrade.value === 'all' || student.grade.startsWith(selectedGrade.value)
      
      const matchesStatus = selectedStatus.value === 'all' || student.status === selectedStatus.value

      return matchesSearch && matchesGrade && matchesStatus
    })
  })

  return {
    searchQuery,
    selectedGrade,
    selectedStatus,
    filteredStudents
  }
}