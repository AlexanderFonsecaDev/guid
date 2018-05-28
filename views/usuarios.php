<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../controller/start.php';
require_once '../controller/DB_server.php';
require_once '../controller/usuarios/usuarios.php';

/* Establecemos que las paginas no pueden ser cacheadas */
header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-type: text/html; charset=utf-8');
require_once '../elements/head.php';
?>
<body>
    <div id="page-wrapper">
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
            <?php require_once '../elements/side_bar.php'; ?>
            <div id="main-container">
                <?php require_once '../elements/header_nav.php'; ?>

                <!-- Page content -->
                <div id="page-content">
                    <!-- Blank Header -->
                    <div class="content-header">
                        <div class="header-section">
                            <h1>
                                <i class="gi gi-user_add"></i>Usuarios<br><small>M&Oacute;DULO <strong>ADMINISTRACI&Oacute;N DE USUARIOS</strong></small>
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Men&uacute; </li>
                        <li>USUARIOS </li>
                        <li><?= $_SESSION['nombre'] ?></li>
                    </ul>
                    <!-- END Blank Header -->



                    <?php
                    require_once 'usuarios/dashboard.php';
//                        if ($_SESSION['userProfileId'] == '8734') {
//                            require_once 'dashboardAdmin.php';
//                        } else if ($_SESSION['userProfileId'] == '8735') {
//                            require_once 'dashboardRecolector.php';
//                        } else if ($_SESSION['userProfileId'] == '8736') {
//                            require_once 'dashboardNegocio.php';
//                        }
                    ?>
                </div>
                <!-- END Page Content -->
                <?php require_once '../elements/footer.php'; ?>

            </div>
        </div>
    </div>




    <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
    <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
        <?php require_once 'modal/modal_edit_info.php'; ?>


    <script>!window.jQuery && document.write(decodeURI('%3Cscript src="../js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

    <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/app.js"></script>
    <script src="../elements/js/customs.js"></script>
    <script src="../elements/js/usuarios.js"></script>
    <script src="../js/pages/tablesDatatables.js"></script>
    <script>
            $(function () {
                TablesDatatables.init();
            });
    </script>
    <script>
        
        function salir() {
<?php $_SESSION['Mensaje'] = 'Ud acaba de cerrar su sesi&oacute;n.'; ?>
            window.location.href = "../index.php";
        }
    </script>

</body>
</html>

