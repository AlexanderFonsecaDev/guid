<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../controller/start.php';
require_once '../controller/DB_server.php';
header('Content-type: text/html; charset=utf-8');
require_once '../elements/head.php';
require_once '../controller/customs/comunes.php';
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
                            <i class="gi gi-global"></i>BLOG<br>
                            <small>M&Oacute;DULOS DE PUBLICACIONES</small>
                        </h1>
                    </div>
                </div>
                <ul class="breadcrumb breadcrumb-top">
                    <li>Men&uacute;</li>
                    <li>BLOG</li>
                </ul>
                <!-- END Blank Header -->


                <?php
                require_once 'club/dashboard.php';
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
<script src="../js/pages/tablesDatatables.js"></script>
<script src="../js/dropzone/app.js"></script>
<script src="../elements/js/preinscritosClub.js"></script>
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

