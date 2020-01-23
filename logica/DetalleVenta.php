<?php
require 'persistencia/DetalleVentaDAO.php';

class DetalleVenta{
    
    private $id;
    private $mueble;
    private $venta;
    private $cantidad;
    private $precio;
    private $subtotal;
    private $conexion;
    private $detalle_ventaDAO;
    
    
    function DetalleVenta($id="", $mueble="", $venta="", $cantidad="", $precio="", $subtotal=""){
        $this -> id = $id;
        $this -> mueble = $mueble;
        $this -> venta = $venta;
        $this -> cantidad = $cantidad;
        $this -> precio = $precio;
        $this -> subtotal = $subtotal;
        $this -> conexion = new Conexion();
        $this -> detalle_ventaDAO = new DetalleVentaDAO($id, $mueble, $venta, $cantidad, $precio, $subtotal);
    }

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalle_ventaDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $m = new Mueble($registro[0]);
        $m -> consultar();
        $this -> mueble = $m;
        $this -> venta = $registro[1];
        $this -> cantidad = $registro[2];
        $this -> precio = $registro[3];
        $this -> subtotal = $registro[4];
        $this -> conexion -> cerrar();
    }
    
    function insertar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->detalle_ventaDAO->insertar());
        $this -> conexion -> cerrar();
    }
    
    function sumaSubtotales(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalle_ventaDAO -> sumaSubtotales());
        $registro = $this -> conexion -> extraer();
        return $registro[0];
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> detalle_ventaDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new DetalleVenta($registro[0], $registro[1], $registro[2], $registro[3],$registro[4],$registro[5]);
        }
        return $registros;
    }
    
    
    
    function getCantidad(){
        return $this -> cantidad;
    }
    
    function getPrecio(){
        return $this -> precio;
    }
    
    function getSubtotal(){
        return $this -> subtotal;
    }
    
    function getMueble(){
        return $this -> mueble;
    }
    
    function getVenta(){
        return $this -> venta;
    }
}
?>