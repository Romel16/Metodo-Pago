<?php

class EmpresasControlador{

    static public function ctrListarEmpresas(){
        
        $empresas = EmpresasModelo::mdlListarEmpresas();

        return $empresas;
  
    }
   
    static public function ctrGuardarEmpresas($accion, $id, $ruc, $razon_social,$rubro){

        $guardarEmpresas = EmpresasModelo::mdlGuardarEmpresas($accion, $id, $ruc, $razon_social,$rubro);

        return $guardarEmpresas;
    }

}