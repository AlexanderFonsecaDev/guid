<?php
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_POST['control'])) {
    if ($_POST['control'] == 'NuevoPais') {
        require_once '../../controller/start.php';
        require_once '../../controller/DB_server.php';
        require_once '../../controller/zonas/zonas.php';
        $idP = $_POST['ruta'];
        if ($idP == 0) {
            ?>
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                        </button>
                        <h3 class = "modal-title">Registro de Paises</h3>
                    </div>
                    <div class = "modal-body">
                        <form action = "#" enctype = "multipart/form-data" class = "form-horizontal form-bordered" ><!--action = "javascript:editarInfo();" method = "post" -->
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">PA&Iacute;S <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="name" name="name" class="form-control" onkeypress="return soloLetras(event)"  value="" maxlength="100"  onpaste="return false" autocomplete="off" placeholder="Pa&iacute;s">
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
                    var control = "AgregarPais";
                    var parametros = {
                        'control': control,
                        'name': name
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
            ?>
            <input type="hidden" id="idP" name="idP" value="<?= $idP ?>">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                        </button>
                        <h3 class = "modal-title">Edici&oacute;n de Paises</h3>
                    </div>
                    <div class = "modal-body">
                        <form action = "#" enctype = "multipart/form-data" class = "form-horizontal form-bordered" ><!--action = "javascript:editarInfo();" method = "post" -->
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">PA&Iacute;S <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        <input type="text" id="nameE" name="nameE" class="form-control" onkeypress="return soloLetras(event)"  value="<?= $reg->f('pais') ?>" maxlength="100"  onpaste="return false" autocomplete="off" >
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
                    var control = "EditarPais";
                    var parametros = {
                        'control': control,
                        'name': name,
                        'idP': $('#idP').val()
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


