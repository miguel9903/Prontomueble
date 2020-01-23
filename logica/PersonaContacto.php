<?php
require 'persistencia/PersonaContactoDAO.php';

class PersonaContacto extends Persona{

    private $telefono;
    private $proveedor;
    private $estado;
    private $conexion;
    private $personaContactoDAO;
    
    function PersonaContacto($id="", $nombre="", $apellido="", $correo="", $clave="", $telefono="", $proveedor="", $estado=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> telefono = $telefono;
        $this -> proveedor = $proveedor;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> personaContactoDAO = new PersonaContactoDAO($id, $nombre, $apellido, $correo, $clave, $telefono, $proveedor, $estado);
    }
    
    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> personaContactoDAO -> autenticar());
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
        $this -> conexion -> ejecutar($this -> personaContactoDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> correo = $registro[3];
        $this -> clave = $registro[4];
        $this -> telefono = $registro[5];
        $prov = new Proveedor($registro[6]);
        $prov->consultar();
        $this -> proveedor = $prov;
        $this -> estado = $registro[7];
        $this -> conexion -> cerrar();
    }
    
    function insertar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->personaContactoDAO->insertar());
        $this->conexion->cerrar();
    }
    
    function  existeCorreo(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->personaContactoDAO->existeCorreo());
        if ($this->conexion->numFilas()==1){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return false;
        }
    }
           
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this -> personaContactoDAO->cambiarEstado());
        $this -> conexion -> cerrar();
    }
    
    function actualizarPerfil(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this-> personaContactoDAO ->actualizarPerfil());
        $this -> conexion -> cerrar();
    }
    
    function actualizarClave(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this-> personaContactoDAO -> actualizarClave());
        $this -> conexion -> cerrar();
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> personaContactoDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Cliente($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[5], $registro[6], $registro[4]);
        }
        return $registros;
    }
        
    function getTelefono(){
        return $this -> telefono;
    }
    
    function getProveedor(){
        return $this -> proveedor;
    }
    
    function getEstado(){
        return $this -> estado;
    }
}

