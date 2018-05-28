<?php
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_POST['control'])) {
    require_once '../../controller/start.php';
    require_once '../../controller/DB_server.php';
    require_once '../../controller/publicidad/publicidad.php';

    if ($_POST['control'] == 'NuevaPublicidad') {
        ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                    </button>
                    <h3 class="modal-title">Registro de <strong>Publicidad Web</strong></h3>
                </div>
                <div class="modal-body">
                    <form action="#" enctype="multipart/form-data" class="form-horizontal form-bordered" id="elformulario">
                        <!--action = "javascript:editarInfo();" method = "post" -->
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tipo de Publicidad <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <select id="tipu" name="tipo" class="form-control" style="width: 100%;">
                                        <option value="">Selecciona una Opci&oacute;n</option>
                                        <?php
                                        $sql = tipo_publicidad();
                                        While ($sql->next_record()) {
                                            ?>
                                            <option value="<?= $sql->f('id_tipu') ?>"><?= $sql->f('descripcion') ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                    <div id="valProfile"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">NOMBRE PUBLICIDAD <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="name" name="nombre" class="form-control"
                                           onkeypress="return soloLetras(event)" value="" maxlength="100"
                                           onpaste="return false" autocomplete="off" placeholder="Nombre">
                                    <div id="valName"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">CLIENTE <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="name" name="cliente" class="form-control"
                                           onkeypress="return soloLetras(event)" value="" maxlength="100"
                                           onpaste="return false" autocomplete="off" placeholder="Nombre">
                                    <div id="valName"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">VALOR <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="number" id="name" name="valor" class="form-control"
                                           onkeypress="return justNumbers(event)" value="" maxlength="100"
                                           onpaste="return false" autocomplete="off" placeholder="Valor">
                                    <div id="valName"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Fechas de Publicaci&oacute;n<span
                                            class="text-danger">*</span></label>
                                <div class="col-md-8">

                                    <div class="input-group input-daterange" data-date-format="dd-mm-yyyy">
                                        <input type="date" id="example-daterange1" name="fecha_inicio"
                                               class="form-control text-center" placeholder="Desde" value="<?php echo date("Y-m-d");?>">
                                        <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                        <input type="date" id="example-daterange2" name="fecha_fin"
                                               class="form-control text-center" placeholder="Hasta">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="example-file-input"> Cargar *.JPG </label>
                                <div class="col-md-8">
                                    <input type="file" id="example-file-input" name="archivo" accept="image/x-png,image/gif,image/jpeg" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">ENLACE <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="name" name="enlace" class="form-control" value=""
                                           maxlength="1000" onpaste="return false" autocomplete="off"
                                           placeholder="Link">
                                    <div id="valName"></div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group form-actions">
                            <div id='btn-save' class="col-xs-12 text-right">
                                <button type="button" id="submitButton" onClick="validate()"
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
                var message = "";


                var formData = new FormData($("#elformulario")[0]);
                formData.append("control", "NuevaPublicidad");

                $.ajax({
                    url: '../controller/request/publicidadOn.php',
                    type: 'post',
                    // Form data
                    //datos del formulario
                    data: formData,
                    //necesario para subir archivos via ajax
                    cache: false,
                    contentType: false,
                    processData: false,
                    //mientras enviamos el archivo
                    beforeSend: function () {
                        console.log("enviando");
                    },
                    //una vez finalizado correctamente
                    success: function (data) {
                        alert("Registro exitoso");
                        location.reload(true);
                    },
                    //si ha ocurrido un error
                    error: function () {
                        alert("todo salio mal");
                    }
                });
            }
        </script>

        <?php
    }
}