<?php

//require 'logica/Venta.php';
require 'pdf/class.pdf.php';
require 'pdf/class.ezpdf.php';

/*$venta = new Venta();
 $ventas = $venta ->consultarTodos();*/

$pdf = new Cezpdf('LETTER');
$pdf -> selectFont('pdf/fonts/Helvetica.afm');
$pdf -> ezSetCmMargins(1, 1, 2, 1);
$pdf -> setColor(0,0,0);
$tletra=10;
$pdf -> ezText("HOLA", $tletra, array('justification' => 'center'));

/*foreach ($ventas as $v){
 $texto = $v -> getTotal();
 $pdf -> ezText($texto, $tletra, array('justification' => 'center'));
 }*/

/*$datosVenta = array();
 foreach ($ventas as $v){
 $datosVenta[] = array('idventa' => $v -> getId(),
 'fecha' => $v -> getFecha(),
 'total' => $v->getTotal(),
 'vendedor' => $v->getVendedor(),
 'cliente' => $v ->getCliente()
 );
 }*/

//$datosVenta = array();

/*$datosVenta = array(
 array('num'=>1,'name'=>'gandalf','type'=>'wizard'),
 array('num'=>1,'name'=>'gandalf','type'=>'wizard'),
 array('num'=>1,'name'=>'gandalf','type'=>'wizard')
 );*/

//$pdf->ezTable($datosVenta);
$pdf->ezStream();
//ob_end_flush();


/*
require 'pdf/class.pdf.php';
require 'pdf/class.ezpdf.php';

$tletra=10;
$pdf = new Cezpdf('LETTER');
$pdf -> selectFont('pdf/fonts/Helvetica.afm');
$pdf -> ezSetCmMargins(1, 1, 2, 1);
$pdf -> setColor(0,0,0);

$pdf -> setColor(0,0,0);


$pdf ->ezText("                            CarritosUD      ",25);
/*
$filtro = $_GET['idVenta'];
$detalle = new DetalleVenta("", "", $filtro);
//$detalles= $detalle -> consultarTodos();
$venta= new Venta($filtro);
$venta -> consultarTodos();


//$texto1= "CLIENTE:". $venta -> getCliente();
$fecha= "FECHA:". $venta ->getFecha();
$numerofactura="Nro Factura:". $venta ->getId();


/*
$pdf ->ezText($numerofactura, $tletra, array('justification' => 'left'));
$pdf ->ezText("__________________________________________________________________________",25);
$pdf ->ezText("                            CarritosUD      ",25);

$pdf -> ezText($texto1, $tletra, array('justification' => 'center'));
$pdf -> ezText($fecha, $tletra, array('justification' => 'center'));



$pdf ->ezText("--------------------------------------------------------------------------------------------------------------------------------",12);
$pdf ->ezText("                    Carro                        Hora Inicio                       Hora Final ",14);
$pdf ->ezText("--------------------------------------------------------------------------------------------------------------------------------",12);
foreach($detalles as $d){
    
    $texto = "                                ".$d -> getVenta() . "                                              " . $d -> getCantidad() . "                                         " . $d -> getPrecio();
    $pdf -> ezText($texto, $tletra, array('justification' => 'rigt'));
    $precio= $d ->getPrecio();
    //   $pdf -> ezText($valor,10);
}


$pdf ->ezText("--------------------------------------------------------------------------------------------------------------------------------",12);
$pdf ->ezText("",12);
$pdf ->ezText("",12);
$pdf ->ezText("",12);
$pdf ->ezText("---------------------------------------------------    TOTAL A PAGAR     -----------------------------------------------",12);
$pdf ->ezText("",12);
$pdf -> ezText("$". $precio, 18, array('justification' => 'center'));


$pdf -> ezStream();*/
//ob_end_flush();

?>
