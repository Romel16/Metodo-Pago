<?php

require_once "conexion.php";
use PhpOffice\PhpSpreadsheet\IOFactory;


class PagosModelo{


    /*===================================================================
    OBTENER LISTADO TOTAL DE PAGOS PARA EL DATATABLE
    ====================================================================*/
    static public function mdlListarPagos(){
    
        $stmt = Conexion::conectar()->prepare("call prc_ListarPagos");
    
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    /*===================================================================
    REGISTRAR PAGOS UNO A UNO DESDE EL FORMULARIO DEL INVENTARIO
    ====================================================================*/
    static public function mdlRegistrarPagos($id_empresa, $codigo_pago,$descripcion,$importe,$estatus,$informe){        

        try{

            $fecha = date('Y-m-d');

            $stmt = Conexion::conectar()->prepare("INSERT INTO pago(id, 
                                                                        id_empresa, 
                                                                        codigo_pago, 
                                                                        descripcion, 
                                                                        importe, 
                                                                        fecha_pago, 
                                                                        fecha_modificacion, 
                                                                        estatus, 
                                                                        informe) 
                                                VALUES (:id, 
                                                        :id_empresa, 
                                                        :codigo_pago, 
                                                        :descripcion, 
                                                        :importe, 
                                                        :fecha_pago, 
                                                        :fecha_modificacion, 
                                                        :estatus, 
                                                        :informe)");      
                                                        
            $stmt -> bindParam(":id", $idPagos , PDO::PARAM_STR);
            $stmt -> bindParam(":id_empresa", $id_empresa , PDO::PARAM_STR);
            $stmt -> bindParam(":codigo_pago", $codigo_pago , PDO::PARAM_STR);
            $stmt -> bindParam(":descripcion", $descripcion , PDO::PARAM_STR);
            $stmt -> bindParam(":importe", $importe , PDO::PARAM_STR);
            $stmt -> bindParam(":fecha_pago", $fecha , PDO::PARAM_STR);
            $stmt -> bindParam(":fecha_modificacion", $fecha , PDO::PARAM_STR);
            $stmt -> bindParam(":estatus", $estatus , PDO::PARAM_STR);
            $stmt -> bindParam(":informe", $informe , PDO::PARAM_STR);
        
            if($stmt -> execute()){
                $resultado = "ok";
            }else{
                $resultado = "error";
            }  
        }catch (Exception $e) {
            $resultado = 'Excepción capturada: '.  $e->getMessage(). "\n";
        }
        
        return $resultado;

        $stmt = null;

    }

    static public function mdlActualizarInformacion($table, $data, $id, $nameId){

        $set = "";

        foreach ($data as $key => $value) {
            
            $set .= $key." = :".$key.",";
                
        }

        $set = substr($set, 0, -1);

        $stmt = Conexion::conectar()->prepare("UPDATE $table SET $set WHERE $nameId = :$nameId");

        foreach ($data as $key => $value) {
            
            $stmt->bindParam(":".$key, $data[$key], PDO::PARAM_STR);
            
        }		

        $stmt->bindParam(":".$nameId, $id, PDO::PARAM_INT);

        if($stmt->execute()){

            return "ok";

        }else{

            return Conexion::conectar()->errorInfo();
        
        }
    } 

    /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTO COMPLETADO
    ====================================================================*/
    static public function mdlListarNombrePagos(){

       // $stmt = Conexion::conectar()->prepare("SELECT Concat(codigo_producto , ' - ' ,c.nombre_categoria,' - ',descripcion_producto, ' - S./ ' , p.precio_venta_producto)  as descripcion_producto
                                               // FROM productos p inner join categorias c on p.id_categoria_producto = c.id_categoria");

        $stmt = Conexion::conectar()->prepare("Select p.descripcion_producto from productos p ");
        $stmt -> execute();

        return $stmt->fetchAll();
    }

    /*===================================================================
    BUSCAR PRODUCTO POR SU CODIGO
    ====================================================================*/
    static public function mdlGetDatosPagos($codigoProducto){

        $stmt = Conexion::conectar()->prepare("SELECT   id,
                                                        codigo_producto,
                                                        c.id_categoria,                                                        
                                                        c.nombre_categoria,
                                                        descripcion_producto,
                                                        '1' as cantidad,
                                                        CONCAT('S./ ',CONVERT(ROUND(precio_venta_producto,2), CHAR)) as precio_venta_producto,
                                                        CONCAT('S./ ',CONVERT(ROUND(1*precio_venta_producto,2), CHAR)) as total,
                                                        '' as acciones,
                                                        c.aplica_peso,
                                                        p.precio_mayor_producto,
													    p.precio_oferta_producto
                                                FROM productos p inner join categorias c on p.id_categoria_producto = c.id_categoria
                                            WHERE codigo_producto = :codigoProducto
                                                AND p.stock_producto > 0");
        
        $stmt -> bindParam(":codigoProducto",$codigoProducto,PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    
}