import { ref, computed } from 'vue'
import { defineStore } from 'pinia'

export const useAppStore = defineStore('app', () => {
  // State
  const currentUser = ref({
    id: null,
    name: '',
    permissions: '',
    email: '',
    password: '',
  });
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
  const teacherProfile = ref({
    id_teacher: '',
    name: '',
    email: '',
    subjects: [
      { name: '', isTutor: false },
    ],
  });

  const skillList = ref([
    "Aprenentatge i utilització de coneixements",
    "Autoconfiança",
    "Autocontrol",
    "Compromís amb l'organització",
    "Comunicació",
    "Creativitat",
    "Direcció de persones",
    "Empatia",
    "Flexibilitat i gestió del canvi",
    "Iniciativa",
    "Lideratge",
    "Negociació",
    "Networking",
    "Orientació a l'assoliment",
    "Orientació al client",
    "Orientació estratègica",
    "Pensament analític",
    "Pensament conceptual",
    "Planificació i organització",
    "Preocupació per l'ordre i la qualitat",
    "Treball en equip i cooperació",
  ]);

  const groupsInfo = ref([]);
  const roles = ref([ //CESC-Resultats
    "Agressivitat fisica",
    "Agressivitat verbal",
    "Agressivitat relacional",
    "Victimització fisica",
    "Victimització verbal",
    "Victimització relacional",
    "Prosocialitat",
  ]);
  const formData = ref({ //CESC-Preguntes
    studentForms: [
      {
        id_student: '',
        responses: {
          question1: '',
          question2: '',
          question3: '',
          question4: '',
          question5: '',
          question6: '',
          question7: '',
          question8: '',
          question9: '',
          question10: '',
          question11: '',
          question12: '',
        },
        dateSubmitted: '',
      },
    ],
  });
  // Actions
  const getCurrentUser = () => currentUser.value;
  const getStudentsList = () => studentsList.value;
  const getTeachersList = () => teachersList.value;
  const getStudentsAtRiskOfExclusion = () => studentsAtRiskOfExclusion.value;
  const getStudentProfile = () => studentProfile.value;
  const getTeacherProfile = () => teacherProfile.value;
  const getGroupsInfo = () => groupsInfo.value;
  const getSkillList = () => skillList.value;
  const getRoles = () => roles.value;
  const getFormData = () => formData.value;
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
  const setTeacherProfile = ({ id_teacher, name, email, subjects }) => {
    teacherProfile.value = {
      id_teacher,
      name,
      email,
      subjects,
    };
  }

  const setSkillList = (skills) => {
    skillList.value = skills;
  }
  const setGroupsInfo = (groups) => {
    groupsInfo.value = groups;
  }
  const setRoles = (roles) => {
    roles.value = roles;
  }
  return {
    currentUser: computed(getCurrentUser),
    studentsList: computed(getStudentsList),
    teachersList: computed(getTeachersList),
    studentsAtRiskOfExclusion: computed(getStudentsAtRiskOfExclusion),
    studentProfile: computed(getStudentProfile),
    groupsInfo: computed(getGroupsInfo),
    skillList: computed(getSkillList),
    roles: computed(getRoles),
    formData: computed(getFormData),
    setCurrentUser,
    setStudentsList,
    setTeachersList,
    setStudentsAtRiskOfExclusion,
    setStudentProfile,
    setGroupsInfo,
    skillList,
    setSkillList,
    getSkillList,
    roles,
    getRoles,
    setRoles,
    formData,
    getFormData,
    teacherProfile,
    getTeacherProfile,
    setTeacherProfile,
  };
});

