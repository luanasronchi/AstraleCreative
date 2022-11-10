const changeThemeBtn = document.querySelector("#change-theme");

// Toggle dark mode
function toggleDarkMode() {
  document.body.classList.toggle("black_theme");
}

// Load light or dark mode
function loadTheme() {
  const darkMode = localStorage.getItem("black_theme");

  if (darkMode) {
    toggleDarkMode();
  }
}

loadTheme();

changeThemeBtn.addEventListener("change", function () {
  toggleDarkMode();

  // Save or remove dark mode from localStorage
  localStorage.removeItem("black_theme");

  if (document.body.classList.contains("black_theme")) {
    localStorage.setItem("black_theme", 1);
  }
});