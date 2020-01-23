<?php
require 'persistencia/MuebleDAO.php';

class Mueble {
    
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
    private $conexion;
    private $muebleDAO;
    
    function Mueble($id="", $descripcion="", $tipo_mueble="", $material="", $medidas="", $peso="", $color="", $marca="", $pais="", $precio_unitario="", $existencias="", $foto="", $proveedor="", $estado="") {
      
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
        $this -> conexion = new Conexion();
        $this -> muebleDAO= new MuebleDAO($id, $descripcion, $tipo_mueble, $material, $medidas, $peso, $color, $marca, $pais, $precio_unitario, $existencias, $foto, $proveedor, $estado);
    }
    
    function consultar(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> muebleDAO -> consultar());
        $registro = $this -> conexion -> extraer();
        $this -> id = $registro[0];
        $this -> descripcion = $registro[1];
        $tm = new TipoMueble($registro[2]);
        $tm -> consultar();
        $this -> tipo_mueble = $tm;
        $m = new Material($registro[3]);
        $m -> consultar();
        $this -> material = $m;
        $this -> medidas = $registro[4];
        $this -> peso = $registro[5];
        $c = new Color($registro[6]);
        $c -> consultar();
        $this -> color = $c;
        $mar = new Marca($registro[7]);
        $mar -> consultar();
        $this -> marca = $mar;
        $p = new Pais($registro[8]);
        $p -> consultar();
        $this -> pais = $p;
        $this -> precio_unitario = $registro[9];
        $this -> existencias = $registro[10];
        $this -> foto = $registro[11];
        $this -> proveedor = $registro[12];
        $this -> estado = $registro[13];
        $this -> conexion -> cerrar();
    }
    
    function consultarTodos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> muebleDAO -> consultarTodos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $tm = new TipoMueble($registro[2]);
            $tm -> consultar();
            $m = new Material($registro[3]);
            $m -> consultar();
            $this -> medidas = $registro[4];
            $this -> peso = $registro[5];
            $c = new Color($registro[6]);
            $c -> consultar();
            $mar = new Marca($registro[7]);
            $mar -> consultar();
            $p = new Pais($registro[8]);
            $p -> consultar();
            $registros[$i] = new Mueble($registro[0], $registro[1], $tm, $m, $registro[4], $registro[5], $registro[6], $c, $mar, $c, $mar, $p, $registro[9], $registro[10], $registro[11], $registro[12], $registro[13]);
        }
        
        $this -> conexion -> cerrar();
        return $registros;
    }
    
    
    function consultarPorProv(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> muebleDAO -> consultarPorProv() );
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $tm = new TipoMueble($registro[2]);
            $tm -> consultar();
            $m = new Material($registro[3]);
            $m -> consultar();
            $this -> medidas = $registro[4];
            $this -> peso = $registro[5];
            $c = new Color($registro[6]);
            $c -> consultar();
            $mar = new Marca($registro[7]);
            $mar -> consultar();
            $p = new Pais($registro[8]);
            $p -> consultar();
            $prov = new Proveedor($registro[12]);
            $prov->consultar();
            $registros[$i] = new Mueble($registro[0], $registro[1], $tm, $m, $registro[4], $registro[5], $c, $mar, $p, $registro[9], $registro[10], $registro[11], $prov, $registro[13]);
        }
        
        $this -> conexion -> cerrar();
        return $registros;
    }
    
    function consultarTodosActivos(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> muebleDAO -> consultarTodosActivos());
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $tm = new TipoMueble($registro[2]);
            $tm -> consultar();
            $m = new Material($registro[3]);
            $m -> consultar();
            $this -> medidas = $registro[4];
            $this -> peso = $registro[5];
            $c = new Color($registro[6]);
            $c -> consultar();
            $mar = new Marca($registro[7]);
            $mar -> consultar();
            $p = new Pais($registro[8]);
            $p -> consultar();
            $registros[$i] = new Mueble($registro[0], $registro[1], $tm, $m, $registro[4], $registro[5], $registro[6], $c, $mar, $c, $mar, $p, $registro[9], $registro[10], $registro[11], $registro[12], $registro[13]);
        }
        
        $this -> conexion -> cerrar();
        return $registros;
    }
    
    function consultarDatosProducto(){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this -> muebleDAO -> consultar());
        $registros = array();
        $registro = $this -> conexion -> extraer();
        $tm = new TipoMueble($registro[2]);
        $tm -> consultar();
        $m = new Material($registro[3]);
        $m -> consultar();
        $this -> medidas = $registro[4];
        $this -> peso = $registro[5];
        $c = new Color($registro[6]);
        $c -> consultar();
        $mar = new Marca($registro[7]);
        $mar -> consultar();
        $p = new Pais($registro[8]);
        $p -> consultar();
        $registros[0] = new Mueble($registro[0], $registro[1], $tm, $m, $registro[4], $registro[5], $registro[6], $c, $mar, $c, $mar, $p, $registro[9], $registro[10], $registro[11], $registro[12], $registro[13]);
           
        $this -> conexion -> cerrar();
        return $registros;
    }
    
    function insertar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->muebleDAO->insertar());
        $this->conexion->cerrar();
    }
    
    function actualizar() {
        $this->conexion->abrir();
        echo "Query: " . $this->muebleDAO->actualizar();
        $this->conexion->ejecutar($this->muebleDAO->actualizar());
        $this->conexion->cerrar();
    }
    
    function editar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->muebleDAO->editar());
        $this->conexion->cerrar();
    }
    
    function eliminar() {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->muebleDAO->eliminar());
        $this->conexion->cerrar();
    }
    
    function modificarStock($existencias) {
        $this->conexion->abrir();
        $this->conexion->ejecutar($this->muebleDAO->modificarStock($existencias));
        $this->conexion->cerrar();
    }
    
    function cambiarFoto() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->muebleDAO->cambiarFoto());
        $this -> conexion -> cerrar();
    }
    
    function cambiarEstado() {
        $this -> conexion -> abrir();
        $this->conexion->ejecutar($this->muebleDAO->cambiarEstado());
        $this -> conexion -> cerrar();
    }
    
    function buscar($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->muebleDAO-> buscar($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            //$tipoMueble = new TipoMueble($registro[2]);
            //$tipoMueble -> consultar();
            $registros[$i] = new Mueble($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $registro[5], $registro[6], $registro[7], $registro[8], $registro[9], $registro[10], $registro[11], $registro[12], $registro[13]);
        }
        return $registros;
    }
    
    function buscarActivivos($filtro){
        $this -> conexion -> abrir();
        $this -> conexion -> ejecutar($this->muebleDAO-> buscarActivos($filtro));
        $registros = array();
        for($i = 0; $i < $this -> conexion -> numFilas(); $i++){
            $registro = $this -> conexion -> extraer();
            $tipoMueble = new TipoMueble($registro[2]);
            $tipoMueble -> consultar();
            $registros[$i] = new Mueble($registro[0], $registro[1], $tipoMueble, $registro[3], $registro[4], $registro[5], $registro[6], $registro[7], $registro[8], $registro[9], $registro[10], $registro[11], $registro[12], $registro[13]);
        }
        return $registros;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getDescripcion() {
        return $this->descripcion;
    }
    
    function getTipoMueble() {
        return $this->tipo_mueble;
    }
    
    function getMaterial() {
        return $this->material;
    }
    
    function getMedidas() {
        return $this->medidas;
    }
    
    function getPeso() {
        return $this->peso;
    }
    
    function getColor() {
        return $this->color;
    }
    
    function getMarca() {
        return $this->marca;
    }
    
    function getPais() {
        return $this->pais;
    }
    
    function getPrecio() {
        return $this->precio_unitario;
    }
    
    function getExistencias() {
        return $this->existencias;
    }
    
    function getFoto() {
        return $this->foto;
    }
    
    function getProveedor() {
        return $this->proveedor;
    }
    
    function getEstado() {
        return $this->estado;
    }
}

