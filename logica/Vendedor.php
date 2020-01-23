<?php
require 'persistencia/VendedorDAO.php';

class Vendedor extends Persona{

    private $fecha_ingreso;
    private $fecha_actualizacion;
    private $telefono;
    private $estado;
    private $conexion;
    private $vendedorDAO;
    
    function Vendedor($id="", $nombre="", $apellido="", $correo="", $clave="", $fecha_ingreso="", $fecha_actualizacion="", $telefono="",  $estado=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> fecha_ingreso = $fecha_ingreso;
        $this -> fecha_actualizacion = $fecha_actualizacion;
        $this -> telefono = $telefono;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> vendedorDAO = new VendedorDAO($id, $nombre, $apellido, $correo, $clave, $fecha_ingreso, $fecha_actualizacion, $telefono, $estado);
    }
    
    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> vendedorDAO -> autenticar());
        if($this -> conexion -> numFilas() == 1){
            $registro = $this -> conexion -> extraer();
            $this -> id = $registro[0];
            $this -> estado = $registro[1];
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> vendedorDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> correo = $registro[3];
        $this -> fecha_ingreso = $registro[4];  
        $this -> telefono = $registro[5];  
        $this -> estado = $registro[6];
        $this -> conexion -> cerrar();
    }
    
    function insertar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->vendedorDAO->insertar());
        $this->conexion->cerrar();
    }
    
    function  existeCorreo(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->vendedorDAO->existeCorreo());
        if ($this->conexion->numFilas()==1){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return false;
        }
    }
    
    function existeVendedor(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->vendedorDAO->existeVendedor());
        if ($this->conexion->numFilas()==1){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return false;
        }
    }
    
    function  existeCorreoDiferente(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->vendedorDAO->existeCorreoDiferente());
        if ($this->conexion->numFilas()==1){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return false;
        }
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> vendedorDAO -> consultarTodos());  
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Vendedor($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[5], $registro[6], $registro[7]);
        }
        
        $this -> conexion -> cerrar();
        return $registros;
    }
    
    
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->vendedorDAO->cambiarEstado());
        $this -> conexion -> cerrar();
    }
    
    function actualizar(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->vendedorDAO->actualizar());
        $this -> conexion -> cerrar();
    }
    
    function actualizarClave(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this-> vendedorDAO -> actualizarClave());
        $this -> conexion -> cerrar();
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> vendedorDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Vendedor($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[5], $registro[6], $registro[7], $registro[8]);
        }
        return $registros;
    }
    
        
    function getFechaRegistro(){
        return $this -> fecha_registro;
    }
    
    function getFechaActualizacion(){
        return $this -> fecha_actualizacion;
    }
    
    function getTelefono(){
        return $this -> telefono;
    }
    
    function getEstado(){
        return $this -> estado;
    }
}

