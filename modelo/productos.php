<?php
class Productos{
    function __construct()
    {
        
    }

    public function mostrarProductos()
    {
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once './conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('SELECT * FROM producto');
            $query->execute();
            echo '<table id="tablaMostrar" class="table table-striped table-bordered" cellspacing="0">
            <thead>
		<tr>
			<th>Producto</th>
			<th>Precio</th>
		</tr>
	</thead><tbody>';
            while ($row = $query->fetch()) {
                echo '
                <tr>
                <td>' . $row["nombreProducto"] . '</td>
                <td>' . $row["precioProducto"] . '</td>          
            </tr>';
            }
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }
    }

    public function mostrarProductosCliente()
    {
        try {
            //CONECTAR BASE DE DATOS Y EJECUTAR QUERY
            include_once './conexion/conexionNegocio.php';
            $conexion = new Conexion();
            $conectar = $conexion->conectar();
            $query = $conectar->prepare('SELECT * FROM producto');
            $query->execute();
            echo '<table id="tablaMostrar" class="table table-striped table-bordered" cellspacing="0">
            <thead>
		<tr>
			<th>Producto</th>
			<th>Precio</th>
            <th>Agregar</th>
            <th>Cantidad</th>
            <th>Total Producto ($)</th>
            <th>Agregar al carrito</th>
		</tr>
	</thead><tbody>';
            while ($row = $query->fetch()) {
                echo '
                <tr>
                <td>' . $row["nombreProducto"] . '</td>
                <td> <input id="precioProducto'.$row["idProducto"].'" value="' . $row["precioProducto"] . '" disabled></td>
                <td>
                <button class="btn btn-primary" onclick="agregarVenta('.$row["idProducto"].');">+</button>
                <button class="btn btn-primary" onclick="quitarVenta('.$row["idProducto"].');">-</button>
                <form id="formAgregarProducto" method="POST" action="./controlador/agregarproductoscarrito.php">               
                <td><input id="cantidadVenta'.$row["idProducto"].'" name="cantidadVenta" value=0 readonly></td>
                <td><input id="totalVenta'.$row["idProducto"].'" name="totalVenta" value=0 readonly></td>
                <input type="hidden" name="idProducto" value="' . $row["idProducto"] . '">
                <input type="hidden" name="idBoleta" value="' . $_SESSION['boletaSesion'] . '">

                <td><button class="btn btn-primary" type="submit">Agregar al carrito</button></td>
                </form>
            
            </tr>';
            }
            echo '</tbody';
        } catch (Exception $e) {
            echo 'ERROR' . $e;
        }
    }
}
?>