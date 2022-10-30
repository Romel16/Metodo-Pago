<?php

require_once "../controladores/pagos.controlador.php";
require_once "../modelos/pagos.modelo.php";

require_once "../vendor/autoload.php";

class ajaxPagos{

    
    public $id_empresa;
    public $codigo_pago;
    public $descripcion;
    public $importe;
    public $estatus;
    public $informe;

    public function ajaxListarPagos(){
    
        $pagos = PagosControlador::ctrListarPagos();
    
        echo json_encode($pagos);
    
    }

    public function ajaxRegistrarPagos(){
        
        $pagos = PagosControlador::ctrRegistrarPagos($this->id_empresa,$this->codigo_pago,$this->descripcion,$this->importe,        
                   $this->estatus,$this->informe);

        echo json_encode($pagos);
    }

    public function ajaxActualizarPagos($data){
        
        $table = "pago";
        $id = $_POST["id"];
        $nameId = "id";

        $respuesta = PagosControlador::ctrActualizarPagos($table, $data, $id, $nameId);

        echo json_encode($respuesta);
    }

    /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    public function ajaxListarDetallePagos(){

        $NombreProductos = PagosControlador::ctrListarNombrePagos();

        echo json_encode($NombreProductos);
    }

    /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO 
    ====================================================================*/
    public function ajaxGetDatosPagos(){
        
        $pagos = PagosControlador::ctrGetDatosPagos($this->codigo_pagos);

        echo json_encode($pagos);
    }


   
}

if(isset($_POST['accion']) && $_POST['accion'] == 1){ // parametro para listar pagos

    $pagos = new ajaxPagos();
    $pagos -> ajaxListarPagos();
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ // parametro para registrar pagos

    $registrarPagos= new AjaxPagos();
    $registrarPagos -> id_empresa = $_POST["id_empresa"];
    $registrarPagos -> descripcion = $_POST["descripcion"];
    $registrarPagos -> importe = $_POST["importe"];
    $registrarPagos -> estatus = $_POST["estatus"];
    $registrarPagos -> informe = $_POST["informe"];
    $registrarPagos -> ajaxRegistrarPagos();
    
}else if(isset($_POST['accion']) && $_POST['accion'] == 4){ // ACCION PARA ACTUALIZAR UN PAGO
 
    $actualizarPago = new ajaxPagos();

    $data = array(
        "id_empresa" => $_POST["id_empresa"],
        "descripcion" => $_POST["descripcion"],
        "importe" => $_POST["importe"],
        "estatus" => $_POST["estatus"],
        "informe" => $_POST["informe"],
    );

    $actualizarPago -> ajaxActualizarPagos($data);

}else if(isset($_POST["accion"]) && $_POST["accion"] == 6){  // TRAER LISTADO DE PRODUCTOS PARA EL AUTOCOMPLETE

    $nombreProductos = new AjaxPagos();
    $nombreProductos -> ajaxListarPagos();

}else if(isset($_POST["accion"]) && $_POST["accion"] == 7){ // OBTENER DATOS DE UN PRODUCTO POR SU CODIGO

    $listaProducto = new AjaxPagos();

    $listaProducto -> codigo_producto = $_POST["codigo_producto"];
    
    $listaProducto -> ajaxGetDatosPagos();
	
}