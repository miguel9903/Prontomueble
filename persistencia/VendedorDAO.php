<?php
class VendedorDAO {
    
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;
    private $fecha_ingreso;
    private $fecha_actualizacion;
    private $telefono;
    private $estado;

    
    function VendedorDAO($id="", $nombre="", $apellido="", $correo="", $clave="", $fecha_ingreso="", $fecha_actualizacion="", $telefono="",  $estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
        $this -> fecha_ingreso = $fecha_ingreso;
        $this -> fecha_actualizacion = $fecha_actualizacion;
        $this -> telefono = $telefono;
        $this -> estado = $estado;
    }
    
    function autenticar(){
        return "select idvendedor, estado
                from vendedor 
                where correo = '" . $this -> correo . "' and clave = '" . md5($this->clave) . "'";
    }
    
    function consultar(){        
        return "select idvendedor, nombre, apellido, correo, fecha_ingreso, telefono, estado
                from vendedor
                where idvendedor = '" . $this -> id . "'";
    }
    
    function insertar(){
        return "insert into vendedor values('" . $this -> id . "', '" . $this -> nombre . "', '" . $this -> apellido."', '" . $this -> correo . "', '"
            . md5($this -> clave) . "', '" . $this -> fecha_ingreso . "', '" . $this->fecha_actualizacion ."', '"
                . $this -> telefono ."', '" . $this -> estado . "')";
    }
    
    function existeCorreo(){
        return "select correo
                from vendedor
                where correo = '" . $this -> correo . "'";
    }
    
    function existeVendedor(){
        return "select idvendedor
                from vendedor
                where idvendedor = '" . $this -> id . "'";
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
   
    function actualizar(){
        return "update vendedor set nombre='" . $this -> nombre . "', apellido='"
            . $this -> apellido . "', correo='" . $this -> correo . "', fecha_actualizacion='" . $this -> fecha_actualizacion . "', telefono='" . $this -> telefono . "' where idvendedor='" . $this -> id. "'";
    } 
    
    function actualizarClave(){
        return "update cliente set clave='" . md5($this->clave) . "', fecha_actualizacion='" . $this->fecha_actualizacion . 
        "' where idcliente='" . $this->id . "'";
    }
    
    
    function buscar($filtro){
        return "select *
                from vendedor
                where nombre like '" . $filtro . "%' or apellido like '" . $filtro . "%' or idvendedor='" . $filtro . "'";
    }
    
    function cambiarEstado() {
        return "update vendedor
                set estado = NOT estado
                where idvendedor ='" . $this->id . "'";
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