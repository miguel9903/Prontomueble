<?php

class MuebleDAO {
    
    private $id;
    private $descripcion;
    private $tipo_mueble;
    private $material;
    private $medidas;
    private $peso;
    private $color;
    private $marca;
    private $pais;
    private $precio_unitario;
    private $existencias;
    private $foto;
    private $proveedor;
    private $estado;
    
    function MuebleDAO($id="", $descripcion="", $tipo_mueble="", $material="", $medidas="", $peso="", $color="", $marca="", $pais="", $precio_unitario="", $existencias="", $foto="", $proveedor="", $estado="") {
        
        $this -> id = $id;
        $this -> descripcion = $descripcion;
        $this -> tipo_mueble = $tipo_mueble;
        $this -> material = $material;
        $this -> medidas = $medidas;
        $this -> peso = $peso;
        $this -> color = $color;
        $this -> marca = $marca;
        $this -> pais = $pais;
        $this -> precio_unitario = $precio_unitario;
        $this -> existencias = $existencias;
        $this -> foto = $foto;
        $this -> proveedor = $proveedor;
        $this -> estado = $estado;

    }
    
    function consultar(){
        return "select *
                from mueble
                where idmueble = '" . $this -> id . "'";
    }
    
    function consultarTodos(){
        return "select * from mueble";
    }
    
    function consultarPorProv(){
        return "select * from mueble where proveedor_idproveedor='" . $this->proveedor . "'";
    }
    
    function consultarTodosActivos(){
        return "select * from mueble where estado=1";
    }
    
    function insertar(){
        return "insert into mueble(descripcion, tipo_mueble_idtipo_mueble, material_idmaterial, medidas, peso, color_idcolor, marca_idmarca, pais_idpais, precio_unitario, existencias, foto, proveedor_idproveedor, estado)
                values('" . $this -> descripcion . "', '" . $this -> tipo_mueble . "', '" . $this -> material . "', '"
                    . $this -> medidas . "', '" . $this -> peso . "', '" 
                    . $this -> color . "', '" . $this -> marca . "', '" . $this -> pais . "', '" . $this -> precio_unitario . "', '" . $this -> existencias . "', '" . $this -> foto . "', '" . $this -> proveedor . "', '" . $this -> estado . "')";
    }
    
    function actualizar(){
        return "update mueble set descripcion='" . $this -> descripcion . "', tipo_mueble_idtipo_mueble='" . $this -> tipo_mueble . "', material_idmaterial='"
            . $this -> material . "', medidas='" . $this -> medidas . "', peso='" . $this -> peso . "', color_idcolor='" . $this -> color . "', marca_idmarca='" . $this -> marca . "', pais_idpais='" . $this -> pais 
            . "', precio_unitario='" . $this->precio_unitario . "', existencias='" . $this -> existencias . "', proveedor_idproveedor='" . $this -> proveedor . "' where idmueble='" . $this -> id . "'";
    } 
    
    function editar(){
        return "update mueble set descripcion='" . $this -> descripcion . "', tipo_mueble_idtipo_mueble='" . $this -> tipo_mueble . "', material_idmaterial='"
            . $this -> material . "', medidas='" . $this -> medidas . "', peso='" . $this -> peso . "', color_idcolor='" . $this -> color . "', marca_idmarca='" . $this -> marca . "', pais_idpais='" . $this -> pais
            . "', existencias='" . $this -> existencias . "' where idmueble='" . $this -> id . "'";
    } 
    
    function cambiarFoto() {
        return "update mueble
                set foto = '" . $this -> foto . "'
                where idmueble ='" . $this -> id . "'";
    }
    
    function eliminar() {
        return "update mueble set estado=0 where idmueble=´" . $this -> id . "´";
    }
    
    function buscar($filtro){
        return "select *
                from mueble
                where descripcion like '" . $filtro . "%' or idmueble='" . $filtro . "'";
    }
    
    function buscarActivos($filtro){
        return "select *
                from mueble
                where descripcion like '" . $filtro . "%' or idmueble='" . $filtro . "' and estado=1";
    }
    
    function cambiarEstado() {
        return "update mueble
                set estado = NOT estado
                where idmueble ='" . $this->id . "'";
    }
    
    function modificarStock($existencias) {
        return "update mueble set existencias='" . $existencias . "' where idmueble ='" . $this->id . "'";
    }
    
}
  
