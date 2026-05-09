/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./*.php",
    "./inc/**/*.php",
    "./templates/**/*.php",
    "./src/**/*.{js,ts,jsx,tsx,css}",
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        ovp: {
          dark: '#050b18', // Deep Blue Principal
          darker: '#02060f',
          light: '#f8fafc',
          accent: '#3b82f6', // Bright Blue
          slate: '#94a3b8',
        },
      },
      animation: {
        'gradient-x': 'gradient-x 15s ease infinite',
        'pulse-slow': 'pulse 6s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      keyframes: {
        'gradient-x': {
          '0%, 100%': { 'background-position': '0% 50%' },
          '50%': { 'background-position': '100% 50%' },
        }
      }
    },
  },
  plugins: [],
}
