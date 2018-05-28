<?php
require_once '../controller/zonas/zonas.php';
$pag = "";
$idPais = "";
$idDepto = "";
if (isset($_POST['pagina'])) {
    if ($_POST['pagina'] == 'ListaDepto') {
        $pag = $_POST['pagina'];
        $idPais = $_POST['idPais'];
    } else if ($_POST['pagina'] == 'ListaCiudad') {
        $pag = $_POST['pagina'];
        $idPais = $_POST['idPais'];
        $idDepto = $_POST['idDepto'];
    }
}

if ($pag == "") {
    ?>

    <div class="block-section">
        <div class="row">

            <div class="col-md text-center">
                <div class="btn-group">
                    <a href="javascript:cargarModalAgregarPais(0)" data-toggle="tooltip" title="Nuevo Pa&iacute;s" class="btn btn-lg btn-success"><i class="fa fa-plus"></i></a>
                    <a href="javascript:downloadPDF_ZonasGeneral()" data-toggle="tooltip" title="Descargar PDF Info General" class="btn btn-lg btn-danger"><i class="fi fi-pdf"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="block full">
        <div class="block-title">
            <h2><strong>Lista</strong> Pa&iacute;ses </h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Pa&iacute;s</th>
                        <th class="text-center">Departamentos</th>
                        <th class="text-center">Ciudades</th>
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
    
    <?php
} else if ($pag == "ListaDepto") {
    $reg = infoPais($idPais);
    $reg->next_record();
    $pais = $reg->f('pais');
    ?>

    <div class="block-section">
        <div class="row">

            <div class="col-md text-center">
                <div class="btn-group">
                    <a href="javascript:volver()" data-toggle="tooltip" title="Volver" class="btn btn-lg btn-primary"><i class="fa fa-backward"></i></a>
                </div>
                <div class="btn-group">
                    <a href="javascript:cargarModalAgregarDepto(<?= $idPais; ?>,0,0)" data-toggle="tooltip" title="Nuevo Departamento en <?= $pais ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="block full">
        <div class="block-title">
            <h2><strong>Lista</strong> Departamentos - Pa&iacute;s: <strong><?= $pais ?></strong></h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Departamentos</th>
                        <th class="text-center">Ciudades</th>
                        <th class="text-center">ACCI&Oacute;N</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $regD = listarDeptos($idPais);

                    while ($regD->next_record()) {
                        $idDepto = $regD->f('depto_id');
                        $depto = $regD->f('departamento');
                        $cantCiudades = contarCiudadesDepto($idDepto);
                        ?>

                        <tr>
                            <td class="text-center"><strong><?= $depto; ?></strong></td>
                            <td class="text-center"><strong><a href="javascript:ciudades(<?= $idPais; ?>,<?= $idDepto ?>)" style="color:blueviolet"><?= $cantCiudades; ?></a></strong></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="javascript:cargarModalAgregarDepto(<?= $idPais; ?>,<?= $idDepto; ?>,1)" data-toggle="tooltip" title="Editar Info <?= $depto ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:cargarModalAgregarCiudad(<?= $idPais; ?>,<?= $idDepto ?>,0,0)" data-toggle="tooltip" title="Nueva Ciudad en <?= $regD->f('departamento') ?> - <?= $pais ?>" class="btn btn-sm btn-success"><i class="fa fa-newspaper-o"></i></a>
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
} else if ($pag == "ListaCiudad") {
    $reg = infoPais($idPais);
    $reg->next_record();
    $pais = $reg->f('pais');

    $reg2 = infoDepto($idDepto);
    $reg2->next_record();
    $departamento = $reg2->f('departamento');
    ?>

    <div class="block-section">
        <div class="row">

            <div class="col-md text-center">
                <div class="btn-group">
                    <a href="javascript:volver2(<?= $idPais ?>)" data-toggle="tooltip" title="Volver" class="btn btn-lg btn-primary"><i class="fa fa-backward"></i></a>
                </div>
                <div class="btn-group">
                    <a href="javascript:cargarModalAgregarCiudad(<?= $idPais; ?>,<?= $idDepto ?>,0,0)" data-toggle="tooltip" title="Nueva Ciudad en <?= $departamento ?> - <?= $pais ?>" class="btn btn-lg btn-success"><i class="fa fa-plus"></i></a>
                </div>
            </div>

        </div>
    </div>

    <div class="block full">
        <div class="block-title">
            <h2><strong>Lista</strong> Ciudades</h2>
            <h2>Departamento: <strong><?= $departamento ?> </strong>- Pa&iacute;s: <strong> <?= $pais ?></strong></h2>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"><strong>Ciudades</strong></th>
                        <th class="text-center">Departamento</th>
                        <th class="text-center">ACCI&Oacute;N</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $regC = listarCiudades($idPais, $idDepto);

                    while ($regC->next_record()) {
                        $idCiud = $regC->f('ciud_id');
                        $ciudad = $regC->f('ciudad');
                        ?>

                        <tr>
                            <td class="text-center"><strong><?= $ciudad; ?></strong></td>
                            <td class="text-center"><?= $departamento; ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="javascript:cargarModalAgregarCiudad(<?= $idPais; ?>,<?= $idDepto; ?>,<?= $idCiud ?>,1)" data-toggle="tooltip" title="Editar <?= $ciudad ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
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
}
?>
<form name="dirPagina" action="zonas.php" method="post">
    <input type="hidden" name="idPais" value="">
    <input type="hidden" name="idDepto" value="">
    <input type="hidden" name="pagina" value="">
</form>