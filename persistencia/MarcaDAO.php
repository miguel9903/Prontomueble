<?php
class MarcaDAO {
    
    private $id;
    private $nombre;
    
    function MarcaDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    } 
    
    function consultar(){
        return "select *
                from marca
                where idmarca = '" . $this -> id . "'";
        
    }
    
    function consultarTodos() {
        return "select * from marca";
    }
    
    function insertar(){
        return "insert into marca(nombre) values('" . $this -> nombre . "')";
    }
}

