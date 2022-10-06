<?php
include_once '../modelo/compras.php';
print_r($_POST['cantidadVenta']);
print_r($_POST['totalVenta']);
print_r($_POST['idProducto']);
print_r($_POST['idBoleta']);
print_r("controlador");
if(isset($_POST['cantidadVenta']) && 
isset($_POST['totalVenta']) && 
isset($_POST['idProducto'])&& 
isset($_POST['idBoleta'])
){
$cantidadVenta = $_POST['cantidadVenta'];
$totalVenta = $_POST['totalVenta'];
$idProducto = $_POST['idProducto'];
$idBoleta = $_POST['idBoleta'];

$cantidadVenta = (int)$cantidadVenta;
$totalVenta = (int)$totalVenta;
$idProducto = (int)$idProducto;
$idBoleta = (int)$idBoleta;

print_r('cantidadVEnta: '.$cantidadVenta.' Total Venta '.$totalVenta.' ID Producto '.$idProducto.'id Boleta '.$idBoleta);

$compras = new Compras();
$compras->agregarProductoCarrito($cantidadVenta, $totalVenta, $idProducto, $idBoleta);

header('location: ../compras.php');

}

?>