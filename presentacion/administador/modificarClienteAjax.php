<?php
$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$correo = $_POST["correo"];
$telefono = $_POST["telefono"];

date_default_timezone_set('UTC');
date_default_timezone_set("America/Bogota");
$fecha =  date("Y-m-d");

$cliente = new Cliente($cedula, $nombre, $apellido, $correo, "", "",  $fecha, $telefono);
$cliente -> actualizar();