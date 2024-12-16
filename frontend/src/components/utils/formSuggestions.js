import { ref } from 'vue'

// Expanded suggestion groups with more variety
const suggestionGroups = [
  // Evaluación académica
  [
    'Necesito un formulario para evaluar matemáticas de 1º ESO',
    'Crea una evaluación de física y química',
    'Genera un test de comprensión lectora',
    'Diseña una prueba de inglés nivel B1',
    'Evaluación de conocimientos de historia',
    'Test de geografía sobre la Unión Europea'
  ],
  // Seguimiento y tutoría
  [
    'Cuestionario sobre hábitos de estudio',
    'Encuesta sobre el ambiente en clase',
    'Formulario de seguimiento tutorial',
    'Evaluación de necesidades de apoyo',
    'Cuestionario de adaptación al curso',
    'Formulario de orientación académica'
  ],
  // Feedback y mejora
  [
    'Encuesta de satisfacción trimestral',
    'Evaluación de la metodología docente',
    'Valoración de recursos didácticos',
    'Sugerencias de mejora del curso',
    'Feedback sobre actividades extraescolares',
    'Evaluación del plan de estudios'
  ],
  // Desarrollo personal
  [
    'Cuestionario de intereses profesionales',
    'Test de estilos de aprendizaje',
    'Evaluación de habilidades sociales',
    'Encuesta sobre gestión del tiempo',
    'Formulario de objetivos académicos',
    'Valoración de competencias digitales'
  ]
]

export function useFormSuggestions() {
  const currentGroupIndex = ref(0)
  
  const rotateSuggestions = () => {
    currentGroupIndex.value = (currentGroupIndex.value + 1) % suggestionGroups.length
    return getRandomFromCurrentGroup()
  }

  const getRandomFromCurrentGroup = () => {
    const currentGroup = suggestionGroups[currentGroupIndex.value]
    const shuffled = [...currentGroup].sort(() => Math.random() - 0.5)
    return shuffled.slice(0, 3) // Return only 3 random suggestions
  }

  const getRandomSuggestions = () => {
    const allSuggestions = suggestionGroups.flat()
    const shuffled = [...allSuggestions].sort(() => Math.random() - 0.5)
    return shuffled.slice(0, 3)
  }

  return {
    getCurrentSuggestions: getRandomFromCurrentGroup,
    rotateSuggestions,
    getRandomSuggestions
  }
}