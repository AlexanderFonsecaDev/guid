<?php

error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../start.php';
require_once '../DB_server.php';
require_once '../clubs/clubs.php';
require_once '../clubs/preinscritos.php';


if (isset($_POST['control'])) {
    if ($_POST['control'] == 'validarCedulaPre') {
        $ced = $_POST['ced'];
        $sql = "Select * from preinscritos where cedula = $ced and estado > 0 ";
        $reg = new DB_server($sql);
        if ($reg->num_rows() > 0) {
            echo 1;
        }else{
            echo 2;
        } 
    } else if ($_POST['control'] == 'rechazar') {
        $id = $_POST['id'];
        $motivo = mb_strtoupper($_POST['comentario']);
        $rta = rechazar_preinscripcion($id, $motivo);
        echo $rta;
    }else if ($_POST['control'] == 'aceptar') {
        $id = $_POST['id'];
        $rta = aceptar_preinscripcion($id);
        echo $rta;
    }
}