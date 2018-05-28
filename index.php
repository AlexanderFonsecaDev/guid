<?php
$num = rand(1, 7);
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
require_once 'controller/DB_server.php';

/* Establecemos que las paginas no pueden ser cacheadas */
header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Scored.com.co</title>

        <meta name="description" content="Escuelas y Clubes DEportivos - Scored.com.co.">
        <meta name="author" content="Ubicu">
        <meta name="robots" content="index, follow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="apple-touch-icon" href="img/icon57.png" sizes="57x57">
        <link rel="apple-touch-icon" href="img/icon72.png" sizes="72x72">
        <link rel="apple-touch-icon" href="img/icon76.png" sizes="76x76">
        <link rel="apple-touch-icon" href="img/icon114.png" sizes="114x114">
        <link rel="apple-touch-icon" href="img/icon120.png" sizes="120x120">
        <link rel="apple-touch-icon" href="img/icon144.png" sizes="144x144">
        <link rel="apple-touch-icon" href="img/icon152.png" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="js/vendor/modernizr-2.7.1-respond-1.4.2.min.js"></script>
    </head>
    <body >
        <!-- Login Full Background -->
        <!-- For best results use an image with a resolution of 1280x1280 pixels (prefer a blurred image for smaller file size) -->
        <img src="img/placeholders/backgrounds/login_full_bg_<?= $num ?>.jpg" alt="Login Full Background" class="full-bg animation-pulseSlow">
        <!-- END Login Full Background -->

        <!-- Login Container -->
        <div id="login-container" class="animation-fadeIn">
            <!-- Login Title -->
            <div class="login-title text-center">
                <img src="img/logo.png" width="260" height="80" alt="avatar">
                <h1>
                    <strong>Escuelas y Clubes Deportivos</strong><br>
                    <small><strong>Ingreso a la plataforma administrativa</strong></small>
                </h1>
            </div>
            <!-- END Login Title -->

            <!-- Login Block -->
            <div class="block push-bit">
                <!-- Login Form -->
                <form action="javascript:entrar();" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                <input type="number" id="ced" name="ced" class="form-control input-lg" onkeypress="return justNumbers(event)" onpaste="return false" autocomplete="off" placeholder="Digite su c&eacute;dula">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="clave" name="clave" class="form-control input-lg" onpaste="return false" autocomplete="off" placeholder="Contraseña">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6 text-left">
                            <button type="submit" class="btn btn-sm  btn-success"><i class="fa fa-check-circle"></i> Entrar</button>
                        </div>
                        <div class="col-xs-6 text-right">
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#recordarClave"><i class="fa fa-keyboard-o"></i> Recordar clave</button>
                        </div>
                    </div>
                    <div id="mensaje" class="form-group form-actions" style="display: none;">
                        <div class="col-xs-8 col-md-offset-2">
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="fa fa-times-circle"></i> Mensaje de Error </h4> 
                                <span id="msj"></span>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->        
            </div>
            <!-- END Login Block -->
        </div>
        <!-- END Login Container -->

        <!-- Modal Recordar -->
        <div class="modal fade" id="recordarClave" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title" align="center" id="myModalLabel"><strong>Recordar su contraseña</strong></h2>
                    </div>
                    <div class="modal-body">
                        <form action = "#" enctype = "multipart/form-data" class = "form-horizontal form-bordered" ><!--action = "javascript:editarInfo();" method = "post" -->
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-6 control-label">Documento de Identidad <span class="text-danger">*</span></label>
                                    <div class="col-md-6">
                                        <input type="number" id="cedR" name="cedR" class="form-control" value="" maxlength="15" onkeypress="return justNumbers(event)"  onpaste="return false" autocomplete="off" placeholder="Digite su c&eacute;dula">
                                        <div id="valCedR" ></div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group form-actions">
                                <div id ='btn-save' class="col-xs-12 text-right">
                                    <button type="button" id="submitButton" onClick="recuperar()" class="btn btn-sm btn-success">Cambiar Clave</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Modal Recordar -->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>!window.jQuery && document.write(decodeURI('%3Cscript src="js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/app.js"></script>
        <script src="elements/js/login.js"></script>


    </body>
</html>
