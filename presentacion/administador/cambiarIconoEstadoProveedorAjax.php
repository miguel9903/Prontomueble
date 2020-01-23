<?php
$proveedor = new Proveedor($_GET['idproveedor']);
$proveedor -> consultar();

if($proveedor -> getEstado() == 1){
    echo "<i id='icono" . $proveedor->getId() . "' class='fas fa-user-times' data-toggle='tooltip' data-placement='left' title='Deshabilitar'></i>";
}else{
    echo "<i id='icono" . $proveedor->getId() . "' class='fas fa-user-check' data-toggle='tooltip' data-placement='left' title='Habilitar'></i>";
}
?>