/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./src/**/*.{vue,js,jsx,ts,tsx}"
  ],
  theme: {
    extend: {
      colors: {
        primary: 'rgb(0, 173, 238)',
        secondary: '#6B7280',
        success: '#10B981',
        warning: '#F59E0B',
        danger: '#EF4444',
        background: '#F3F4F6'
      }
    }
  },
  plugins: [],
}
