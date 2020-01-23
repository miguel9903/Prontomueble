<?php
class ProveedorDAO {
    
    private $id;
    private $nombre;
    private $direccion;
    private $correo;
    private $telefono;
    private $estado;

    
    function ProveedorDAO($id="", $nombre="", $direccion="", $correo="", $telefono="", $estado=""){
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> direccion = $direccion;
        $this -> correo = $correo;
        $this -> telefono = $telefono;
        $this -> estado = $estado;
    }
        
    function consultar(){
        return "select *
                from proveedor
                where idproveedor = '" . $this -> id . "'";
    }
    
    function existeCorreo(){
        return "select correo
                from proveedor
                where correo = '" . $this -> correo . "'";
    }
    
    function insertar(){
        return "insert into proveedor(nombre, direccion, correo, telefono, estado)
                values('" . $this -> nombre . "', '" . $this -> direccion . "', '" . $this -> correo . "', '"
                    . $this -> telefono . "', '" . $this -> estado . "')";
    }
    
    function buscar($filtro){
        return "select *
                from proveedor
                where nombre like '" . $filtro . "%' or idproveedor='" . $filtro . "'";
    }
    
    function cambiarEstado() {
        return "update proveedor
                set estado = NOT estado
                where idproveedor ='" . $this -> id . "'";
    }
    
    function consultarTodos() {
        return "select * from proveedor";
    }
    
    function ultimoProv(){
        return "select max(idproveedor) from proveedor";
    }
    
    
}

