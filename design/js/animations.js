
/* =========================================================
   MIKE DESIGN ARCHIVE
   ANIMATION ENGINE
   Typing • Scroll Reveal • Arrow Motion
========================================================= */

(() => {
    "use strict";

    /* CONFIGURATION */

    const CONFIG = {
        typingDuration: 5000,
        typingStartDelay: 500,
        arrowInterval: 5000,
        arrowAnimationDuration: 1200,
        observerThreshold: 0.12,
        observerRootMargin: "0px 0px -45px 0px"
    };


    /* ELEMENTS */

    const typingLine = document.querySelector(".typing-line");
    const typingHighlight = document.querySelector(".typing-highlight");
    const scrollArrow = document.querySelector(".scroll-arrow");

    const aosElements = document.querySelectorAll(
        "[data-aos]:not(.design-card)"
    );


    /* ACCESSIBILITY */

    const prefersReducedMotion = window.matchMedia(
        "(prefers-reduced-motion: reduce)"
    ).matches;


    /* =====================================================
       1. TYPING EFFECT
    ===================================================== */

    function startTyping() {
        if (!typingLine || !typingHighlight) return;

        const firstText = typingLine.textContent.trim();
        const secondText = typingHighlight.textContent.trim();

        if (prefersReducedMotion) {
            typingLine.textContent = firstText;
            typingHighlight.textContent = secondText;
            return;
        }

        const fullText = firstText + " " + secondText;
        const words = fullText.split(" ");

        const firstWord = words.slice(0, -1).join(" ");
        const lastWord = words[words.length - 1];

        typingLine.textContent = "";
        typingHighlight.textContent = "";

        const totalCharacters = fullText.length;
        const typingTime = CONFIG.typingDuration;

        const characterDelay = typingTime / totalCharacters;

        let currentIndex = 0;

        const cursor = document.createElement("span");

        cursor.className = "typing-cursor";
        cursor.setAttribute("aria-hidden", "true");

        cursor.textContent = "|";

        typingHighlight.after(cursor);

        function typeNextCharacter() {
            if (currentIndex >= totalCharacters) {
                cursor.remove();
                return;
            }

            const character = fullText[currentIndex];

            if (currentIndex < firstWord.length) {
                typingLine.textContent += character;
            } else if (currentIndex === firstWord.length) {
                // Spasi pemisah antarbaris kata.
            } else {
                typingHighlight.textContent += character;
            }

            currentIndex++;

            const nextDelay = characterDelay;

            setTimeout(typeNextCharacter, nextDelay);
        }

        setTimeout(typeNextCharacter, CONFIG.typingStartDelay);
    }


    /* =====================================================
       2. SCROLL REVEAL / AOS
    ===================================================== */

    const animationObserver = new IntersectionObserver(
        (entries, observer) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;

                const element = entry.target;

                const delay = Number(
                    element.dataset.aosDelay || 0
                );

                setTimeout(() => {
                    element.classList.add("aos-visible");
                }, delay);

                observer.unobserve(element);
            });
        },
        {
            threshold: CONFIG.observerThreshold,
            rootMargin: CONFIG.observerRootMargin
        }
    );


    /* OBSERVE INITIAL ELEMENTS */

    function initializeScrollAnimations() {
        aosElements.forEach(element => {
            if (prefersReducedMotion) {
                element.classList.add("aos-visible");
                return;
            }

            animationObserver.observe(element);
        });
    }


    /* SHARE OBSERVER WITH GALLERY.JS */

    window.galleryAnimationObserver = animationObserver;


    /* =====================================================
       3. ARROW MOTION
    ===================================================== */

    let arrowTimer = null;
    let arrowRunning = false;

    function animateArrow() {
        if (!scrollArrow || arrowRunning) return;

        arrowRunning = true;

        scrollArrow.classList.remove("arrow-motion");

        // Memicu ulang animasi CSS.
        void scrollArrow.offsetWidth;

        scrollArrow.classList.add("arrow-motion");

        setTimeout(() => {
            scrollArrow.classList.remove("arrow-motion");
            arrowRunning = false;
        }, CONFIG.arrowAnimationDuration);
    }


    function initializeArrowAnimation() {
        if (!scrollArrow || prefersReducedMotion) return;

        // Beri jeda sebelum animasi pertama.
        setTimeout(() => {
            animateArrow();

            arrowTimer = setInterval(
                animateArrow,
                CONFIG.arrowInterval
            );
        }, 2500);
    }


    /* =====================================================
       4. HOVER INTERACTION
       Hover effect is handled by CSS for better performance.
    ===================================================== */


    /* =====================================================
       5. INITIALIZE
    ===================================================== */

    function initializeAnimations() {
        startTyping();

        initializeScrollAnimations();

        initializeArrowAnimation();
    }


    if (document.readyState === "loading") {
        document.addEventListener(
            "DOMContentLoaded",
            initializeAnimations,
            { once: true }
        );
    } else {
        initializeAnimations();
    }


    /* =====================================================
       6. CLEANUP
    ===================================================== */

    window.addEventListener("pagehide", () => {
        animationObserver.disconnect();

        if (arrowTimer) {
            clearInterval(arrowTimer);
        }
    });

})();
