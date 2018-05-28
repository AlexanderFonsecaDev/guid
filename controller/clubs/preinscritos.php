<?php

//Estado de rechazo es 0
//Estado de aceptación es 2
function rechazar_preinscripcion($id, $motivo)
{
    $hoy = date("Y-m-d H:i:s");
    $sql = "Select * from preinscritos where pre_id = $id and estado = 0 ";
    $reg = new DB_server($sql);
    if ($reg->num_rows() > 0) {
        return "Error - Este registro ya fue actualizado";
    } else {


        $sql = "Select * from preinscritos where pre_id = $id and estado = 1 ";
        $reg2 = new DB_server($sql);
        $ruta_pdf = "";

        while ($reg2->next_record()) {
            $ruta_pdf = $reg2->f('pdf');
        }

        $archivo_borrar = "../" . $ruta_pdf;

        chown($archivo_borrar, 465);
        unlink($archivo_borrar);

        $sqlUp = "Update preinscritos set estado = 0 , comentario = '$motivo' , ";
        $sqlUp .= "editPor = 1 , fechaEdit = '$hoy' ";
        $sqlUp .= "where pre_id = $id ";
        $regUp = new DB_server($sqlUp);
        if ($regUp->affected_rows()) {
            require_once '../mail/preinscritosRechazo.php';

            preinscritosRechazo($id, $motivo);
            return 1;
        } else {
            return "Error - no se pudo actualizar el registro ";
        }
    }
}


function aceptar_preinscripcion($idClub)
{

    $sqlB = "Select * from preinscritos where pre_id = $idClub and estado = 1 ";
    $regB = new DB_server($sqlB);
    if ($regB->num_rows() > 0) {
        $regB->next_record();
        $ced = $regB->f('cedula');

        $sqlB2 = "Select * from usuarios where cedula = $ced ";
        $regB2 = new DB_server($sqlB2);
        if ($regB2->num_rows() > 0) {
            return "Error10- usuario registrado en el sistema.";
        } else {


            $clave = generateRandomString(6);
            $pass = md5($clave);
            $hoy = date("Y-m-d H:i:s");

            $sqltra = "start transaction";
            $reg = new DB_server($sqltra);


            //hay una variable tipu que no se de donde la saca por default le coloque 2
            $sqlS = "Insert into usuarios (";
            $sqlS .= "cedula,clave,tipo_id,tipo_usuario,estado,fechaReg,RegPor)VALUES(";
            $sqlS .= "$ced,'$pass',2,1,1,'$hoy',1)";
            $regS = new DB_server($sqlS);
            if ($regS->affected_rows()) {
                $usua_id = mysql_insert_id();

                $pNom = $regB->f('nombre1');
                $sNom = $regB->f('nombre2');
                $pApel = $regB->f('apellido1');
                $sApel = $regB->f('apellido2');
                $ciud = $regB->f('ciudad');
                $direc = "n/a";
                $tel = $regB->f('telefono');
                if ($tel == '')
                    $tel = 0;
                $cel = $regB->f('celular');
                $mail = $regB->f('email');

                $sqlS2 = "Insert into info_usuarios(";
                $sqlS2 .= "usua_id,nombre1,nombre2,apellido1,apellido2,ciud_id,direccion,telefono,celular,correo,estado,fechaReg,regPor)VALUES(";
                $sqlS2 .= "$usua_id,'$pNom','$sNom','$pApel','$sApel',$ciud,'$direc',$tel,$cel,'$mail',1,'$hoy',1)";
                $regS2 = new DB_server($sqlS2);
                if ($regS2->affected_rows()) {

                    $nombre = $regB->f('club');
                    $depor = $regB->f('deporte');
                    $registro = $regB->f('reg_club');
                    $correoC = $regB->f('email_club');
                    $pdf = $regB->f('pdf');

                    $nombre = trim($nombre," ");
                    $registro = trim($registro," ");
                    $ruta = $nombre."-".$registro;
                    $ruta = trim($ruta);
                    $busqueda = "SELECT url FROM clubs ";
                    $consultaDB = new DB_server($busqueda);
                    while ($consultaDB->next_record()){
                        if(strcmp($consultaDB->f('url'),$ruta) === 0){
                            return "ERROR la ruta ya existe";
                        }
                    }

                    $sqlS3 = "Insert into clubs(";
                    $sqlS3 .= "usua_id,nombre,direccion,depor_id,registro,ciud_id,correo,logo,portada,pdf,";
                    $sqlS3 .= "url,estado,fechaReg,regPor)VALUES(";
                    $sqlS3 .= "$usua_id,'$nombre','$direc',$depor,'$registro',$ciud,'$correoC','$direc','$direc','$pdf',";
                    $sqlS3 .= "'$ruta',2,'$hoy',1)";
                    $regS3 = new DB_server($sqlS3);
                    if ($regS3->affected_rows()) {
                        $sqlUp = "Update preinscritos set estado = 2 , ";
                        $sqlUp .= "editPor = 1 , fechaEdit = '$hoy' ";
                        $sqlUp .= "where pre_id = $idClub ";
                        $regUp = new DB_server($sqlUp);
                        if ($regUp->affected_rows()) {
                            $sqltra = "commit";
                            $reg = new DB_server($sqltra);
                            //require_once '../mail/nuevoUsuario.php';
                            //nuevoUsuario($usua_id, $ced, $clave);
                            //log_historial($usua_id, 'NUEVO CLUB', '0', 1);
                            //comprobamos si existe un directorio para subir el archivo
                            //si no es así, lo creamos
                            if (!is_dir("../../infoclubs/".$ruta."/"))
                                mkdir("../../infoclubs/".$ruta."/", 0777);
                            return '1';
                        } else {
                            $sqltra = "rollback";
                            $reg = new DB_server($sqltra);
                            return "ERROR 3 INTERNO AL ACTUALIZAR PREINSCRITO, VUELVA A INTENTARLO";
                        }
                    } else {
                        $sqltra = "rollback";
                        $reg = new DB_server($sqltra);
                        return "ERROR 3 INTERNO AL REGISTRAR NUEVO CLUB, VUELVA A INTENTARLO";
                    }
                } else {
                    $sqltra = "rollback";
                    $reg = new DB_server($sqltra);
                    return "ERROR 2 INTERNO AL REGISTRAR NUEVO USUARIO, VUELVA A INTENTARLO";
                }
            } else {
                $sqltra = "rollback";
                $reg = new DB_server($sqltra);
                return "ERROR 1 INTERNO AL REGISTRAR NUEVO USUARIO, VUELVA A INTENTARLO";
            }
        }
    } else {
        return "Error - este club ya ha sido actualizado en su estado, recargue la web.";
    }
}

