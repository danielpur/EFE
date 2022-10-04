<?php
class Clientes{
   function __construct(){


    }
    public function registrarCliente($rutCliente, $nombreCliente, $apellidoCliente, $contrasenia)
    {
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('INSERT INTO cliente (rutCliente, nombreCliente, apellidoCliente) VALUES
            (:rutCliente, :nombreCliente, :apellidoCliente)');
            $query->execute([
                'rutCliente' => $rutCliente,
                'nombreCliente' => $nombreCliente,
                'apellidoCliente' => $apellidoCliente
            ]);
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }

        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('INSERT INTO usuarios (rutCliente, contrasenia) VALUES
            (:rutCliente, :contrasenia)');
            $query->execute([
                'rutCliente' => $rutCliente,
                'contrasenia' => $contrasenia
            ]);
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }
    }


}

?>