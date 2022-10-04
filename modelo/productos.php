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
}
?>