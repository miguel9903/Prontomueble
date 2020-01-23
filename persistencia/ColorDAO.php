<?php
class ColorDAO {
    
    private $id;
    private $nombre;
    
    function ColorDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    } 
    
    function consultar(){
        return "select *
                from color
                where idcolor = '" . $this -> id . "'";
        
    }
    
    function consultarTodos() {
        return "select * from color";
    }
    
    function insertar(){
        return "insert into color(nombre) values('" . $this -> nombre . "')";
    }
}

