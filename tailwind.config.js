/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./*.php",
    "./inc/**/*.php",
    "./templates/**/*.php",
    "./src/**/*.{js,ts,jsx,tsx,css}",
  ],
  darkMode: 'class', // Support for manual dark mode toggle
  theme: {
    extend: {
      colors: {
        ovp: {
          dark: '#0a0a0a',
          light: '#f8fafc',
          accent: '#1e40af', // Professional Blue
          danger: '#991b1b', // For delicate/emergency info
        },
      },
      backdropBlur: {
        xs: '2px',
      }
    },
  },
  plugins: [],
}
