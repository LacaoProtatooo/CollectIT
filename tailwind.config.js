/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    daisyui: {
      themes: [
        {
          mytheme: {
          "primary": "#00a5ff",        
          "secondary": "#aabece",       
          "accent": "#dd3e46",         
          "neutral": "#001e25",         
          "base-100": "#003d4b",        
          "info": "#10a7ff",         
          "success": "#00f871",       
          "warning": "#ffd782",        
          "error": "#ff4646",
          },
        },
      ],
    },
    extend: {},
  },
  plugins: [
    require("daisyui")
  ],
}

