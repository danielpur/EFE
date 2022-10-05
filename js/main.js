function agregarVenta(idProducto) {

    var idCantidadVenta = 'cantidadVenta' + idProducto;
    var cantidadActual = document.getElementById(idCantidadVenta).value;

    var idTotalVenta = 'totalVenta' + idProducto;
    var totalVentaActual = document.getElementById(idTotalVenta).value;

    var idPrecioProducto = 'precioProducto' + idProducto;

    var precioProducto = document.getElementById(idPrecioProducto).value;

    cantidadActual = parseInt(cantidadActual);
    totalVentaActual = parseInt(totalVentaActual);
    precioProducto = parseInt(precioProducto);

    if (cantidadActual >= 0) {
        var nuevaCantidad = (cantidadActual + 1);
    } else {
        var nuevaCantidad = cantidadActual;
    }

    if (totalVentaActual >= 0) {
        var nuevoTotalVenta = (totalVentaActual + precioProducto);
    } else {
        var nuevoTotalVenta = totalVentaActual;
    }

    var cV = document.getElementById(idCantidadVenta);
    cV.value = nuevaCantidad;

    var tV = document.getElementById(idTotalVenta);
    tV.value = nuevoTotalVenta;

}

function quitarVenta(idProducto) {

    var idCantidadVenta = 'cantidadVenta' + idProducto;
    var cantidadActual = document.getElementById(idCantidadVenta).value;

    var idTotalVenta = 'totalVenta' + idProducto;
    var totalVentaActual = document.getElementById(idTotalVenta).value;

    var idPrecioProducto = 'precioProducto' + idProducto;
    var precioProducto = document.getElementById(idPrecioProducto).value;

    cantidadActual = parseInt(cantidadActual);
    totalVentaActual = parseInt(totalVentaActual);
    precioProducto = parseInt(precioProducto);

    if (cantidadActual > 0) {
        var nuevaCantidad = (cantidadActual - 1);
    } else {
        var nuevaCantidad = cantidadActual;
    }

    if (totalVentaActual > 0) {
        var nuevoTotalVenta = (totalVentaActual - precioProducto);
    } else {
        var nuevoTotalVenta = totalVentaActual;
    }

    var cV = document.getElementById(idCantidadVenta);
    cV.value = nuevaCantidad;

    var tV = document.getElementById(idTotalVenta);
    tV.value = nuevoTotalVenta;

}