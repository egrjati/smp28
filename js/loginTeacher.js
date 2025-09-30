document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  const inputs = document.querySelectorAll("#teacher-username, #teacher-password");
  const loginBtn = document.getElementById("teacherLoginBtn");

  // === CEK INPUT ===
  function checkInputs() {
    let allFilled = true;
    inputs.forEach((input) => {
      if (!input.value.trim()) allFilled = false;
    });

    if (allFilled) {
      loginBtn.disabled = false;
      loginBtn.classList.remove("opacity-50", "cursor-not-allowed");
    } else {
      loginBtn.disabled = true;
      loginBtn.classList.add("opacity-50", "cursor-not-allowed");
    }
  }

  inputs.forEach((input) => input.addEventListener("input", checkInputs));

  // === SUBMIT LOGIN ===
  form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append(
      "email",
      document.getElementById("teacher-username").value
    );
    formData.append(
      "password",
      document.getElementById("teacher-password").value
    );
    

    try {
      // ✅ sesuaikan path sesuai folder projectmu
      const res = await fetch("./php/loginteacher.php", {
        method: "POST",
        body: formData,
      });

      // === DEBUG RAW RESPONSE ===
      const text = await res.text();
      console.log("RAW RESPONSE:", text);

      let data;
      try {
        data = JSON.parse(text);
      } catch (e) {
        alert("Response bukan JSON, cek console untuk detail!");
        return;
      }

      alert(data.message);

      if (data.status === "success") {
        if (data.user) localStorage.setItem("teacher", JSON.stringify(data.user));
        window.location.href = "./php/gurusection.php";
      }
    } catch (err) {
      alert("Terjadi error koneksi!");
      console.error(err);
    }
  });
});
