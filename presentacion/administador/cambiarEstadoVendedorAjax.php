<?php
$vendedor = new Vendedor($_GET['idvendedor']);
$vendedor -> cambiarEstado();
$vendedor -> consultar();
echo $vendedor -> getEstado();
?>