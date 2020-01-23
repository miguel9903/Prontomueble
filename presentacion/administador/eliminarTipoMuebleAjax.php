<?php
$id = $_POST["idTipoMueble"];

$tipoMueble = new TipoMueble($id);
echo $tipoMueble -> cambiarEstado();