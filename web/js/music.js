
(() => {
  "use strict";

  const $ = (selector) => document.querySelector(selector);

  const audio = $("#audioPlayer");
  const list = $("#songList");
  const title = $("#musicTitle");
  const artist = $("#musicArtist");
  const playBtn = $("#musicPlay");
  const prevBtn = $("#musicPrev");
  const nextBtn = $("#musicNext");
  const seek = $("#musicSeek");
  const volume = $("#musicVolume");
  const currentTime = $("#musicCurrentTime");
  const durationTime = $("#musicDuration");
  const status = $("#musicStatus");

  if (!audio || !list || !playBtn) {
    console.error("Music player: elemen HTML tidak ditemukan");
    return;
  }

  // Masukkan file lagu ke folder assets/music
  const songs = [
    {
      title: "Everything U Are - Hindia",
      artist: "Hindia",
      src: "assets/music/eua.mp3"
    },
    {
      title: "A Thousand Years - Christina Perri",
      artist: "Christina Perri",
      src: "assets/music/aty.mp3"
    },
    {
      title: "Forever in Our Memories",
      artist: "Our Little Universe",
      src: "assets/music/song-3.mp3"
    }
  ];

  let currentIndex = 0;

  function setStatus(message) {
    if (status) status.textContent = message;
  }

  function formatTime(time) {
    if (!Number.isFinite(time) || time < 0) return "0:00";

    const minutes = Math.floor(time / 60);
    const seconds = Math.floor(time % 60);

    return `${minutes}:${String(seconds).padStart(2, "0")}`;
  }

  function updatePlayButton(playing) {
    playBtn.innerHTML = playing
      ? '<i class="fa-solid fa-pause" aria-hidden="true"></i>'
      : '<i class="fa-solid fa-play" aria-hidden="true"></i>';

    playBtn.setAttribute(
      "aria-label",
      playing ? "Pause song" : "Play song"
    );
  }

  function renderPlaylist() {
    list.replaceChildren();

    songs.forEach((song, index) => {
      const row = document.createElement("article");
      row.className =
        `song-row${index === currentIndex ? " active" : ""}`;

      const icon = document.createElement("div");
      icon.className = "song-row-icon";
      icon.innerHTML =
        '<i class="fa-solid fa-music" aria-hidden="true"></i>';

      const details = document.createElement("div");

      const songTitle = document.createElement("h4");
      songTitle.textContent = song.title;

      const songArtist = document.createElement("p");
      songArtist.textContent = song.artist;

      details.append(songTitle, songArtist);

      const actions = document.createElement("div");
      actions.className = "song-row-actions";

      const button = document.createElement("button");
      button.type = "button";
      button.className = "icon-btn";
      button.setAttribute("aria-label", `Play ${song.title}`);
      button.innerHTML =
        '<i class="fa-solid fa-play" aria-hidden="true"></i>';

      button.addEventListener("click", () => loadSong(index, true));

      actions.append(button);
      row.append(icon, details, actions);
      list.append(row);
    });
  }

  function loadSong(index, autoplay = false) {
    if (index < 0 || index >= songs.length) return;

    currentIndex = index;

    const song = songs[currentIndex];

    audio.src = song.src;
    audio.load();

    title.textContent = song.title;
    artist.textContent = song.artist;

    seek.value = 0;
    currentTime.textContent = "0:00";
    durationTime.textContent = "0:00";

    updatePlayButton(false);
    renderPlaylist();
    setStatus("Ready to play");

    if (autoplay) {
      audio.play()
        .then(() => setStatus("Now playing"))
        .catch(() => {
          setStatus("Could not play, check the audio file");
        });
    }
  }

  function togglePlay() {
    if (audio.paused) {
      audio.play()
        .then(() => setStatus("Now playing"))
        .catch(() => setStatus("Could not play this song"));
    } else {
      audio.pause();
    }
  }

  function playNext() {
    loadSong((currentIndex + 1) % songs.length, true);
  }

  function playPrevious() {
    loadSong(
      (currentIndex - 1 + songs.length) % songs.length,
      true
    );
  }

  playBtn.addEventListener("click", togglePlay);
  prevBtn?.addEventListener("click", playPrevious);
  nextBtn?.addEventListener("click", playNext);

  volume?.addEventListener("input", () => {
    audio.volume = Number(volume.value);
  });

  seek?.addEventListener("input", () => {
    if (Number.isFinite(audio.duration) && audio.duration > 0) {
      audio.currentTime =
        (Number(seek.value) / 100) * audio.duration;
    }
  });

  audio.addEventListener("play", () => updatePlayButton(true));
  audio.addEventListener("pause", () => updatePlayButton(false));

  audio.addEventListener("loadedmetadata", () => {
    durationTime.textContent = formatTime(audio.duration);
  });

  audio.addEventListener("timeupdate", () => {
    currentTime.textContent = formatTime(audio.currentTime);

    if (audio.duration > 0) {
      if (document.activeElement !== seek) {
        seek.value = (audio.currentTime / audio.duration) * 100;
      }

      durationTime.textContent = formatTime(audio.duration);
    }
  });

  audio.addEventListener("ended", playNext);

  audio.addEventListener("error", () => {
    setStatus("Song file not found, check assets/music");
    updatePlayButton(false);
  });

  audio.volume = Number(volume?.value ?? 0.8);

  // Sembunyikan tombol tambah lagu karena playlist sudah ditentukan
  const addButton = $("#addSongBtn");
  if (addButton) addButton.hidden = true;

  loadSong(0);
})();
