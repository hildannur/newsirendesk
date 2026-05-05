// =============================
// SIRENDESK LANDING PAGE SCRIPT
// =============================
// File ini mengatur fitur interaktif landing page seperti navbar,
// menu mobile, animasi scroll, counter angka, FAQ accordion,
// form kirim pesan ke admin, dan counter Clients di Landing Page Performance.

// Mengambil elemen-elemen utama dari HTML.
const navbar = document.getElementById("navbar");
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");
const year = document.getElementById("year");
const contactForm = document.getElementById("contactForm");

// Mengisi tahun otomatis di footer.
if (year) {
  year.textContent = new Date().getFullYear();
}

// =============================
// NAVBAR SCROLL EFFECT
// =============================
// Saat halaman di-scroll lebih dari 60px,
// navbar akan mendapat class "scrolled".
if (navbar) {
  window.addEventListener("scroll", () => {
    navbar.classList.toggle("scrolled", window.scrollY > 60);
  });
}

// =============================
// MOBILE MENU
// =============================
// Membuka dan menutup menu mobile / hamburger menu.
if (menuToggle && navLinks) {
  menuToggle.addEventListener("click", () => {
    navLinks.classList.toggle("active");
    document.body.classList.toggle("menu-open");
  });

  // Menutup menu mobile otomatis saat link navigasi diklik.
  navLinks.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => {
      navLinks.classList.remove("active");
      document.body.classList.remove("menu-open");
    });
  });
}

// =============================
// REVEAL ANIMATION ON SCROLL
// =============================
// Elemen dengan class "reveal" akan muncul dengan animasi saat masuk viewport.
const revealObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");

        // Animasi cukup berjalan sekali.
        revealObserver.unobserve(entry.target);
      }
    });
  },
  {
    threshold: 0.12,
  }
);

// Mendaftarkan semua elemen reveal ke observer.
document.querySelectorAll(".reveal").forEach((el) => {
  revealObserver.observe(el);
});

// =============================
// TRUST COUNTER ANIMATION
// =============================
// Counter untuk bagian Trust seperti Client Happy, Campaigns Managed, dll.
const counters = document.querySelectorAll(".counter");

const counterObserver = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) return;

      const counter = entry.target;
      const target = Number(counter.dataset.target || 0);
      const duration = 900;
      const startTime = performance.now();

      const animate = (time) => {
        const progress = Math.min((time - startTime) / duration, 1);
        const value = Math.floor(progress * target);

        counter.textContent = `${value}+`;

        if (progress < 1) {
          requestAnimationFrame(animate);
        } else {
          counter.textContent = `${target}+`;
        }
      };

      requestAnimationFrame(animate);

      // Counter hanya dianimasikan sekali.
      counterObserver.unobserve(counter);
    });
  },
  {
    threshold: 0.5,
  }
);

// Mendaftarkan semua elemen counter.
counters.forEach((counter) => {
  counterObserver.observe(counter);
});

// =============================
// FAQ ACCORDION
// =============================
// Saat pertanyaan FAQ diklik, jawabannya terbuka.
// FAQ lain otomatis tertutup.
document.querySelectorAll(".faq-item button").forEach((button) => {
  button.addEventListener("click", () => {
    const currentItem = button.parentElement;

    document.querySelectorAll(".faq-item").forEach((item) => {
      if (item !== currentItem) {
        item.classList.remove("active");
      }
    });

    currentItem.classList.toggle("active");
  });
});

// =============================
// PERFORMANCE CLIENT COUNTER
// =============================
// Counter ini untuk angka "Clients" di bagian Landing Page Performance.
// Angka akan mengambil data dari client_counter.txt melalui client-counter.php.

const performanceClientCounter = document.getElementById("performanceClientCounter");

// Mengambil angka Clients terbaru dari server saat halaman dibuka.
const loadPerformanceClientCounter = async () => {
  if (!performanceClientCounter) return;

  try {
    const response = await fetch("client-counter.php?action=get");
    const data = await response.json();

    if (data.success) {
      performanceClientCounter.textContent = data.count;
    }
  } catch (error) {
    console.log("Counter Clients gagal dimuat:", error);
  }
};

// Load angka Clients terbaru ketika website dibuka.
loadPerformanceClientCounter();

// =============================
// LEAD FORM TO ADMIN
// =============================
// Form ini mengambil data nama, kebutuhan, dan pesan,
// lalu menyimpannya ke server lewat save-lead.php.
// Data akan tampil di halaman admin.php, bukan dikirim ke WhatsApp.

if (contactForm) {
  contactForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const name = document.getElementById("name").value.trim();
    const service = document.getElementById("service").value;
    const message = document.getElementById("message").value.trim();

    // Validasi sederhana sebelum data dikirim ke server.
    if (!name || !service) {
      alert("Nama dan kebutuhan wajib diisi.");
      return;
    }

    try {
      const response = await fetch("save-lead.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          name: name,
          service: service,
          message: message,
        }),
      });

      const data = await response.json();

      if (data.success) {
        // Update angka Clients di Landing Page Performance.
        if (performanceClientCounter) {
          performanceClientCounter.textContent = data.count;
        }

        alert("Pesan berhasil masuk ke admin SirenDesk.");

        // Mengosongkan form setelah berhasil.
        contactForm.reset();
        
         // Beralih ke halaman admin.
         window.location.href = "admin.php";
      } else {
        alert(data.message || "Pesan gagal dikirim.");
      }
    } catch (error) {
      console.log("Form gagal diproses:", error);
      alert("Terjadi kesalahan. Coba lagi nanti.");
    }
  });
}