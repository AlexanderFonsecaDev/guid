<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div class="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="dashboard.php" class="sidebar-brand">
                <i class="gi gi-charts"></i><strong>Scored.com.co</strong>
            </a>
            <!-- END Brand -->
            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix">
                <div class="sidebar-user-avatar">
                    <a href="dashboard.php">
                        <img src="../img/LOGO.png" alt="avatar">
                    </a>
                </div>
                <div class="sidebar-user-name"><?= $_SESSION['nombre']; ?></div>
                <div class="sidebar-user-links">
                    <a href="javascript:cargarModalUserInfo();" data-toggle="tooltip" data-placement="bottom" title="Cambiar Clave"><i class="gi gi-user"></i></a>
                    <a href="javascript:salir();" data-toggle="tooltip" data-placement="bottom" title="Salir"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->


            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                
                <?php
                foreach ($_SESSION['modulos'] as &$valor) {

                    $idMod = $valor[0];
                    $ruta = $valor[1];
                    $orden = $valor[2];
                    $nombre = $valor[3];
                    
                    
                ?>
                <li align="center">
                    <a href="<?=$ruta ?>" <?php if ($_SESSION['menuNum'] == 2) echo 'class=" active" '; ?> ><?= $nombre?></a>
                </li>
                <?php
                }
                ?>
            </ul>
            <!-- END Sidebar Navigation -->


        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->

