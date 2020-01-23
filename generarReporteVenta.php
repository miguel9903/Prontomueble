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

?>