<div class="block full">
    <div class="block-title">
        <h2><strong>Lista</strong> Clubs Preinscritos </h2>
    </div>
    <div class="table-responsive">
        <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Club</th>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Ciudad</th>
                    <th class="text-center">Departamento</th>
                    <th class="text-center">Pa&iacute;s</th>
                    <th class="text-center">Ver Info</th>
                    <th class="text-center">Ver PDF</th>
                    <th class="text-center">Aprobaci&oacute;n</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $reg = listarPreInscritos();

                while ($reg->next_record()) {
                    $id = $reg->f('pre_id');
                    $club = $reg->f('club');
                    $nombre = $reg->f('nombre1') . " " . $reg->f('nombre2');
                    $apellido = $reg->f('apellido1') . " " . $reg->f('apellido2');
                    $idCiudad = $reg->f('ciudad');
                    $pdf = $reg->f('pdf');
                    $reg2 = infoZona($idCiudad);
                    $reg2->next_record();
                    $ciudad = $reg2->f('ciudad');
                    $departamento = $reg2->f('departamento');
                    $pais = $reg2->f('pais');
                    ?>

                    <tr>
                        <td class="text-center"><strong><?= $club; ?></strong></td>
                        <td class="text-center"><strong><?= $nombre; ?></strong></td>
                        <td class="text-center"><strong><?= $apellido; ?></strong></td>
                        <td class="text-center"><strong><?= $ciudad; ?></strong></td>
                        <td class="text-center"><?= $departamento; ?></td>
                        <td class="text-center"><?= $pais; ?></td>
                        <td class="text-center">
                            <strong>
                                <a href="javascript:cargarModalInfo(<?= $id; ?>)" data-toggle="tooltip" title="Ver Informaci&oacute;n" class="btn btn-sm btn-success"><i class="fa fa-list-alt"></i></a>
                            </strong>
                        </td>
                        <td class="text-center"><strong><a href="<?= $pdf ?>" target="_black" data-toggle="tooltip" title="Ver PDF" class="btn btn-alt btn-sm btn-warning" ><i class="fi fi-pdf"></i></a></strong></td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button"  onClick="aprobar(<?= $id ?>, 1)" class="btn btn-sm btn-success"><strong>APROBAR</strong></button>
                                <button type="button"  onClick="aprobar(<?= $id ?>, 2)" class="btn btn-sm btn-danger"><strong>RECHAZAR</strong></button>
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