
/* =========================================================
   DESIGN ARCHIVE — MICHAEL SCOFIELD
   Gallery, Search, Pagination & Lightbox
========================================================= */

/* CONFIGURATION */

const ITEMS_PER_PAGE = 30;


/* DESIGN DATA */

const DESIGNS = [
    {
        title: "The Groom",
        category: "T-shirt graphic",
        image: "assets/designs/groom.jpg",
        year: "2026"
    },
    {
        title: "Blacklist Wishes",
        category: "T-shirt graphic",
        image: "assets/designs/mw.jpg",
        year: "2026"
    }
];


/* ELEMENTS */

const grid = document.getElementById("galleryGrid");
const pagination = document.getElementById("pagination");
const pageInfo = document.getElementById("pageInfo");
const resultCount = document.getElementById("resultCount");
const emptyState = document.getElementById("emptyState");

const searchInput = document.getElementById("searchInput");
const clearSearch = document.getElementById("clearSearch");

const lightbox = document.getElementById("lightbox");
const lightboxImage = document.getElementById("lightboxImage");
const lightboxTitle = document.getElementById("lightboxTitle");
const lightboxCounter = document.getElementById("lightboxCounter");

const yearElement = document.getElementById("year");

const gallerySection = document.getElementById("gallery");


/* STATE */

let currentPage = 1;
let visibleItems = [];
let lightboxIndex = 0;


/* INITIALIZATION */

if (yearElement) {
    yearElement.textContent = new Date().getFullYear();
}


/* UTILITIES */

function esc(value) {
    return String(value ?? "").replace(/[&<>"']/g, char => ({
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#39;"
    }[char]));
}


function filtered() {
    const query = searchInput.value
        .trim()
        .toLocaleLowerCase("id");

    if (!query) return DESIGNS;

    return DESIGNS.filter(design => {
        const content = [
            design.title,
            design.category,
            design.year
        ]
            .join(" ")
            .toLocaleLowerCase("id");

        return content.includes(query);
    });
}


/* IMAGE PLACEHOLDER */

function imagePlaceholder(message = "IMAGE NOT FOUND") {
    return `
        <div class="image-placeholder">
            <div>
                <i class="fa-regular fa-image" aria-hidden="true"></i>
                <span>${esc(message)}</span>
            </div>
        </div>
    `;
}


/* SCROLL ANIMATION SUPPORT */

function observeGalleryAnimations() {
    const cards = grid.querySelectorAll(".design-card");

    if (!("IntersectionObserver" in window)) {
        cards.forEach(card => {
            card.classList.add("aos-visible");
        });

        return;
    }

    cards.forEach(card => {
        card.setAttribute("data-aos", "fade-up");
        card.classList.remove("aos-visible");
    });

    requestAnimationFrame(() => {
        if (window.galleryAnimationObserver) {
            cards.forEach(card => {
                window.galleryAnimationObserver.observe(card);
            });
        } else {
            cards.forEach(card => {
                card.classList.add("aos-visible");
            });
        }
    });
}


/* RENDER GALLERY */

function render() {
    visibleItems = filtered();

    const totalPages = Math.max(
        1,
        Math.ceil(visibleItems.length / ITEMS_PER_PAGE)
    );

    currentPage = Math.min(currentPage, totalPages);

    const start = (currentPage - 1) * ITEMS_PER_PAGE;

    const items = visibleItems.slice(
        start,
        start + ITEMS_PER_PAGE
    );

    resultCount.textContent = `${visibleItems.length} karya`;

    pageInfo.textContent =
        `Halaman ${currentPage} dari ${totalPages}`;

    emptyState.hidden = visibleItems.length > 0;
    grid.hidden = visibleItems.length === 0;

    grid.innerHTML = items.map((design, index) => {
        const title = esc(design.title || "Untitled design");
        const category = esc(design.category || "Apparel design");
        const image = esc(design.image || "");
        const year = design.year ? esc(design.year) : "";

        const globalIndex = start + index;

        const media = image
            ? `
                <img
                    class="card-image"
                    src="${image}"
                    alt="${title}"
                    loading="lazy"
                    decoding="async"
                >
            `
            : imagePlaceholder("ADD YOUR DESIGN IMAGE");

        return `
            <article class="design-card">

                <button
                    class="card-image-button"
                    type="button"
                    data-index="${globalIndex}"
                    aria-label="Lihat ${title}"
                >
                    ${media}
                </button>

                <div class="card-info">

                    <div>
                        <h3>${title}</h3>

                        <p>
                            ${category}${year ? ` · ${year}` : ""}
                        </p>
                    </div>

                    <span class="card-index">
                        ${String(globalIndex + 1).padStart(2, "0")}
                    </span>

                </div>

            </article>
        `;
    }).join("");

    renderPages(totalPages);

    observeGalleryAnimations();
}


