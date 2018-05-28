<?php
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_POST['control'])) {
    if ($_POST['control'] == 'subirimagen') {
        require_once '../../controller/start.php';
        require_once '../../controller/DB_server.php';
        require_once '../../controller/blog/post.php';
        ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h3 class="modal-title">Subir imagenes</h3>
                </div>
                <div class="modal-body">
                    <form action="#" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <!--action = "javascript:editarInfo();" method = "post" -->
                        <fieldset>
                            <div class="form-group">
                                <div class="col-md-12 dropzone" id="subida">
                                    <h3 class="text-center">Arrastre sus imagenes</h3>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group form-actions">
                            <div id='btn-save' class="col-xs-12 text-right">
                                <button type="button" id="submitButton" onClick="save()"
                                        class="btn btn-sm btn-success">Guardar
                                </button>
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar
                                </button>
                                <div class="controls" id="validarInfoE" style="display: none;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript">






            function save() {
                $('div#btn-save').hide();
                var iddeporte = $('#deporte').val();
                var idPublicacion = $('#idPublicacion').val();
                var control = "ActualizarDeporte";
                var parametros = {
                    'control': control,
                    'idDeporte': iddeporte,
                    'idPublicacion':idPublicacion,
                };
                $.ajax({
                    url: "../controller/request/blogOn.php",
                    type: "POST",
                    data: parametros,
                    success: function (rta) {
                        if (rta) {
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
    }}
?>


