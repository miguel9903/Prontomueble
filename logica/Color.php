<?php
require 'persistencia/ColorDAO.php';

class Color {
    
    private $id;
    private $nombre;
    private $conexion;
    private $colorDAO;
    
    function Color($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> conexion = new Conexion();
        $this -> colorDAO = new ColorDAO($id, $nombre);
    } 
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> colorDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->colorDAO->consultarTodos());
        $registros = array();
        for ($i = 0; $i < $this->conexion->numFilas(); $i++) {
            $registro = $this->conexion->extraer();
            $registros[$i] = new Color($registro[0], $registro[1]);
        }
        return $registros;
        $this->conexion->cerrar();
    }
    
    function insertar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->colorDAO->insertar());
        $this->conexion->cerrar();
    }
    
    
    function getId(){
        return $this -> id;
    }
    
    function getNombre(){
        return $this -> nombre;
    }
}

