<?php 
$cliente = new Cliente($_SESSION['id']);
$cliente -> consultar();    
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light border navbar-fixed-top">

   <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionCliente.php")?>">
    <img src="img/home.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Prontomueble
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Compras
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/buscarHoteles.php")?>">Consultar compras</a>
        </div>
      </li>
    </ul>
  
    <ul class="navbar-nav mr-auto">

    </ul>
    
    <ul class="navbar-nav">
      <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $cliente -> getNombre() . " " . $cliente -> getApellido(); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/editarPerfil.php") . "&idcliente=" . $cliente->getId()?>">Editar perfil</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/cliente/cambiarClave.php") . "&idcliente=" . $cliente->getId()?>">Cambiar clave</a>
          <a class="dropdown-item" href="index.php?salir=1">Cerrar sesion</a>
        </div>
      </li>
    </ul>
  </div>
  
</nav>
