function redirigirFormulario2() {
    window.location.href = '../admin/formulario2.php';
}

$(document).ready(function() {
    $("#studentForm").submit(function(event) {
        event.preventDefault();
        var form = $(this);

        // Validar que la cédula contenga solo números
        var cedulaInput = $('#cedula');
        if (!/^\d+$/.test(cedulaInput.val())) {
            alert('La cédula debe contener solo números.');
            return;
        }

        // Validar que el código de servicio contenga solo números
        var codigoServicioInput = $('#codigoServicio');
        if (!/^\d+$/.test(codigoServicioInput.val())) {
            alert('El código de servicio debe contener solo números.');
            return;
        }

        if (form[0].checkValidity()) {
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    $('#successModal').modal('show');
                    setTimeout(function() {
                        window.location.href = 'formulario2.php';
                    }, 1000); 
                },
                error: function(error) {
                    console.log(error);
                }
            });
        } else {
            $('#emptyFieldsAlert').alert();
        }
    });
});
