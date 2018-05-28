<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">


        </div>
        <div class="modal-body">
            <form action="#" enctype="multipart/form-data" class="form-horizontal form-bordered">
                <fieldset>
                    <label class="col-sm-3 control-label" for="example-textarea-input">Motivo de rechazado
                        preinscipción.</label>
                    <div class="col-sm-9">
                        <input type="number" id="ced" name="ced" class="form-control"
                               onkeypress="return justNumbers(event)" value="" maxlength="20" onpaste="return false"
                               autocomplete="off" placeholder="Número">
                    </div>
                </fieldset>
                <div class="form-group form-actions">
                    <div id='btn-save' class="col-xs-12 text-right">
                        <button type="button" id="submitButton" onClick="rechazar()" class="btn btn-sm btn-success">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                        <div class="controls" id="validarCampoRechazo" style="display: none;"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

