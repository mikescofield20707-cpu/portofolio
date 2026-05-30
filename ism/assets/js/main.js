const hamburger = document.getElementById("hamburger");
const navMenu = document.getElementById("navMenu");
const navbar = document.getElementById("navbar");
const themeToggle = document.getElementById("themeToggle");
const contactForm = document.getElementById("contactForm");

if (hamburger && navMenu) {
  hamburger.addEventListener("click", () => {
    navMenu.classList.toggle("active");
  });
}

let lastScroll = 0;

window.addEventListener("scroll", () => {
  if (!navbar) return;

  const currentScroll = window.pageYOffset;

  if (currentScroll > 18) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }

  if (currentScroll > lastScroll && currentScroll > 120) {
    navbar.classList.add("nav-hidden");
  } else {
    navbar.classList.remove("nav-hidden");
  }

  lastScroll = currentScroll;
});

const savedTheme = localStorage.getItem("ism-theme");

if (savedTheme === "dark") {
  document.body.classList.add("dark-mode");
}

function updateThemeIcon() {
  if (!themeToggle) return;

  const isDark = document.body.classList.contains("dark-mode");

  themeToggle.innerHTML = isDark
    ? '<i data-lucide="sun"></i>'
    : '<i data-lucide="moon"></i>';

  if (window.lucide) {
    lucide.createIcons();
  }
}

if (themeToggle) {
  themeToggle.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");

    const isDark = document.body.classList.contains("dark-mode");
    localStorage.setItem("ism-theme", isDark ? "dark" : "light");

    updateThemeIcon();
  });
}

document.querySelectorAll("a[href]").forEach((link) => {
  const href = link.getAttribute("href");

  if (
    !href ||
    href.startsWith("#") ||
    href.startsWith("http") ||
    href.startsWith("mailto:") ||
    href.startsWith("tel:") ||
    link.target === "_blank"
  ) {
    return;
  }

  link.addEventListener("click", (event) => {
    event.preventDefault();

    document.body.classList.add("page-leave");

    setTimeout(() => {
      window.location.href = href;
    }, 520);
  });
});

if (contactForm) {
  contactForm.addEventListener("submit", (event) => {
    event.preventDefault();

    const nama = document.getElementById("nama").value.trim();
    const perusahaan = document.getElementById("perusahaan").value.trim();
    const email = document.getElementById("email").value.trim();
    const telepon = document.getElementById("telepon").value.trim();
    const layanan = document.getElementById("layanan").value.trim();
    const pesan = document.getElementById("pesan").value.trim();

    const nomorWa = "628111599992";

    const text = `Halo ISM

Saya ingin konsultasi layanan IT dengan data berikut:

Nama Lengkap:
${nama}

Nama Perusahaan:
${perusahaan}

Email:
${email}

Nomor Telepon:
${telepon}

Layanan yang Dibutuhkan:
${layanan}

Pesan:
${pesan}

Terima kasih`;

    const encodedText = encodeURIComponent(text);
    window.open(`https://wa.me/${nomorWa}?text=${encodedText}`, "_blank");
  });
}

if (window.lucide) {
  lucide.createIcons();
}

updateThemeIcon();

