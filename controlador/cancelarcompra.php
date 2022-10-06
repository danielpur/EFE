<?php
include_once '../modelo/compras.php';

if( isset($_POST['cancelacionBoleta'])
){


$compras = new Compras();
$compras->cancelarCompra($_POST['cancelacionBoleta']);
header('location: ../indexCliente.php');
}

?>