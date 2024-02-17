import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'

/** @type {import('tailwindcss').Config} */
export default {
  content: [ 
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
    './vendor/filament/**/*.blade.php',
    './resources/views/filament/**/*.blade.php',
    './app/Filament/**/*.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('flowbite/plugin'), 
    forms, colors , typography
  ],
}

