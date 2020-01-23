<?php
require 'persistencia/TipoMuebleDAO.php';

class TipoMueble {
    
    private $id;
    private $descripcion;
    private $estado;
    private $conexion;
    private $tipoMuebleDAO;
    
    function TipoMueble($id="", $descripcion="", $estado=""){
        $this -> id = $id;
        $this -> descripcion = $descripcion;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> tipoMuebleDAO = new TipoMuebleDAO($id, $descripcion, $estado);
    } 
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> tipoMuebleDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> descripcion = $registro[1];
        $this -> estado = $registro[2];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tipoMuebleDAO->consultarTodos());
        $registros = array();
        for ($i = 0; $i < $this->conexion->numFilas(); $i++) {
            $registro = $this->conexion->extraer();
            $registros[$i] = new TipoMueble($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
        $this->conexion->cerrar();
    }
    
    function insertar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->tipoMuebleDAO->insertar());
        $this->conexion->cerrar();
    }
    
    function actualizar(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->tipoMuebleDAO->actualizar());
        $this -> conexion -> cerrar();
    }
    
    function eliminar(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->tipoMuebleDAO->eliminar());
        $this -> conexion -> cerrar();
    }
    
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this ->tipoMuebleDAO->cambiarEstado());
        $this -> conexion -> cerrar();
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->tipoMuebleDAO->buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new TipoMueble($registro[0], $registro[1], $registro[2]);
        }
        return $registros;
    }
    
    function getId(){
        return $this -> id;
    }
    
    function getDescripcion(){
        return $this -> descripcion;
    }
    
    function getEstado(){
        return $this -> estado;
    }
}

