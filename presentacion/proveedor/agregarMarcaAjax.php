<?php
$nombre = $_POST["marca"];
$marca = new Marca("", $nombre);
echo $marca -> insertar();