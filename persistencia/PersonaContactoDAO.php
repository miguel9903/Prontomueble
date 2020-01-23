<?php

class PersonaContactoDAO {
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $telefono;
    private $proveedor;
    private $estado;
    
    function PersonaContactoDAO ($id="", $nombre="", $apellido="", $correo="", $clave="", $telefono="", $proveedor="", $estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> telefono = $telefono;
        $this -> proveedor = $proveedor;
        $this -> estado = $estado;
    }    
    
    function autenticar(){
        return "select idpersona_contacto, estado
                from persona_contacto
                where correo = '" . $this -> correo . "' and clave = '" . md5($this->clave) . "'";
    }
    
    function consultar(){        
        return "select * from persona_contacto where idpersona_contacto= '" . $this -> id . "'";
    }
    
    function insertar(){
        return "insert into persona_contacto values('" . $this->id . "', '" . $this -> nombre . "', '" . $this -> apellido."', '" . $this -> correo . "', '" 
                          . md5($this -> clave) . "', '" . $this -> telefono . "', '" . $this->proveedor ."', '" . $this -> estado . "')";
    }
    
    function existeCorreo(){
        return "select correo
                from cliente
                where correo = '" . $this -> correo . "'";
    }
    
    function existeCorreoDiferente(){
        return "select correo
                from cliente
                where correo = '" . $this -> correo . "' and idcliente != '" . $this->id . "'";
    }
        
    function consultarTodos(){
        return "select idcliente, nombre, apellido, correo, direccion, telefono, estado
                from cliente";
        
    }
    
    function consultarTodosAc(){
        return "select idcliente, nombre, apellido, correo, direccion, telefono, estado
                from cliente where estado=1";
        
    }
      
    function actualizarPerfil(){
        return "update cliente set nombre='" . $this -> nombre . "', apellido='" . $this -> apellido . "', correo='" 
        . $this -> correo . "', fecha_actualizacion='" . $this -> fecha_actualizacion . "', telefono='" . $this -> telefono . "' where idcliente='" . $this->id. "'";
    } 
   
    function actualizarClave(){
        return "update cliente set clave='" . md5($this->clave) . "', fecha_actualizacion='" . $this->fecha_actualizacion . 
        "' where idcliente='" . $this->id . "'";
    }
    
    function buscar($filtro){
        return "select idcliente, nombre, apellido, correo, estado, fecha_registro, fecha_actualizacion, telefono, estado
                from cliente
                where nombre like '" . $filtro . "%' or apellido like '" . $filtro . "%'";
    }
    
    function cambiarEstado() {
        return "update cliente
                set estado = NOT estado
                where idcliente ='" . $this->id . "'";
    }
    
    function getNombre(){
        return $this -> nombre;
    }
    
    function getApellido(){
        return $this -> apellido;
    }
    
    function getCorreo(){
        return $this -> correo;
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
}
?>