
/* ========================================
   MICHAEL & NEZIA — SECRET SPACE
======================================== */

document.addEventListener("DOMContentLoaded", () => {
  "use strict";

  // SECRET CONFIGURATION
  const SECRET_PASSWORD = "180825";

  // ELEMENTS
  const secretForm = document.getElementById("secretForm");
  const secretPassword = document.getElementById("secretPassword");
  const togglePassword = document.getElementById("toggleSecretPassword");
  const secretMessage = document.getElementById("secretMessage");
  const secretContent = document.getElementById("secretContent");
  const lockButton = document.getElementById("lockSecretBtn");
  const secretSection = document.getElementById("secret");

  if (
    !secretForm ||
    !secretPassword ||
    !togglePassword ||
    !secretContent ||
    !lockButton
  ) {
    console.warn("Secret Space: beberapa elemen HTML tidak ditemukan");
    return;
  }

  let isProcessing = false;
  let secretNotificationShown = false;
  let notificationQueue = Promise.resolve();

  // ========================================
  // CREATE NOTIFICATION
  // ========================================

  const notification = document.createElement("div");

  notification.className = "secret-toast";
  notification.setAttribute("role", "status");
  notification.setAttribute("aria-live", "polite");

  notification.innerHTML = `
    <div class="secret-toast-icon">
      <i class="fa-solid fa-lock"></i>
    </div>

    <div class="secret-toast-content">
      <span class="secret-toast-label">PRIVATE NOTIFICATION</span>
      <strong class="secret-toast-title"></strong>
      <p class="secret-toast-description"></p>

      <div class="secret-toast-progress">
        <span></span>
      </div>
    </div>
  `;

  document.body.appendChild(notification);

  const toastTitle = notification.querySelector(".secret-toast-title");
  const toastDescription = notification.querySelector(
    ".secret-toast-description"
  );
  const toastIcon = notification.querySelector(".secret-toast-icon i");
  const progress = notification.querySelector(
    ".secret-toast-progress span"
  );

  // ========================================
  // NOTIFICATION SYSTEM
  // ========================================

  function showNotification(type, title, description) {
    const settings = {
      locked: {
        icon: "fa-lock",
        className: "toast-locked"
      },

      success: {
        icon: "fa-lock-open",
        className: "toast-success"
      },

      welcome: {
        icon: "fa-heart",
        className: "toast-welcome"
      },

      error: {
        icon: "fa-user-secret",
        className: "toast-error"
      }
    };

    const config = settings[type];

    if (!config) {
      console.warn("Notification type tidak dikenal:", type);
      return Promise.resolve();
    }

    // Queue agar notifikasi tidak saling bertabrakan
    notificationQueue = notificationQueue.then(() => {
      return new Promise((resolve) => {
        notification.className = "secret-toast";

        toastTitle.textContent = title;
        toastDescription.textContent = description;
        toastIcon.className = `fa-solid ${config.icon}`;

        notification.classList.add(config.className);

        // Reset progress
        progress.style.animation = "none";
        progress.style.transform = "scaleX(0)";

        void notification.offsetWidth;

        // Show notification
        notification.classList.add("is-visible");

        // Start progress animation
        progress.style.animation =
          "secretProgress 2.4s linear forwards";

        // Hide notification
        setTimeout(() => {
          notification.classList.remove("is-visible");
          notification.classList.add("is-leaving");

          setTimeout(() => {
            notification.classList.remove("is-leaving");
            resolve();
          }, 500);

        }, 2450);
      });
    });

    return notificationQueue;
  }

  // ========================================
  // WELCOME NOTIFICATION
  // Appears 5 seconds after page loads
  // ========================================

  setTimeout(() => {
    showNotification(
      "welcome",
      "WELCOME SAYANG!",
      "Baca baik-baik yaa, jangan buru-buru, i hope u like it"
    );
  }, 5000);

  // ========================================
  // SECRET SPACE NOTIFICATION
  // Appears when entering Secret Space
  // ========================================

  if (secretSection && "IntersectionObserver" in window) {
    const secretObserver = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (
            entry.isIntersecting &&
            !secretNotificationShown &&
            !secretForm.classList.contains("hidden")
          ) {
            secretNotificationShown = true;

            showNotification(
              "locked",
              "SECRET MESSAGE LOCKED",
              "A private little message is waiting for you..."
            );
          }
        });
      },
      {
        threshold: 0.35
      }
    );

    secretObserver.observe(secretSection);
  }

  // ========================================
  // UNLOCK SECRET SPACE
  // ========================================

  secretForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    if (isProcessing) return;

    const enteredPassword = secretPassword.value.trim();
    const submitButton = secretForm.querySelector(
      'button[type="submit"]'
    );

    isProcessing = true;

    secretPassword.blur();

    if (enteredPassword === SECRET_PASSWORD) {
      secretMessage.textContent = "";
      secretMessage.classList.remove("error");

      if (submitButton) {
        submitButton.disabled = true;
      }

      await showNotification(
        "success",
        "ACCESS GRANTED",
        "A little message has been waiting for you..."
      );

      secretForm.classList.add("hidden");
      secretContent.classList.remove("hidden");
      secretContent.classList.add("secret-reveal");

      setTimeout(() => {
        secretContent.classList.remove("secret-reveal");
      }, 1000);

      secretPassword.value = "";

      if (submitButton) {
        submitButton.disabled = false;
      }

    } else {
      secretPassword.value = "";

      secretMessage.textContent =
        "Incorrect passphrase. Try again.";

      secretMessage.classList.add("error");

      await showNotification(
        "error",
        "WHO'S TRYING TO OPEN THIS LETTER?",
        "Someone just tried to access a secret message..."
      );

      secretPassword.focus();
    }

    isProcessing = false;
  });

  // ========================================
  // SHOW / HIDE PASSWORD
  // ========================================

  togglePassword.addEventListener("click", () => {
    const isPassword = secretPassword.type === "password";

    secretPassword.type = isPassword ? "text" : "password";

    const icon = togglePassword.querySelector("i");

    if (icon) {
      icon.classList.toggle("fa-eye", !isPassword);
      icon.classList.toggle("fa-eye-slash", isPassword);
    }

    togglePassword.setAttribute(
      "aria-label",
      isPassword ? "Hide passphrase" : "Show passphrase"
    );
  });

  // ========================================
  // LOCK SECRET SPACE AGAIN
  // ========================================

  lockButton.addEventListener("click", async () => {
    if (isProcessing) return;

    isProcessing = true;
    lockButton.disabled = true;

    await showNotification(
      "locked",
      "SECRET MESSAGE LOCKED",
      "This little secret is now hidden again..."
    );

    secretContent.classList.add("hidden");
    secretForm.classList.remove("hidden");

    secretPassword.value = "";
    secretMessage.textContent = "";
    secretMessage.classList.remove("error");

    secretPassword.type = "password";

    const icon = togglePassword.querySelector("i");

    if (icon) {
      icon.classList.add("fa-eye");
      icon.classList.remove("fa-eye-slash");
    }

    togglePassword.setAttribute(
      "aria-label",
      "Show passphrase"
    );

    lockButton.disabled = false;
    isProcessing = false;
  });

});


