(() => {
  "use strict";

  const grid = document.getElementById("galleryGrid");
  const count = document.getElementById("photoCount");
  const empty = document.getElementById("galleryEmpty");
  const loader = document.getElementById("galleryLoader");
  const modal = document.getElementById("photoModal");
  const modalImage = document.getElementById("modalImage");
  const modalCaption = document.getElementById("modalCaption");
  const modalCounter = document.getElementById("modalCounter");
  const closeButton = document.getElementById("modalClose");
  const prevButton = document.getElementById("modalPrev");
  const nextButton = document.getElementById("modalNext");
  const figure = document.getElementById("modalFigure");

  let photos = [];
  let activeIndex = 0;
  let previousOverflow = "";

  const hideLoader = () => {
    window.setTimeout(() => loader?.classList.add("is-hidden"), 350);
  };

  function formatIndex(number) {
    return String(number).padStart(2, "0");
  }

  function renderPhotos() {
    grid.innerHTML = "";
    count.textContent = photos.length;

    if (!photos.length) {
      empty.hidden = false;
      return;
    }

    empty.hidden = true;
    const fragment = document.createDocumentFragment();

    photos.forEach((photo, index) => {
      const button = document.createElement("button");
      button.type = "button";
      button.className = "gallery-photo";
      button.style.animationDelay = `${Math.min(index * 55, 550)}ms`;
      button.setAttribute("aria-label", `Open photo ${index + 1}`);

      const image = document.createElement("img");
      image.src = photo.src;
      image.alt = photo.alt || photo.caption || `Memory ${index + 1}`;
      image.loading = index < 6 ? "eager" : "lazy";
      image.decoding = "async";

      const number = document.createElement("span");
      number.className = "photo-index";
      number.textContent = formatIndex(index + 1);

      const label = document.createElement("span");
      label.className = "photo-hover-label";
      label.innerHTML = '<i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i> Look it up!';

      button.append(image, number, label);
      button.addEventListener("click", () => openModal(index));
      image.addEventListener("error", () => button.remove());
      fragment.appendChild(button);
    });

    grid.appendChild(fragment);
  }

  function updateModal() {
    const photo = photos[activeIndex];
    if (!photo) return;
    modalImage.src = photo.src;
    modalImage.alt = photo.alt || photo.caption || `Memory ${activeIndex + 1}`;
    modalCaption.textContent = photo.caption || "";
    modalCounter.textContent = `${formatIndex(activeIndex + 1)} / ${formatIndex(photos.length)}`;
    const multiple = photos.length > 1;
    prevButton.hidden = !multiple;
    nextButton.hidden = !multiple;
  }

  function openModal(index) {
    if (!photos.length) return;
    activeIndex = index;
    updateModal();
    previousOverflow = document.body.style.overflow;
    document.body.style.overflow = "hidden";
    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    closeButton.focus();
  }

  function closeModal() {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.style.overflow = previousOverflow;
    modalImage.src = "";
  }

  function movePhoto(direction) {
    if (photos.length < 2) return;
    activeIndex = (activeIndex + direction + photos.length) % photos.length;
    updateModal();
  }

  closeButton.addEventListener("click", closeModal);
  prevButton.addEventListener("click", () => movePhoto(-1));
  nextButton.addEventListener("click", () => movePhoto(1));

  // Click the dark backdrop to close; clicks on the image and controls stay open.
  modal.addEventListener("click", (event) => {
    if (event.target === modal) closeModal();
  });
  figure.addEventListener("click", (event) => event.stopPropagation());

  document.addEventListener("keydown", (event) => {
    if (!modal.classList.contains("is-open")) return;
    if (event.key === "Escape") closeModal();
    if (event.key === "ArrowLeft") movePhoto(-1);
    if (event.key === "ArrowRight") movePhoto(1);
  });

  async function loadGallery() {
    try {
      const response = await fetch("assets/gallery/gallery-images.json", { cache: "no-store" });
      if (!response.ok) throw new Error("Gallery manifest not found");
      const manifest = await response.json();

      photos = Array.isArray(manifest)
        ? manifest
        : Array.isArray(manifest.photos) ? manifest.photos : [];

      photos = photos
        .filter((photo) => photo && typeof photo.src === "string")
        .map((photo) => ({
          src: photo.src,
          caption: typeof photo.caption === "string" ? photo.caption : "",
          alt: typeof photo.alt === "string" ? photo.alt : ""
        }));

      renderPhotos();
    } catch (error) {
      console.warn("Could not load gallery manifest:", error);
      empty.hidden = false;
      empty.querySelector("h3").textContent = "Gallery manifest not found";
      empty.querySelector("p").textContent =
        "Run scripts/generate-gallery.mjs after adding photos to assets/gallery/.";
    } finally {
      hideLoader();
    }
  }

  loadGallery();
})();
