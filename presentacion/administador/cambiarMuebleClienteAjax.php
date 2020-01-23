<?php
$cliente = new Cliente($_GET['idcliente']);
$cliente -> cambiarEstado();
$cliente -> consultar();
echo $cliente -> getEstado();
?>