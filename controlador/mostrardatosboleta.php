<?php
include_once './modelo/compras.php';

$compras = new Compras();
$compras->obtenerDatosBoleta($_SESSION['boletaSesion']);
?>