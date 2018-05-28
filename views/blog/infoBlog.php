<?php
require_once '../controller/blog/post.php';
$pag = "";
$idPublicacion = "";
$idDepto = "";
if (isset($_POST['pagina'])) {
    if ($_POST['pagina'] == 'actualizarPublicacion') {
        $pag = $_POST['pagina'];
        $idPublicacion = $_POST['idPublicacion'];
    } else if ($_POST['pagina'] == 'AgregarPublicacion') {
        $pag = $_POST['pagina'];
    }
}

if ($pag == "") {
    ?>

    <div class="block-section">
        <div class="row">

            <div class="col-md text-center">
                <div class="btn-group">
                    <a href="javascript:agregarPublicacion()" data-toggle="tooltip" title="Nueva Publicacion"
                       class="btn btn-lg btn-success"><i class="fa fa-plus"></i></a>
                    <a href="javascript:downloadPDF_ZonasGeneral()" data-toggle="tooltip"
                       title="Descargar PDF Info General" class="btn btn-lg btn-danger"><i class="fi fi-pdf"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="block full">
        <div class="block-title">
            <h2><strong>Lista</strong> Publicaciones</h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                <tr>
                    <th class="text-center">Publicacion</th>
                    <th class="text-center">Deporte</th>
                    <th class="text-center">Fecha creacion</th>
                    <th class="text-center">Fecha modificacion</th>
                    <th class="text-center">ACCI&Oacute;N</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $reg = listarPost();
                while ($reg->next_record()) {
                    $idPublicacion = $reg->f('id');
                    $name = $reg->f('titulo');
                    $id_deporte = $reg->f('deporte_id');
                    $fechaCreacion = $reg->f('created_at');
                    $fechaModificacion = $reg->f('updated_at');
                    $deporte = nombreDeporte($id_deporte);
                    ?>

                    <tr>
                        <input type="hidden" value="<?= $idPublicacion; ?>" name="idPublicacion" id="idPublicacion">
                        <td class="text-center"><strong><?= $name; ?></strong></td>
                        <td class="text-center"><strong><a
                                        href="javascript:cargarModalAgregarDeporte(<?= $id_deporte; ?>)"
                                        data-toggle="tooltip" title="Cargar Deporte <?= $deporte; ?>"
                                        style="color:red"><?= $deporte; ?></a></strong></td>
                        </td>
                        <td class="text-center"><strong><?php echo $fechaCreacion; ?></strong></td>
                        <td class="text-center"><strong><?php echo $fechaModificacion; ?></strong></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="javascript:editarPublicacion(<?= $idPublicacion; ?>)"
                                   data-toggle="tooltip"
                                   title="Editar publicacion <?= $name ?>" class="btn btn-sm btn-warning"><i
                                            class="fa fa-edit"></i></a>
                            </div>
                            <div class="btn-group">
                                <a href="javascript:cargarModalBorrarPublicacion(<?= $idPublicacion; ?>)"
                                   data-toggle="tooltip"
                                   title="Editar publicacion <?= $name ?>" class="btn btn-sm btn-danger"><i
                                            class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
} else if ($pag == "AgregarPublicacion") {

    ?>

    <div class="block-section">
        <div class="row">

            <div class="col-md text-center">
                <div class="btn-group">
                    <a href="javascript:volver()" data-toggle="tooltip" title="Volver" class="btn btn-lg btn-primary"><i
                                class="fa fa-backward"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="block full">
        <div class="block-title">
            <h2><strong>Crear una</strong> Publicacion</h2>
        </div>

        <form action="#" enctype="multipart/form-data" class="formulario form-horizontal form-bordered"
              id="elformulario">
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
                    <label class="col-md-4 control-label">Deporte <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <div class="col-md-9">
                            <select id="deporte" name="deporte" class="form-control" size="1">
                                <?php
                                $reg = listarDeportes();
                                while ($reg->next_record()) {
                                    $idDeporte = $reg->f('id_dep');
                                    $nombre = $reg->f('deporte');
                                    ?>
                                    <option value="<?= $idDeporte ?>"><?= $nombre ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Imagenes<span
                                class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input name="archivo" type="file" id="imagen"/>
                        <!--div para visualizar mensajes-->
                        <div class="messages"></div>
                        <!--div para visualizar en el caso de imagen-->
                        <div class="showImage"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Etiquetas<span
                                class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <fieldset>
                            <input type="text" id="example-tags" name="etiqueta" class="input-tags"
                                   value="">
                        </fieldset>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Resumen<span
                                class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <textarea name="resumen" id="resumen" cols="90" rows="10"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Cuerpo<span
                                class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <textarea name="cuerpo_publicacion" id="cuerpo_publicacion" cols="30" rows="10"></textarea>
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

            <input type="hidden" value="guardarPublicacion" name="control" id="control">

        </form>

    </div>

    <script type="text/javascript">

        //queremos que esta variable sea global
        var fileExtension = "";
        var file = "";
        var fileName = "";
        var fileSize = "";
        var fileType = "";

        $(document).ready(function () {

            $(".messages").hide();
            //función que observa los cambios del campo file y obtiene información
            $(':file').change(function () {
                //obtenemos un array con los datos del archivo
                file = $("#imagen")[0].files[0];
                //obtenemos el nombre del archivo
                fileName = file.name;
                //obtenemos la extensión del archivo
                fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
                //obtenemos el tamaño del archivo
                fileSize = file.size;
                //obtenemos el tipo de archivo image/png ejemplo
                fileType = file.type;
                //mensaje con la información del archivo
                showMessage("<span class='info'>Archivo para subir: " + fileName + ", peso total: " + fileSize + " bytes.</span>");
            });


            //como la utilizamos demasiadas veces, creamos una función para
            //evitar repetición de código
            function showMessage(message) {
                $(".messages").html("").show();
                $(".messages").html(message);
            }

            //comprobamos si el archivo a subir es una imagen
            //para visualizarla una vez haya subido
            function isImage(extension) {
                switch (extension.toLowerCase()) {
                    case 'jpg':
                    case 'gif':
                    case 'png':
                    case 'jpeg':
                        return true;
                        break;
                    default:
                        return false;
                        break;
                }
            }
        });


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

            $('div#btn-save').hide();
            var titulo = $('#titulo').val();
            var ruta_amigable = $('#ruta_amigable').val();
            var etiqueta = $('#example-tags').val();
            var resumen = $('#resumen').val();
            var cuerpo = CKEDITOR.instances['cuerpo_publicacion'].getData();
            var deporte = $('#deporte').val();
            var control = "guardarPublicacion";


            var parametros = {
                'control': control,
                'titulo': titulo,
                'ruta_amigable': ruta_amigable,
                'etiqueta': etiqueta,
                'resumen': resumen,
                'cuerpo': cuerpo,
                'deporte': deporte,
                'file': file,
                'fileName': fileName,
                'fileSize': fileSize,
                'fileType': fileType,
            };


            var message = "";


            var formData = new FormData($("#elformulario")[0]);
            formData.append("cuerpo_publicacion", cuerpo);

            $.ajax({
                url: '../controller/request/blogOn.php',
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
                    if (data) {
                        document.dirPagina.submit();
                    } else {
                        alert("Problemas al guardar tu publicacion")
                    }
                },
                //si ha ocurrido un error
                error: function () {
                    alert("todo salio mal");
                }
            });
        }
    </script>

    <?php
} else if ($pag == "actualizarPublicacion") {
        $reg = obtenerPublicacion($idPublicacion);
        while ($reg->next_record()) {
            $idPublicacion = $reg->f('id');
            $titulo = $reg->f('titulo');
            $ruta = $reg->f('ruta_amigable');
            $resumen = $reg->f('abstracto');
            $cuerpo = $reg->f('cuerpo');
            $deporte = $reg->f('deporte_id');
            $etiquetas = $reg->f('etiquetas');
    ?>

    <div class="block-section">
        <div class="row">

            <div class="col-md text-center">
                <div class="btn-group">
                    <a href="javascript:volver()" data-toggle="tooltip" title="Volver" class="btn btn-lg btn-primary"><i
                                class="fa fa-backward"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="block full">
        <div class="block-title">
            <h2><strong>Crear una</strong> Publicacion</h2>
        </div>

        <form action="#" enctype="multipart/form-data" class="formulario form-horizontal form-bordered"
              id="elformulario">
            <!--action = "javascript:editarInfo();" method = "post" -->
            <fieldset>
                <div class="form-group">
                    <label class="col-md-4 control-label">Titulo<span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <input type="text" id="titulo" name="titulo" class="form-control"
                               onkeypress="return soloLetras(event)" value="<?=$titulo?>" maxlength="100"
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
                               onkeypress="return soloLetras(event)" value="<?=$ruta?>" maxlength="100"
                               onpaste="return false" onchange="rutaAmigable()" autocomplete="off"
                               placeholder="ruta amigable">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Deporte <span class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <div class="col-md-9">
                            <select id="deporte" name="deporte" class="form-control" size="1">
                                <?php
                                $reg = listarDeportes();
                                while ($reg->next_record()) {
                                    $idDeporte = $reg->f('id_dep');
                                    $nombre = $reg->f('deporte');
                                    ?>
                                    <option value="<?= $idDeporte ?>"><?= $nombre ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <!--<div class="form-group">
                    <label class="col-md-4 control-label">Imagenes<span
                                class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input name="archivo" type="file" id="imagen"/>
                        <!--div para visualizar mensajes-->
                <!--<div class="messages"></div>
                <!--div para visualizar en el caso de imagen-->
                <!--  <div class="showImage"></div>
                    </div>
                </div>-->

                <div class="form-group">
                    <label class="col-md-4 control-label">Etiquetas<span
                                class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <fieldset>
                            <input type="text" id="example-tags" name="etiqueta" class="input-tags"
                                   value="<?=$etiquetas?>">
                        </fieldset>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Resumen<span
                                class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <textarea name="resumen" id="resumen" cols="90" rows="10"><?=$resumen?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Cuerpo<span
                                class="text-danger">*</span></label>
                    <div class="col-md-8">
                        <textarea name="cuerpo_publicacion" id="cuerpo_publicacion" cols="30" rows="10"><?=$cuerpo?></textarea>
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

            <input type="hidden" value="guardarPublicacion" name="control" id="control">

        </form>

    </div>
            <script type="text/javascript">

                //queremos que esta variable sea global
                var fileExtension = "";
                var file = "";
                var fileName = "";
                var fileSize = "";
                var fileType = "";

                $(document).ready(function () {

                    $(".messages").hide();
                    //función que observa los cambios del campo file y obtiene información
                    $(':file').change(function () {
                        //obtenemos un array con los datos del archivo
                        file = $("#imagen")[0].files[0];
                        //obtenemos el nombre del archivo
                        fileName = file.name;
                        //obtenemos la extensión del archivo
                        fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
                        //obtenemos el tamaño del archivo
                        fileSize = file.size;
                        //obtenemos el tipo de archivo image/png ejemplo
                        fileType = file.type;
                        //mensaje con la información del archivo
                        showMessage("<span class='info'>Archivo para subir: " + fileName + ", peso total: " + fileSize + " bytes.</span>");
                    });


                    //como la utilizamos demasiadas veces, creamos una función para
                    //evitar repetición de código
                    function showMessage(message) {
                        $(".messages").html("").show();
                        $(".messages").html(message);
                    }

                    //comprobamos si el archivo a subir es una imagen
                    //para visualizarla una vez haya subido
                    function isImage(extension) {
                        switch (extension.toLowerCase()) {
                            case 'jpg':
                            case 'gif':
                            case 'png':
                            case 'jpeg':
                                return true;
                                break;
                            default:
                                return false;
                                break;
                        }
                    }
                });


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

                    $('div#btn-save').hide();
                    var titulo = $('#titulo').val();
                    var ruta_amigable = $('#ruta_amigable').val();
                    var etiqueta = $('#example-tags').val();
                    var resumen = $('#resumen').val();
                    var cuerpo = CKEDITOR.instances['cuerpo_publicacion'].getData();
                    var deporte = $('#deporte').val();
                    var control = "guardarPublicacion";


                    var parametros = {
                        'control': control,
                        'titulo': titulo,
                        'ruta_amigable': ruta_amigable,
                        'etiqueta': etiqueta,
                        'resumen': resumen,
                        'cuerpo': cuerpo,
                        'deporte': deporte,
                        'file': file,
                        'fileName': fileName,
                        'fileSize': fileSize,
                        'fileType': fileType,
                    };


                    var message = "";


                    var formData = new FormData($("#elformulario")[0]);
                    formData.append("cuerpo_publicacion", cuerpo);

                    $.ajax({
                        url: '../controller/request/blogOn.php',
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
                            if (data) {
                                document.dirPagina.submit();
                            } else {
                                alert("Problemas al guardar tu publicacion")
                            }
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
?>
<form name="dirPagina" action="blog.php" method="post">
    <input type="hidden" name="idPublicacion" value="">
    <input type="hidden" name="pagina" value="">
</form>