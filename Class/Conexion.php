<?php

class Conexion {
    public function conexionServidor(){
        $dsn = "SERVIDOR";
        $user = "sa";
        $pass = "Axoft1988";
        $cid = odbc_connect($dsn, $user, $pass);
        if(!$cid){echo "</br>Imposible conectarse a la base de datos!</br>";}

        return $cid;
    }

    public function conexionLakerbis(){
        $dsn = "LOCALES";
        $user = "sa";
        $pass = "Axoft";
        $cid = odbc_connect($dsn, $user, $pass);
        if(!$cid){echo "</br>Imposible conectarse a la base de datos!</br>";}

        return $cid;
    }
}