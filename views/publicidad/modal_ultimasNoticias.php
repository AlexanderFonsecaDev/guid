<?php
error_reporting(E_ALL ^ E_DEPRECATED);

if (isset($_POST['control'])) {
    require_once '../../controller/start.php';
    require_once '../../controller/DB_server.php';
    require_once '../../controller/publicidad/publicidad.php';

    if ($_POST['control'] == 'UltimasNoticias') {
        ?>
        <div class = "modal-dialog">
            <div class = "modal-content">
                <div class = "modal-header" align="center">
                    <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">&times;
                    </button>
                    <h3  class = "modal-title">Registro de <strong>&Uacute;ltimas Noticias</strong></h3>
                </div>
                <div class = "modal-body">
                    <form action = "#" enctype = "multipart/form-data" class = "form-horizontal form-bordered" ><!--action = "javascript:editarInfo();" method = "post" -->
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Noticia <span class="text-danger">*</span></label>
                                <div class="col-md-8">
                                    <input type="text" id="name" name="name" class="form-control" value="" maxlength="60"  onpaste="return false" autocomplete="off" placeholder="&Uacute;ltimas Noticias">
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
            <div class = "modal-content">
                <div class = "modal-header" align="center">
                    <h3 class = "modal-title">Lista <strong>&Uacute;ltimas Noticias </strong> Activas</h3>
                </div>
                <div class = "modal-body">
                    <div class="table-responsive">

                        <table id="general-table" class="table table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">Noticia</th>
                                    <th class="text-center">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $reg = buscarNoticias();
                                while ($reg->next_record()) {
                                    $id = $reg->f('noti_id');
                                    $noti = $reg->f('noticia');
                                    $est = $reg->f('estado');
                                    ?>

                                    <tr>
                                        <td class="text-center"><stron><?= $noti ?></stron></td>
                                <td class="text-center">
                                    <label class="switch switch-primary">
                                        <input type="checkbox" name="ver" id="ver" onclick="javascript:cambiarEstado(<?= $id ?>)" <?php if ($est == 1) echo "checked" ?>><span></span>
                                    </label>
                                </td>
                                </tr>

            <?php
        }
        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">

            function validate() {
                $('#valName').hide();
                $('div#validarInfoE').hide();
                if ($('#name').val() === "") {
                    console.log('error');
                    $("#name").focus();
                    $('#valName').html("<div style='color:red;'><br><strong>* Digite la noticia</strong></div>");
                    $('#valName').show();
                    return;
                }
                var texto = $('#name').val(); 
                if (texto.length > 60) {
                    console.log('error');
                    $("#name").focus();
                    $('#valName').html("<div style='color:red;'><br><strong>* Texto demasiado largo, solo 60 caracteres</strong></div>");
                    $('#valName').show();
                    return;
                }

                save();
            }
            function save() {
                $('div#btn-save').hide();
                var name = $('#name').val();
                var control = "AgregarNoticia";
                var parametros = {
                    'control': control,
                    'name': name
                };
                $.ajax({
                    url: "../controller/request/publicidadOn.php",
                    type: "POST",
                    data: parametros,
                    success: function (rta) {
                        if (rta === '1') {
                            location.reload();
                        } else {
                            $('div#btn-save').show();
                            $('div#validarInfoE').html("<div style='color:red;'><br><strong>* " + rta + " *</strong></div>");
                            $('div#validarInfoE').show();
                        }
                    }
                });
            }
            
            function cambiarEstado(id){
                var control = "cambiarEstado";
                var parametros = {
                    'control': control,
                    'id': id
                };
                $.ajax({
                    url: "../controller/request/publicidadOn.php",
                    type: "POST",
                    data: parametros,
                    success: function (rta) {
                        if (rta === '1') {
                            location.reload();
                        } else {
                            alert(rta);
                        }
                    }
                });
            }
        </script>

        <?php
    }
}