<?php

function listarPreInscritos() {
    $sql = "Select * from preinscritos where estado = 1";
    $reg = new DB_server($sql);
    return $reg;
}

function infoZona($idC) {
    $sql = "Select c.ciudad as ciudad , d.departamento as departamento , p.pais as pais ";
    $sql .= "from ciudades as c , paises as p , departamentos as d ";
    $sql .= "where ciud_id = $idC ";
    $reg = new DB_server($sql);
    return $reg;
}

function infoPreInscritos($id) {
    $sql = "Select * from preinscritos where pre_id = $id ";
    $reg = new DB_server($sql);
    return $reg;
}

function buscarDeporte($id) {
    $sql = "Select * from deportes where id_dep = $id ";
    $reg = new DB_server($sql);
    if ($reg->num_rows() > 0) {
        $reg->next_record();
        return $reg->f('deporte');
    } else {
        return 0;
    }
}

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


