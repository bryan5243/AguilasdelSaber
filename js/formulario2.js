// Puedes agregar funciones o lógica específica aquí según sea necesario
// Recuerda incluir este archivo en tu formulario2.php
$(document).ready(function() {
    $("#studentForm2").submit(function(event) {
        event.preventDefault();
        var form = $(this);

        // Puedes agregar validaciones adicionales según tus necesidades

        if (form[0].checkValidity()) {
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    $('#successModal').modal('show');
                    // Puedes agregar más lógica después del éxito
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