//Método con str_shuffle()
function generateRandomString($length)
{
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function guardarPreinscrito($pNom, $sNom, $pApel, $sApel, $tipu, $ced, $mail, $tel, $cel, $dep, $nomC, $nitC, $pais, $depto, $ciud, $mailC, $file)
{
    $hoy = date("Y-m-d H:i:s");

    $reNomC = str_replace(' ', '', $nomC);
    $reNitC = str_replace(' ', '', $nitC);
    $renameC = $reNomC . $reNitC;


    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
    if (!is_dir("../../pdf/club/"))
        mkdir("../../pdf/club/", 0777);

    //comprobamos si el archivo ha subido
    if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'], "../../pdf/club/" . $file)) {
        sleep(3); //retrasamos la petición 3 segundos

        rename('../../pdf/club/' . $file, '../../pdf/club/' . $renameC . ".pdf");
        $rutaPDF = '../pdf/club/' . $renameC . '.pdf';

        $sql = "Insert into preinscritos (";
        $sql .= "nombre1,nombre2,apellido1,apellido2,tipo_id,cedula,email,telefono,celular,";
        $sql .= "deporte,club,reg_club,pais,depto,ciudad,email_club,pdf,estado,regPor,fechaReg)VALUES(";
        $sql .= "'$pNom','$sNom','$pApel','$sApel',$tipu,$ced,'$mail',$tel,$cel,$dep,";
        $sql .= "'$nomC','$nitC',$pais,$depto,$ciud,'$mailC','$rutaPDF',1,1,'$hoy')";
        $reg = new DB_server($sql);
        if ($reg->affected_rows()) {
            $idPre = mysql_insert_id();
            //require_once '../mail/preinscritos.php';
            //preinscritos($idPre);
            return '1';
        } else {
            return '0';
        }
    } else {
        return '0';
    }
}
