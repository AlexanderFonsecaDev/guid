<?php

function listarUsuarios(){
    $sql = "Select * from usuarios where tipo_usuario = 1 ";
    $reg = new DB_server($sql);
    return $reg;
}

function infoUsuaList($id){
    $sql = "Select * from info_usuarios where usua_id = $id ";
    $reg = new DB_server($sql);
    return $reg;
}