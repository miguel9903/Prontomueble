<?php

class DetalleVentaDAO {
    
    private  $id;
    private $mueble;
    private $venta;
    private $cantidad;
    private $precio;
    private $subtotal;
  
    
    function DetalleVentaDAO($id="", $mueble="", $venta="", $cantidad="", $precio="", $subtotal=""){
        $this -> id = $id;
        $this -> mueble = $mueble;
        $this -> venta = $venta;
        $this -> cantidad = $cantidad;
        $this -> precio = $precio;
        $this -> subtotal = $subtotal;
    }
    
    function consultar(){        
        return "select *
                from detalle_venta
                where mueble_idmueble = '" . $this -> mueble . "' AND venta_idventa = '". $this -> venta . "'";
    }
    
    function insertar(){
        return "insert into detalle_venta(mueble_idmueble, venta_idventa, cantidad, precio, subtotal) values('" . $this -> mueble . "', '" . $this -> venta . "', '"
                    . $this -> cantidad . "', '" . $this -> precio . "', '" . $this -> subtotal ."')";
        //return "insert into detalle_venta values(5, 53, 2, 150000, 30000)";                  
    }  
    
    function sumaSubtotales(){
        return "select sum(subtotal)
                from detalle_venta
                where venta_idventa = '" . $this -> venta . "'";
    }
    
    function consultarTodos(){
        return "select *
                from detalle_venta
                where venta_idventa = '". $this -> venta . "'";
    }
}

