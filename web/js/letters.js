(() => {
  "use strict";

  const STORAGE_KEY = "michael_nezia_letters_v1";

  const grid = document.getElementById("lettersGrid");
  const countLabel = document.getElementById("letterCount");
  const addButton = document.getElementById("addLetterBtn");

  if (!grid || !addButton) {
    console.error("Letters: elemen utama tidak ditemukan");
    return;
  }

  const defaultLetter = {
    id: "welcome-letter",
    date: "A LETTER FOR ANY DAY",
    title: "Open when you need a little reminder",
    preview: "A little reminder that you are loved, always.",
    content: `Haii sayanggg ♡

Kaloo kamuu bacaa inii pelann" yaaa..., jangann buruu buruu sayangg..., yaaa???okeyy, ingett yaaa, akuu disinii cumaa mauu ngingetinn, kamu ituu spesiall buat akuu sayangg, jangann terus berfikir
kaloo kamuu ituu gak menarikk buat siapapunn, yaa??kamuu cantikk, liatt ajaa, kamuu senyumm jugaa aku masihh bisaa senengg.., kamuu biasaa ajaa jugaa kamuu tetepp yang terbaikk sayangg
kamuu haruss semangatt!!, yaaa??yayayayayayaa??? jangann maless" ann heii, cowok mana yg mau sama istri yang malesann, sokk, kamuu jugaa gamauu kann ngecewaiinn akuuu, jadii...

akuu disiniii kerjaa.., kamu disanaa nugass yang semangatt, yaaa??? kamuu gak haruss jadi yang terbaikk, karenaa buat akuu kamu sekarangg udah jadii yang terbaikk sayangkuuu..., yaaa..

tanemm  pikirannh, bahwaa kamu bakal selalu bisa, gaakan bisa kalau gak nyobaa, dann kamu itu spesiall, jadi tolong untuk percayaa dirii, yaa sayangg..., lovee uuu sayanggkuuu ♡♡♡

With love,
Michael`,
    custom: false
  };

  function loadSavedLetters() {
    try {
      const saved = JSON.parse(localStorage.getItem(STORAGE_KEY) || "[]");
      return Array.isArray(saved) ? saved : [];
    } catch (error) {
      console.error("Letters: gagal membaca penyimpanan", error);
      return [];
    }
  }

  let letters = [
    defaultLetter,
    ...loadSavedLetters().filter(
      (letter) =>
        letter &&
        letter.id !== defaultLetter.id &&
        typeof letter.title === "string" &&
        typeof letter.content === "string"
    )
  ];

  let previousFocus = null;
  let activeModal = null;

  function el(tag, className, text) {
    const node = document.createElement(tag);
    if (className) node.className = className;
    if (text !== undefined) node.textContent = text;
    return node;
  }

  function saveLetters() {
    try {
      localStorage.setItem(
        STORAGE_KEY,
        JSON.stringify(letters.filter((letter) => letter.custom))
      );
      return true;
    } catch (error) {
      console.error("Letters: gagal menyimpan surat", error);
      showToast("Surat gagal disimpan di browser ini");
      return false;
    }
  }

  function showToast(message) {
    let container = document.querySelector(".toast-container");

    if (!container) {
      container = el("div", "toast-container");
      container.setAttribute("aria-live", "polite");
      document.body.append(container);
    }

    const toast = el("div", "toast");
    const icon = document.createElement("i");
    icon.className = "fa-regular fa-heart";
    icon.setAttribute("aria-hidden", "true");

    toast.append(icon, el("span", "", message));
    container.append(toast);

    window.setTimeout(() => toast.remove(), 3500);
  }

  function renderLetters() {
    grid.replaceChildren();

    letters.forEach((letter) => {
      const card = el("article", "letter-card");

      const iconWrap = el("div", "letter-icon");
      const icon = document.createElement("i");
      icon.className = "fa-regular fa-envelope-open";
      icon.setAttribute("aria-hidden", "true");
      iconWrap.append(icon);

      const date = el("span", "letter-date", letter.date);
      const title = el("h3", "", letter.title);
      const preview = el("p", "", letter.preview);

      const openButton = el("button", "text-link letter-open-btn");
      openButton.type = "button";
      openButton.dataset.letterId = letter.id;
      openButton.append(document.createTextNode("Open letter "));

      const arrow = document.createElement("i");
      arrow.className = "fa-solid fa-arrow-right";
      arrow.setAttribute("aria-hidden", "true");
      openButton.append(arrow);

      openButton.addEventListener("click", () => openLetter(letter.id));

      card.append(iconWrap, date, title, preview, openButton);

      if (letter.custom) {
        const deleteButton = el("button", "text-link");
        deleteButton.type = "button";
        deleteButton.append(
          document.createTextNode("Delete letter "),
          Object.assign(document.createElement("i"), {
            className: "fa-regular fa-trash-can"
          })
        );
        deleteButton.addEventListener("click", () => deleteLetter(letter.id));
        card.append(deleteButton);
      }

      grid.append(card);
    });

    if (countLabel) {
      countLabel.textContent =
        letters.length === 1
          ? "Your collection of 1 letter"
          : `Your collection of ${letters.length} letters`;
    }
  }

  function closeModal() {
    if (!activeModal) return;

    activeModal.remove();
    activeModal = null;
    document.body.classList.remove("no-scroll");
    previousFocus?.focus?.();
  }

  function createModal(titleText, content, actions = []) {
    closeModal();
    previousFocus = document.activeElement;

    const modal = el("div", "modal");
    modal.setAttribute("role", "presentation");

    const backdrop = el("div", "modal-backdrop");
    const panel = el("section", "modal-panel");
    panel.setAttribute("role", "dialog");
    panel.setAttribute("aria-modal", "true");
    panel.setAttribute("aria-label", titleText);

    const header = el("div", "modal-header");
    const heading = el("h2", "", titleText);
    const closeButton = el("button", "icon-btn");
    closeButton.type = "button";
    closeButton.setAttribute("aria-label", "Close");
    closeButton.innerHTML = '<i class="fa-solid fa-xmark" aria-hidden="true"></i>';

    closeButton.addEventListener("click", closeModal);
    backdrop.addEventListener("click", closeModal);

    header.append(heading, closeButton);

    const body = el("div", "modal-body");
    body.append(content);

    panel.append(header, body);

    if (actions.length) {
      const footer = el("div", "modal-actions");
      actions.forEach((action) => footer.append(action));
      panel.append(footer);
    }

    modal.append(backdrop, panel);
    document.body.append(modal);
    document.body.classList.add("no-scroll");

    activeModal = modal;
    closeButton.focus();

    return modal;
  }

  function openLetter(id) {
    const letter = letters.find((item) => item.id === id);
    if (!letter) return;

    const content = el("div", "letter-modal-content");

    content.append(
      el("span", "letter-date", letter.date),
      el("h2", "", letter.title),
      el("p", "", letter.content)
    );

    createModal(letter.title, content);
  }

  function createField(labelText, name, placeholder, multiline = false) {
    const wrapper = el("div", "form-field");
    const id = `letter-${name}-${Math.random().toString(36).slice(2, 8)}`;
    const label = el("label", "", labelText);
    label.htmlFor = id;

    const field = document.createElement(multiline ? "textarea" : "input");
    field.id = id;
    field.name = name;
    field.required = true;
    field.placeholder = placeholder;

    if (multiline) {
      field.rows = 7;
      field.maxLength = 10000;
    } else {
      field.type = "text";
      field.maxLength = name === "date" ? 70 : 100;
    }

    wrapper.append(label, field);
    return { wrapper, field };
  }

  function openComposeForm() {
    const form = el("form", "modal-body");
    form.style.padding = "0";
    form.style.gap = "18px";

    const title = createField(
      "Letter title",
      "title",
      "A little note for you"
    );

    const date = createField(
      "Letter label",
      "date",
      "OPEN WHEN YOU MISS ME"
    );

    const preview = createField(
      "Short description",
      "preview",
      "A little preview of your letter"
    );

    const content = createField(
      "Your letter",
      "content",
      "Write whatever your heart wants to say...",
      true
    );

    form.append(
      title.wrapper,
      date.wrapper,
      preview.wrapper,
      content.wrapper
    );

    const cancelButton = el("button", "btn btn-outline btn-small", "Cancel");
    cancelButton.type = "button";
    cancelButton.addEventListener("click", closeModal);

    const saveButton = el("button", "btn btn-primary btn-small", "Save letter");
    saveButton.type = "submit";

    const modal = createModal("Write a letter", form, [
      cancelButton,
      saveButton
    ]);

    form.addEventListener("submit", (event) => {
      event.preventDefault();

      const letter = {
        id: `letter-${Date.now()}`,
        title: title.field.value.trim(),
        date: date.field.value.trim().toUpperCase(),
        preview: preview.field.value.trim(),
        content: content.field.value.trim(),
        custom: true
      };

      if (
        !letter.title ||
        !letter.date ||
        !letter.preview ||
        !letter.content
      ) {
        showToast("Isi semua bagian surat dulu ya");
        return;
      }

      letters.push(letter);

      if (!saveLetters()) {
        letters = letters.filter((item) => item.id !== letter.id);
        return;
      }

      renderLetters();
      closeModal();
      showToast("Your letter has been saved ♡");
    });

    modal.querySelector("input")?.focus();
  }

  function deleteLetter(id) {
    const letter = letters.find((item) => item.id === id);
    if (!letter || !letter.custom) return;

    if (!window.confirm(`Delete "${letter.title}"?`)) return;

    const previousLetters = letters;
    letters = letters.filter((item) => item.id !== id);

    if (!saveLetters()) {
      letters = previousLetters;
      return;
    }

    renderLetters();
    showToast("Letter deleted");
  }

  addButton.addEventListener("click", openComposeForm);

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && activeModal) closeModal();
  });

  renderLetters();

  window.lettersController = {
    refresh: renderLetters,
    open: openLetter,
    close: closeModal
  };

  console.info("Letters: JavaScript berhasil diinisialisasi");
})();
