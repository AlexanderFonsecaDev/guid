<?php
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_POST['control'])) {
    if ($_POST['control'] == 'EnviarMailUsuario') {
        require_once '../../controller/start.php';
        require_once '../../controller/DB_server.php';
        require_once '../../controller/usuarios/usuarios.php';

        $mailRecibe = $_POST['mail'];
        ?>


        <div class = "modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header" align="center">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                    </button>
                    <h3  class = "modal-title">Enviar <strong>Email Directo</strong></h3>
                </div>
                <div class = "modal-body">
                    <form action = "#" enctype = "multipart/form-data" class = "form-horizontal form-bordered" ><!--action = "javascript:editarInfo();" method = "post" -->
                        <fieldset>
                            <div class = "form-group">
                                <div class="col-sm-12 text-center">
                                    <h3>Para: <strong><?= $mailRecibe ?></strong></h3>
                                    <input type="hidden" id="correo" name="correo" value="<?= $mailRecibe ?>">
                                </div>
                            </div>
                            <div class = "form-group">
                                <label class="col-md-4 control-label">Asunto <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="asunto" name="asunto" class="form-control"   value="" maxlength="100"  onpaste="return false" autocomplete="off" placeholder="Asunto">
                                </div>
                            </div>
                            <div class = "form-group">
                                <label class="col-md-4 control-label">Mensaje <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <textarea id="msj" name="msj" rows="9" class="form-control" placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group form-actions">
                            <div id ='btn-save' class="col-xs-12 text-right">
                                <button type="button" id="submitButton" onClick="enviarMailDirecto()" class="btn btn-sm btn-primary">Enviar Mail</button>
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function enviarMailDirecto() {
                if ($('#asunto').val() === "") {
                    alert("Por favor escriba el asunto del email");
                } else if ($('#msj').val() === "") {
                    alert("Por favor escriba el mensaje del email");
                } else {
                    var parametros = {
                        "control": 'EnviarMailDirecto',
                        "mail": $('#correo').val(),
                        "asunto": $('#asunto').val(),
                        "mensaje": $('#msj').val()
                    };
                    $.ajax({
                        data: parametros,
                        url: '../controller/request/usuariosOn.php',
                        type: 'post',
                        success: function (respuesta) {
                            location.reload();
                        }

                    });
                }
            }
        </script>
        <?php
    }
}

