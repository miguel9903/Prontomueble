<?php
//$cliente = $_POST["clienteVenta"];
//$producto = $_POST["productoVenta"];
$cantidad = $_POST["cantidad"];
$precio = $_POST["precio"];
//$existencias = $_POST["existencias"];

$clienteBusqueda = new Cliente($_POST["clienteVenta"]);
$clienteBusqueda -> consultar();

$productoBusqueda = new Mueble($_POST["productoVenta"]);
$productoBusqueda -> consultar();

$articulo = $productoBusqueda ->getId() . "-" . $productoBusqueda -> getDescripcion() . "-" . $precio . "-" . $cantidad . "-" . $clienteBusqueda->getId();
            
$_SESSION['carrito'][] = $articulo;

    