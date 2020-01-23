<?php
$datosVenta = $_SESSION['carrito'];

foreach ($datosVenta as $key){
    $datos = explode("-", $key);
    $cantidad = $datos[3];
    $productoMod = new Mueble((int)$datos[0]);
    $productoMod -> consultar();
    $existencias = $productoMod -> getExistencias();
    $existenciasNuevo = $existencias + $cantidad;
    $productoMod -> modificarStock($existenciasNuevo);
}

unset($_SESSION['carrito']);