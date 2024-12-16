import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useFormTemplatesStore = defineStore('formTemplates', () => {
  const templates = ref([
    {
      id: 'math-evaluation',
      title: 'Evaluación de Matemáticas 1º ESO',
      description: 'Evaluación completa de conocimientos matemáticos básicos',
      category: 'evaluacion',
      questions: [
        {
          type: 'multiple',
          title: '¿Cuál es el resultado de 3x + 5 = 14?',
          options: [
            { text: 'x = 3', value: 1 },
            { text: 'x = 4', value: 0 },
            { text: 'x = 5', value: 0 }
          ]
        },
        {
          type: 'multiple',
          title: '¿Qué fracción representa la mitad?',
          options: [
            { text: '1/2', value: 1 },
            { text: '2/4', value: 1 },
            { text: '3/4', value: 0 }
          ]
        }
      ]
    },
    {
      id: 'study-habits',
      title: 'Cuestionario de Hábitos de Estudio',
      description: 'Evaluación de hábitos y técnicas de estudio del alumno',
      category: 'tutoria',
      questions: [
        {
          type: 'multiple',
          title: '¿Cuántas horas dedicas al estudio diariamente?',
          options: [
            { text: 'Menos de 1 hora', value: 0 },
            { text: 'Entre 1 y 2 horas', value: 1 },
            { text: 'Más de 2 horas', value: 2 }
          ]
        },
        {
          type: 'checkbox',
          title: '¿Qué técnicas de estudio utilizas?',
          options: [
            { text: 'Resúmenes', value: 0 },
            { text: 'Mapas conceptuales', value: 1 },
            { text: 'Subrayado', value: 2 }
          ]
        }
      ]
    },
    {
      id: 'course-satisfaction',
      title: 'Encuesta de Satisfacción del Curso',
      description: 'Evaluación de la satisfacción general con el curso',
      category: 'feedback',
      questions: [
        {
          type: 'multiple',
          title: '¿Cómo valorarías la calidad de las clases?',
          options: [
            { text: 'Excelente', value: 4 },
            { text: 'Buena', value: 3 },
            { text: 'Regular', value: 2 },
            { text: 'Necesita mejorar', value: 1 }
          ]
        },
        {
          type: 'text',
          title: '¿Qué aspectos del curso crees que podrían mejorarse?'
        }
      ]
    }
  ])

  const categories = {
    evaluacion: 'Evaluación Académica',
    tutoria: 'Tutoría y Seguimiento',
    feedback: 'Feedback y Mejora'
  }

  const getTemplateById = (id) => {
    return templates.value.find(template => template.id === id)
  }

  const getTemplatesByCategory = (category) => {
    return templates.value.filter(template => template.category === category)
  }

  return {
    templates,
    categories,
    getTemplateById,
    getTemplatesByCategory
  }
})