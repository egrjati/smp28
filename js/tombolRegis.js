const form = document.getElementById("registerForm");
const inputs = form.querySelectorAll("input");
const btn = document.getElementById("registerBtn");

const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");

// === VALIDASI INPUT ===
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
  } else {
    btn.disabled = true;
    btn.classList.add("bg-gray-400", "cursor-not-allowed");
    btn.classList.remove("bg-gradient-to-r", "from-blue-500", "to-purple-500", "hover:opacity-90");
  }
});

// === SUBMIT HANDLER ===
form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(form);

  try {
    const res = await fetch("php/register.php", {
      method: "POST",
      body: formData
    });

    const data = await res.json();
    showPopup(data.message, data.status);

    if (data.status === "success") {
      form.reset();
      btn.disabled = true;
      btn.classList.add("bg-gray-400", "cursor-not-allowed");
      btn.classList.remove("bg-gradient-to-r", "from-blue-500", "to-purple-500", "hover:opacity-90");
    }

  } catch (err) {
    showPopup("Terjadi error koneksi!", "error");
  }
});

// === POPUP HANDLER ===
function showPopup(message, status) {
  const msgEl = document.getElementById("popupMessage");
  msgEl.innerHTML = message;

  // Reset dulu semua warna
  msgEl.classList.remove("text-white", "text-red-600");

  // Tambahkan sesuai status
  if (status === "success") {
    msgEl.classList.add("text-white");
  } else {
    msgEl.classList.add("text-red-600");
  }

  // Tampilkan popup
  const popup = document.getElementById("popup");
  const box = document.getElementById("popupBox");

  popup.classList.remove("hidden");
  popup.classList.add("flex");

  // Animasi zoom in
  setTimeout(() => box.classList.remove("scale-95"), 50);
}

function closePopup() {
  const popup = document.getElementById("popup");
  const box = document.getElementById("popupBox");

  // Animasi zoom out
  box.classList.add("scale-95");

  setTimeout(() => {
    popup.classList.add("hidden");
    popup.classList.remove("flex");
  }, 200);
}

