<?php

error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../start.php';
require_once '../DB_server.php';
require_once '../blog/post.php';

if (isset($_POST['control'])) {
    if ($_POST['control'] == 'guardarPublicacion') {

        //comprobamos que sea una petición ajax
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {

            $titulo = mb_strtoupper($_POST['titulo']);
            $ruta = mb_strtoupper($_POST['ruta_amigable']);
            $resumen = mb_strtoupper($_POST['resumen']);
            $cuerpo = mb_strtoupper($_POST['cuerpo_publicacion']);
            $etiquetas = mb_strtoupper($_POST['etiqueta']);
            $deporte = $_POST['deporte'];

            //obtenemos el archivo a subir
            $file = $_FILES['archivo']['name'];

            //comprobamos si existe un directorio para subir el archivo
            //si no es así, lo creamos
            if(!is_dir("files/"))
                mkdir("files/", 0777);

            //comprobamos si el archivo ha subido
            if ($file && move_uploaded_file($_FILES['archivo']['tmp_name'],"files/".$file))
            {
                sleep(3);//retrasamos la petición 3 segundos
                //rename("files/".$file,"dante".$_FILES['archivo']['type']);
            }
            $data = guardarPublicacion($deporte,$titulo, $ruta, $resumen, $cuerpo,$etiquetas);
            echo $data;
        }else{
            throw new Exception("Error Processing Request", 1);
        }
    } else if ($_POST['control'] == 'ActualizarDeporte') {
        $id_deporte = mb_strtoupper($_POST['idDeporte']);
        $id_publicacion = mb_strtoupper($_POST['idPublicacion']);
        $data = editarPublicacionDeporte($id_deporte, $id_publicacion);
        echo $data;
    } else if ($_POST['control'] == 'BorrarPublicacion') {
        $id_publicacion = $_POST['id_publicacion'];
        $data = borrarPublicacion($id_publicacion);
        echo $data;
    }else if ($_POST['control'] == 'actualizarPublicacion') {
        $id_publicacion = $_POST['id_publicacion'];
        $titulo = mb_strtoupper($_POST['titulo']);
        $ruta = mb_strtoupper($_POST['ruta_amigable']);
        $resumen = mb_strtoupper($_POST['resumen']);
        $cuerpo = mb_strtoupper($_POST['cuerpo_publicacion']);
        $etiquetas = mb_strtoupper($_POST['etiqueta']);
        $id_deporte = $_POST['deporte'];
        $data = editarPublicacion($id_publicacion, $titulo , $ruta , $id_deporte ,$etiquetas ,$resumen ,$cuerpo);
        echo $data;
    }
}


?>


