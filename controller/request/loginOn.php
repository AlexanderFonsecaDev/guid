<?php

error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../start.php';
require_once '../DB_server.php';
require_once '../login/login.php';


if (isset($_POST['control'])) {
    if ($_POST['control'] == 'recuperarClave') {
        $ced = $_POST['user'];
        $data = recuperarClave($ced);
        echo $data;
    }else if($_POST['control'] == 'loginValidate'){
        $ced =  $_POST['ced'];
        $clave = md5($_POST['clave']);
        $rta = login_validate($ced, $clave);
        echo $rta;
    }
}

