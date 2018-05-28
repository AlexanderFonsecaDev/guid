<?php

function listarPost()
{
    $sql = "SELECT * from publicaciones pub ";
    $sql .= "ORDER BY pub.updated_at DESC";
    $reg = new DB_server($sql);
    return $reg;
}

function infoDeporte($deporte_id)
{
    $sql = "Select * from deportes ";
    $sql .= "where id_dep=$deporte_id";
    $reg = new DB_server($sql);
    return $reg;
}

function nombreDeporte($deporte_id)
{
    $sql = "Select * from deportes ";
    $sql .= "where id_dep=$deporte_id";
    $reg = new DB_server($sql);
    $nombre_deporte = "Deporte";
    while ($reg->next_record()) {
        $nombre_deporte = $reg->f('deporte');
    }
    return $nombre_deporte;
}


function listarEtiquetas()
{
    $sql = "Select * from etiqueta";
    $reg = new DB_server($sql);
    return $reg;
}

function listarDeportes()
{
    $sql = "SELECT * FROM deportes ";
    $reg = new DB_server($sql);
    return $reg;
}

function contarEtiquetas($post_id)
{
    $cant = 0;
    $sql = "Select count(publicacion_id) as total from publicacion_etiqueta ";
    $sql .= "Where publicacion_id=$post_id";
    $reg = new DB_server($sql);
    if ($reg->next_record()) {
        $cant = $reg->f('total');
    }
    return $cant;
}


/////////////////////////////////////////

//GUARDAR Publicacion//
function guardarPublicacion($deporte_id, $titulo, $ruta, $resumen, $cuerpo, $etiquetas)
{
    $fechaActual = time() + (7 * 24 * 60 * 60);
    $actual = date('Y-m-d');
    $save = "INSERT INTO publicaciones  (usuario_id, deporte_id, titulo, ruta_amigable, abstracto, cuerpo, etiquetas, created_at , updated_at)";
    $save .= "VALUES ('1', $deporte_id, '$titulo','$ruta', '$resumen', '$cuerpo','$etiquetas', NOW(), NOW());";
    $regS = new DB_server($save);
    if ($regS->affected_rows()) {
        return true;
    }
    return "Error - No se pudo guardar la informaci&oacute;n";

}

function editarPublicacionDeporte($id_deporte, $id_publicacion)
{
    $sql = "UPDATE publicaciones SET deporte_id = $id_deporte, updated_at = NOW() WHERE publicaciones.id = $id_publicacion;";
    $regS = new DB_server($sql);
    if ($regS->affected_rows()) {
        return true;
    }
    return "Error - No se pudo guardar la informaci&oacute;n";

}

function borrarPublicacion($id_publicacion)
{
    $sql = "DELETE FROM publicaciones WHERE publicaciones.id = $id_publicacion";
    $regS = new DB_server($sql);
    if (!$regS->affected_rows()) {
        return true;
    }
    return $id_publicacion;
}

function obtenerUltimoIDPublicacion()
{
    $sql = "SELECT MAX(pb.id) as ultimo FROM publicaciones pb";
    $regS = new DB_server($sql);
    if ($regS->affected_rows()) {
        $ultimo = $regS->f('ultimo');
        return $ultimo;
    }
    return "Error - No se pudo guardar la informaci&oacute;n";
}

function editarPublicacion($id_publicacion, $titulo , $ruta , $id_deporte ,$etiquetas ,$resumen ,$cuerpo){
    $sql = "UPDATE publicaciones SET  deporte_id = $id_deporte, titulo = '$titulo', ruta_amigable = '$ruta', abstracto = '$resumen', cuerpo = '$cuerpo' , updated_at = NOW() WHERE publicaciones.id = $id_publicacion";
    $regS = new DB_server($sql);
    if ($regS->affected_rows()) {
        return true;
    }
    return "Error - No se pudo guardar la informaci&oacute;n";
}

function obtenerPublicacion($id_publicacion){
    $sql = "SELECT * FROM publicaciones p WHERE p.id = $id_publicacion";
    $reg = new DB_server($sql);
    return $reg;
}


/////////////////////////////////////////////////////////////////////////////////

//Guardar etiqueta
function guardarEtiqueta($titulo)
{
    $save = "INSERT INTO etiqueta (titulo, created_at, updated_at) VALUES ('$titulo', NOW(), NOW())";
    $regS = new DB_server($save);
    if ($regS->affected_rows()) {
        return true;
    }
    return "Error - No se pudo guardar la informaci&oacute;n";

}


function obtenerUltimoEtiqueta()
{
    $sql = "SELECT MAX(pb.id) as ultimo FROM etiqueta pb";
    $regS = new DB_server($sql);
    if ($regS->affected_rows()) {
        $ultimo = $regS->f('ultimo');
        return $ultimo;
    }
    return "Error - No se pudo guardar la informaci&oacute;n";
}

function editarEtiqueta($id_publicacion, $titulo)
{

}

function borrarEtiqueta($id_publicacion, $titulo)
{

}

function guardarEtiquetaPublicacion($id_etiqueta, $id_publicacion)
{
    $save = "INSERT INTO publicacion_etiqueta (publicacion_id, etiqueta_id, created_at, updated_at) VALUES ($id_publicacion, $id_etiqueta, NOW(), NOW())";
    $regS = new DB_server($save);
    if ($regS->affected_rows()) {
        return true;
    }
    return "Error - No se pudo guardar la informaci&oacute;n";
}


////////////////////////////////////////////////////////////////////////////////

