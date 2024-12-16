import { GoogleGenerativeAI } from '@google/generative-ai';

const genAI = new GoogleGenerativeAI('AIzaSyC0NI-xnqWHJy-0XoJl7cVo63MYpqC1r9E');

export async function analyzeBullyingResponses(responses, studentName) {
  try {
    const model = genAI.getGenerativeModel({ model: 'gemini-pro' });
    
    const systemPrompt = `As an expert in student well-being and bullying prevention, analyze these form responses for student ${studentName}.
    Focus on:
    1. Potential signs of bullying (either as victim or perpetrator)
    2. Social dynamics and relationships
    3. Emotional well-being indicators
    4. Recommended interventions if needed

    Provide a structured analysis with these sections:
    - Risk Level (Low/Medium/High)
    - Key Observations
    - Recommended Actions
    - Follow-up Timeline`;

    const formattedResponses = responses.map(r => 
      `Question: ${r.question}\nAnswer: ${r.answer}`
    ).join('\n\n');

    const result = await model.generateContent([
      { text: systemPrompt },
      { text: formattedResponses }
    ]);

    return result.response.text();
  } catch (error) {
    console.error('Error analyzing responses:', error);
    throw new Error('No se pudo analizar las respuestas. Por favor, intente nuevamente.');
  }
}

export async function generateBullyingPreventionForm() {
  try {
    const model = genAI.getGenerativeModel({ model: 'gemini-pro' });
    
    const prompt = `Create a comprehensive bullying prevention assessment form for schools.
    The form should:
    1. Be age-appropriate for teenagers
    2. Include questions about social dynamics
    3. Address both offline and online bullying
    4. Include emotional well-being indicators
    5. Be non-confrontational and supportive in tone

    Return ONLY a JSON object with this structure:
    {
      "title": "Form title",
      "description": "Form description",
      "questions": [
        {
          "type": "multiple|text|checkbox",
          "title": "Question text",
          "options": [{"text": "Option text", "value": 0}] // for multiple/checkbox only
        }
      ]
    }`;

    const result = await model.generateContent([{ text: prompt }]);
    return JSON.parse(result.response.text());
  } catch (error) {
    console.error('Error generating form:', error);
    throw new Error('No se pudo generar el formulario. Por favor, intente nuevamente.');
  }
}