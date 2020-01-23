<?php
$proveedor = new Proveedor($_GET['idproveedor']);
$proveedor -> cambiarEstado();
$proveedor -> consultar();
echo $proveedor -> getEstado();
?>