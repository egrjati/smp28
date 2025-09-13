document.addEventListener("DOMContentLoaded", () => {
    const inputs = document.querySelectorAll("#admusername, #admpassword");
    const loginBtn = document.getElementById("admtom");

    function checkInputs() {
      let allFilled = true;
      inputs.forEach(input => {
        if (!input.value.trim()) {
          allFilled = false;
        }
      });

      if (allFilled) {
        loginBtn.disabled = false;
        loginBtn.classList.remove("opacity-50", "cursor-not-allowed");
        loginBtn.classList.add("hover:from-blue-700", "hover:to-purple-700", "hover:-translate-y-1");
      } else {
        loginBtn.disabled = true;
        loginBtn.classList.add("opacity-50", "cursor-not-allowed");
        loginBtn.classList.remove("hover:from-blue-700", "hover:to-purple-700", "hover:-translate-y-1");
      }
    }

    inputs.forEach(input => input.addEventListener("input", checkInputs));
  });