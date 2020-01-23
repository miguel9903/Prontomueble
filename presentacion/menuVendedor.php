<?php
$vendedor = new Vendedor($_SESSION['id']);
$vendedor -> consultar();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light border">

  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionVendedor.php")?>">
    <img src="img/home.png" width="30" height="30" class="d-inline-block align-top" alt="">
    Prontomueble
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
    <ul class="navbar-nav mr-auto">      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Muebles
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/vendedor/consultarMuebles.php")?>">Consultar muebles</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ventas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/vendedor/realizarVenta.php")?>">Realizar venta</a>
           <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/vendedor/agregarClientes.php")?>">Agregar cliente</a>
        </div>
      </li>
    </ul>
    
    <ul class="navbar-nav">
      <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $vendedor-> getNombre() . " " . $vendedor -> getApellido(); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?salir=1">Cerrar sesion</a>
        </div>
      </li>
    </ul>
  </div>
  
</nav>
