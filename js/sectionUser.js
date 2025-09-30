document.addEventListener("DOMContentLoaded", () => {
  const nextBtn = document.getElementById("nextBtn");
  const userSection = document.getElementById("userSection");
  const welcomeSection = document.getElementById("welcomeSection");
  const absenceSection = document.getElementById("absenceSection");
  const absenceBtn = document.querySelector("a[href='userabsence.html']");
  const backBtn = document.getElementById("backBtn");
  const splashName = document.getElementById("splashName");

  // === Ambil data user dari localStorage ===
  const user = JSON.parse(localStorage.getItem("user"));
  if (user && splashName) {
    splashName.textContent = user.username.toUpperCase();
  }

  // === Next → Dashboard ===
  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      welcomeSection.classList.add("hidden");
      userSection.classList.remove("hidden");
    });
  }

  // === Dashboard → Absence ===
  if (absenceBtn) {
    absenceBtn.removeAttribute("href"); // biar ga reload
    absenceBtn.addEventListener("click", () => {
      userSection.classList.add("hidden");
      absenceSection.classList.remove("hidden");
    });
  }

  // === Absence → Dashboard ===
  if (backBtn) {
    backBtn.addEventListener("click", () => {
      absenceSection.classList.add("hidden");
      userSection.classList.remove("hidden");
    });
  }
});

// edit n save profile student
document.getElementById("editBtn").addEventListener("click", () => {
  const fields = ["nama", "no_siswa", "lahir", "alamat", "email"];
  fields.forEach((id) => {
    const span = document.getElementById(id);
    const value = span.innerText === "-" ? "" : span.innerText;
    span.innerHTML = `<input type="text" id="edit_${id}" value="${value}" class="w-full p-1 rounded-md text-slate-900">`;
  });

  // ganti tombol
  document.getElementById("editBtn").style.display = "none";
  document.getElementById("saveBtn").style.display = "inline-block";
});

document.getElementById("saveBtn").addEventListener("click", () => {
  const data = {
    nama: document.getElementById("edit_nama").value,
    no_siswa: document.getElementById("edit_no_siswa").value,
    lahir: document.getElementById("edit_lahir").value,
    alamat: document.getElementById("edit_alamat").value,
    email: document.getElementById("edit_email").value,
  };

  fetch("update_user.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(data),
  })
    .then((res) => res.json())
    .then((res) => {
      if (res.success) {
        // update langsung di halaman tanpa reload
        document.getElementById("nama").innerText = data.nama;
        document.getElementById("no_siswa").innerText = data.no_siswa || "-";
        document.getElementById("lahir").innerText = data.lahir || "-";
        document.getElementById("alamat").innerText = data.alamat || "-";
        document.getElementById("email").innerText = data.email;

        // toggle tombol balik
        document.getElementById("saveBtn").style.display = "none";
        document.getElementById("editBtn").style.display = "inline-block";
      } else {
        alert("Gagal update: " + res.error);
      }
    })
    .catch((err) => alert("Error: " + err));
});
