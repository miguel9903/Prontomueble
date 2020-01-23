<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "cliente"){
        $cliente = new Cliente($_SESSION['id']);
        $cliente -> consultar();
        if($cliente -> getEstado() == 0) {
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