document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  const inputs = document.querySelectorAll("#login-username, #login-password");
  const loginBtn = document.getElementById("loginBtn");

  // Fungsi cek input
  function checkInputs() {
    let allFilled = true;
    inputs.forEach((input) => {
      if (!input.value.trim()) allFilled = false;
    });

    if (allFilled) {
      loginBtn.disabled = false;
      loginBtn.classList.remove("opacity-50", "cursor-not-allowed");
      loginBtn.classList.add(
        "hover:from-blue-700",
        "hover:to-purple-700",
        "hover:-translate-y-1"
      );
    } else {
      loginBtn.disabled = true;
      loginBtn.classList.add("opacity-50", "cursor-not-allowed");
      loginBtn.classList.remove(
        "hover:from-blue-700",
        "hover:to-purple-700",
        "hover:-translate-y-1"
      );
    }
  }

  // Pas input berubah, cek validasi
  inputs.forEach((input) => input.addEventListener("input", checkInputs));

  // === SUBMIT LOGIN ===
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append(
      "username",
      document.getElementById("login-username").value
    );
    formData.append(
      "password",
      document.getElementById("login-password").value
    );

    try {
      const res = await fetch("php/login.php", {
        method: "POST",
        body: formData,
      });

      const data = await res.json();
      alert(data.message);

      if (data.status === "success") {
        // Optional: simpan info user di localStorage (kalau mau)
        if (data.user) localStorage.setItem("user", JSON.stringify(data.user));

        // Redirect otomatis sesuai JSON
        window.location.href = "php/" + data.redirect;
      }
    } catch (err) {
      alert("Terjadi error koneksi!");
      console.error(err);
    }
  });
});
