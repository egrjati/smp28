/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./dashboard.html",
    "./login.html",
    "./register.html",
    "./login_teacher.html",
    "./login_admin.html",
    "./index.html",
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
