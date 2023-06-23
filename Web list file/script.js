function isDarkMode() {
  return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
}

function setDarkMode(isDark) {
  const body = document.querySelector('body');
  body.classList.toggle('dark-mode', isDark);
}

function toggleDarkMode() {
  const body = document.querySelector('body');
  body.classList.toggle('dark-mode');
}

window.addEventListener('DOMContentLoaded', function() {
  const isDark = isDarkMode();
  setDarkMode(isDark);
});
