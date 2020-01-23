<?php
$id = $_POST["idMueble"];
$descripcion = $_POST["descripcion"];
$tipo = $_POST["tipo_mueble"];
$material = $_POST["material"];
$medidas = $_POST["medidas"];
$peso = $_POST["peso"];
$color = $_POST["color"];
$marca = $_POST["marca"];
$pais = $_POST["pais"];
$existencias = $_POST["existencias"];

/*date_default_timezone_set('UTC');
date_default_timezone_set("America/Bogota");
$fecha =  date("Y-m-d");*/

$mueble = new Mueble($id, $descripcion, $tipo, $material, $medidas, $peso, $color, $marca, $pais, "", $existencias, "");
$mueble -> actualizar();