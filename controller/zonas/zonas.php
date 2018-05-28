<?php

function listarPaises(){
    $sql = "Select * from paises as p ";
    $sql.= "Where p.estado = 1 ORDER BY p.pais_id ASC";
    $reg = new DB_server($sql);
    return $reg;
}

function infoPais($id){
    $sql = "Select * from paises  ";
    $sql.= "Where pais_id = $id and estado = 1 ";
    $reg = new DB_server($sql);
    return $reg;
}

function listarDeptos($id){
    $sql = "Select * from departamentos  ";
    $sql.= "Where pais_id = $id and estado = 1 ORDER BY depto_id ASC";
    $reg = new DB_server($sql);
    return $reg;
}

function infoDepto($id){
    $sql = "Select * from departamentos  ";
    $sql.= "Where depto_id = $id and estado = 1 ";
    $reg = new DB_server($sql);
    return $reg;
}

function listarCiudades($idP,$idD){
    $sql = "Select * from ciudades ";
    $sql.= "Where pais_id = $idP and depto_id = $idD and estado = 1 ";
    $reg = new DB_server($sql);
    return $reg;
}

function infoCiudad($idC){
    $sql = "Select * from ciudades ";
    $sql.= "Where ciud_id = $idC and estado = 1 ";
    $reg = new DB_server($sql);
    return $reg;
}


function contarPaises(){
    $cant = 0;
    $sql = "Select count(*) as total from paises ";
    $sql.= "Where estado = 1";
    $reg = new DB_server($sql);
    if($reg->next_record()){
        $cant = $reg->f('total');
    }
    return $cant;
}


function contarDepartamentos($idP){
    $cant = 0;
    $sql = "Select count(*) as total from departamentos ";
    $sql.= "Where pais_id = $idP and estado = 1";
    $reg = new DB_server($sql);
    if($reg->next_record()){
        $cant = $reg->f('total');
    }
    return $cant;
}

function contarCiudadesDepto($idD){
   $cant = 0;
    $sql = "Select count(*) as total from ciudades ";
    $sql.= "Where depto_id = $idD and estado = 1";
    $reg = new DB_server($sql);
    if($reg->next_record()){
        $cant = $reg->f('total');
    }
    return $cant; 
}


function contarCiudades($idP){
    $cant = 0;
    $sql = "Select count(*) as total from ciudades ";
    $sql.= "Where pais_id = $idP and estado = 1";
    $reg = new DB_server($sql);
    if($reg->next_record()){
        $cant = $reg->f('total');
    }
    return $cant;
}






/////////////////////////////////////////

//GUARDAR PAIS//
function guardarPais($name){
    $sql = "Select * from paises where pais = '$name' and estado = 1";
    $reg = new DB_server($sql);
    if($reg->num_rows()>0){
        return "Error - Nombre de país duplicado";
    }else{
        $save = "Insert into paises ";
        $save.= "(pais,estado)VALUES('$name',1)";
        $regS = new DB_server($save);
        if($regS->affected_rows()){
            return '1';
        }
        return "Error - No se pudo guardar la informaci&oacute;n";
    }
}

function editarPais($idP,$name){
    $sql = "Select * from paises  where pais = '$name' and estado = 1";
    $reg = new DB_server($sql);
    if($reg->num_rows()>0){
        return "Error - Nombre de pa&iacute;s duplicado";
    }else{
        $upd = "Update paises  set pais = '$name' ";
        $upd.= "Where pais_id = $idP and estado = 1 ";
        $regU = new DB_server($upd);
        if($regU->affected_rows()){
            return '1';
        }
        return "Error - No se pudo editar la informaci&oacute;n del pa&iacute;s";
    }
}


/////////////////////////////////////////////////

function guardarDepto($idP,$name){
    $sql = "Select * from departamentos where departamento = '$name' and pais_id = $idP and estado = 1";
    $reg = new DB_server($sql);
    if($reg->num_rows()>0){
        return "Error - Nombre de departamento duplicado";
    }else{
        $save = "Insert into departamentos ";
        $save.= "(departamento,pais_id,estado)VALUES('$name',$idP,1)";
        $regS = new DB_server($save);
        if($regS->affected_rows()){
            return '1';
        }
        return "Error - No se pudo guardar la información";
    }
}

function editarDepto($idP,$idD,$name){
    $sql = "Select * from departamentos ";
    $sql.= "where departamento = '$name' and pais_id = $idP and estado = 1";
    $reg = new DB_server($sql);
    if($reg->num_rows()>0){
        return "Error - Nombre de departamento duplicado";
    }else{
        $upd = "Update departamentos set departamento = '$name' ";
        $upd.= "Where pais_id = $idP and depto_id = $idD and estado = 1 ";
        $regU = new DB_server($upd);
        if($regU->affected_rows()){
            return '1';
        }
        return "Error - No se pudo editar la informaci&oacute;n del departamento";
    }
}



////////////////////////////////////////////////////////////////////////////////

function guardarCiudad($idP,$idD,$name){
    $sql = "Select * from ciudades ";
    $sql.= "where ciudad = '$name' and pais_id = $idP and depto_id = $idD and estado = 1";
    $reg = new DB_server($sql);
    if($reg->num_rows()>0){
        return "Error - Nombre de ciudad duplicado";
    }else{
        $save = "Insert into ciudades ";
        $save.= "(ciudad,pais_id,depto_id,estado)VALUES('$name',$idP,$idD,1)";
        $regS = new DB_server($save);
        if($regS->affected_rows()){
            return '1';
        }
        return "Error - No se pudo guardar la información";
    }
}

function editarCiudad($idP,$idD,$idC,$name){
    $sql = "Select * from ciudades ";
    $sql.= "where ciudad = '$name' and pais_id = $idP and depto_id = $idD and estado = 1";
    $reg = new DB_server($sql);
    if($reg->num_rows()>0){
        return "Error - Nombre de departamento duplicado";
    }else{
        $upd = "Update ciudades  set ciudad = '$name' ";
        $upd.= "Where ciud_id = $idC and pais_id = $idP and depto_id = $idD and estado = 1 ";
        $regU = new DB_server($upd);
        if($regU->affected_rows()){
            return '1';
        }
        return "Error - No se pudo editar la informaci&oacute;n del departamento";
    }
}