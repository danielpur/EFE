<?php
class usuarioLogin
{

    public function __construct()
    {
    }

    public function verificarUsuario($usuario, $contrasenia)
    {
        $rutCliente = (int)$usuario;
        $usuarioExiste = false;
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('SELECT * FROM usuarios WHERE rutCliente = :rutCliente AND contrasenia = :contrasenia');
            $query->execute(['rutCliente' => $rutCliente, 'contrasenia' => $contrasenia]);
            while ($row = $query->fetch()) {
                $usuarioExiste = $row['idUsuario'];
            }
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }
        return $usuarioExiste;
    }
}
