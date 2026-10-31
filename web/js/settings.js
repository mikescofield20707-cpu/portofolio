/* ========================================
   SETTINGS SYSTEM
   Michael & Nezia — Our Little Universe
======================================== */

(() => {
  "use strict";

  const STORAGE_KEY = "ourLittleUniverseSettings";

  const DEFAULTS = {
    nameOne: "Michael",
    nameTwo: "Nezia",
    startDate: "2025-08-18",
    theme: "romantic",
    animations: true,
    reducedMotion: false
  };

  const THEMES = ["romantic", "midnight", "rose"];

  const $ = (id) => document.getElementById(id);

  const elements = {
    form: $("settingsForm"),
    nameOne: $("settingsNameOne"),
    nameTwo: $("settingsNameTwo"),
    date: $("settingsStartDate"),
    theme: $("settingsTheme"),
    animations: $("settingsAnimations"),
    reducedMotion: $("settingsReducedMotion"),
    reset: $("resetSettingsBtn"),
    message: $("settingsMessage"),
    counter: $("loveCounter")
  };

  if (!elements.form) return;

  /* LOAD SETTINGS */

  function loadSettings() {
    try {
      const saved = JSON.parse(
        localStorage.getItem(STORAGE_KEY)
      );

      if (!saved || typeof saved !== "object") {
        return { ...DEFAULTS };
      }

      return {
        ...DEFAULTS,
        ...saved,

        theme: THEMES.includes(saved.theme)
          ? saved.theme
          : DEFAULTS.theme,

        animations: saved.animations !== false,
        reducedMotion: saved.reducedMotion === true
      };

    } catch (error) {
      console.error("Settings load error:", error);
      return { ...DEFAULTS };
    }
  }

  let settings = loadSettings();

  /* SAVE SETTINGS */

  function saveSettings() {
    try {
      localStorage.setItem(
        STORAGE_KEY,
        JSON.stringify(settings)
      );

      return true;

    } catch (error) {
      console.error("Settings storage error:", error);
      return false;
    }
  }

  /* APPLY NAMES */

  function applyNames() {
    document.querySelectorAll("[data-person]").forEach((element) => {
      const person = element.dataset.person;

      if (person === "one") {
        element.textContent = settings.nameOne;
      }

      if (person === "two") {
        element.textContent = settings.nameTwo;
      }
    });

    document.title =
      `${settings.nameOne} & ${settings.nameTwo} — Our Little Universe`;
  }

  /* APPLY DATE */

  function applyDate() {
    if (!elements.counter) return;

    elements.counter.dataset.startDate =
      `${settings.startDate}T00:00:00`;

    elements.counter.dispatchEvent(
      new CustomEvent("settings:datechange", {
        detail: {
          startDate: settings.startDate
        }
      })
    );
  }

  /* APPLY THEME */

  function applyTheme() {
    document.documentElement.dataset.theme =
      settings.theme;

    document.body.dataset.theme =
      settings.theme;
  }

  /* APPLY ANIMATIONS */

  function applyMotion() {
    const root = document.documentElement;

    root.classList.toggle(
      "animations-disabled",
      !settings.animations || settings.reducedMotion
    );

    root.classList.toggle(
      "reduced-motion",
      settings.reducedMotion
    );
  }

  /* APPLY EVERYTHING */

  function applySettings() {
    applyNames();
    applyDate();
    applyTheme();
    applyMotion();
  }

  /* POPULATE FORM */

  function populateForm() {
    elements.nameOne.value = settings.nameOne;
    elements.nameTwo.value = settings.nameTwo;
    elements.date.value = settings.startDate;
    elements.theme.value = settings.theme;

    elements.animations.checked =
      settings.animations;

    elements.reducedMotion.checked =
      settings.reducedMotion;
  }

  /* MESSAGE */

  function showMessage(message, type = "success") {
    const target = elements.message;

    if (!target) return;

    target.textContent = message;
    target.className =
      `form-message ${type} show`;
  }

  /* VALIDATE DATE */

  function isValidDate(dateString) {
    const date = new Date(`${dateString}T00:00:00`);

    return (
      /^\d{4}-\d{2}-\d{2}$/.test(dateString) &&
      !Number.isNaN(date.getTime()) &&
      date.toISOString().slice(0, 10) === dateString
    );
  }

  /* SAVE BUTTON */

  elements.form.addEventListener("submit", (event) => {
    event.preventDefault();

    const nameOne = elements.nameOne.value.trim();
    const nameTwo = elements.nameTwo.value.trim();
    const startDate = elements.date.value;
    const theme = elements.theme.value;

    if (!nameOne || !nameTwo || !startDate) {
      showMessage(
        "Please complete all required fields.",
        "error"
      );
      return;
    }

    if (
      new Date(`${startDate}T00:00:00`).getTime() >
      new Date().getTime()
    ) {
      showMessage(
        "The start date cannot be in the future.",
        "error"
      );
      return;
    }

    if (!THEMES.includes(theme)) {
      showMessage(
        "Please select a valid theme.",
        "error"
      );
      return;
    }

    settings = {
      nameOne,
      nameTwo,
      startDate,
      theme,

      animations: elements.animations.checked,
      reducedMotion: elements.reducedMotion.checked
    };

    if (!saveSettings()) {
      showMessage(
        "Unable to save settings in this browser.",
        "error"
      );
      return;
    }

    /* RELOAD WEBSITE */

    window.location.reload();
  });

  /* RESET BUTTON */

  elements.reset.addEventListener("click", () => {
    const confirmed = window.confirm(
      "Reset all settings to default?"
    );

    if (!confirmed) return;

    settings = { ...DEFAULTS };

    if (!saveSettings()) {
      showMessage(
        "Unable to reset settings.",
        "error"
      );
      return;
    }

    /* RELOAD WEBSITE */

    window.location.reload();
  });

  /* INITIALIZE */

  populateForm();
  applySettings();

})();