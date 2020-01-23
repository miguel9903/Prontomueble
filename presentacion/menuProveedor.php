<?php
$proveedor = new PersonaContacto($_SESSION['id']);
$proveedor-> consultar();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light border navbar-fixed-top">

    <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionProveedor.php")?>">
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
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/proveedor/agregarMuebles.php")?>">Agregar muebles</a>
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/proveedor/consultarMuebles.php")?>">Editar mueble</a>
        </div>
      </li>
    </ul>
    
    <ul class="navbar-nav">
      <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $proveedor -> getNombre() . " " . $proveedor -> getApellido(); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?salir=1">Cerrar sesion</a>
        </div>
      </li>
    </ul>
  </div>
  
</nav>