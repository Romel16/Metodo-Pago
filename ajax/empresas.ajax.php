<?php

require_once "../controladores/empresas.controlador.php";
require_once "../modelos/empresas.modelo.php";

class AjaxEmpresas{

    public $id;
    public $ruc;
    public $razon_social;
    public $rubro;

    public function ajaxListarEmpresas(){
        $empresas = EmpresasControlador::ctrListarEmpresas();

        echo json_encode($empresas, JSON_UNESCAPED_UNICODE);
    }

    public function ajaxGuardarEmpresas($accion){

        $guardarEmpresas = EmpresasControlador::ctrGuardarEmpresas($accion, $this->id, $this->ruc, $this->razon_social, $this->rubro);

        echo json_encode($guardarEmpresas, JSON_UNESCAPED_UNICODE);
    }

}


if (isset($_POST['id']) && $_POST['id'] > 0) {

    $editarEmpresas = new AjaxEmpresas();
    $editarEmpresas->id = $_POST['id'];
    $editarEmpresas->ruc = $_POST['ruc'];
    $editarEmpresas->razon_social = $_POST['razon_social'];
    $editarEmpresas->rubro = $_POST['rubro'];
    $editarEmpresas->ajaxGuardarEmpresas(0);

}else if (isset($_POST['id']) && $_POST['id'] == 0) {
    
    $registrarEmpresas = new AjaxEmpresas();
    $registrarEmpresas->id = $_POST['id'];
    $registrarEmpresas->ruc = $_POST['ruc'];
    $registrarEmpresas->razon_social = $_POST['razon_social'];
    $registrarEmpresas->rubro = $_POST['rubro'];
    $registrarEmpresas->ajaxGuardarEmpresas(1);

}else {
    
    $listaEmpresa = new AjaxEmpresas();
    $listaEmpresa->ajaxListarEmpresas();
    
}


