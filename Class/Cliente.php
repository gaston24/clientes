<?php

require_once __DIR__.'/Conexion.php';

class Cliente{

    private function traerDatos($sql){
        $conexion = new Conexion();
        $cid = $conexion->conexionLakerbis();
        $result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
        $data = [];
        while($v=odbc_fetch_object($result)){
            $data[] = array($v);
        };
        return $data;
    }

    public function listarEmpleados($codClient){
        $sql="SELECT * FROM GVA14 WHERE COD_CLIENT LIKE '$codClient%' ORDER BY COD_CLIENT DESC";
        $data = $this->traerDatos($sql);
        return $data;
    }


}

