<?php

session_start();

if ((!empty($_SESSION['sessionKey'])) && (!empty($_SESSION['userId']))) {
    $id = $_SESSION['userId'];
    $session = $_SESSION['sessionKey'];
    if (($id != '') && ($session != '')) {
        require_once '../controller/DB_server.php';
        require_once '../controller/customs/comunes.php';

        $reg = usuarioConfig($id, $session);
        if ($reg->next_record()) {
            $reg2 = info_usuarioConfig($id);
            if ($reg2->next_record()) {

                //CAPTAR INFO
                
                $_SESSION['nombre'] = $reg2->f('nombre1')." ".$reg2->f('apellido1');
                $_SESSION['cedula'] = $reg->f('cedula');
                $_SESSION['correo'] = $reg2->f('correo');
                $_SESSION['perfil'] = $reg->f('tipo_usuario');
                
                
                //CAPTAR PERMISOS DE PERFIL
                
                //Buscar modulos autorizados por tipo de usuario.
                $modulos = buscarModulosPerfil();
                $_SESSION['modulos'] = $modulos;
                
                
                
                if($_SESSION['perfil'] == 1){
                    //ADMIN
                    header("Location: /views/dashboard.php"); 
                }elseif($_SESSION['perfil'] == 2){
                    //CLUB
                    header("Location: /views/dashboard_club.php");
                }elseif($_SESSION['perfil'] == 3){
                    //REPRESENTANTE
                    header("Location: /views/dashboard_representante.php");
                }elseif($_SESSION['perfil'] == 4){
                    //JUGADOR
                    header("Location: /views/dashboard_jugador.php");
                }elseif($_SESSION['perfil'] == 5){
                    //PROFESIONAL MEDICO
                    header("Location: /views/dashboard_profesional.php");
                }
                
       
                
            } else {
                //SALIR ACABAR SESSION 
            }
        } else {
            //SALIR ACABAR SESSION 
        }
    }
} else {
    //SALIR ACABAR SESSION
}