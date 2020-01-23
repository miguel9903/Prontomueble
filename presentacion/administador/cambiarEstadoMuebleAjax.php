<?php
$mueble = new Mueble($_GET['idmueble']);
$mueble -> cambiarEstado();
$mueble -> consultar();
echo $mueble -> getEstado();
?>