<?php

function getRealIP() {

    if (isset($_SERVER["HTTP_CLIENT_IP"])) {
        return $_SERVER["HTTP_CLIENT_IP"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
        return $_SERVER["HTTP_X_FORWARDED"];
    } elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
        return $_SERVER["HTTP_FORWARDED_FOR"];
    } elseif (isset($_SERVER["HTTP_FORWARDED"])) {
        return $_SERVER["HTTP_FORWARDED"];
    } else {
        return $_SERVER["REMOTE_ADDR"];
    }
}

function tipo_identificacion() {
    $sql = "Select * from tipo_identificacion ";
    $reg = new DB_server($sql);
    return $reg;
}

function deportes() {
    $sql = "Select * from deportes where estado = 1 ";
    $reg = new DB_server($sql);
    return $reg;
}

function pais() {
    $sql = "Select * from paises where estado = 1 Order by pais ASC";
    $reg = new DB_server($sql);
    return $reg;
}

//Archivo config Despues del Login
function usuarioConfig($id, $sessionKey) {
    $sql = "Select * from usuarios where usua_id = $id and session = '$sessionKey' and estado = 1 ";
    $reg = new DB_server($sql);
    return $reg;
}

function info_usuarioConfig($id) {
    $sql = "Select * from info_usuarios where usua_id = $id and estado = 1 ";
    $reg = new DB_server($sql);
    return $reg;
}

function buscarModulosPerfil() {
    $tipo = $_SESSION['perfil'];
    $mod = "";
   
    $sql = "Select * from modulos where tipo_usuario = $tipo and estado = 1 ORDER BY orden ASC  ";
    $reg = new DB_server($sql);
    while ($reg->next_record()) {

        $data = array(
            $reg->f('mod_id'),
            $reg->f('ruta'),
            $reg->f('orden'),
            $reg->f('nombre')
        );

        $mod[] = $data;
    }
    return $mod;
}
