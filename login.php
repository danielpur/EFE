<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EFE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="./css/main.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="./vista/img/logo.ico">
</head>

<body>
    <header class="container-fluid d-flex justify-content-center">
        <h1 class="btn btn-primary">EMPRENDEDOR
            <span><img id="imgLogin" src="./vista/img/login.jpg" height="200" width="600">
            </span>
        </h1>
        <div>
        </div>
    </header>
    <?php
   include './vista/modulos/navegacion.php';
   ?>
    <section>

        <form id="formLogin" class="mx-5 p-3" method="POST" action="./controlador/login.php">
            <h3 style="text-align:center">Ingresar a Sistema</h3>
            <table id="tablaLogin">
                <tr>
                    <td>
                        <label for="Usuario" class="form-label">Usuario</label>
                    </td>
                    <td>
                        <input type="text" class="form-control" id="usuarioLogin" name="usuarioLogin">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Contraseña" class="form-label">Contraseña</label>
                    </td>
                    <td>
                        <input type="password" class="form-control" id="passLogin" name="passLogin">
                    </td>
                </tr>
            </table>
            <br>
            <button id="btnLogin" type="submit" class="btn btn-success">Ingresar</button>
        </form>


    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>