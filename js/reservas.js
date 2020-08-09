//Javascript de la pagina de reservas
function eliminar(codigo) {
            var parametros = {
                "codigo" : codigo
            };
            $.ajax({
                    data:  parametros,
                    url:   'php/eliminar.php', 
                    type:  'post',
                    success:  function (response) {
                            alert(response);
                            location.reload();
                    }
            });
        };
$(document).ready(function() {
        var parametro=1;
        $.ajax({
            data: parametro,
            type: "POST",
            url: 'php/mosreservas.php',
            data: $(this).serialize(),
            success: function(response)
            {
                $("#cajareservas").html(response);
           }
       });
});