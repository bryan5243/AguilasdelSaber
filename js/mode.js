const themeToggler = document.querySelector(".theme-toggler");

// Función para aplicar el tema guardado al cargar la página
function applySavedTheme() {
  // Obtén el estado actual del tema almacenado en el localStorage
  const currentTheme = localStorage.getItem('theme');

  // Verifica si hay un tema almacenado en el localStorage
  if (currentTheme) {
    // Aplica el tema guardado al cuerpo del documento
    document.body.classList.add(currentTheme);

    // Aplica el estado del tema a los enlaces
    applyThemeToLinks(currentTheme);

    // Marca como activo el toggler según el tema guardado
    const isDarkTheme = currentTheme === 'dark-theme-variables';
    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active', !isDarkTheme);
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active', isDarkTheme);
  }
}

// Función para aplicar el estado del tema a los enlaces
function applyThemeToLinks(theme) {
  const links = document.querySelectorAll("a");
  links.forEach((link) => {
    link.classList.remove('dark-theme-variables');
    link.classList.remove('light-theme-variables');
    link.classList.add(theme);
  });
}

// Agrega el evento click al toggler
themeToggler.addEventListener('click', () => {
  // Verifica si el cuerpo del documento tiene la clase 'dark-theme-variables'
  const isDarkTheme = document.body.classList.contains('dark-theme-variables');

  // Actualiza el tema en el localStorage según el estado actual
  localStorage.setItem('theme', isDarkTheme ? 'light-theme-variables' : 'dark-theme-variables');

  // Cambia el tema del cuerpo del documento
  document.body.classList.toggle('dark-theme-variables');

  // Cambia el icono del toggler
  themeToggler.querySelector('span:nth-child(1)').classList.toggle('active', isDarkTheme);
  themeToggler.querySelector('span:nth-child(2)').classList.toggle('active', !isDarkTheme);

  // Aplica el estado del tema a los enlaces
  applyThemeToLinks(isDarkTheme ? 'light-theme-variables' : 'dark-theme-variables');
});

// Aplica el tema guardado al cargar la página
applySavedTheme();