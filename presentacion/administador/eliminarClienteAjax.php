<?php
$id = $_POST["idCliente"];

$cliente = new Cliente($id);
echo $cliente -> cambiarEstado();