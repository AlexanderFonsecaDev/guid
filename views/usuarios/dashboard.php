<div class="content-header content-header-media">
    <div class="header-section">
        <div class="row">
            <!-- Main Title (hidden on small devices for the statistics to fit) -->
            <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                <h1>Administraci&oacute;n <strong> Usuarios del Sistema</strong><br></h1>
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
                            <strong>27째 C</strong><br>
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
    <div class="block-title">
        <h2><strong>Lista</strong> Usuarios Administrativos </h2>
    </div>
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">C&eacute;dula</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Acci&oacute;n</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $reg = listarUsuarios();

                while ($reg->next_record()) {
                    $usuaId = $reg->f('usua_id');
                    if ($usuaId != $_SESSION['userId']) {
                        $usuaCed = $reg->f('cedula');
                        $estUsu = $reg->f('estado');

                        $reg2 = infoUsuaList($usuaId);
                        $reg2->next_record();

                        $nombre = $reg2->f('nombre1') . " " . $reg2->f('nombre2');
                        $apellido = $reg2->f('apellido1') . " " . $reg2->f('apellido2');
                        $cel = $reg2->f('celular');
                        $mail = $reg2->f('correo');
                        ?>

                        <tr>
                            <td class="text-center"><strong><?= $usuaCed; ?></strong></td>
                            <td class="text-center"><strong><?= $nombre; ?></strong></td>
                            <td class="text-center"><strong><?= $apellido; ?></strong></td>
                            <td class="text-center"><strong><?= $cel; ?></strong></td>
                            <td class="text-center">
                                <button type="button"  onClick="cargarModalEnvioMail('<?= $mail?>')" class="btn btn-sm btn-primary" title="Eviar un email a : <?= $nombre ?>">
                                   <?= $mail; ?> 
                                </button>
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button"  onClick="cargarModalEnvioMail()" class="btn btn-sm btn-success"><strong>APROBAR</strong></button>
                                    <button type="button"  onClick="aprobar(<?= $estUsu ?>, 2)" class="btn btn-sm btn-danger"><strong>RECHAZAR</strong></button>
                                </div>

                            </td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
