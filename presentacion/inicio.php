<?php 
$correo = "";
if (isset($_POST['correo'])) {
    $correo = $_POST['correo'];
}
$clave = "";
if (isset($_POST['clave'])) {
    $clave = $_POST['clave'];
}
$error = 0;
if(isset($_POST['autenticar'])){
    $administrador = new Administrador("", "", "", $correo, $clave);
    if ($administrador -> autenticar()) {
            $_SESSION['id'] = $administrador -> getId();
            $_SESSION['rol'] = "administrador";
            $pid = base64_encode("presentacion/sesionAdministrador.php");
            header('Location: index.php?pid='. $pid);
    }else{
        $cliente = new Cliente("", "", "", $correo, $clave);
        if ($cliente -> autenticar()) {
            if ($cliente->getEstado() == 1) {
                $_SESSION['id'] = $cliente -> getId();
                $_SESSION['rol'] = "cliente";
                $pid = base64_encode("presentacion/sesionCliente.php");
                header('Location: index.php?pid='. $pid);
            }else{
                $error = 2;
            }
        }else{
            $vendedor = new Vendedor("", "", "", $correo, $clave);
            if ($vendedor->autenticar()) {
                if ($vendedor -> getEstado() == 1) {
                    $_SESSION['id'] = $vendedor -> getId();
                    $_SESSION['rol'] = "vendedor";
                    $pid = base64_encode("presentacion/sesionVendedor.php");
                    header('Location: index.php?pid='. $pid);
                }else{
                    $error = 2;
                }
            }else{
                $proveedor = new PersonaContacto("", "", "", $correo, $clave);
                if ($proveedor->autenticar()) {
                    if ($proveedor -> getEstado() == 1) {
                        $_SESSION['id'] = $proveedor -> getId();
                        $_SESSION['rol'] = "proveedor";
                        $pid = base64_encode("presentacion/sesionProveedor.php");
                        header('Location: index.php?pid='. $pid);
                    }else{
                        $error = 2;
                    }
                }else{
                    $error = 1;
                }
            }
        }
    }
 }
?>
<div class="container">
	<div class="row">
	<div class="col-4"></div>
		<div class="col-4">
			<div class="card mt-5">
				<div class="card-header bg-primary text-black text-white text-center">Bienvenido a Prontomueble</div>
				<div class="card-body">
					<p class="text-center">
						<img alt="logo prontomueble" src="img/logo2.png" style="margin:0 auto;">
					</p>
					<form method="post" action="index.php">
						<div class="form-group">
							<label>Correo</label> 
							<input name="correo" type="email" class="form-control" placeholder="Digite Correo" required="required">
						</div>
					    <div class="form-group">
							<label>Clave</label> 
							<input name="clave" type="password" class="form-control" placeholder="Clave" required="required">
						</div>
							<?php if ($error == 1) { ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
										Error de correo o clave
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
						    <?php } else if ($error == 2) { ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
										Usuario inhabilitado
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
							   </div>
							<?php } ?>
							<button type="submit" name="autenticar" class="btn btn-primary btn-block">Autenticar</button>
					</form>
					<!--<a class="btn btn-danger btn-block" href="index.php?pid=<?php //echo base64_encode("presentacion/registroCliente.php")?>">Registrese</a> -->
				</div>
			</div>
		</div>
		<div class="col-4"></div>
	</div>
</div>

	

