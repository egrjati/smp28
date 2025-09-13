document.addEventListener("DOMContentLoaded", () => {
    const currentPage = window.location.pathname.split("/").pop() || "index.html"; 
    const navLinks = document.querySelectorAll("nav a");
  
    navLinks.forEach(link => {
      const linkPage = link.getAttribute("href");
  
      if (linkPage === currentPage || (currentPage === "" && linkPage === "index.html")) {
        // tambahin style aktif
        link.classList.add("font-normal", "text-white");
        link.parentElement.classList.add("bg-slate-800"); // biar kotaknya juga beda
      }
    });
  });
  