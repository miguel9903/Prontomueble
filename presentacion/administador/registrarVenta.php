<?php
date_default_timezone_set('UTC');
date_default_timezone_set("America/Bogota");
$fecha =  date("Y-m-d");

$datosVenta = $_SESSION['carrito'];
$cliente = 0;
$total = 0;
$i = 0;
foreach ($datosVenta as $key){
    $subtotal = 0;
    $datos = explode("-", $key);
    $subtotal = $datos[2] * $datos[3];    
    $cliente = $datos[4];
    $i++;
    $total = $total + $subtotal;
}

$ventaRegistrar = new Venta("", $fecha, $total, 1007345673, $cliente);
$ventaRegistrar -> insertar();

$ventaConsultar = new Venta();
$ultimaVenta = $ventaConsultar -> ultimaVenta();

//$detalleVenta = new DetalleVenta("", 5, 53, 2, 15000, 30000);
//$detalleVenta -> insertar();


foreach ($datosVenta as $key){
    $subtotal = 0;
    $datos = explode("-", $key);
    $mueble = $datos[0];
    $cantidad = $datos[3];
    $precio = $datos[2];
    $subtotal = $datos[2] * $datos[3];

    $detalleVenta = new DetalleVenta("", $mueble, $ultimaVenta, $cantidad, $precio, $subtotal);
    $detalleVenta -> insertar();
}

unset($_SESSION['carrito']);
?>