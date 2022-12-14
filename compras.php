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

    </header>
    <?php
    include './vista/modulos/navegacionCompras.php';
    ?>

    <div id="contenedorBoleta">
        <label class="badge-boleta badge bg-info text-dark">N° Boleta: <span><?php session_start();
                                                                                echo $_SESSION['boletaSesion']; ?></span></label>
        <?php
        include './controlador/mostrardatosboleta.php';
        ?>
    </div>
    <div id="contendorAccionesCompra" class="d-flex justify-content-center">
        <a class="btn btn-primary" href="./indexCliente.php">Realizar compra</a>
        <form id="formCancelarCompra" method="POST" action="./controlador/cancelarcompra.php">
            <input type="hidden" name="cancelacionBoleta" value=<?php echo $_SESSION['boletaSesion']; ?>>
            <button class="btn btn-primary">Cancelar compra</button>
        </form>
    </div>


    <section>
        <div id=contenedorTablaMostrar class="px-5">
            <?php
            include './modelo/productos.php';
            $productos = new Productos();
            $productos->mostrarProductosCliente();
            ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.11.5/datatables.min.js"></script>
    <script src="./js/datatable.js"></script>
    <script src="./js/main.js" type="text/javascript"></script>
    <script src="./js/ventas.js" type="text/javascript"></script>

</body>

</html>