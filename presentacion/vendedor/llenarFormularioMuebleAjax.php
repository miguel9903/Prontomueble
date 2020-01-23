<?php
$idProducto = $_POST["idproducto"];
$producto = new Mueble($idProducto);
$producto -> consultar();

$datosProducto = array(
    'id' => $producto -> getId(),
    'descripcion' => $producto -> getDescripcion(),
    'precio' => $producto -> getPrecio(),
    'existencias' => $producto -> getExistencias(),
    'foto' => $producto -> getFoto()
);

echo json_encode($datosProducto);