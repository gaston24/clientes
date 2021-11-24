<?php

require_once __DIR__.'/Conexion.php';

class Local{

    private function traerDatos($sql){
        $conexion = new Conexion();
        $cid = $conexion->conexionServidor();
        $result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
        $data = [];
        while($v=odbc_fetch_object($result)){
            $data[] = array($v);
        };
        return $data;
    }

    public function listarLocales(){
        $sql="SELECT A.NRO_SUCURSAL, A.DESC_SUCURSAL, B.DSN FROM SUCURSAL A INNER JOIN SOF_USUARIOS B ON A.NRO_SUCURSAL = B.NRO_SUCURS
        WHERE CA_423_HABILITADO = 1 AND NRO_SUCURSAL BETWEEN 2 AND 100 GROUP BY A.NRO_SUCURSAL, A.DESC_SUCURSAL, B.DSN ORDER BY 1";
        $data = $this->traerDatos($sql);
        return $data;
    }


}

