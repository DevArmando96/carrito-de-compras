$(document).ready(function () {
    // Función para alertas (se mantiene igual)
    function showAlert(message, type) {
        const alertHtml = `
            <div class="alert alert-${type} alert-dismissible fade show mt-3" role="alert">
                ${message}
            </div>`;
        const $alertElement = $(alertHtml).appendTo('#register');
        setTimeout(() => { if ($alertElement) $alertElement.alert('close'); }, 5000);
    }

    // --- NUEVO: Limpiar formulario al cancelar o cerrar el modal ---
    // Esto asegura que si el usuario escribe algo y cancela, al volver a entrar esté limpio
    $('#btnCancelar').on('click', function () {
        $('#register')[0].reset();
        $('#register').find('.alert').remove(); // Borra alertas viejas
    });

    $('#register').on('submit', function (e) {
        e.preventDefault();

        const $form = $(this);
        const $btn = $form.find('button[type="submit"]');

        const producto = {
            nombre: $('#nom').val().trim(),
            descripcion: $('#des').val().trim(),
            precio: parseFloat($('#pre').val()) || 0,
            stock: parseInt($('#sto').val()) || 0,
            categoria: $('#cate').val(),
            fecha: $('#fech').val() || new Date().toISOString().slice(0, 19).replace('T', ' '),
            activo: parseInt($('#ac').val()) || 0
        };

        $btn.prop('disabled', true).text('Procesando...');

        $.ajax({
            url: 'crud/add.php',
            type: 'POST',
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
            data: JSON.stringify(producto)
        })
            .done(function (res) {
                if (res.status === "success") {
                    showAlert("<strong>¡Guardado!</strong> " + res.message, 'success');
                    $form[0].reset(); // Limpia campos tras éxito

                    // Opcional: Cerrar el modal automáticamente tras guardar con éxito después de 2 segundos
                    // setTimeout(() => { $('.modal').modal('hide'); }, 2000);
                } else {
                    showAlert("<strong>Atención:</strong> " + res.message, 'warning');
                }
            })
            .fail(function (jqXHR) {
                console.error("Error:", jqXHR.responseText);
                showAlert("<strong>Error:</strong> No se pudo procesar la solicitud.", 'danger');
            })
            .always(() => $btn.prop('disabled', false).text('Registrar'));
    });
});
