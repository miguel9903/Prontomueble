<?php
if(isset($_SESSION['id'])){
    if($_SESSION['rol'] == "vendedor"){
        $vendedor = new Vendedor($_SESSION['id']);
        $vendedor -> consultar();
        if($vendedor -> getEstado() == 0) {
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
