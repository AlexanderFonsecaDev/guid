<?php

error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../start.php';
require_once '../DB_server.php';
require_once '../usuarios/usuarios.php';

if (isset($_POST['control'])) {
    if ($_POST['control'] == 'EnviarMailDirecto') {
        
        $de = $_SESSION['correo'];
        $nombre = $_SESSION['nombre'];
        
        $para = $_POST['mail'];
        $asunto = "Mensaje Directo - ".$_POST['asunto'];
        $mensaje = "Este mensaje ha sido enviado por: ".$nombre ."<br>";
        $mensaje.= "Responder al siguiente correo: ".$de ."<br>";
        $mensaje.= $_POST['msj'];
        
        $cabeceras = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $cabeceras .= 'From: Scored.com.co <info@scored.com.co>' . "\r\n";
        $rta = mail($para, $asunto, $mensaje, $cabeceras);
        if ($rta) {
            echo "Enviado";
        } else {
            echo "No enviado";
        }
    }
}
