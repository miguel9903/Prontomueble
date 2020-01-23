<?php
$id = $_POST["idVendedor"];

$vendedor = new Vendedor($id);
echo $vendedor -> cambiarEstado();