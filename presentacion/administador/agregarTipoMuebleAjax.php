<?php
$descripcion = $_POST["descripcion"];
$tipoMueble = new TipoMueble("", $descripcion, "1");
echo $tipoMueble -> insertar();