<?php

function tipo_publicidad(){
    $sql = "Select * from tipo_publicidad ";
    $reg = new DB_server($sql);
    return $reg;
}

function guardarPublicidad($tipo,$nombre,$cliente,$valor,$fecha_inicio,$fecha_fin,$enlace){
    $save = "INSERT INTO publicidad (tipo, nombre_publicidad, cliente, valor, fecha_inicio, fecha_fin, enlace)";
    $save .= "VALUES ($tipo, '$nombre', '$cliente',$valor, NOW(), $fecha_fin,'$enlace');";
    $regS = new DB_server($save);
    if ($regS->affected_rows()) {
        return true;
    }
    return "Error - No se pudo guardar la informaci&oacute;n";
}

function listarPublicidad(){
    $sql = "Select * from publicidad ";
    $reg = new DB_server($sql);
    return $reg;
}



///////ULTIMAS NOTICIAS///////


///Buscar Noticias ////
function buscarNoticias(){
    $sql = "Select * from noticias where estado = 1 ORDER BY noti_id DESC";
    $reg = new DB_server($sql);
    return $reg;
}

////// Guardar Noticias ////
function guardarNoticia($nom){
    $cant = 0;
    $busc = "Select count(*) as total from noticias as n where n.estado = 1";
    $regB = new DB_server($busc);
    if($regB->next_record()){
        $cant = $regB->f('total');
    }
    
    if($cant <  5){ 
     $hoy = date("Y-m-d H:i:s");
     $sql = "Select * from noticias as n where n.noticia = '$nom' and n.estado = 1";
    $reg = new DB_server($sql);
    if($reg->num_rows()>0){
        return "Error - Noticia duplicada";
    }else{
        $save = "Insert into noticias ";
        $save.= "(noticia,estado,fechaReg,regPor)VALUES('$nom',1,'$hoy',1)";
        $regS = new DB_server($save);
        if($regS->affected_rows()){
            return '1';
        }
        return "Error - No se pudo guardar la informaci&oacute;n";
    }
    }else{
       return "Error - No se pudo guardar, solo permite 5 noticias registradas"; 
    }
   
}



//Cambiar estado noticia ///
function cambiarEstadoNoticia($id){
     $hoy = date("Y-m-d H:i:s");
    $upd = "Update noticias  set estado = 2, fechaEdit = '$hoy' ";
        $upd.= "Where noti_id = $id and estado = 1 ";
        $regU = new DB_server($upd);
        if($regU->affected_rows()){
            return '1';
        }
        return "Error - No se pudo eliminar la noticia";
}