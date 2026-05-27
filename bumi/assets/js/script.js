// ==============================
// aos init
// ==============================
AOS.init({
    duration: 850,
    once: false,
    offset: 80
});


// ==============================
// navbar mobile
// ==============================
const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");

if(menuToggle && navMenu){
    menuToggle.addEventListener("click", () => {
        navMenu.classList.toggle("active");

        const icon = menuToggle.querySelector("i");

        if(navMenu.classList.contains("active")){
            icon.classList.remove("bi-list");
            icon.classList.add("bi-x-lg");
        }else{
            icon.classList.remove("bi-x-lg");
            icon.classList.add("bi-list");
        }
    });
}


// ==============================
// close mobile menu when link clicked
// ==============================
const navLinks = document.querySelectorAll(".nav-menu a");

navLinks.forEach(link => {
    link.addEventListener("click", () => {
        if(navMenu){
            navMenu.classList.remove("active");
        }

        const icon = menuToggle ? menuToggle.querySelector("i") : null;

        if(icon){
            icon.classList.remove("bi-x-lg");
            icon.classList.add("bi-list");
        }
    });
});


// ==============================
// navbar scroll effect + hide on scroll down
// ==============================
const navbar = document.getElementById("navbar");
let lastScroll = 0;

window.addEventListener("scroll", () => {
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if(navbar){
        if(currentScroll > 40){
            navbar.classList.add("scrolled");
        }else{
            navbar.classList.remove("scrolled");
        }

        if(currentScroll > lastScroll && currentScroll > 260){
            navbar.classList.add("nav-hidden");
        }else{
            navbar.classList.remove("nav-hidden");
        }
    }

    lastScroll = currentScroll <= 0 ? 0 : currentScroll;
});


// ==============================
// active nav link on scroll
// ==============================
const sections = document.querySelectorAll("section[id], main[id]");

window.addEventListener("scroll", () => {
    let currentSection = "";

    sections.forEach(section => {
        const sectionTop = section.offsetTop - 140;
        const sectionHeight = section.offsetHeight;

        if(window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight){
            currentSection = section.getAttribute("id");
        }
    });

    navLinks.forEach(link => {
        link.classList.remove("active");

        const href = link.getAttribute("href");

        if(href === `#${currentSection}`){
            link.classList.add("active");
        }
    });
});


// ==============================
// contact form validation
// ==============================
const contactForm = document.getElementById("contactForm");
const submitBtn = document.getElementById("submitBtn");

const nama = document.getElementById("nama");
const email = document.getElementById("email");
const telepon = document.getElementById("telepon");
const alamat = document.getElementById("alamat");
const paketInternet = document.getElementById("paketInternet");
const pesan = document.getElementById("pesan");

const formFields = [
    nama,
    email,
    telepon,
    alamat,
    paketInternet,
    pesan
];

function validateContactForm(){
    if(!submitBtn){
        return;
    }

    const isComplete = formFields.every(field => {
        return field && field.value.trim() !== "";
    });

    if(isComplete){
        submitBtn.disabled = false;
        submitBtn.classList.remove("disabled-btn");
    }else{
        submitBtn.disabled = true;
        submitBtn.classList.add("disabled-btn");
    }
}

formFields.forEach(field => {
    if(field){
        field.addEventListener("input", validateContactForm);
        field.addEventListener("change", validateContactForm);
    }
});

validateContactForm();


// ==============================
// whatsapp popup
// ==============================
const waPopup = document.getElementById("waPopup");
const waClose = document.getElementById("waClose");
const floatingCall = document.getElementById("floatingCall");
const waAdminButtons = document.querySelectorAll(".wa-admin-btn");

let waMode = "form";

function openWaPopup(mode = "form"){
    waMode = mode;

    if(waPopup){
        waPopup.classList.add("active");
    }
}

function closeWaPopup(){
    if(waPopup){
        waPopup.classList.remove("active");
    }
}

if(contactForm){
    contactForm.addEventListener("submit", function(e){
        e.preventDefault();

        validateContactForm();

        if(submitBtn && submitBtn.disabled){
            return;
        }

        openWaPopup("form");
    });
}

if(floatingCall){
    floatingCall.addEventListener("click", () => {
        openWaPopup("sales");
    });
}

if(waClose){
    waClose.addEventListener("click", closeWaPopup);
}

if(waPopup){
    waPopup.addEventListener("click", function(e){
        if(e.target === waPopup){
            closeWaPopup();
        }
    });
}


