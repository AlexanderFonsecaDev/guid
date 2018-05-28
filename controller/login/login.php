<?php

function infoUsuario($id) {
    $sql = "Select * from info_usuarios where usua_id = $id ";
    $reg = new DB_server($sql);
    return $reg;
}

//Método con str_shuffle() 
function generateRandomString($length) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

function recuperarClave($ced) {
    $hoy = date("Y-m-d H:i:s");
    $sqlB = "Select * from usuarios where cedula = $ced ";
    $regB = new DB_server($sqlB);
    if ($regB->num_rows() > 0) {
        $regB->next_record();
        if ($regB->f('estado') == 0) {
            //Usuario eliminado anteriormente
            log_historial($ced, 'CAMBIO DE CLAVE - USUARIO ELIMINADO ', '0', 0);
            return 3;
        } else {


            $id = $regB->f('usua_id');
            $clave = generateRandomString(6);
            $passKey = md5($clave);

            $sqltra = "start transaction";
            $reg = new DB_server($sqltra);

            $sqlUp = "Update usuarios set ";
            $sqlUp .= "clave='$passKey' , intento = 0, estado = 1 , fechaEdit = '$hoy' , editPor = $id ";
            $sqlUp .= "where usua_id = $id ";
            $regUp = new DB_server($sqlUp);
            if ($regUp->affected_rows()) {
                $sqlUp2 = "Update info_usuarios set ";
                $sqlUp2 .= "estado = 1 , fechaEdit = '$hoy' , editPor= $id ";
                $regUp2 = new DB_server($sqlUp2);
                if ($regUp2->affected_rows()) {
                    $sqltra = "commit";
                    $reg = new DB_server($sqltra);
                    require_once '../mail/nuevaClave.php';
                    nuevaClaveMail($id, $clave);
                    log_historial($id, 'CAMBIO DE CLAVE EXITOSO', '0', 1);
                    return 1;
                } else {
                    $sqltra = "rollback";
                    $reg = new DB_server($sqltra);
                    log_historial($id, 'CAMBIO DE CLAVE - ERROR DE SISTEMA ', '0', 1);
                    return 2;
                }
            } else {
                $sqltra = "rollback";
                $reg = new DB_server($sqltra);
                log_historial($id, 'CAMBIO DE CLAVE - ERROR DE SISTEMA ', '0', 1);
                return 2;
            }
        }
    } else {
        //Usuario no existes
        log_historial($ced, 'CAMBIO DE CLAVE - USUARIO NO EXISTE ', '0', 3);
        return 0;
    }
}

function log_historial($id, $sesion, $intentos, $est) {
    require_once '../customs/comunes.php';
    $hoy = date("Y-m-d H:i:s");
    $fecha = date('l jS \of F Y h:i:s A');
    $ip = getRealIP();
    $pc = $_SERVER['HTTP_USER_AGENT'];

    $sql = "Insert into historial (";
    $sql .= "usua_id, session, attempts, ip, pc, estado, fecha, fechaReg)VALUES(";
    $sql .= "$id,'$sesion','$intentos','$ip','$pc',$est,'$fecha','$hoy')";
    $reg = new DB_server($sql);
    return $reg;
}

/// EStado 0 = Eliminado; 1 = Activo; 2 = Bloqueado
function login_validate($ced, $clave) {
    $hoy = date("Y-m-d H:i:s");
    $id = 0;
    $est = "";
    $intentos = 0;
    $estIntentos = 0;

    $_SESSION['Mensaje'] = '';
    $_SESSION['userId'] = "";
    $_SESSION['sessionKey'] = "";


    $busc = "Select * from usuarios where cedula = $ced ";
    $regB = new DB_server($busc);
    if ($regB->num_rows() > 0) {
        $regB->next_record();
        $id = $regB->f('usua_id');
        $keyPass = $regB->f('clave');
        $est = $regB->f('estado');
        $intentos = $regB->f('intento');
        

        //Usuario con estado Activo
        if ($est == 1) {
            if ($intentos < 3) {
                if ($clave == $keyPass) {
                    $sessionKey = md5(generateRandomString(35));
                    intentos_login($id, 0);
                    log_historial($id, $sessionKey, '0', 1);

                    $upD = "Update usuarios set ";
                    $upD .= "session = '$sessionKey' , fechaEdit = '$hoy' ";
                    $upD .= "Where  usua_id = $id ";
                    $rUp = new DB_server($upD);
                    if ($rUp->affected_rows()) {

                        $sql2 = "Select * from info_usuarios where usua_id = $id and estado = 1 ";
                        $reg2 = new DB_server($sql2);
                        if ($reg2->num_rows() > 0) {

                            $_SESSION['Mensaje'] = 'OK';
                            $_SESSION['userId'] = $id;
                            $_SESSION['sessionKey'] = $sessionKey;
                            return 1;
                        } else {
                            log_historial($id, 'LOGIN - ERROR DE SISTEMA ', '0', 1);
                            return "ERROR DE SISTEMA";
                        }
                    } else {
                        log_historial($id, 'LOGIN - ERROR DE SISTEMA ', '0', 1);
                        return "ERROR DE SISTEMA";
                    }
                } else {
                    $intentos++;
                    intentos_login($id, $intentos);
                    if ($intentos >= 3) {
                        $estIntentos = 2;
                    } else {
                        $estIntentos = 1;
                    }

                    log_historial($id, 'LOGIN - CLAVE ERRONEA ', $intentos, $estIntentos);
                    $msj = "CONTRASEÑA INVALIDA - ";
                    $msj .= "INTENTOS: " . $intentos . " DE 3  - ";
                    $msj .= "AL INTENTO 3 SE BLOQUEA LAS CREDENCIALES";
                    return $msj;
                }
            } else {
                log_historial($id, 'LOGIN - USUARIO BLOQUEADO ', '0', 2);
                return "ESTE USUARIO SE ENCUENTRA BLOQUEADO";
            }
        } elseif ($est == 2) {
            log_historial($id, 'LOGIN - USUARIO BLOQUEADO ', '0', 2);
            return "ESTE USUARIO SE ENCUENTRA BLOQUEADO";
        } elseif ($est == 0) {
            log_historial($id, 'LOGIN - USUARIO ELIMINADO ', '0', 0);
            return "ESTE USUARIO SE ENCUENTRA ELIMINADO EN NUESTROS REGISTROS";
        }
    } else {
        //Usuario no existes
        log_historial($ced, 'LOGIN - USUARIO NO EXISTE ', '0', 3);
        return "USUARIO NO EXISTE";
    }
}

function intentos_login($id, $try) {
    $sql = "Update usuarios set ";
    if ($try >= 3)
        $sql .= "intento = $try , estado = 2 ";
    else
        $sql .= "intento = $try ";
    $sql .= "Where usua_id = $id ";
    $reg = new DB_server($sql);
    if ($reg->affected_rows()) {
        return 1;
    } else {
        return 0;
    }
}
