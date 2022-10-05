<?php
class Compras{
   function __construct(){


    }
    public function iniciarCompra($idSucursal, $rutCliente)
    {
        print_r("modelo");
        
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('INSERT INTO boleta (fecha, totalBoleta, idSucursal, rutCliente) VALUES
            (now(), :totalBoleta, :idSucursal, :rutCliente)');
            $query->execute([
                'totalBoleta' => 0,
                'idSucursal' => $idSucursal,
                'rutCliente' => $rutCliente
            ]);
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }

    }

    function obtenerIdBoleta(){
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('SELECT * FROM boleta ORDER BY idBoleta DESC LIMIT 1');
            $query->execute();
            
            while ($row = $query->fetch()) {
                $_SESSION['boletaSesion'] = $row['idBoleta'];
            }
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }

    }
    


}

?>