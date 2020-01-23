<?php
require 'logica/TipoMueble.php';

$id = $_POST["idTipoMueble"];
$descripcion = $_POST["idDescripcion"];

$tipoMueble = new TipoMueble($id, $descripcion);
echo $tipoMueble -> actualizar();