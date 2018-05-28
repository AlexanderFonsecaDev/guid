<?php
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_POST['control'])) {
    require_once '../../controller/start.php';
    require_once '../../controller/DB_server.php';
    require_once '../../controller/clubs/clubs.php';

    if ($_POST['control'] == 'modalInfo') {
        $id = $_POST['id'];

        $reg = infoPreInscritos($id);
        $reg->next_record();

        $club = $reg->f('club');
        $nombre = $reg->f('nombre1') . " " . $reg->f('nombre2');
        $apellido = $reg->f('apellido1') . " " . $reg->f('apellido2');
        $idCiudad = $reg->f('ciudad');

        $reg2 = infoZona($idCiudad);
        $reg2->next_record();
        $ciudad = $reg2->f('ciudad');
        $departamento = $reg2->f('departamento');
        $pais = $reg2->f('pais');

        $deporte = buscarDeporte($reg->f('deporte'));
        ?>
        <div class = "modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                    </button>
                    <h3 class = "modal-title">Informaci&oacute;n de <strong>Club PreInscrito</strong></h3>
                </div>
                <div class = "modal-body">
                    <fieldset>
                        <div class="col-sm-12 text-center">
                            <h2>Datos Club: <strong><?= $club ?></strong></h2>
                            <address>
                                Registro: <strong><?= $reg->f('reg_club'); ?></strong> - 
                                Deporte: <strong><?= $deporte; ?></strong><br>
                                Ciudad: <strong><?= $ciudad; ?></strong> - 
                                Depto: <strong><?= $departamento; ?></strong> -  
                                Pa&iacute;s : <strong><?= $pais; ?></strong><br>
                                Email Club: <strong><?= $reg->f('email_club'); ?></strong>
                            </address>
                        </div>
                        <div class="col-sm-12 text-center">
                            <h2>Datos Propietario</h2>
                            <address>
                                Nombre: <strong><?= $nombre . ' ' . $apellido; ?></strong><br>
                                C&eacute;dula: <strong><?= $reg->f('cedula'); ?></strong><br> 
                                Tel&eacute;fono: <strong><?= $reg->f('telefono') ?></strong> - 
                                Celular: <strong><?= $reg->f('celular') ?></strong><br>
                                Email: <strong><?= $reg->f('email'); ?></strong><br>
                            </address>
                        </div>

                    </fieldset>
                </div>
            </div>
        </div>
        <?php
    } else if ($_POST['control'] == 'aprobacion') {
        $id = $_POST['id'];
        $estado = $_POST['est'];
        $reg = infoPreInscritos($id);
        $reg->next_record();

        $club = $reg->f('club');
        ?>
        <div class = "modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                    </button>
                    <?php if ($estado == 2) { ?>
                        <h3 class = "modal-title">¿Confirma la <strong>cancelación de inscripci&oacute;n de este club <?= $club ?>?</strong></h3>
                    <?php } else { ?>
                        <h3 class = "modal-title">¿Confirma la <strong>aceptaci&oacute;n de inscripci&oacute;n de este club <?= $club ?>?</strong></h3>
                    <?php } ?>
                </div>
                <div class = "modal-body">
                    <?php if ($estado == 2) { ?>
                    <form action = "#" enctype = "multipart/form-data" class = "form-horizontal form-bordered" >
                        <fieldset>
                            <label class="col-sm-3 control-label" for="example-textarea-input">Motivo de rechazado preinscipción.</label>
                            <div class="col-sm-9">
                                <textarea id="motivo" name="motivo" rows="5" class="form-control" placeholder="Por favor registre el motivo de la no aceptaci&oacute;n en la plataforma."></textarea>
                            </div>
                        </fieldset>
                        <div class="form-group form-actions">
                            <div id ='btn-save' class="col-xs-12 text-right">
                                <button type="button" id="submitButton" onClick="rechazar()" class="btn btn-sm btn-success">Guardar</button>
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                                <div class="controls" id="validarCampoRechazo" style="display: none;"></div>
                            </div>
                        </div>
                    </form>
                    <?php } else { ?>
                    <form action = "#" enctype = "multipart/form-data" class = "form-horizontal form-bordered" >
                        <div class="form-group form-actions">
                            <div id ='btn-save' class="col-xs-12 text-right">
                                <button type="button" id="submitButton" onClick="aceptar()" class="btn btn-sm btn-success">Guardar</button>
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                                <div class="controls" id="validarCampoRechazo" style="display: none;"></div>
                            </div>
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function rechazar() {
                var id = <?= $id ?>;
                var comentario = $('#motivo').val();
                if (comentario === "") {
                    console.log('error');
                    $("#motivo").focus();
                    $('div#validarCampoRechazo').html("<div style='color:red;'><br><strong>* Por favor registre el motivo de la no aceptaci&oacute;n en la plataforma.</strong></div>");
                    $('div#validarCampoRechazo').show();
                } else {
                    var parametros = {
                        'control': 'rechazar',
                        'comentario': comentario,
                        'id': id
                    };
                    $.ajax({
                        url: "../controller/request/clubsOn.php",
                        type: "POST",
                        data: parametros,
                        success: function (rta) {
                            if (rta ==='1') {
                                location.reload();
                            } else {
                                $('div#btn-save').show();
                                $('div#validarCampoRechazo').html("<div style='color:red;'><br><strong>* " + rta + " *</strong></div>");
                                $('div#validarCampoRechazo').show();
                            }
                        }
                    });
                }
            }
            
            function aceptar() {
                var id = <?= $id ?>;
                
                    var parametros = {
                        'control': 'aceptar',
                        'id': id
                    };
                    $.ajax({
                        url: "../controller/request/clubsOn.php",
                        type: "POST",
                        data: parametros,
                        success: function (rta) {
                            if (rta ==='1') {
                                location.reload();
                            } else {
                                $('div#btn-save').show();
                                $('div#validarCampoRechazo').html("<div style='color:red;'><br><strong>* " + rta + " *</strong></div>");
                                $('div#validarCampoRechazo').show();
                            }
                        }
                    });
                
            }
        </script>
        <?php
    }
}