<?php
require 'persistencia/ProveedorDAO.php';

class Proveedor{
    
    private $id;
    private $nombre;
    private $direccion;
    private $correo;
    private $telefono;
    private $estado;
    private $conexion;
    private $proveedorDAO;
    
    function Proveedor($id="", $nombre="", $direccion="", $correo="", $telefono="", $estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> direccion = $direccion;
        $this -> correo = $correo;
        $this -> telefono = $telefono;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> proveedorDAO= new ProveedorDAO($id, $nombre, $direccion, $correo, $telefono, $estado);
    }
        
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> direccion = $registro[2];
        $this -> correo = $registro[3];
        $this -> telefono = $registro[4];
        $this -> estado = $registro[5];
        $this -> conexion -> cerrar();
    }
    
    function existeCorreo(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> existeCorreo());
        if($this -> conexion -> numFilas() == 1){
            $this -> conexion -> cerrar();
            return true;
        }else{
            $this -> conexion -> cerrar();
            return false;
        }
    }
    
    function insertar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this -> proveedorDAO -> insertar());
        $this->conexion->cerrar();
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> proveedorDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Proveedor($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[4]);
        }
        return $registros;
    }
    
    function consultarTodos() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->proveedorDAO ->consultarTodos());
        $registros = array();
        for ($i = 0; $i < $this->conexion->numFilas(); $i++) {
            $registro = $this->conexion->extraer();
            $registros[$i] = new Proveedor($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5]);
        }
        return $registros;
        $this->conexion->cerrar();
    }
    
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this-> proveedorDAO -> cambiarEstado());
        $this -> conexion -> cerrar();
    }
    
    function ultimoProv(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->proveedorDAO ->ultimoProv());
        $registro = $this -> conexion -> extraer();
        return $registro[0];
    }
    
    
    function getEstado(){
        return $this -> estado;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function getId(){
        return $this -> id;
    }
}

