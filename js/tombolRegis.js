const form = document.getElementById("registerForm");
const inputs = form.querySelectorAll("input");
const btn = document.getElementById("registerBtn");

form.addEventListener("input", () => {
  let allFilled = true;
  inputs.forEach(input => {
    if (!input.value.trim()) {
      allFilled = false;
    }
  });

  btn.disabled = !allFilled;

  if (allFilled) {
    btn.classList.remove("bg-gray-400", "cursor-not-allowed");
    btn.classList.add("bg-gradient-to-r", "from-blue-500", "to-purple-500", "hover:opacity-90");
  } else {
    btn.classList.add("bg-gray-400", "cursor-not-allowed");
    btn.classList.remove("bg-gradient-to-r", "from-blue-500", "to-purple-500", "hover:opacity-90");
  }
});