import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useAppStore = defineStore('app', () => {
  // State
  const currentUser = ref(null);
  const studentsList = ref([]);
  const teachersList = ref([]);
  const studentsAtRiskOfExclusion = ref([]);

  const studentProfile = ref({
    id_student: '',
    name: '',
    surname: '',
    email: '',
    phone: '',
    address: '',
    curs: '',
    skills: '',
    teacherComments: '',
    groupAssignments: [],
  });

  const groupsInfo = ref([]);

  // Actions
  const getCurrentUser = () => currentUser.value;
  const getStudentsList = () => studentsList.value;
  const getTeachersList = () => teachersList.value;
  const getStudentsAtRiskOfExclusion = () => studentsAtRiskOfExclusion.value;
  const getStudentProfile = () => studentProfile.value;
  const getGroupsInfo = () => groupsInfo.value;

  // Setters
  const setCurrentUser = (user) => {
    currentUser.value = user;
  }

  const setStudentsList = (students) => {
    studentsList.value = students;
  }

  const setTeachersList = (teachers) => {
    teachersList.value = teachers;
  }

  const setStudentsAtRiskOfExclusion = (students) => {
    studentsAtRiskOfExclusion.value = students;
  }

  const setStudentProfile = ({ id_student, name, surname, email, phone, address, curs, skills, teacherComments, groupAssignments }) => {
    studentProfile.value = {
      id_student,
      name,
      surname,
      email,
      phone,
      address,
      curs,
      skills,
      teacherComments,
      groupAssignments,
    };
  }

  const setGroupsInfo = (groups) => {
    groupsInfo.value = groups;
  }

  return {
    currentUser: computed(getCurrentUser),
    studentsList: computed(getStudentsList),
    teachersList: computed(getTeachersList),
    studentsAtRiskOfExclusion: computed(getStudentsAtRiskOfExclusion),
    studentProfile: computed(getStudentProfile),
    groupsInfo: computed(getGroupsInfo),
    setCurrentUser,
    setStudentsList,
    setTeachersList,
    setStudentsAtRiskOfExclusion,
    setStudentProfile,
    setGroupsInfo,
  };
});
