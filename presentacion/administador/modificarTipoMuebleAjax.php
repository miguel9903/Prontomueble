<?php
$id = $_POST["idTipoMueble"];
$descripcion = $_POST["idDescripcion"];

$tipoMueble = new TipoMueble($id, $descripcion);
$tipoMueble -> actualizar();