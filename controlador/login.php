<?php
include_once '../modelo/usuariosLogin.php';
print_r("llega a controlador");

if(isset($_POST['usuarioLogin']) && 
isset($_POST['passLogin'])
){
$usuario = $_POST['usuarioLogin'];
$contrasenia = $_POST['passLogin'];


$usuarioLogin = new usuarioLogin();
$estadoUsuario = $usuarioLogin->verificarUsuario($usuario, $contrasenia);
if($estadoUsuario == false){
    header('location: ../indexNo.php');
} else{
        header('location: ../indexCliente.php');
   
}
}

?>