<?php
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_POST['control'])) {
    if ($_POST['control'] == 'NuevaCiudad') {
        require_once '../../controller/start.php';
        require_once '../../controller/DB_server.php';
        require_once '../../controller/zonas/zonas.php';
        $ruta = $_POST['ruta'];
        $idP = $_POST['pais'];
        $idC = $_POST['ciudad'];
        $idDepto = $_POST['depto'];

        if ($ruta == 0) {
            $reg = infoPais($idP);
            $reg->next_record();
            
            $regD = infoDepto($idDepto);
            $regD->next_record();
            $departamento = $regD->f('departamento');
            
            ?>
            <input type="hidden" id="idP" name="idP" value="<?= $idP ?>">
            <input type="hidden" id="idD" name="idD" value="<?= $idDepto ?>">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                        </button>
                        <h3 class = "modal-title">Registro de Ciudades </h3>
                        <h3 class = "modal-title">Pa&iacute;s: <?= $reg->f('pais') ?> - Departamento: <?= $departamento ?></h3>
                    </div>
                    <div class = "modal-body">
                        <form action = "#" enctype = "multipart/form-data" class = "form-horizontal form-bordered" ><!--action = "javascript:editarInfo();" method = "post" -->
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">CIUDAD <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="name" name="name" class="form-control" onkeypress="return soloLetras(event)"  value="" maxlength="100"  onpaste="return false" autocomplete="off" placeholder="Ciudad">
                                        <div id="valName" ></div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group form-actions">
                                <div id ='btn-save' class="col-xs-12 text-right">
                                    <button type="button" id="submitButton" onClick="validate()" class="btn btn-sm btn-success">Guardar</button>
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                                    <div class="controls" id="validarInfoE" style="display: none;"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">

                function validate() {
                    $('#valName').hide();
                    $('div#validarInfoE').hide();
                    if ($('#name').val() == "") {
                        console.log('error');
                        $("#name").focus();
                        $('#valName').html("<div style='color:red;'><br><strong>* Digite el Nombre</strong></div>");
                        $('#valName').show();
                        return;
                    }
                    save();
                }
                function save() {
                    $('div#btn-save').hide();
                    var name = $('#name').val();
                    var idP = $('#idP').val();
                    var idD = $('#idD').val();
                    var control = "AgregarCiudad";
                    var parametros = {
                        'control': control,
                        'name': name,
                        'pais': idP,
                        'departamento': idD
                    };
                    $.ajax({
                        url: "../controller/request/zonasOn.php",
                        type: "POST",
                        data: parametros,
                        success: function (rta) {
                            if (rta == '1') {
                                location.reload();
                            } else {
                                $('div#btn-save').show();
                                $('div#validarInfoE').html("<div style='color:red;'><br><strong>* " + rta + " *</strong></div>");
                                $('div#validarInfoE').show();
                            }
                        }
                    });
                }
            </script>

            <?php
        } else {

            $reg = infoPais($idP);
            $reg->next_record();
            
            $regD = infoDepto($idDepto);
            $regD->next_record();
            $departamento = $regD->f('departamento');
            
            $regC = infoCiudad($idC);
            $regC->next_record();
            $ciudad = $regC->f('ciudad');
            
            
            ?>
            <input type="hidden" id="idP" name="idP" value="<?= $idP ?>">
            <input type="hidden" id="idD" name="idD" value="<?= $idDepto ?>">
            <input type="hidden" id="idC" name="idC" value="<?= $idC ?>">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                        </button>
                        <h3 class = "modal-title">Edici&oacute;n de ciudad: <?= $ciudad ?></h3>
                        <h3 class = "modal-title">En departamento: <?= $departamento ?> - Pa&iacute;s: <?= $reg->f('pais'); ?></h3>
                    </div>
                    <div class = "modal-body">
                        <form action = "#" enctype = "multipart/form-data" class = "form-horizontal form-bordered" ><!--action = "javascript:editarInfo();" method = "post" -->
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">CIUDAD <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="nameE" name="nameE" class="form-control" onkeypress="return soloLetras(event)"  value="<?= $ciudad ?>" maxlength="100"  onpaste="return false" autocomplete="off" >
                                        <div id="valName" ></div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group form-actions">
                                <div id ='btn-save' class="col-xs-12 text-right">
                                    <button type="button" id="submitButton" onClick="validate()" class="btn btn-sm btn-success">Guardar</button>
                                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                                    <div class="controls" id="validarInfoE" style="display: none;"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">

                function validate() {
                    $('#valName').hide();
                    $('div#validarInfoE').hide();
                    if ($('#nameE').val() == "") {
                        console.log('error');
                        $("#nameE").focus();
                        $('#valName').html("<div style='color:red;'><br><strong>* Digite el Nombre</strong></div>");
                        $('#valName').show();
                        return;
                    }
                    save();
                }
                function save() {
                    $('div#btn-save').hide();
                    var name = $('#nameE').val();
                    var control = "EditarCiudad";
                    var parametros = {
                        'control': control,
                        'name': name,
                        'idP': $('#idP').val(),
                        'idD': $('#idD').val(),
                        'idC': $('#idC').val()
                    };
                    $.ajax({
                        url: "../controller/request/zonasOn.php",
                        type: "POST",
                        data: parametros,
                        success: function (rta) {
                            if (rta == '1') {
                                location.reload();
                            } else {
                                $('div#btn-save').show();
                                $('div#validarInfoE').html("<div style='color:red;'><br><strong>* " + rta + " *</strong></div>");
                                $('div#validarInfoE').show();
                            }
                        }
                    });
                }
            </script>
            <?php
        }
    }
}

    