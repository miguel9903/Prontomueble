<?php 
session_start();
require 'logica/Administrador.php';
require 'logica/Cliente.php';
require 'persistencia/Conexion.php';
require 'logica/Proveedor.php';
require 'logica/TipoMueble.php';
require 'logica/Material.php';
require 'logica/Color.php';
require 'logica/Vendedor.php';
require 'logica/Marca.php';
require 'logica/Pais.php';
require 'logica/Mueble.php';
require 'logica/Venta.php';
require 'logica/DetalleVenta.php';
require 'logica/PersonaContacto.php';
?>
<html>
<head>
    <meta charset="utf-8">
    
    <!-- Agregamos Bootstrap a nuetro proyecto -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <!-- Agregamos FontAwesome a nuetro proyecto -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    
 
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
    
    <title>Prontomueble</title>
    
    <!-- Agregamos JQuery a nuetro proyecto -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<script src="librerias/alertifyjs/alertify.js"></script>
	<script src="librerias/select2/js/select2.js"></script>

</head>
<body>
	<?php 
	if(isset($_GET['pid'])){
	    include base64_decode($_GET['pid']);
	}else{
	    if(isset($_GET['salir'])){
	       /* $_SESSION['id'] = null;
	        $_SESSION['rol'] = null;*/
	        session_unset();
	        session_destroy();
	    }
	    //include 'presentacion/encabezado.php';
	    include 'presentacion/inicio.php';	    
	}
	?>
</body>
</html>