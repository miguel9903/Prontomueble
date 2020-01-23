<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "proveedor"){
        $proveedor = new PersonaContacto($_SESSION['id']);
        $proveedor -> consultar();
        if($proveedor -> getEstado() == 0) {
            header('Location: index.php');
        }
    }else{
        $pid = base64_encode("presentacion/error.php");
        header('Location: index.php?pid='. $pid);
    }
}else{
    header('Location: index.php');
}
?>
