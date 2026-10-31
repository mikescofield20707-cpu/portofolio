(() => {
  "use strict";

  function initGallery() {
    const gallery = document.getElementById("galleryGrid");
    const countLabel = document.getElementById("galleryCount");
    const addButton = document.getElementById("addPhotoBtn");
    const lightbox = document.getElementById("galleryLightbox");

    if (!gallery || !lightbox) {
      console.error(
        "Gallery: galleryGrid atau galleryLightbox tidak ditemukan"
      );
      return;
    }

    const lightboxImage = document.getElementById("lightboxImage");
    const lightboxCaption = document.getElementById("lightboxCaption");
    const closeButton = document.getElementById("lightboxClose");
    const previousButton = document.getElementById("lightboxPrev");
    const nextButton = document.getElementById("lightboxNext");

    if (!lightboxImage || !lightboxCaption) {
      console.error(
        "Gallery: elemen gambar atau caption lightbox tidak ditemukan"
      );
      return;
    }

    let cards = [];
    let activeIndex = 0;
    let lastFocusedElement = null;
    let closeTimer = null;

    function refreshCards() {
      cards = Array.from(
        gallery.querySelectorAll(".gallery-card")
      );

      if (countLabel) {
        countLabel.textContent = cards.length
          ? `${cards.length} photos in our collection`
          : "No photos yet";
      }
    }

    function openLightbox(index) {
      refreshCards();

      if (!cards.length) return;

      activeIndex = (index + cards.length) % cards.length;

      const card = cards[activeIndex];
      const image = card.querySelector("img");

      const source =
        card.dataset.image ||
        image?.currentSrc ||
        image?.src;

      if (!source) {
        console.error("Gallery: sumber gambar tidak ditemukan", card);
        return;
      }

      if (closeTimer !== null) {
        window.clearTimeout(closeTimer);
        closeTimer = null;
      }

      lastFocusedElement = document.activeElement;

      lightboxImage.src = source;
      lightboxImage.alt =
        image?.alt ||
        card.dataset.caption ||
        "Gallery photo";

      lightboxCaption.textContent =
        card.dataset.caption ||
        card.querySelector(".gallery-overlay span")?.textContent ||
        image?.alt ||
        "";

      lightbox.classList.remove("hidden");
      lightbox.setAttribute("aria-hidden", "false");
      document.body.classList.add("lightbox-open");

      requestAnimationFrame(() => {
        lightbox.classList.add("is-open");
        closeButton?.focus();
      });
    }

    function closeLightbox() {
      if (
        lightbox.classList.contains("hidden") ||
        !lightbox.classList.contains("is-open")
      ) {
        return;
      }

      lightbox.classList.remove("is-open");
      lightbox.setAttribute("aria-hidden", "true");
      document.body.classList.remove("lightbox-open");

      if (closeTimer !== null) {
        window.clearTimeout(closeTimer);
      }

      closeTimer = window.setTimeout(() => {
        if (!lightbox.classList.contains("is-open")) {
          lightbox.classList.add("hidden");
          lightboxImage.removeAttribute("src");
          closeTimer = null;
          lastFocusedElement?.focus?.();
        }
      }, 280);
    }

    function showPrevious() {
      openLightbox(activeIndex - 1);
    }

    function showNext() {
      openLightbox(activeIndex + 1);
    }

    gallery.addEventListener("click", (event) => {
      const target = event.target;

      if (!(target instanceof Element)) return;

      const card = target.closest(".gallery-card");

      if (!card || !gallery.contains(card)) return;

      refreshCards();

      const index = cards.indexOf(card);

      if (index !== -1) {
        openLightbox(index);
      }
    });

    closeButton?.addEventListener("click", closeLightbox);
    previousButton?.addEventListener("click", showPrevious);
    nextButton?.addEventListener("click", showNext);

    lightbox.addEventListener("click", (event) => {
      if (event.target === lightbox) {
        closeLightbox();
      }
    });

    document.addEventListener("keydown", (event) => {
      if (
        lightbox.classList.contains("hidden") ||
        !lightbox.classList.contains("is-open")
      ) {
        return;
      }

      if (event.key === "Escape") {
        closeLightbox();
      } else if (event.key === "ArrowLeft") {
        showPrevious();
      } else if (event.key === "ArrowRight") {
        showNext();
      }
    });

    addButton?.addEventListener("click", () => {
      const picker = document.createElement("input");

      picker.type = "file";
      picker.accept = "image/*";
      picker.multiple = true;

      picker.addEventListener("change", () => {
        const files = Array.from(picker.files || []);

        files.forEach((file) => {
          if (!file.type.startsWith("image/")) return;

          const source = URL.createObjectURL(file);
          const title = file.name.replace(/\.[^.]+$/, "");

          const card = document.createElement("button");
          card.type = "button";
          card.className = "gallery-card";
          card.dataset.image = source;
          card.dataset.caption = title;
          card.setAttribute("aria-label", `Open photo: ${title}`);

          const image = document.createElement("img");
          image.src = source;
          image.alt = title;
          image.loading = "lazy";

          const overlay = document.createElement("span");
          overlay.className = "gallery-overlay";

          const icon = document.createElement("i");
          icon.className = "fa-solid fa-expand";
          icon.setAttribute("aria-hidden", "true");

          const label = document.createElement("span");
          label.textContent = title;

          overlay.append(icon, label);
          card.append(image, overlay);
          gallery.appendChild(card);
        });

        refreshCards();
      });

      picker.click();
    });

    lightbox.classList.add("hidden");
    lightbox.classList.remove("is-open");
    lightbox.setAttribute("aria-hidden", "true");
    document.body.classList.remove("lightbox-open");

    refreshCards();

    window.galleryController = {
      refresh: refreshCards,
      open: openLightbox,
      close: closeLightbox,
      next: showNext,
      previous: showPrevious
    };

    console.info("Gallery: JavaScript berhasil diinisialisasi");
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", initGallery, {
      once: true
    });
  } else {
    initGallery();
  }
})();