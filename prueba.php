<?php

session_start();
require_once 'controller/DB_server.php';
require_once 'controller/customs/comunes.php';

$_SESSION['perfil'] = 1;
$mod = buscarModulosPerfil();
//print_r($mod);
//var_dump($mod);

foreach ($mod as &$valor) {
    $idMod = $valor[0]; 
    $ruta = $valor[1];
    $orden = $valor[2];
    $nombre = $valor[3];
}