/* IMAGE ERROR HANDLING */

grid.addEventListener("error", event => {
    const image = event.target;

    if (!image.matches(".card-image")) return;

    const button = image.closest(".card-image-button");

    if (!button) return;

    button.innerHTML = imagePlaceholder("IMAGE NOT FOUND");

}, true);


/* PAGINATION */

function renderPages(total) {

    const createButton = (
        icon,
        page,
        disabled = false,
        current = false,
        aria = ""
    ) => `
        <button
            type="button"
            class="page-button${current ? " current" : ""}"
            data-page="${page}"
            ${disabled ? "disabled" : ""}
            ${current ? 'aria-current="page"' : ""}
            aria-label="${aria || `Halaman ${page}`}"
        >
            ${icon}
        </button>
    `;

    let output = createButton(
        '<i class="fa-solid fa-chevron-left" aria-hidden="true"></i>',
        currentPage - 1,
        currentPage === 1,
        false,
        "Halaman sebelumnya"
    );

    const pages = [
        ...new Set([
            1,
            total,
            currentPage,
            currentPage - 1,
            currentPage + 1,
            currentPage - 2,
            currentPage + 2
        ])
    ]
        .filter(page => page >= 1 && page <= total)
        .sort((a, b) => a - b);

    let previous = 0;

    for (const page of pages) {

        if (previous && page - previous > 1) {
            output += `
                <span
                    class="page-ellipsis"
                    aria-hidden="true"
                >…</span>
            `;
        }

        output += createButton(
            page,
            page,
            false,
            page === currentPage
        );

        previous = page;
    }

    output += createButton(
        '<i class="fa-solid fa-chevron-right" aria-hidden="true"></i>',
        currentPage + 1,
        currentPage === total,
        false,
        "Halaman berikutnya"
    );

    pagination.innerHTML = output;
}


function goto(page) {
    const total = Math.max(
        1,
        Math.ceil(filtered().length / ITEMS_PER_PAGE)
    );

    currentPage = Math.max(
        1,
        Math.min(total, page)
    );

    render();

    gallerySection.scrollIntoView({
        behavior: "smooth",
        block: "start"
    });
}


/* LIGHTBOX */

function openBox(index) {
    const design = visibleItems[index];

    if (!design || !design.image) return;

    lightboxIndex = index;

    updateBox();

    lightbox.hidden = false;
    document.body.style.overflow = "hidden";

    document.getElementById("closeLightbox").focus();
}


function updateBox() {
    const design = visibleItems[lightboxIndex];

    if (!design) return;

    lightboxImage.src = design.image;

    lightboxImage.alt =
        design.title || "Design preview";

    lightboxTitle.textContent =
        design.title || "Untitled design";

    lightboxCounter.textContent =
        `${lightboxIndex + 1} / ${visibleItems.length}`;
}


function closeBox() {
    lightbox.hidden = true;

    document.body.style.overflow = "";

    lightboxImage.removeAttribute("src");
}


function stepBox(direction) {

    const indexes = visibleItems
        .map((design, index) => ({
            design,
            index
        }))
        .filter(item => item.design.image);

    if (!indexes.length) return;

    let position = indexes.findIndex(
        item => item.index === lightboxIndex
    );

    position = (
        position + direction + indexes.length
    ) % indexes.length;

    lightboxIndex = indexes[position].index;

    updateBox();
}


/* SEARCH */

searchInput.addEventListener("input", () => {

    currentPage = 1;

    clearSearch.hidden = !searchInput.value;

    render();
});


clearSearch.addEventListener("click", () => {

    searchInput.value = "";

    clearSearch.hidden = true;

    currentPage = 1;

    render();

    searchInput.focus();
});


/* EVENT DELEGATION */

pagination.addEventListener("click", event => {

    const button = event.target.closest("[data-page]");

    if (button && !button.disabled) {
        goto(Number(button.dataset.page));
    }

});


grid.addEventListener("click", event => {

    const button = event.target.closest("[data-index]");

    if (button) {
        openBox(Number(button.dataset.index));
    }

});


/* LIGHTBOX CONTROLS */

document.getElementById("closeLightbox")
    .addEventListener("click", closeBox);


document.getElementById("lightboxPrev")
    .addEventListener("click", () => stepBox(-1));


document.getElementById("lightboxNext")
    .addEventListener("click", () => stepBox(1));


lightbox.addEventListener("click", event => {

    if (event.target === lightbox) {
        closeBox();
    }

});


/* KEYBOARD CONTROLS */

document.addEventListener("keydown", event => {

    if (lightbox.hidden) return;

    if (event.key === "Escape") {
        closeBox();
    }

    if (event.key === "ArrowLeft") {
        stepBox(-1);
    }

    if (event.key === "ArrowRight") {
        stepBox(1);
    }

});


/* START */

render();
