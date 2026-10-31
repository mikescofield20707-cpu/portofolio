
/* ========================================
   MICHAEL & NEZIA — LOVE COUNTER
   ======================================== */

(() => {
  "use strict";

  const counter = document.querySelector(".counter-grid");

  if (!counter) return;

  const daysElement = document.getElementById("counterDays");
  const hoursElement = document.getElementById("counterHours");
  const minutesElement = document.getElementById("counterMinutes");
  const secondsElement = document.getElementById("counterSeconds");
  const durationElement = document.getElementById("counterDuration");
  const startDateInput = document.getElementById("relationshipStartDate");

  const elements = [
    daysElement,
    hoursElement,
    minutesElement,
    secondsElement
  ];

  if (elements.some((element) => !element)) {
    console.warn("Love Counter: elemen counter belum lengkap");
    return;
  }

  const pad = (value) => String(value).padStart(2, "0");

  function getStartDate() {
    const savedDate = localStorage.getItem("relationshipStartDate");
    const htmlDate = counter.dataset.startDate;

    const dateValue = savedDate || htmlDate;

    if (!dateValue) return null;

    const parsedDate = new Date(dateValue);

    if (Number.isNaN(parsedDate.getTime())) return null;

    return parsedDate;
  }

  function getRelationshipDuration(startDate, now) {
  let years = now.getFullYear() - startDate.getFullYear();
  let months = now.getMonth() - startDate.getMonth();
  let days = now.getDate() - startDate.getDate();

  if (days < 0) {
    months--;

    const previousMonth = new Date(
      now.getFullYear(),
      now.getMonth(),
      0
    );

    days += previousMonth.getDate();
  }

  if (months < 0) {
    years--;
    months += 12;
  }

  const parts = [];

  if (years > 0) {
    parts.push(`<span>${years}</span> tahun`);
  }

  if (months > 0) {
    parts.push(`<span>${months}</span> bulan`);
  }

  parts.push(`<span>${days}</span> hari`);

  return parts.join(", ");
}

  function updateCounter() {
    const startDate = getStartDate();

    if (!startDate) {
      daysElement.textContent = "--";
      hoursElement.textContent = "--";
      minutesElement.textContent = "--";
      secondsElement.textContent = "--";
      return;
    }

    const now = new Date();
    const difference = now.getTime() - startDate.getTime();

    if (durationElement) {
  if (difference < 0) {
    durationElement.textContent = "Waktu kita belum dimulai";
  } else {
    durationElement.innerHTML =
      `Kita udah selama ${getRelationshipDuration(startDate, now)}`;
  }
}

    if (difference < 0) {
      daysElement.textContent = "0";
      hoursElement.textContent = "00";
      minutesElement.textContent = "00";
      secondsElement.textContent = "00";
      return;
    }

    const totalSeconds = Math.floor(difference / 1000);

    const days = Math.floor(totalSeconds / 86400);
    const hours = Math.floor((totalSeconds % 86400) / 3600);
    const minutes = Math.floor((totalSeconds % 3600) / 60);
    const seconds = totalSeconds % 60;

    daysElement.textContent = days.toLocaleString("en-US");
    hoursElement.textContent = pad(hours);
    minutesElement.textContent = pad(minutes);
    secondsElement.textContent = pad(seconds);
  }

  function saveStartDate(value) {
    if (!value) {
      localStorage.removeItem("relationshipStartDate");
    } else {
      const parsedDate = new Date(value);

      if (Number.isNaN(parsedDate.getTime())) return;

      localStorage.setItem("relationshipStartDate", value);
    }

    updateCounter();
  }

  if (startDateInput) {
    const savedDate = localStorage.getItem("relationshipStartDate");

    if (savedDate) {
      startDateInput.value = savedDate;
    }

    startDateInput.addEventListener("change", () => {
      saveStartDate(startDateInput.value);
    });
  }

  window.addEventListener("storage", (event) => {
    if (event.key === "relationshipStartDate") {
      updateCounter();
    }
  });

  updateCounter();
  window.setInterval(updateCounter, 1000);

  window.relationshipCounter = {
    refresh: updateCounter,
    setStartDate: saveStartDate
  };
})();
