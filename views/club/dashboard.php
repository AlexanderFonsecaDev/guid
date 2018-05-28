<?php
require_once '../controller/clubs/clubs.php';
$pag = "";

if (isset($_POST['pagina'])) {
    if ($_POST['pagina'] == 'listaClub') {
        $pag = $_POST['pagina'];
    } 
}

?>
<div class="content-header content-header-media">
    <div class="header-section">
        <div class="row">
            <!-- Main Title (hidden on small devices for the statistics to fit) -->
            <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                <h1>Dashboard <strong>Clubs Deportivos</strong><br></h1>
            </div>
            <!-- END Main Title -->

            <!-- Top Stats -->
            <div class="col-md-8 col-lg-6">
                <div class="row text-center">
                    <div class="col-xs-4 col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>100</strong><br>
                            <small><i class="fa fa-thumbs-o-up"></i> Clubes</small>
                        </h2>
                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>167k</strong><br>
                            <small><i class="fa fa-heart-o"></i> Deportistas</small>
                        </h2>
                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>100</strong><br>
                            <small><i class="fa fa-calendar-o"></i> Deportes</small>
                        </h2>
                    </div>

                </div>
            </div>
            <!-- END Top Stats -->
        </div>
    </div>

    <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
    <img src="../img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
</div>
<div class="row">
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="javascript:listaPreinscritos();" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                    <i class="fa fa-list-ul"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    Lista <strong>Preinscritos</strong><br>
                    <small></small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="javascript:listaClub();" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-flatie animation-fadeIn">
                    <i class="fa fa-search-plus"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    Lista de <strong>Clubs </strong><br>
                    <small></small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="javascript:ultimasNoticias();" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                    <i class="fa fa-comment-o"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    &Uacute;ltimas <strong>Noticas</strong><br>
                    <small></small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="javascript:ultimasNoticias();" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-flatie animation-fadeIn">
                    <i class="fa fa-user"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    Usuarios <strong>preinscritos</strong><br>
                    <small></small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>

</div>
<?php

if ($pag == "") {
    require_once 'club/listaPreinscritos.php';
}else if($pag == "listaClub"){
    require_once 'club/listaClub.php';
}else if($pag == "usuario_preisncrito"){
    require_once 'club/usuario_preinscrito.php';
}
?>
<form name="dirPagina" action="club.php" method="post">
   <input type="hidden" name="pagina" value="">
</form>