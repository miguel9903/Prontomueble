<?php
class MaterialDAO {
    
    private $id;
    private $nombre;
    
    function MaterialDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    } 
    
    function consultar(){
        return "select *
                from material
                where idmaterial = '" . $this -> id . "'";
        
    }
    
    function consultarTodos() {
        return "select * from material";
    }
    
    function insertar(){
        return "insert into material(nombre) values('" . $this -> nombre . "')";
    }
    
}

