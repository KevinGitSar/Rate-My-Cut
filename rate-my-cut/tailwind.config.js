/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    screens:{
      'xs': '412px',
      ...defaultTheme.screens,
    },
    extend: {},
  },
  plugins: [],
}