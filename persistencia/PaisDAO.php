<?php
class PaisDAO {
    
    private $id;
    private $nombre;
    
    function PaisDAO($id="", $nombre=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
    } 
    
    function consultar(){
        return "select *
                from pais
                where idpais = '" . $this -> id . "'";
        
    }
    
    function consultarTodos() {
        return "select * from pais";
    }
    
    function insertar(){
        return "insert into pais(nombre) values('" . $this -> nombre . "')";
    }
}

