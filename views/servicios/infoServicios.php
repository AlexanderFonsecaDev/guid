<?php
?>
<div class="block-section">
        <div class="row">

            <div class="col-md text-center">
                <div class="btn-group">
                    <a href="javascript:cargarModalAgregarPais(0)" data-toggle="tooltip" title="Nuevo Pa&iacute;s" class="btn btn-lg btn-success"><i class="fa fa-plus"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="block full">
        <div class="block-title">
            <h2><strong>Lista</strong> Servicios </h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Servicio</th>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">ACCI&Oacute;N</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $reg = listarPaises();

                    while ($reg->next_record()) {
                        $idPais = $reg->f('pais_id');
                        $pais = $reg->f('pais');
                        $cantDepartamentos = contarDepartamentos($idPais);
                        $cantCiudades = contarCiudades($idPais);
                        ?>

                        <tr>
                            <td class="text-center"><strong><?= $pais; ?></strong></td>
                            <td class="text-center"><strong><a href="javascript:deptos(<?= $idPais; ?>)" style="color:red"><?= $cantDepartamentos; ?></a></strong></td>
                            <td class="text-center"><strong><a style="color:blueviolet"><?= $cantCiudades; ?></a></strong></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="javascript:cargarModalAgregarPais(<?= $idPais; ?>)" data-toggle="tooltip" title="Editar Info <?= $pais ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:cargarModalAgregarDepto(<?= $idPais; ?>,0,0)" data-toggle="tooltip" title="Nuevo Departamento en <?= $pais ?>" class="btn btn-sm btn-success"><i class="fa fa-newspaper-o"></i></a>
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