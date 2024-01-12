function validarImagen() {
  var input = document.querySelector('input[type="file"]');
  var archivo = input.files[0];

  // Verificar si se seleccionó un archivo
  if (archivo) {
      // Verificar la extensión del archivo
      var extension = archivo.name.split('.').pop().toLowerCase();
      if (extension === 'jpeg' || extension === 'jpg' || extension === 'png') {
          // Archivo permitido (es jpeg o png)
          var imagenPreview = document.getElementById("imagen-preview");
          imagenPreview.src = URL.createObjectURL(archivo);
          imagenPreview.style.display = "block"; // Mostrar la imagen como vista previa
          var mensajeError = document.getElementById("mensaje-error");
          mensajeError.style.display = "none"; // Ocultar el mensaje de error si la validación es exitosa
      } else {
          // Archivo no permitido (no es jpeg ni png)
          var mensajeError = document.getElementById("mensaje-error");
          mensajeError.innerText = "Solo se permiten archivos JPEG y PNG.";
          mensajeError.style.display = "block";
          var imagenPreview = document.getElementById("imagen-preview");
          imagenPreview.style.display = "none"; // Ocultar la vista previa si la validación falla
          input.value = ""; // Limpiar el valor del input para que el usuario deba elegir nuevamente
      }
  }
}

function ocultarImagen(event) {
    var imagenContainer = document.getElementById("imagen-container");
    var mensajeError = document.getElementById("mensaje-error");

    if (event.target.files && event.target.files[0]) {
      imagenContainer.style.display = "none";
    } else {
      imagenContainer.style.display = "block";
    }

    mensajeError.style.display = "none";
  }

 