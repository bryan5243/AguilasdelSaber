// preinscripcion.js

document.addEventListener('DOMContentLoaded', function () {
    const reportButtons = document.querySelectorAll('button[name="generar_reporte"]');
    reportButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();

            const estudianteId = this.value;
            const form = document.getElementById('form_' + estudianteId);
            const input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'generar_reporte');
            input.setAttribute('value', estudianteId);
            form.appendChild(input);
            form.submit();
        });
    });
});
