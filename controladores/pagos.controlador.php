<?php


class PagosControlador{

 

    static public function ctrListarPagos(){
    
        $pagos= PagosModelo::mdlListarPagos();
    
        return $pagos;
    
    }

    static public function ctrRegistrarPagos($id_empresa,$codigo_pago,$descripcion,$importe,        
        $estatus,$informe){

        $registroPago = PagosModelo::mdlRegistrarPagos($id_empresa,$codigo_pago,$descripcion,$importe,        
        $estatus,$informe);

        return $registroPago;
    }

    static public function ctrActualizarPagos($table, $data, $id, $nameId){
        
        $respuesta = PagosModelo::mdlActualizarInformacion($table, $data, $id, $nameId);
        
        return $respuesta;
    }

   
    /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    static public function ctrListarNombrePagos(){

        $producto = PagosModelo::mdlListarNombrePagos();

        return $producto;
    }

    /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO DE BARRAS
    ====================================================================*/
   static public function ctrGetDatosPagos($codigo_producto){
            
        $producto = PagosModelo::mdlGetDatosPagos($codigo_producto);

        return $producto;

    }

  
}