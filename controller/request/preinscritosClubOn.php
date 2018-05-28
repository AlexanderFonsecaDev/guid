<?php

error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../start.php';
require_once '../DB_server.php';
require_once '../clubs/preinscritos.php';


if (isset($_POST['control'])) {
    if ($_POST['control'] === 'mostrarDeptos') {
        $idP = $_POST['pais'];

        $sql = "Select * from departamentos  ";
        $sql .= "Where pais_id = $idP and estado = 1 Order by departamento ASC ";
        $reg = new DB_server($sql);
        if ($reg->num_rows() > 0) {
            $deptos = '<option value="">Seleccione un departamento</option>';
            while ($reg->next_record()) {
                $id = $reg->f('depto_id');
                $nombre = $reg->f('departamento');
                $deptos .= '<option value="' . $id . '">' . $nombre . '</option>';
            }
            echo $deptos;
        } else {
            echo '<option value="">No hay departamentos registrados</option>';
        }
    } else if ($_POST['control'] === 'mostrarCiudades') {
        $idP = $_POST['pais'];
        $idD = $_POST['depto'];

        $sql = "Select * from ciudades  ";
        $sql .= "Where pais_id = $idP and depto_id = $idD and estado = 1 Order by ciudad ASC";
        $reg = new DB_server($sql);
        if ($reg->num_rows() > 0) {
            $ciudades = '<option value="">Seleccione una ciudad</option>';
            while ($reg->next_record()) {
                $id = $reg->f('ciud_id');
                $nombre = $reg->f('ciudad');
                $ciudades .= '<option value="' . $id . '">' . $nombre . '</option>';
            }
            echo $ciudades;
        } else {
            echo '<option value="">No hay ciudades registradas</option>';
        }
    } else if ($_POST['control'] === 'guardarPreInscrito') {
        $pNom = mb_strtoupper($_POST['pNom']);
        $sNom = mb_strtoupper($_POST['sNom']);
        $pApel = mb_strtoupper($_POST['pApel']);
        $sApel = mb_strtoupper($_POST['sApel']);
        $tipu = $_POST['tipu'];
        $ced = $_POST['ced'];
        $mail = $_POST['mail'];
        $tel = $_POST['tel'];
        $cel = $_POST['cel'];
        $dep = $_POST['dep'];
        $nomC = mb_strtoupper($_POST['nomC']);
        $nitC = $_POST['nitC'];
        $pais = $_POST['pais'];
        $depto = $_POST['depto'];
        $ciud = $_POST['ciud'];
        $mailC = $_POST['mailC'];

        //obtenemos el archivo a subir
        $file = $_FILES['archivo']['name'];

        $reg = guardarPreinscrito($pNom, $sNom, $pApel, $sApel, $tipu, $ced, $mail, $tel, $cel, $dep, $nomC, $nitC, $pais, $depto, $ciud, $mailC, $file);
        echo "$reg";
    }
}
