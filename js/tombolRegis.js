const form = document.getElementById("registerForm");
const inputs = form.querySelectorAll("input");
const btn = document.getElementById("registerBtn");

const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");

// === VALIDASI FORM ===
form.addEventListener("input", () => {
  let allFilled = true;
  inputs.forEach(input => {
    if (!input.value.trim()) {
      allFilled = false;
    }
  });

  const passwordMatch = passwordInput.value === confirmPasswordInput.value;

  if (allFilled && passwordMatch) {
    btn.disabled = false;
    btn.classList.remove("bg-gray-400", "cursor-not-allowed");
    btn.classList.add("bg-gradient-to-r", "from-blue-500", "to-purple-500", "hover:opacity-90");
    confirmPasswordInput.classList.remove("border-red-500");
  } else {
    btn.disabled = true;
    btn.classList.add("bg-gray-400", "cursor-not-allowed");
    btn.classList.remove("bg-gradient-to-r", "from-blue-500", "to-purple-500", "hover:opacity-90");

    if (confirmPasswordInput.value && !passwordMatch) {
      confirmPasswordInput.classList.add("border-red-500");
    } else {
      confirmPasswordInput.classList.remove("border-red-500");
    }
  }
});

// === POPUP HANDLER ===
function showPopup(message) {
  document.getElementById("popupMessage").innerText = message;
  const popup = document.getElementById("popup");
  popup.classList.remove("hidden");
  popup.classList.add("flex");
}

function closePopup() {
  const popup = document.getElementById("popup");
  popup.classList.add("hidden");
  popup.classList.remove("flex");
}

// === CEGAH PINDAH HALAMAN ===
form.addEventListener("submit", (e) => {
  e.preventDefault(); // biar ga reload / pindah halaman
  showPopup("Registrasi berhasil! 🎉");
});
