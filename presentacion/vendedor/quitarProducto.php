<?php
$indice = $_POST["indice"];

$datosProd = $_SESSION['carrito'][$indice];
$cadenaDatos = explode("-", $datosProd);
$cantidad = $cadenaDatos[3];

$productoMod = new Mueble((int)$cadenaDatos[0]);
$productoMod -> consultar();
$existencias = $productoMod -> getExistencias();
$existenciasNuevo = $existencias + $cantidad;
$productoMod -> modificarStock($existenciasNuevo);

unset($_SESSION['carrito'][$indice]);
$datos = array_values($_SESSION['carrito']);
unset($_SESSION['carrito']);
$_SESSION['carrito'] = $datos;