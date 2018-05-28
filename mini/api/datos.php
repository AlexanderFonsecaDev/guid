<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once 'start.php';
require_once 'DB_server.php';

function datosClub($ruta)
{
    if (isset($ruta)) {
        $sql = "select * from clubs where url='$ruta'";
        $reg = new DB_server($sql);
        $reg = new DB_server($sql);
        return $reg;
    }
    return false;
}


?>