<?php

require_once "conexion.php";

class EmpresasModelo{


    static public function mdlListarEmpresas(){

        $stmt = Conexion::conectar()->prepare("SELECT id,
                                                      ruc,
                                                      razon_social,
                                                      rubro,
                                                      '' as opciones
                                                    from empresa e ORDER by id DESC");

        $stmt -> execute();

        return $stmt->fetchAll();
    }   

    static public function mdlGuardarEmpresas($accion, $id, $ruc, $razon_social, $rubro){

        //$date = null;

        if($accion > 0){// REGISTRAR

            //$date = date("Y-m-d H:i:s");
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO empresa(ruc,razon_social,rubro) 
            VALUES(:ruc,:razon_social,:rubro)");

            $stmt -> bindParam(":ruc", $ruc , PDO::PARAM_STR);
            $stmt -> bindParam(":razon_social", $razon_social , PDO::PARAM_STR);
            $stmt -> bindParam(":rubro",  $rubro , PDO::PARAM_STR);

            if($stmt -> execute()){
                $resultado = "Se registró la Empresa correctamente.";
            }else{
                $resultado = "Error al registrar la Empresa";
            }

        }else{// EDITAR

            //$date = date("Y-m-d H:i:s");

            $stmt = Conexion::conectar()->prepare("UPDATE empresa 
                                                      SET ruc = :ruc,
                                                          razon_social = :razon_social,
                                                          rubro = :rubro
                                                    WHERE id = :id") ;
            

            $stmt -> bindParam(":id", $id , PDO::PARAM_STR);
            $stmt -> bindParam(":ruc", $ruc , PDO::PARAM_STR);
            $stmt -> bindParam(":razon_social", $razon_social, PDO::PARAM_STR);
            $stmt -> bindParam(":rubro",  $rubro , PDO::PARAM_STR);

            if($stmt -> execute()){
                $resultado = "Se actualizó la Empresa correctamente.";
            }else{
                $resultado = "Error al actualizar la Empresa";
            }
        }

        return $resultado;
        
        $stmt = null;

    }



}