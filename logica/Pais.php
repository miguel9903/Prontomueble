<?php
require 'persistencia/PaisDAO.php';

class Pais {
    
    private $id;
    private $nombre;
    private $conexion;
    private $paisDAO;
    
    function Pais($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this->conexion = new Conexion();
        $this->paisDAO = new PaisDAO($id, $nombre);
    } 
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> paisDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->paisDAO->consultarTodos());
        $registros = array();
        for ($i = 0; $i < $this->conexion->numFilas(); $i++) {
            $registro = $this->conexion->extraer();
            $registros[$i] = new Pais($registro[0], $registro[1]);
        }
        return $registros;
        $this->conexion->cerrar();
    }
    
    function insertar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->paisDAO->insertar());
        $this->conexion->cerrar();
    }
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
}

