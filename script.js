// =============================
// SIRENDESK LANDING PAGE SCRIPT
// =============================
// File ini mengatur fitur interaktif landing page seperti navbar,
// menu mobile, animasi scroll, counter angka, FAQ accordion,
// form kirim pesan ke WhatsApp, kode rahasia admin,
// dan counter Clients di Landing Page Performance.


// =============================
// RESET SCROLL TO TOP ON REFRESH
// =============================
// Saat halaman di-refresh, posisi halaman otomatis kembali ke paling atas.
// Tidak berlaku saat user klik tombol yang redirect ke WhatsApp.

if ("scrollRestoration" in history) {
    history.scrollRestoration = "manual";
}

window.addEventListener("load", () => {
    const navigationType = performance.getEntriesByType("navigation")[0]?.type;

    if (navigationType === "reload") {
        window.scrollTo({
            top: 0,
            left: 0,
            behavior: "auto"
        });
    }
});


// Mengambil elemen-elemen utama dari HTML
const navbar = document.getElementById("navbar");
const menuToggle = document.getElementById("menuToggle");
const navLinks = document.getElementById("navLinks");
const year = document.getElementById("year");
const contactForm = document.getElementById("contactForm");


// Mengisi tahun otomatis di footer
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

    // Menutup menu mobile otomatis saat link navigasi diklik
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

                // Animasi cukup berjalan sekali
                revealObserver.unobserve(entry.target);
            }
        });
    },
    {
        threshold: 0.12,
    }
);

// Mendaftarkan semua elemen reveal ke observer
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

            // Counter hanya dianimasikan sekali
            counterObserver.unobserve(counter);
        });
    },
    {
        threshold: 0.5,
    }
);

// Mendaftarkan semua elemen counter
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

// Mengambil angka Clients terbaru dari server saat halaman dibuka
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

// Load angka Clients terbaru ketika website dibuka
loadPerformanceClientCounter();


// =============================
// LEAD FORM
// =============================
// Aturan:
// 1. Jika nama lengkap = "barcelona"
//    dan pesan = "real madrid",
//    maka data disimpan ke admin dan diarahkan ke admin.php.
//
// 2. Jika selain itu,
//    user diarahkan ke WhatsApp admin,
//    dan data TIDAK disimpan ke admin.
//
// 3. Kolom nama lengkap hanya boleh berisi huruf dan spasi.
//    Tidak boleh angka dan karakter spesial.

if (contactForm) {
    contactForm.addEventListener("submit", async (event) => {
        event.preventDefault();

        const nameInput = document.getElementById("name");
        const serviceInput = document.getElementById("service");
        const messageInput = document.getElementById("message");

        const name = nameInput.value.trim();
        const service = serviceInput.value.trim();
        const message = messageInput.value.trim();

        // Validasi sederhana sebelum diproses
        if (!name || !service) {
            alert("Nama dan kebutuhan wajib diisi.");
            return;
        }

        // Validasi nama lengkap
        // Hanya boleh huruf dan spasi.
        // Tidak boleh angka, simbol, titik, koma, underscore, strip, dan karakter spesial lainnya.
        const namePattern = /^[A-Za-zÀ-ÿ\s]+$/;

        if (!namePattern.test(name)) {
            alert("Nama lengkap hanya boleh berisi huruf dan spasi. Tidak boleh angka atau karakter spesial.");
            nameInput.focus();
            return;
        }

        // Mengubah input menjadi huruf kecil
        // agar tidak terpengaruh huruf kapital
        const nameLower = name.toLowerCase();
        const messageLower = message.toLowerCase();

        // Kode rahasia untuk masuk admin
        const isAdminCode =
            nameLower === "barcelona" &&
            messageLower === "real madrid";

        // =============================
        // JIKA KODE ADMIN BENAR
        // =============================
        // Baru data dikirim ke save-lead.php
        // dan diarahkan ke admin.php

        if (isAdminCode) {
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
                    if (performanceClientCounter) {
                        performanceClientCounter.textContent = data.count;
                    }

                    alert("Kode admin benar. Masuk ke halaman admin.");
                    contactForm.reset();

                    window.location.href = "admin.php";
                } else {
                    alert(data.message || "Pesan gagal diproses.");
                }
            } catch (error) {
                console.log("Form gagal diproses:", error);
                alert("Terjadi kesalahan. Coba lagi nanti.");
            }

            return;
        }

        // =============================
        // JIKA BUKAN KODE ADMIN
        // =============================
        // User diarahkan ke WhatsApp admin.
        // Data tidak masuk ke admin.php.

        const nomorAdmin = "6282336722751";
        // Ganti dengan nomor WhatsApp admin kamu.
        // Contoh:
        // const nomorAdmin = "6282336722751";

        const teksWhatsapp =
            `Halo Admin SirenDesk,%0A%0A` +
            `Saya ingin konsultasi layanan.%0A%0A` +
            `Nama: ${encodeURIComponent(name)}%0A` +
            `Kebutuhan: ${encodeURIComponent(service)}%0A` +
            `Pesan: ${encodeURIComponent(message)}`;

        window.location.href = `https://wa.me/${nomorAdmin}?text=${teksWhatsapp}`;
    });
}
