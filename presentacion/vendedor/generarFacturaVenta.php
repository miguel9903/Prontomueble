<?php
if (isset($_GET["idventa"])) {
    $venta = new Venta($_GET["idventa"]);
    //$detalle = new DetalleVenta("", "", $_GET["idventa"]);
    $ventas = $venta ->consultarTodos();
}

$pdf = new Cezpdf('LETTER');
$pdf -> selectFont('pdf/fonts/Helvetica.afm');
$pdf -> ezSetCmMargins(1, 1, 2, 1);
$pdf -> setColor(0,0,0);

/*$datosVenta = array();
foreach ($ventas as $v){
   $datosVenta[] = array('idventa' => $v -> getId(), 
                         'fecha' => $v -> getFecha(),
                         'total' => $v->getTotal(),
                         'vendedor' => $v->getVendedor(),
                         'cliente' => $v ->getCliente()
   );
}*/

/*$datosVenta = array();
 foreach ($ventas as $v){
     $texto = $v -> getTotal();
     $pdf -> ezText($texto, $tletra, array('justification' => 'center'));   
 }
*/



$datosVenta = array(
    array('num'=>1,'name'=>'gandalf','type'=>'wizard'),
    array('num'=>1,'name'=>'gandalf','type'=>'wizard'),
    array('num'=>1,'name'=>'gandalf','type'=>'wizard')
);

$pdf->ezTable($datosVenta);
$pdf->ezStream();
//ob_end_flush();