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
        $sql="SELECT 
        A.NRO_SUCURSAL, A.DESC_SUCURSAL, B.DSN , 
        CASE C.LOCALIDAD WHEN  'ROSARIO' THEN 'ROSARIO' WHEN 'MAR DEL PLATA' THEN 'MARDEL' ELSE 'AMBA' END LOCALIDAD
        FROM SUCURSAL A 
        INNER JOIN SOF_USUARIOS B ON A.NRO_SUCURSAL = B.NRO_SUCURS
        LEFT JOIN GVA14 C ON A.NRO_SUCURSAL = C.N_IMPUESTO
        WHERE CA_423_HABILITADO = 1 
        AND (A.NRO_SUCURSAL BETWEEN 2 AND 100)
        AND (C.N_IMPUESTO LIKE '[0-9]' OR C.N_IMPUESTO LIKE '[0-9][0-9]') 
        GROUP BY A.NRO_SUCURSAL, A.DESC_SUCURSAL, B.DSN, C.LOCALIDAD
        ORDER BY A.NRO_SUCURSAL";
        $data = $this->traerDatos($sql);
        return $data;
    }


}

