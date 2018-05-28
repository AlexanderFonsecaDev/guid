<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../../controller/customs/start.php';
require_once '../../controller/customs/DB_server.php';
require_once '../../controller/customs/validate.php';
require_once('../../controller/admin_source/main.php');
if (isset($_POST['control'])) {
    if ($_POST['control'] == 'asignarPermisos') {

        $idU = $_POST['id'];

        $reg = infoUsuario($idU);
        $reg->next_record();
        $profile = $reg->f('profile');
        ?>
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header text-center">
                    <h2 class="modal-title"><i class="fa fa-cogs"></i> Asignar Permisos De Usuario</h2>
                    <h4 class="modal-title"><i class="fa fa-user"></i> Usuario : <?= $reg->f('name') . ' ' . $reg->f('lastname') ?></h4>
                </div>
                <!-- END Modal Header -->
                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="javascript:perfil();" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" >
                        <input type="hidden" id='usrId' name='usrId' value="<?= $idU ?>">
                        <fieldset>
                            <legend>Seleccione los permisos que desea asignarle al usuario</legend>
                            <div class="table-responsive">

                                <table id="general-table" class="table table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center">MENU</th>
                                            <th class="text-center">ENTRAR</th>
                                            <th class="text-center">CREAR</th>
                                            <th class="text-center">EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $menu = buscarInfoMenu();
                                        while ($menu->next_record()) {
                                            $idMenu = $menu->f('id');
                                            $menuN = $menu->f('name');

                                            $ver = 0;
                                            $iV = 1;
                                            $crear = 0;
                                            $iC = 2;
                                            $editar = 0;
                                            $iE = 3;
                                            $idUMP = 0;
                                            $permisos = infoPermisosPerfilUsuario($idU, $idMenu);
                                            if ($permisos->next_record()) {
                                                $idUMP = $permisos->f('id');
                                                $ver = $permisos->f('ver');
                                                $crear = $permisos->f('crear');
                                                $editar = $permisos->f('editar');
                                            }
                                            ?>

                                            <tr>
                                                <td class="text-center"><a href="#"><?= $menuN ?></a></td>
                                                <td class="text-center">
                                                    <label class="switch switch-danger">
                                                        <input type="hidden" name="menu<?= $idMenu ?>" id="menu<?= $idMenu ?>" value="<?= $idMenu ?>">
                                                        <input type="hidden" name="ver<?= $idMenu ?>" id="ver<?= $idMenu ?>" value="<?= $ver ?>">
                                                        <input type="checkbox" name="ver" id="ver" onclick="javascript:cambiarPermiso(<?= $idUMP ?>,<?= $idU ?>,<?= $idMenu ?>,<?= $profile ?>,<?=$iV ?>)" <?php if ($ver == 1) echo "checked" ?>><span></span>
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <label class="switch switch-danger">
                                                        <input type="hidden" name="menu<?= $idMenu ?>" id="menu<?= $idMenu ?>" value="<?= $idMenu ?>">
                                                        <input type="hidden" name="crear<?= $idMenu ?>" id="crear<?= $idMenu ?>" value="<?= $crear ?>">
                                                        <input type="checkbox" name="crear" id="crear" onclick="javascript:cambiarPermiso(<?= $idUMP ?>,<?= $idU ?>,<?= $idMenu ?>,<?= $profile ?>,<?=$iC ?>)" <?php if ($crear == 1) echo "checked" ?>><span></span>
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <label class="switch switch-danger">
                                                        <input type="hidden" name="menu<?= $idMenu ?>" id="menu<?= $idMenu ?>" value="<?= $idMenu ?>">
                                                        <input type="hidden" name="editar<?= $idMenu ?>" id="editar<?= $idMenu ?>" value="<?= $editar ?>">
                                                        <input type="checkbox" name="editar" id="editar" onclick="javascript:cambiarPermiso(<?= $idUMP ?>,<?= $idU ?>,<?= $idMenu ?>,<?= $profile ?>,<?=$iE ?>)" <?php if ($editar == 1) echo "checked" ?>><span></span>
                                                    </label>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                        <div class="form-group form-actions">
                            <div class="col-xs-12 text-right">
                                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cerrar</button>
                                <div class="controls" id="validarInfoE" style="display: none;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
}
    