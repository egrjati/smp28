/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.html",
    "./php/**/*.php",
    "./js/**/*.{js,ts}",
  ],
  
  safelist: [
    "bg-[url('./assets/image.png')]",
    "hidden",
    "flex",
  ],
  
  theme: {
    extend: {
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
        inter: ["Inter", "sans-serif"],
        roboto: ["Roboto", "sans-serif"],
      },
    },
  },
  plugins: [],
}
