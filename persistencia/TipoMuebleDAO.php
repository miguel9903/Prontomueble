<?php
class TipoMuebleDAO {
    
    private $id;
    private $descripcion;
    private $estado;
    
    
    function TipoMuebleDAO($id="", $descripcion="",  $estado=""){
        $this -> id = $id;
        $this -> descripcion = $descripcion;
        $this -> estado = $estado;
    }
    
    function consultar(){
        return "select *
                from tipo_mueble
                where idtipo_mueble = '" . $this -> id . "'";
        
    }
    
    function consultarTodos() {
        return "select * from tipo_mueble";
    }
    
    function insertar(){
        return "insert into tipo_mueble(descripcion, estado) values('" . $this -> descripcion . "', '" . $this -> estado . "')";
    }
    
    function actualizar(){
        return "update tipo_mueble set descripcion = '" . $this-> descripcion . "' where idtipo_mueble='" . $this->id . "'";
    }
    
    function eliminar() {
        return "update tipo_mueble set estado=0 where idtipo_mueble=´" . $this -> id . "´";
    }
    
    function cambiarEstado() {
        return "update tipo_mueble
                set estado = NOT estado
                where idtipo_mueble ='" . $this->id . "'";
    }
    
    function buscar($filtro){
        return "select * from tipo_mueble where idtipo_mueble='" . $filtro . "' or descripcion like '" . $filtro . "%'";
    }
}

