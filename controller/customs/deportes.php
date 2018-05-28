<?php

/**
 * Listar deportes
 * @return $reg Retorna toda linformación de deportes
 */
function lista_deportes() {
    $sql = "Select * from deportes as dep where dep.estado = 1";
    $reg = new DB_server($sql);
    if ($reg->num_rows() > 0) {
        return $reg;
    } else {
        return 0;
    }
}

/**
 * Listar deportes seleccionado
 * @param int $id Id del deporte seleccionado
 * @return $reg Retorna toda linformación de deportes
 */
function deporte($id) {
    $sql = "Select * from deportes as dep where dep.id_dep = $id and dep.estado = 1";
    $reg = new DB_server($sql);
    if ($reg->num_rows() > 0) {
        return $reg;
    } else{
        return 0;
    }
}
