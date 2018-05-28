<?php
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_POST['control'])) {
    if ($_POST['control'] == 'NuevaPublicacion') {
        require_once '../../controller/start.php';
        require_once '../../controller/DB_server.php';
        require_once '../../controller/blog/post.php';

        ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h3 class="modal-title">Nueva Publicacion</h3>
                </div>
                <div class="modal-body">
                    <form action="#" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <!--action = "javascript:editarInfo();" method = "post" -->
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Titulo<span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="titulo" name="titulo" class="form-control"
                                           onkeypress="return soloLetras(event)" value="" maxlength="100"
                                           onpaste="return false" onchange="rutaAmigable()" autocomplete="off"
                                           placeholder="Titulo">
                                    <div id="valName"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Ruta amigable<span
                                            class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="ruta_amigable" name="ruta_amigable" class="form-control"
                                           onkeypress="return soloLetras(event)" value="" maxlength="100"
                                           onpaste="return false" onchange="rutaAmigable()" autocomplete="off"
                                           placeholder="ruta amigable">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Imagen<span
                                            class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="file" name="imagen" id="imagen">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Etiquetas<span
                                            class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <?php
                                    $reg = listarEtiquetas();
                                    while ($reg->next_record()) {
                                        $idEtiqueta = $reg->f('id');
                                        $tituloEtiqueta = $reg->f('titulo');
                                        ?>

                                        <label>
                                            <input type="checkbox"
                                                   value="<?php echo $idEtiqueta ?>"><?php echo $tituloEtiqueta ?>
                                        </label>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Resumen<span
                                            class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <textarea name="resumen" id="resumen" cols="30" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Cuerpo<span
                                            class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <textarea name="cuerpo_publicacion" id="cuerpo_publicacion" cols="30"
                                              rows="10"></textarea>
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

            $(function () {
                CKEDITOR.config.height = 400;
                CKEDITOR.config.width = 'auto';

                CKEDITOR.replace('cuerpo_publicacion');
            });

            function rutaAmigable() {
                $("#titulo, #ruta_amigable").stringToSlug({
                    callback: function (text) {
                        $('#ruta_amigable').val(text);
                    }
                });
            }

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
                console.log("Esto es lo que tienen las etiquetas");
                var etiquetas =
                console.log("Esto es lo que tienen las etiquetas");
                console.log("**************************************");
                /**$('div#btn-save').hide();
                var titulo = $('#titulo').val();
                var ruta_amigable = $('#ruta_amigable').val();
                var imagen = $('#imagen').val();
                var estado_b = $('#estado_b').val();
                var estado_p = $('#estado_p').val();
                var etiquetas = 1;
                var resumen = $('#resumen').val();
                var cuerpo = $('#cuerpo_publicacion').val();
                var control = "guardarPublicacion";


                var parametros = {
                    'control': control,
                    'titulo': titulo,
                    'ruta_amigable': ruta_amigable,
                    'imagen': imagen,
                    'estado': estado_b,
                    'etiqueta': etiquetas,
                    'resumen': resumen,
                    'cuerpo': cuerpo,
                };
                $.ajax({
                    url: "../controller/request/blogOn.php",
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
                });**/
            }
        </script>

        <?php
    } else if ($_POST['control'] == 'BorrarPublicacion') {

        ?>

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h3 class="modal-title">Borrar Publicacion</h3>
                </div>
                <div class="modal-body">
                    <form action="#" enctype="multipart/form-data" class="form-horizontal form-bordered">
                        <h2>¿Deseas borrar esta publicacion?</h2>
                        <div class="form-group form-actions">
                            <div id='btn-save' class="col-xs-12 text-right">
                                <button type="button" id="submitButton" onClick="borrarPublicacion()"
                                        class="btn btn-sm btn-danger">Eliminar
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

            function borrarPublicacion() {
                $('div#btn-save').hide();
                var id_publicacion = $('#idPublicacion').val();
                var control = "BorrarPublicacion";
                var parametros = {
                    'control': control,
                    'id_publicacion': id_publicacion,
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
    }
}

