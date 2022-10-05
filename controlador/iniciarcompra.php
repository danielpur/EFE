<?php
include_once '../modelo/compras.php';

if (isset($_POST['idSucursal'])) {
    session_start();
    $idSucursal = $_POST['idSucursal'];
    $rutCliente = $_SESSION['rutUsuarioSesion'];
    print_r("ingreso control" . $_SESSION['rutUsuarioSesion']);
    $compras = new Compras();
    $compras->iniciarCompra($idSucursal, $rutCliente);
    $compras->obtenerIdBoleta();
    if(isset($_SESSION['boletaSesion'])){
        header('location: ../compras.php');

    }

}
