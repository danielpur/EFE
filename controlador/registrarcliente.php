<?php
include_once '../modelo/clientes.php';
print_r("ingreso control");

if(isset($_POST['rutCliente']) && 
isset($_POST['nombreCliente']) && 
isset($_POST['apellidoCliente'])&& 
isset($_POST['contraseniaCliente'])
){
$rutCliente = $_POST['rutCliente'];
$nombreCliente = $_POST['nombreCliente'];
$apellidoCliente = $_POST['apellidoCliente'];
$contraseniaCliente = $_POST['contraseniaCliente'];


$clientes = new Clientes();
$clientes->registrarCliente($rutCliente, $nombreCliente, $apellidoCliente, $contraseniaCliente);
header('location: ../indexCliente.php');

}

?>