// ==============================
// whatsapp message
// ==============================
function buildFormMessage(){
    return `Halo BUMI Net 👋

Saya ingin melakukan pemasangan internet dengan data berikut:

━━━━━━━━━━━━━━━

*Nama Lengkap :*
${nama ? nama.value.trim() : "-"}

*Email :*
${email ? email.value.trim() : "-"}

*No Telepon :*
${telepon ? telepon.value.trim() : "-"}

*Alamat :*
${alamat ? alamat.value.trim() : "-"}

*Paket Yang Dipilih :*
${paketInternet ? paketInternet.value.trim() : "-"}

*Pesan :*
${pesan ? pesan.value.trim() : "-"}

━━━━━━━━━━━━━━━

Mohon informasi lebih lanjut yaa, terima kasih 🙏`;
}

function buildSalesMessage(){
    return `Halo BUMI Net 👋

Saya ingin bertanya tentang layanan internet BUMI Net.

━━━━━━━━━━━━━━━

*Kebutuhan :*
Informasi berlangganan / pemasangan internet

━━━━━━━━━━━━━━━

Mohon dibantu untuk informasi paket dan coverage area yaa, terima kasih 🙏`;
}

waAdminButtons.forEach(button => {
    button.addEventListener("click", () => {
        const number = button.getAttribute("data-wa");

        if(!number){
            return;
        }

        const message = waMode === "sales" ? buildSalesMessage() : buildFormMessage();
        const encodedMessage = encodeURIComponent(message);
        const waUrl = `https://wa.me/${number}?text=${encodedMessage}`;

        window.open(waUrl, "_blank");

        closeWaPopup();
    });
});


// ==============================
// plan button auto select package
// ==============================
const planButtons = document.querySelectorAll(".plan-btn");

planButtons.forEach(button => {
    button.addEventListener("click", () => {
        const planCard = button.closest(".plan-card");

        if(!planCard || !paketInternet){
            return;
        }

        const planName = planCard.querySelector(".plan-top span");
        const planSpeed = planCard.querySelector(".plan-top h3");

        if(planName && planSpeed){
            const selectedPackage = `${planName.textContent.trim()} - ${planSpeed.textContent.trim()}`;
            paketInternet.value = selectedPackage;
            validateContactForm();
        }
    });
});


// ==============================
// simple reveal fallback
// ==============================
window.addEventListener("load", () => {
    document.body.classList.add("loaded");
});

// ==============================
// typing effect
// ==============================
window.addEventListener("load", () => {
    const typingText = document.getElementById("typingText");

    if(!typingText){
        return;
    }

    const finalText = "Dari Bumi Untuk Semua";

    typingText.innerHTML = "";

    let index = 0;

    function typeEffect(){
        if(index < finalText.length){
            typingText.innerHTML += finalText[index];
            index++;
            setTimeout(typeEffect, 85);
        }
    }

    setTimeout(typeEffect, 500);
});// ==============================
// count up animation repeat
// ==============================
const countUpItems = document.querySelectorAll(".count-up");

function animateCountUp(item){
    const target = parseInt(item.getAttribute("data-target"));
    const duration = 1200;
    const startTime = performance.now();

    function updateCount(currentTime){
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);

        const easeOut = 1 - Math.pow(1 - progress, 3);
        const currentValue = Math.floor(easeOut * target);

        item.textContent = currentValue;

        if(progress < 1){
            requestAnimationFrame(updateCount);
        }else{
            item.textContent = target;
        }
    }

    item.textContent = 0;
    requestAnimationFrame(updateCount);
}

const countObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if(entry.isIntersecting){
            const counters = entry.target.querySelectorAll(".count-up");

            counters.forEach(counter => {
                animateCountUp(counter);
            });
        }else{
            const counters = entry.target.querySelectorAll(".count-up");

            counters.forEach(counter => {
                counter.textContent = 0;
            });
        }
    });
}, {
    threshold: 0.35
});

document.querySelectorAll("section, main").forEach(section => {
    if(section.querySelector(".count-up")){
        countObserver.observe(section);
    }
});
// ==============================
// page loader
// ==============================
document.addEventListener("DOMContentLoaded", () => {
    const pageLoader = document.getElementById("pageLoader");
    const loaderDots = document.getElementById("loaderDots");

    let dotIndex = 0;
    const dotList = ["", ".", "..", "..."];

    if(loaderDots){
        setInterval(() => {
            loaderDots.textContent = dotList[dotIndex];
            dotIndex = (dotIndex + 1) % dotList.length;
        }, 350);
    }

    if(pageLoader){
        setTimeout(() => {
            pageLoader.classList.add("hide");
        }, 1600);
    }
});