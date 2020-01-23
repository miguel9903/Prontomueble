<?php
$nombre = $_POST["material"];
$material = new Material("", $nombre);
echo $material -> insertar();