/* ========================================
   NAVIGATION ACTIVE SECTION - SCROLL SPY
======================================== */

(() => {
  "use strict";

  function initNavigationScrollSpy() {
    const navbar = document.getElementById("navbar");
    const navLinks = document.querySelectorAll(".nav-link");

    if (!navbar || !navLinks.length) return;

    const navigationItems = Array.from(navLinks)
      .map((link) => {
        const targetId = link.getAttribute("href");

        if (!targetId || !targetId.startsWith("#")) {
          return null;
        }

        const section = document.querySelector(targetId);

        if (!section) return null;

        return {
          link,
          section
        };
      })
      .filter(Boolean);

    if (!navigationItems.length) return;

    let ticking = false;

    function updateActiveNavigation() {
      const navbarHeight = navbar.offsetHeight;
      const activationPoint = navbarHeight + 80;

      let currentItem = navigationItems[0];

      navigationItems.forEach((item) => {
        const sectionTop =
          item.section.getBoundingClientRect().top;

        if (sectionTop <= activationPoint) {
          currentItem = item;
        }
      });

      const atPageBottom =
        window.innerHeight + window.scrollY >=
        document.documentElement.scrollHeight - 5;

      if (atPageBottom) {
        currentItem =
          navigationItems[navigationItems.length - 1];
      }

      navigationItems.forEach((item) => {
        const isActive = item === currentItem;

        item.link.classList.toggle("active", isActive);

        if (isActive) {
          item.link.setAttribute("aria-current", "location");
        } else {
          item.link.removeAttribute("aria-current");
        }
      });

      ticking = false;
    }

    function requestNavigationUpdate() {
      if (ticking) return;

      ticking = true;
      requestAnimationFrame(updateActiveNavigation);
    }

    window.addEventListener("scroll", requestNavigationUpdate, {
      passive: true
    });

    window.addEventListener("resize", requestNavigationUpdate);

    navigationItems.forEach((item) => {
      item.link.addEventListener("click", () => {
        requestNavigationUpdate();
      });
    });

    updateActiveNavigation();
  }

  if (document.readyState === "loading") {
    document.addEventListener(
      "DOMContentLoaded",
      initNavigationScrollSpy
    );
  } else {
    initNavigationScrollSpy();
  }

})();
