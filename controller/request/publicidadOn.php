<?php

error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../start.php';
require_once '../DB_server.php';
require_once '../publicidad/publicidad.php';


if (isset($_POST['control'])) {
    if ($_POST['control'] == 'AgregarNoticia') {
        $nom = mb_strtoupper($_POST['name']);
        $data = guardarNoticia($nom);
        echo $data;
        
    }else if ($_POST['control'] == 'cambiarEstado') {
        $est = cambiarEstadoNoticia($_POST['id']);
        echo $est;
    }else if ($_POST['control'] == 'NuevaPublicidad') {
        $tipo = $_POST['tipo'];
        $nombre = $_POST['nombre'];
        $cliente = $_POST['cliente'];
        $valor = $_POST['valor'];
        $fecha_inicio = $_POST['fecha_inicio'];
        $fecha_inicio = date("Y-m-d",strtotime($fecha_inicio));
        $fecha_fin = $_POST['fecha_fin'];
        $fecha_fin = date("Y-m-d",strtotime($fecha_fin));
        $enlace = $_POST['enlace'];

        //obtenemos el archivo a subir
        $file = $_FILES['archivo']['name'];

        //comprobamos si existe un directorio para subir el archivo
        //si no es así, lo creamos
        if(!is_dir("../../archivosPublicidad/"))
            mkdir("../../archivosPublicidad/", 0777);

        //comprobamos si el archivo ha subido
        if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"../../archivosPublicidad/".$file))
        {
            sleep(3);//retrasamos la petición 3 segundos
        }

        $data = guardarPublicidad($tipo,$nombre,$cliente,$valor,$fecha_inicio,$fecha_fin,$enlace);
        return $data;


    }
}

