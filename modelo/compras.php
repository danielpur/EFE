<?php
class Compras{
   
   function __construct(){
    }
    function iniciarCompra($idSucursal, $rutCliente)
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

    function obtenerDatosBoleta($idBoleta){
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once './conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare(
                'SELECT totalBoleta, SUM(cantidadVenta) as totalCantidadVenta 
                FROM boleta
                JOIN venta
                ON boleta.idBoleta = venta.idBoleta 
                WHERE boleta.idBoleta = :idBoleta');
            $query->execute(['idBoleta' => $idBoleta]);
            while ($row = $query->fetch()) {
                echo '<label class="badge-boleta badge bg-info text-dark">Total Compra <span id="totalCompra">'.$row['totalBoleta'].'</span></label>
                <label class="badge-boleta badge bg-info text-dark">Total Productos <span id="totalProductos">'.$row['totalCantidadVenta'].'</span></label>';
            }
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }

    }

 function agregarProductoCarrito($cantidadVenta, $totalVenta, $idProducto, $idBoleta)
    {
        
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('INSERT INTO venta (cantidadVenta, totalVenta, idProducto, idBoleta) VALUES
            (:cantidadVenta, :totalVenta, :idProducto, :idBoleta)');
            $query->execute([
                'cantidadVenta' => $cantidadVenta,
                'totalVenta' => $totalVenta,
                'idProducto' => $idProducto,
                'idBoleta' => $idBoleta
            ]);
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }
        
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('SELECT * FROM boleta WHERE idBoleta = :idBoleta');
            $query->execute(['idBoleta' => $idBoleta]);
            while ($row = $query->fetch()) {
                $totalBoleta = $row['totalBoleta'];
            }
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }

        $totalBoleta = $totalBoleta + $totalVenta;

        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('UPDATE boleta SET totalBoleta = :totalBoleta WHERE idBoleta = :idBoleta');
            $query->execute([
                'totalBoleta' => $totalBoleta,
                'idBoleta' => $idBoleta
            ]);
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }

    }

    function cancelarCompra($idBoleta){
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('DELETE FROM venta WHERE idBoleta =:idBoleta');
            $query->execute([
                'idBoleta' => $idBoleta,
            ]);
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }

        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once '../conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('DELETE FROM boleta WHERE idBoleta =:idBoleta');
            $query->execute([
                'idBoleta' => $idBoleta,
            ]);
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }
    }
    
    public function mostrarComprasCliente()
    {
        session_start();
        $rutCliente = $_SESSION['rutUsuarioSesion'];

        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once './conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('select boleta.idBoleta, fecha, nombreProducto, cantidadVenta, totalVenta, nombreSucursal, direccionSucursal  from venta
            join boleta
            on venta.idBoleta = boleta.idBoleta
            join producto
            on venta.idProducto = producto.idProducto
            join cliente
            on boleta.rutCliente = cliente.rutCliente
            join sucursal
            on boleta.idSucursal = sucursal.idSucursal
            where cliente.rutCliente = :rutCliente');
            $query->execute([
                'rutCliente' => $rutCliente
            ]);
            echo '<table id="tablaMostrar" class="table table-striped table-bordered" cellspacing="0">
            <thead>
		<tr>
        <th>N° Boleta</th>
			<th>Fecha</th>
			<th>Producto</th>
            <th>Cantidad</th>
            <th>Total</th>
            <th>Sucursal</th>
            <th>Dirección</th>
		</tr>
	</thead><tbody>';
            while ($row = $query->fetch()) {
                echo '
                <tr>
                <td>' . $row["idBoleta"] . '</td>
                <td>' . $row["fecha"] . '</td>
                <td>' . $row["nombreProducto"] . '</td> 
                <td>' . $row["cantidadVenta"] . '</td> 
                <td>' . $row["totalVenta"] . '</td> 
                <td>' . $row["nombreSucursal"] . '</td> 
                <td>' . $row["direccionSucursal"] . '</td> 
                         
            </tr>';
            }
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }
    }

}
