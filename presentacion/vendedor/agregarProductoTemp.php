<?php

$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
//$existencias = $_POST["existencias"];

$clienteBusqueda = new Cliente($_POST["clienteVenta"]);
$clienteBusqueda -> consultar();
$productoBusqueda = new Mueble($_POST["productoVenta"]);
$productoBusqueda -> consultar();

$existencias = $productoBusqueda -> getExistencias();

if ($existencias != 0) {
    if ($cantidad <= $existencias) {
        $articulo = $productoBusqueda ->getId() . "-" . $productoBusqueda -> getDescripcion() . "-" . $precio . "-" . $cantidad . "-" . $clienteBusqueda->getId();
        $_SESSION['carrito'][] = $articulo;
        $existenciasNuevo = $existencias - $cantidad;
        $productoBusqueda -> modificarStock($existenciasNuevo);
    }
}
?>


    