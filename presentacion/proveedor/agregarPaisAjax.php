<?php
$nombre = $_POST["pais"];
$pais = new Pais("", $nombre);
echo $pais -> insertar();