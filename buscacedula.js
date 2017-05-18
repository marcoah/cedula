$(document).ready(function() {
    var getdetails = function(nac,ced) {
        return $.getJSON("buscarcedula.php", {
            "nacionalidad": nac,
            "cedula":ced
        });
    };

    $('#buscarcedula').click(function(e) {
        e.preventDefault();

        $("#response-container").html("<p>Buscando...</p>");

        var param1= document.getElementById('nac').value;
        var param2= document.getElementById('ced').value;

        getdetails(param1, param2)
            .done(function(response) {
            if (response.success) {
                var output1 = response.data.usuario.nombres;
                var output2 = response.data.usuario.apellidos;

                $("#response-container").html("listo.");
                document.getElementById('nombre').value = output1;
                document.getElementById('apellido').value = output2;
            } else {
                //response.success no es true
                $("#response-container").html('No ha habido suerte:');
            }
        })
            .fail(function(jqXHR, textStatus, errorThrown) {
                $("#response-container").html("Algo ha fallado: " + textStatus);
            });
    });
});