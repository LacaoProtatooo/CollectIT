// tailwind.config.js

module.exports = {
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
            "primary": "#307CBF",
            "secondary": "#0600ff",
            "accent": "#D77C45",
            "neutral": "#232630",
            "base-100": "#F2F2F2",
            "info": "#007ae8",
            "success": "#99C67F",
            "warning": "#F2CA7E",
            "error": "#D9414E",
          },
        },
      ],
    },
    extend: {
      fontFamily: {
        'helvetica': ['Helvetica', 'Arial', 'sans-serif'],
        'helvetica-neue': ['Helvetica Neue', 'Arial', 'sans-serif'],
      },
    },
  },
  plugins: [
    require("daisyui")
  ],
}