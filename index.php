<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Busqueda de datos por cedula de identidad">
    <meta name="author" content="marcoah">

    <title>Busqueda por Cedula</title>

    <script src="js/jquery-3.6.4.min.js"></script>
    <script src="js/buscacedula.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <style type="text/css">

    </style>

    <script>
        $(document).ready(function(){
            $("#buscarcedula").click(function(event){
                event.preventDefault();
                $("#response-container").html("<p>Iniciando busqueda</p>");
            });
        });
    </script>

</head>
<body>
<div class="container">
    <form action="" method="post" class="form-horizontal">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h3>Datos Cliente</h3>
                <label for="nac" class="col-sm-3 control-label">Nacionalidad</label>
                <div class="col-sm-2">
                    <input class="form-control" list="Nacionalidad" name="Nacionalidad" id="nac" required>
                    <datalist id="Nacionalidad">
                        <option label="Venezolano" value="V">
                        <option label="Extranjero" value="E">
                    </datalist>
                </div>

                <label for="ced" class="col-sm-1 control-label">Cedula</label>
                <div class="col-sm-3">
                    <input class="form-control" type="text" name="Cedula" id="ced" required>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-info" id="buscarcedula">Buscar cedula</button>
                </div>
            </div>

            <div class="form-group">
                <label for="nombre" class="col-sm-3 control-label">Nombre</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="Nombre" id="nombre">
                </div>
            </div>

            <div class="form-group">
                <label for="apellido" class="col-sm-3 control-label">Apellido</label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="Apellido" id="apellido">
                </div>
            </div>

            <hr>

            <div class="form-group">
                <input type="reset" tabindex="8" value="Borrar" class="btn btn-default">
                <input type="hidden" name="estado" value="1">
            </div>

            <div id="response-container"></div>
        </div>
    </form>
</div>
<p>V.1.0.0.1</p>
</body>
</html>