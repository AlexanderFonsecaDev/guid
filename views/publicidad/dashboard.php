<?php

require_once '../controller/publicidad/publicidad.php';
?>
<div class="content-header content-header-media">
    <div class="header-section">
        <div class="row">
            <!-- Main Title (hidden on small devices for the statistics to fit) -->
            <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                <h1>Dashboard <strong>Publicidad</strong><br></h1>
            </div>
            <!-- END Main Title -->

            <!-- Top Stats -->
            <div class="col-md-8 col-lg-6">
                <div class="row text-center">
                    <div class="col-xs-4 col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>100</strong><br>
                            <small><i class="fa fa-thumbs-o-up"></i> Activas</small>
                        </h2>
                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>167k</strong><br>
                            <small><i class="fa fa-heart-o"></i> Noticias</small>
                        </h2>
                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>100</strong><br>
                            <small><i class="fa fa-calendar-o"></i> Click Activos</small>
                        </h2>
                    </div>
                    <!-- We hide the last stat to fit the other 3 on small devices -->
                    <div class="col-sm-3 hidden-xs">
                        <h2 class="animation-hatch">
                            <strong>27° C</strong><br>
                            <small><i class="fa fa-map-marker"></i> Sydney</small>
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
        <a href="javascript:nuevaPublicidad();" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-flatie animation-fadeIn">
                    <i class="fa fa-newspaper-o"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    Nueva <strong>Publicidad</strong><br>
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
</div>

<div class="block full">
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Cliente</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $reg = listarPublicidad();
            while ($reg->next_record()) {
                $name = $reg->f('nombre_publicidad');
                $cliente = $reg->f('cliente');
                ?>

                <tr>
                    <td class="text-center"><strong><?= $name; ?></strong></td>
                    <td class="text-center"><strong><?php echo $cliente; ?></strong></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<form name="dirPagina" action="blog.php" method="post">
    <input type="hidden" name="idPublicidad" value="">
    <input type="hidden" name="pagina" value="">
</form>
