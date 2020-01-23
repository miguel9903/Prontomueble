<?php
class VentaDAO {
    
    private $id;
    private $fecha;
    private $total;
    private $vendedor;
    private $cliente;
    
    function VentaDAO($id="", $fecha="", $total="", $vendedor="", $cliente=""){
        $this -> id = $id;
        $this -> fecha = $fecha;
        $this -> total = $total;
        $this -> vendedor = $vendedor;
        $this -> cliente = $cliente;          
    } 
    
    function insertar(){
        return "insert into venta(fecha, total_venta, vendedor_idvendedor, cliente_idcliente) values('" . $this -> fecha . "', '" . $this -> total . "', '" . $this -> vendedor . "', '" . $this -> cliente . "')";
    }
    
    function ultimaVenta(){
        return "select max(idventa) from venta";
    }
    
    function conusultar(){
        return "select * from venta where idventa='" . $this->id . "'";
    }
    
    function modificarTotalVenta($valor){
       return "update venta set total_venta = '" . $valor . "' where idventa = '" . $this->id . "'";
     } 
     
     function consultarTodos(){
         return "select * from venta";
     }
     
     function buscar($filtro){
         return "select *
                 from venta
                 where idventa='" . $filtro . "'";
     }
}
?>