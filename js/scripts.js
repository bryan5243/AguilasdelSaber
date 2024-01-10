function validarFormulario() {
    // Validar aquí cualquier condición adicional que necesites
    // Por ejemplo, puedes verificar que los campos no estén vacíos
    if ($("#cedula").val() === "" || $("#apellidos_nombres").val() === "" || $("#direccion").val() === "" || $("#ocupacion").val() === "" || $("#telefono").val() === "" || $("#correo").val() === "") {
        alert("Todos los campos deben estar llenos.");
        return false;
    }
    return true;
}

function handleResponse(response) {
    if (response.success) {
        alert(response.message);
        // Verificar si hay una URL de redirección
        if (response.redirect) {
            // Redirigir a la nueva página
            window.location.href = response.redirect;
        }
    } else {
        alert(response.message);
    }
}