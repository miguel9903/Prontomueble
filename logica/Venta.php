<?php
require 'persistencia/VentaDAO.php';

class Venta{
    
    private $id;
    private $fecha;
    private $total;
    private $vendedor;
    private $cliente;
    private $conexion;
    private $ventaDAO;

    function Venta($id="", $fecha="", $total="", $vendedor="", $cliente=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> total = $total;
        $this -> vendedor = $vendedor;
        $this -> cliente = $cliente;
        $this -> conexion = new Conexion();
        $this -> ventaDAO = new VentaDAO($id, $fecha, $total, $vendedor, $cliente);
    } 

    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> ventaDAO -> conusultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> fecha = $registro[1];
        $this -> total = $registro[2];
        $this -> vendedor = $registro[3];
        $this -> cliente = $registro[4];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->ventaDAO->consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $vendedor = new Vendedor($registro[3]);
            $vendedor -> consultar();
            $cliente = new Cliente($registro[4]);
            $cliente->consultar();
            $registros[$i] = new Venta($registro[0], $registro[1], $registro[2], $vendedor, $cliente);
        }
        
        $this -> conexion -> cerrar();
        return $registros;
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->ventaDAO->buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            
            $registros[$i] = new Venta($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
        }
        return $registros;
    }
        
     function ultimaVenta(){
            $this -> conexion -> abrir();
            $this -> conexion -> ejecutar($this -> ventaDAO -> ultimaVenta());
            $registro = $this -> conexion -> extraer();
            return $registro[0];
     }

        
     function insertar(){
            $this -> conexion -> abrir();
            $this -> conexion -> ejecutar($this->ventaDAO->insertar());
            $this -> conexion -> cerrar();
     } 
        
    function modificarTotalVenta($valor){
            $this -> conexion -> abrir();
            $this -> conexion -> ejecutar($this -> ventaDAO -> modificarTotalVenta($valor));
            $this -> conexion -> cerrar();
    } 
                
   function getId() {
        return $this -> id;
   }
        
   function getFecha() {
       return $this -> fecha;
   }
   
   function getTotal() {
       return $this -> total;
   }
   
   function getVendedor() {
       return $this -> vendedor;
   }
   
   function getCliente() {
       return $this -> cliente;
   }
}
?>