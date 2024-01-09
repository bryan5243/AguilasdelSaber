document.addEventListener('DOMContentLoaded', function () {
  var enlaces = document.querySelectorAll('.sidebar a');

  // Función para establecer la clase "activa" en el enlace del tablero y guardarlo en localStorage
  function setActiveDashboardLink() {
    var dashboardLink = document.querySelector('a[href="dashboard.php"]');
    if (dashboardLink) {
      dashboardLink.classList.add('active');
      localStorage.setItem('activeLink', 'dashboard.php');
    }
  }
  // Comprobar si hay un enlace activo almacenado y aplicar el estado "activo" en consecuencia
  var activeLink = localStorage.getItem('activeLink');
  if (activeLink) {
    enlaces.forEach(function (enlace) {
      if (enlace.getAttribute('href') === activeLink) {
        enlace.classList.add('active');
      }
    });
  } else {
    // Seleccione el enlace del panel al iniciar sesión
    var isLoggedIn = true; // Reemplace esto con su lógica para comprobar si el usuario ha iniciado sesión
    if (isLoggedIn) {
      setActiveDashboardLink();
    }
  }

  enlaces.forEach(function (enlace) {
    enlace.addEventListener('click', function (event) {
      // Remove the "active" class from all links
      enlaces.forEach(function (enlace) {
        enlace.classList.remove('active');
      });
      // Agregue la clase "activa" solo al enlace en el que se hizo clic
      this.classList.add('active');
      // Almacenar el enlace activo en localStorage
      var href = this.getAttribute('href');
      if (href) {
        localStorage.setItem('activeLink', href);
      }
    });
  });

  // Restablecer el enlace activo al cerrar la sesión
  var logoutButton = document.querySelector('.logout-button'); // Reemplace ".logout-button" con el selector para su botón de cierre de sesión
  if (logoutButton) {
    logoutButton.addEventListener('click', function () {
      localStorage.removeItem('activeLink');
      setActiveDashboardLink();
    });
  }
});