import { generateFormQuestions } from '../../services/gemini'

export async function regenerateQuestion(originalQuestion, context) {
  try {
    const prompt = `Por favor, genera una nueva versión de esta pregunta manteniendo el mismo tema pero con un enfoque diferente. 
    Pregunta original: "${originalQuestion.title}"
    Contexto del formulario: "${context}"
    Tipo de pregunta: ${originalQuestion.type}`

    const response = await generateFormQuestions(prompt)
    const newQuestion = response.questions[0]
    return {
      ...newQuestion,
      id: originalQuestion.id
    }
  } catch (error) {
    throw new Error('No se pudo regenerar la pregunta. Por favor, intenta de nuevo.')
  }
}

export async function editQuestion(question, newPrompt) {
  try {
    const prompt = `Por favor, modifica esta pregunta según las siguientes instrucciones: "${newPrompt}"
    Pregunta actual: "${question.title}"
    Tipo de pregunta: ${question.type}`

    const response = await generateFormQuestions(prompt)
    const editedQuestion = response.questions[0]
    return {
      ...editedQuestion,
      id: question.id
    }
  } catch (error) {
    throw new Error('No se pudo editar la pregunta. Por favor, intenta de nuevo.')
  }
}