<?php
$nombre = $_POST["color"];
$color = new Color("", $nombre);
echo $color -> insertar();