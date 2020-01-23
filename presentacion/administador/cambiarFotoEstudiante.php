<?php
include 'presentacion/validacionAdministrador.php';
include 'presentacion/menuAdministrador.php';
$error = 0;
if(isset($_POST['cambiarFoto'])){    
    
    $rutaLocal = $_FILES['foto']['tmp_name'];
    $tipo=$_FILES['foto']['type'];
    if($tipo == "image/png" || $tipo == "image/jpeg"){
        $fecha = new DateTime();
        $rutaRemota = "imagenes/". $fecha ->getTimestamp() . (($tipo == "image/png")?".png":".jpg");
        copy($rutaLocal, $rutaRemota);
     //   $estudiante = new Estudiante($_GET['idEstudiante']);
     //   $estudiante -> consultar();        
       // if($estudiante -> getFoto() != ""){
      //      unlink($estudiante -> getFoto());            
      //  }
      //  $estudiante = new Estudiante($_GET['idEstudiante'],"","","","","",$rutaRemota);
      //  $estudiante -> cambiarFoto();
        
    }else{
        $error = 1;
    }
}

?>
<div class="container">
	<div class="row">
		<div class="col-3"></div>
		<div class="col-6">
			<div class="card ">
				<div class="card-header bg-primary text-white">Cambiar Foto</div>
				<div class="card-body">
					<?php if (isset($_POST['cambiarFoto'])) { ?>
					<div class="alert alert-<?php echo ($error==0) ? "success" : "danger" ?> alert-dismissible fade show"
						role="alert">
						<?php if ($error==0) {
						    echo "Cambio exitoso";
						}else if($error == 1){
						    echo "Solo archivos png o jpg";
						} ?>
						<button type="button" class="close" data-dismiss="alert"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form method="post" action="index.php?pid=<?php echo base64_encode("presentacion/estudiante/cambiarFotoEstudiante.php") ?>&idEstudiante=<?php echo $_GET['idEstudiante']?>" enctype="multipart/form-data" >
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required="required">
                            <label class="custom-file-label">Seleccione un archivo png o jpg</label>
                          </div>
                        </div>
                        <button type="submit" name="cambiarFoto" class="btn btn-primary">Cambiar foto</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


