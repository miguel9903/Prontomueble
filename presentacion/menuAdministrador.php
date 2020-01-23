<?php 
$administrador = new Administrador($_SESSION['id']);
$administrador -> consultar();    
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light border">

  <a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("presentacion/sesionAdministrador.php")?>">
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
          Usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarProveedor.php")?>">Agregar proveedores</a>
           <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarClientes.php")?>">Agregar clientes</a>
           <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarVendedores.php")?>">Agregar vendedores</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Muebles
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <!--<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarTipoMueble.php")?>">Tipos de mueble</a> -->
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administador/agregarTipoMueble2.php")?>">Tipos de mueble</a>
          <!--  <a class="dropdown-item" href="index.php?pid=<?php //echo base64_encode("presentacion/administador/agregarMuebles.php")?>">Agregar Muebles</a>-->
          <a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("presentacion/administador/consultarMuebles.php")?>">Consultar muebles</a>
        </div>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ventas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         <!-- <a class="dropdown-item" href="index.php?pid=<?php /*echo base64_encode("presentacion/administador/realizarVenta.php")*/?>">Realizar venta</a> -->
          <a class="dropdown-item" href="generarReporteVenta.php">Reporte de ventas</a> 
        </div>
      </li>
    </ul>
    
    <ul class="navbar-nav">
      <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $administrador-> getNombre() . " " . $administrador -> getApellido(); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="index.php?salir=1">Cerrar sesion</a>
        </div>
      </li>
    </ul>
  </div>
  
</nav>