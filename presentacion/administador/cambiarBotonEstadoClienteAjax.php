<?php
$cliente = new Cliente($_GET['idcliente']);
$cliente -> consultar();

if($cliente -> getEstado() == 1){
   ?>
    <span id="cambiarEstado<?php echo $cliente -> getId()?>" class="btn btn-danger text-white">Deshabilitar</span>
  <?php
}else if($cliente -> getEstado() == 0){
  ?>
   <span id="cambiarEstado<?php echo $cliente -> getId()?>" class="btn btn-success text-white">Habilitar</span>
  <?php
}
?>
 