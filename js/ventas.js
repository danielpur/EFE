class Ventas {
    $cantidadVenta;
    $totalVenta;
    $idProducto;
    $idBoleta;

    constructor($cantidadVenta, $idProducto, $idBoleta) {
        this.$cantidadVenta = $cantidadVenta;
        this.$totalVenta = 0;
        this.$idProducto = $idProducto;
        this.$idBoleta = $idBoleta;
    }


    agregarVenta($idProducto) {
        $idCantidadVenta = 'cantidadVenta' + $idProducto;
        alert($idCantidadVenta);
        $cV = document.getElementById($idCantidadVenta);
        $cV.value = "2";

    }
}