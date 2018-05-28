<?php

error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../start.php';
require_once '../DB_server.php';
require_once '../zonas/zonas.php';


if (isset($_POST['control'])) {
    if ($_POST['control'] == 'AgregarPais') {
        $nom = mb_strtoupper($_POST['name']);
        $data = guardarPais($nom);
        echo $data;
        
    }else if ($_POST['control'] == 'EditarPais') {
        $idP = $_POST['idP'];
        $nom = mb_strtoupper($_POST['name']);
        $data = editarPais($idP,$nom);
        echo $data;
        
    }else if ($_POST['control'] == 'AgregarDepto') {
        $nom = mb_strtoupper($_POST['name']);
        $idP = $_POST['pais'];
        $data = guardarDepto($idP,$nom);
        echo $data;
        
    }else if ($_POST['control'] == 'EditarDepartamento') {
        $idP = $_POST['idP'];
        $idD = $_POST['idD'];
        $nom = mb_strtoupper($_POST['name']);
        $data = editarDepto($idP,$idD,$nom);
        echo $data;
        
    }else if ($_POST['control'] == 'AgregarCiudad') {
        $nom = mb_strtoupper($_POST['name']);
        $idP = $_POST['pais'];
        $idD = $_POST['departamento'];
        $data = guardarCiudad($idP,$idD,$nom);
        echo $data;
        
    }else if ($_POST['control'] == 'EditarCiudad') {
        $idP = $_POST['idP'];
        $idD = $_POST['idD'];
        $idC = $_POST['idC'];
        $nom = mb_strtoupper($_POST['name']);
        $data = editarCiudad($idP,$idD,$idC,$nom);
        echo $data;
        
    }
}

