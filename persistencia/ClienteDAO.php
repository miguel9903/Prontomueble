<?php
class ClienteDAO {
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $fecha_registro;
    private $fecha_actualizacion;
    private $telefono;
    private $estado;
    
    function ClienteDAO ($id="", $nombre="", $apellido="", $correo="", $clave="", $fecha_registro="", $fecha_actualizacion="", $telefono="", $estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> fecha_registro = $fecha_registro;
        $this -> fecha_actualizacion = $fecha_actualizacion;
        $this -> telefono = $telefono;
        $this -> estado = $estado;
    }    
    
    function autenticar(){
        return "select idcliente, estado
                from cliente 
                where correo = '" . $this -> correo . "' and clave = '" . md5($this->clave) . "'";
    }
    
    function consultar(){        
        return "select *
                from cliente
                where idcliente = '" . $this -> id . "'";
    }
    
    function insertar(){
        return "insert into cliente values('" . $this -> id . "', '" . $this -> nombre . "', '" . $this -> apellido."', '" . $this -> correo . "', '" 
                          . md5($this -> clave) . "', '" . $this -> fecha_registro . "', '" . $this->fecha_actualizacion ."', '" 
                          . $this -> telefono ."', '" . $this -> estado . "')";
    }
    
    function existeCorreo(){
        return "select correo
                from cliente
                where correo = '" . $this -> correo . "'";
    }
    
    function existeCliente(){
        return "select idcliente
                from cliente
                where idcliente = '" . $this -> id . "'";
    }
    
    function existeCorreoDiferente(){
        return "select correo
                from cliente
                where correo = '" . $this -> correo . "' and idcliente != '" . $this->id . "'";
    }
        
    function consultarTodos(){
        return "select * from cliente"; 
    }
    
    function consultarTodosAc(){
        return "select idcliente, nombre, apellido, correo, direccion, telefono, estado
                from cliente where estado=1";
        
    }
      
    function actualizarPerfil(){
        return "update cliente set nombre='" . $this -> nombre . "', apellido='" . $this -> apellido . "', correo='" 
        . $this -> correo . "', fecha_actualizacion='" . $this -> fecha_actualizacion . "', telefono='" . $this -> telefono . "' where idcliente='" . $this->id. "'";
    } 
    
    function actualizar(){
        return "update cliente set nombre='" . $this -> nombre . "', apellido='"
            . $this -> apellido . "', correo='" . $this -> correo . "', fecha_actualizacion='" . $this -> fecha_actualizacion . "', telefono='" . $this -> telefono . "' where idcliente='" . $this -> id. "'";
    } 
   
    function actualizarClave(){
        return "update cliente set clave='" . md5($this->clave) . "', fecha_actualizacion='" . $this->fecha_actualizacion . 
        "' where idcliente='" . $this->id . "'";
    }
    
    function buscar($filtro){
        return "select *
                from cliente
                where nombre like '" . $filtro . "%' or apellido like '" . $filtro . "%' or idcliente='" . $filtro . "'";
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