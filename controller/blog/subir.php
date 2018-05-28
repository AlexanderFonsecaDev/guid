<?php

error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../start.php';
require_once '../DB_server.php';
require_once '../blog/post.php';

$titulo = mb_strtoupper($_POST['titulo']);
$ruta = mb_strtoupper($_POST['ruta_amigable']);
$resumen = mb_strtoupper($_POST['resumen']);
$cuerpo = mb_strtoupper($_POST['cuerpo']);
$etiquetas = mb_strtoupper($_POST['etiqueta']);
$deporte = mb_strtoupper($_POST['deporte']);

$route = "uploads/";
//$ultimo = obtenerUltimoIDPublicacion()+1;
//$route = "uploads/".$ultimo."/";
if(!file_exists($route))
{
    mkdir ($route);
} else {
    echo "error";
}

$route = $route . basename($_FILES['file']['name']);
move_uploaded_file($_FILES['file']['tmp_name'],$route);


$data = guardarPublicacion($deporte,$titulo, $ruta, $resumen, $cuerpo,$etiquetas);
echo $data;


?>