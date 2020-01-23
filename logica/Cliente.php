<?php
require 'persistencia/ClienteDAO.php';

class Cliente extends Persona{

    private $fecha_registro;
    private $fecha_actualizacion;
    private $telefono;
    private $estado;
    private $conexion;
    private $clienteDAO;
    
    function Cliente($id="", $nombre="", $apellido="", $correo="", $clave="", $fecha_registro="", $fecha_actualizacion="", $telefono="",  $estado=""){
        $this -> Persona($id, $nombre, $apellido, $correo, $clave);
        $this -> fecha_registro = $fecha_registro;
        $this -> fecha_actualizacion = $fecha_actualizacion;
        $this -> telefono = $telefono;
        $this -> estado = $estado;
        $this -> conexion = new Conexion();
        $this -> clienteDAO = new ClienteDAO($id, $nombre, $apellido, $correo, $clave, $fecha_registro, $fecha_actualizacion, $telefono, $estado);
    }
    
    function autenticar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> autenticar());
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
        $this -> conexion -> ejecutar($this -> clienteDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> nombre = $registro[1];
        $this -> apellido = $registro[2];
        $this -> correo = $registro[3];
        $this -> clave = $registro[4];
        $this -> fecha_registro = $registro[5];     
        $this -> fecha_actualizacion = $registro[6];
        $this -> telefono = $registro[7];
        $this -> estado = $registro[8];
        $this -> conexion -> cerrar();
    }
    
    function insertar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->insertar());
        $this->conexion->cerrar();
    }
    
    function  existeCorreo(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->existeCorreo());
        if ($this->conexion->numFilas()==1){
            $this->conexion->cerrar();
            return true;
        }else{
            $this->conexion->cerrar();
            return false;
        }
    }
    
    function  existeCliente(){
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->clienteDAO->existeCliente());
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
        $this->conexion->ejecutar($this->clienteDAO->existeCorreoDiferente());
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
        $this -> conexion -> ejecutar($this->clienteDAO->consultarTodos());  
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Cliente($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[5], $registro[6], $registro[7], $registro[8]);
        }
        
        $this -> conexion -> cerrar();
        return $registros;
    }
        
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->clienteDAO->cambiarEstado());
        $this -> conexion -> cerrar();
    }
    
    function actualizarPerfil(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this-> clienteDAO ->actualizarPerfil());
        $this -> conexion -> cerrar();
    }
    
    function actualizar(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->clienteDAO->actualizar());
        $this -> conexion -> cerrar();
    }
    
    function actualizarClave(){
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this-> clienteDAO -> actualizarClave());
        $this -> conexion -> cerrar();
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> clienteDAO -> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $registros[$i] = new Cliente($registro[0], $registro[1], $registro[2], $registro[3], "", $registro[5], $registro[6], $registro[7], $registro[8]);
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

