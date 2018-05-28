<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../controller/start.php';
require_once '../controller/DB_server.php';
require_once '../controller/customs/comunes.php';


/* Establecemos que las paginas no pueden ser cacheadas */
header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-type: text/html; charset=utf-8');
require_once '../elements/head.php';
?>
<html>
<body>
<div id="page-wrapper">


    <!-- Page content -->
    <div id="page-content">
        <!-- Blank Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="gi gi-registration_mark"></i>PREINSCRIPCI&Oacute;N<br>
                    <small>M&Oacute;DULOS DE PREINSCRIPCI&Oacute;N CLUBES DEPORTIVOS</small>
                </h1>
            </div>
        </div>
        <!-- END Blank Header -->


        <div class="row">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered"
                  onsubmit="return false;" id="elformulario">
                <div class="col-md-12">
                    <div class="block" id="usuario">
                        <div class="block-title">
                            <h2>Representante / dueño del <strong>Club</strong></h2>
                        </div>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Primer Nombre <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input type="text" id="pNom" name="pNom" onkeypress="return soloLetras(event)"
                                           maxlength="20" class="form-control" onpaste="return false" autocomplete="off"
                                           placeholder="Primer Nombre">
                                    <div id="valpNom"></div>
                                </div>
                                <label class="col-md-2 control-label">Segundo Nombre </label>
                                <div class="col-md-4">
                                    <input type="text" id="sNom" name="sNom" onkeypress="return soloLetras(event)"
                                           maxlength="20" class="form-control" onpaste="return false" autocomplete="off"
                                           placeholder="Segundo Nombre">
                                </div>

                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Primer Apellido <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input type="text" id="pApel" name="pApel" onkeypress="return soloLetras(event)"
                                           maxlength="20" class="form-control" onpaste="return false" autocomplete="off"
                                           placeholder="Primer Apellido">
                                    <div id="valpApel"></div>
                                </div>
                                <label class="col-md-2 control-label">Segundo Apellido <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input type="text" id="sApel" name="sApel" onkeypress="return soloLetras(event)"
                                           maxlength="20" class="form-control" onpaste="return false" autocomplete="off"
                                           placeholder="Segundo Apellido">
                                    <div id="valsApel"></div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tipo de Identificaci&oacute;n <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <select id="tipu" name="tipu" class="form-control" style="width: 100%;">
                                        <option value="1">C&Eacute;DULA</option>
                                    </select>
                                    <div id="valTipu"></div>
                                </div>
                                <label class="col-md-2 control-label">N&uacute;mero <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input type="number" id="ced" name="ced" class="form-control"
                                           onkeypress="return justNumbers(event)" value="" maxlength="20"
                                           onpaste="return false" autocomplete="off" placeholder="N&uacute;mero">
                                    <div id="valCed"></div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Email <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input type="email" id="mail1" name="mail" class="form-control" maxlength="50"
                                           onpaste="return false" autocomplete="off" placeholder="Email">
                                    <div id="valMail"></div>
                                </div>
                                <label class="col-md-2 control-label">Confirme su email <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input type="email" id="mail2" name="mail2" class="form-control" maxlength="50"
                                           onpaste="return false" autocomplete="off" placeholder="Confirme email">
                                    <div id="valMail2"></div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Tel&eacute;fono </label>
                                <div class="col-md-4">
                                    <input type="number" id="tel" name="tel" class="form-control" maxlength="15"
                                           onkeypress="return justNumbers(event)" value="" maxlength="30"
                                           onpaste="return false" autocomplete="off"
                                           placeholder="N&uacute;mero de tel&eacute;fono">

                                </div>
                                <label class="col-md-2 control-label">Celular <span class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input type="number" id="cel" name="cel" class="form-control" maxlength="15"
                                           onkeypress="return justNumbers(event)" value="" maxlength="30"
                                           onpaste="return false" autocomplete="off"
                                           placeholder="N&uacute;mero de celular">
                                    <div id="valCel"></div>
                                </div>
                            </div>
                        </fieldset>
                        <div id="botones" class="form-group form-actions">
                            <div class="col-md-12 col-md-offset-6">
                                <button type="submit" onclick="validar()" class="btn btn-sm btn-success"><i
                                            class="fa fa-angle-right"></i> Siguiente
                                </button>
                                <button type="reset" onclick="limpia1()" class="btn btn-sm btn-warning"><i
                                            class="fa fa-repeat"></i> Limpiar
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="block" id="club" style="display:none">
                        <div class="block-title">
                            <h2>Datos del <strong>Club</strong></h2>
                        </div>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-1 control-label">Deporte <span class="text-danger">*</span></label>
                                <div class="col-md-3">
                                    <select id="dep" name="dep" class="form-control" style="width: 100%;">
                                        <option value="">Selecciona un Deporte</option>
                                        <?php
                                        $sql = deportes();
                                        While ($sql->next_record()) {
                                            ?>
                                            <option value="<?= $sql->f('id_dep') ?>"><?= $sql->f('deporte') ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                    <div id="valDep"></div>
                                </div>
                                <label class="col-md-1 control-label">Nombre del Club <span class="text-danger">*</span></label>
                                <div class="col-md-3">
                                    <input type="text" id="nomC" name="nomC" class="form-control" value=""
                                           maxlength="200" onpaste="return false" autocomplete="off" placeholder="Club">
                                    <div id="valNomC"></div>
                                </div>
                                <label class="col-md-1 control-label"># Registro Club <span class="text-danger">*</span></label>
                                <div class="col-md-3">
                                    <input type="text" id="nitC" name="nitC" class="form-control" value=""
                                           maxlength="30" onpaste="return false" autocomplete="off"
                                           placeholder="N&uacute;mero de registro del club">
                                    <div id="valNit"></div>
                                </div>

                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-1 control-label">Pa&iacute;s <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-3">
                                    <select id="pais" name="pais" onChange="showState();" class="form-control"
                                            style="width: 100%;">
                                        <option value="">Selecciona un Pa&iacute;s</option>
                                        <?php
                                        $sql = pais();
                                        While ($sql->next_record()) {
                                            ?>
                                            <option value="<?= $sql->f('pais_id') ?>"><?= $sql->f('pais') ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <div id="valPais"></div>
                                </div>
                                <div id="divDepto" style="display:none">
                                    <label class="col-md-1 control-label">Departamento <span
                                                class="text-danger">*</span></label>
                                    <div class="col-md-3">
                                        <select id="depto" name="depto" onChange="showCity();" class="form-control"
                                                style="width: 100%;">
                                            <option value="">Selecciona un Departamento</option>
                                        </select>
                                        <div id="valDepto"></div>
                                    </div>
                                </div>
                                <div id="divCiudad" style="display:none">
                                    <label class="col-md-1 control-label">Ciudad <span
                                                class="text-danger">*</span></label>
                                    <div class="col-md-3">
                                        <select id="ciud" name="ciud" class="form-control" style="width: 100%;">
                                            <option value="">Selecciona una Ciudad</option>
                                        </select>
                                        <div id="valCiu"></div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Email Club <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input type="email" id="mail1C" name="mailC" class="form-control"
                                           onpaste="return false" autocomplete="off" placeholder="Email Club">
                                    <div id="valMailC1"></div>
                                </div>
                                <label class="col-md-2 control-label">Confirme su email <span
                                            class="text-danger">*</span></label>
                                <div class="col-md-4">
                                    <input type="email" id="mail2C" name="mail2C" class="form-control"
                                           onpaste="return false" autocomplete="off" placeholder="Confirme email">
                                    <div id="valMailC2"></div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="example-file-input"> Cargar *.PDF Registro
                                    Club </label>
                                <div class="col-md-8">
                                    <input type="file" id="pdf" name="archivo" accept=".pdf">
                                    <div id="valFile"></div>
                                </div>
                            </div>
                        </fieldset>
                        <div id="botones" class="form-group form-actions">
                            <div class="col-md-12 col-md-offset-6">
                                <button onclick="validar2()" class="btn btn-sm btn-success"><i
                                            class="fa fa-angle-right"></i> Siguiente
                                </button>
                                <button
                                " onclick="limpia2()" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i>
                                Limpiar</button>
                                <button onclick="volver()" class="btn btn-sm btn-primary"><i class="fa fa-backward"></i>
                                    Volver
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="block" id="dataFull" style="display:none">
                        <div class="block-title">
                            <h2>Leer atentamente <strong> informaci&oacute;n</strong></h2>
                        </div>
                        <div class="block full block-alt-noborder">
                            <h3 class="sub-header text-center"><strong>Terminos y Condiciones</strong> para el pre
                                registro.</h3>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2">
                                    <article>
                                        <p>
                                            CLAUSULAS DE USO DE PORTAL WWW.SPORTSPAGE.COM.CO (WEB – MOVIL – APLICACIONES
                                            (ANDROID E IOS) – TERMINOS Y CONDICIONES.

                                        </p>
                                        <p>DEFINICIÓN:

                                            Conforme lo establece la ley 527 de 1.999, para todos los efectos ha de
                                            entenderse por SISTEMA DE INFORMACIÓN, todo sistema utilizado para generar,
                                            enviar, recibir, archivar o procesar de alguna otra forma mensajes de datos.
                                        </p>
                                        <p>
                                            OBJETO:

                                            SPORTSPAGE.COM.CO de propiedad de ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S.,
                                            pretende dar a los usuarios seguridad en cuanto al empleo de la información
                                            que aparece en la misma, así como la que se desee ingresar a la base de
                                            datos. De igual manera, facilitar a los usuarios el acceso a los datos en su
                                            portal web, móvil y/o aplicaciones (Android e IOS). La finalidad primordial
                                            de la página en cuestión, es poner en conocimiento de los interesados, los
                                            clubes y escuelas deportivas existentes en el país, sin importar las
                                            disciplina deportiva a que se dedique, ofrecer una herramienta web que les
                                            permita controlar sus afiliados, los pagos de matrículas y mensualidades y
                                            la valoraciones estándares de deportista, ofrecer los servicios de asesoría
                                            y demás en temas deportivos, venta on line de productos, venta de publicidad
                                            y promoción de deportistas, así como la promoción y divulgación de
                                            contenidos comerciales a través de las plataformas o bases de datos
                                            generadas a través de ellas. SPORTSPAGE.COM.CO, actúa como portal web, móvil
                                            y aplicaciones (Android e IOS) de información o publicidad, no generándose
                                            por ello, oferta comercial o contractual entre SPORTSPAGE.COM.CO y el
                                            usuario. En el caso de las ventas on line, el usuario, contratará únicamente
                                            con las empresas o personas naturales enlazadas, sin que exista relación
                                            contractual o de intermediación por parte de ESCUELAS Y CLUBES
                                            DEPORTIVOS.COM S.A.S.. En todo caso, siempre que el usuario pulse un enlace
                                            se entenderá que utiliza el portal web, móvil y aplicaciones (Android e IOS)
                                            de la empresa enlazada, dejando de utilizar el portal web, móvil y/o
                                            aplicaciones (Android e IOS) de SPORTSPAGE.COM.CO, no podrá el usuario
                                            alegar, confusión respecto de la marca o empresa con la cual el usuario ha
                                            contratado finalmente. La contratación siempre será entre el usuario y la
                                            empresa enlazada.

                                            Al aceptar los términos y condiciones el usuario acepta que ESCUELAS Y
                                            CLUBES DEPORTIVOS.COM S.A.S. le envíe a sus datos de contacto información
                                            sobre otros productos o servicios relacionados con su actividad dentro del
                                            portal SPORTSPAGE.COM.CO.
                                        </p>
                                        <p>
                                            1. DERECHOS Y OBLIGACIONES:

                                            Por parte de SPORTSPAGE.COM.CO

                                            Son obligaciones asumidas por el propietario del portal web-móvil y
                                            aplicaciones (Android e IOS), en su calidad de proveedor:

                                            a) Prestar los servicios suscritos, respondiendo por las reclamaciones que
                                            por deficiencia en el servicio realicen los clientes.

                                            b) Garantizar el secreto de las comunicaciones, reservándose el derecho a
                                            rectificación de informaciones falsas, ilícitas, o que contravengan la moral
                                            y las buenas costumbres.

                                            c) Respetar el derecho a la intimidad y privacidad del usuario.

                                            d) Adecuar continuamente su portal web- móvil y aplicaciones (Android e
                                            IOS), con miras a prestar un eficiente servicio, sin embargo, podrá en
                                            cualquier momento y sin previo aviso, suspender temporalmente la
                                            accesibilidad al portal web – móvil y aplicaciones (Android e IOS), para
                                            efectos de mantenimiento, reparación, actualización o mejora de los
                                            servicios, o modificaciones necesarias para el buen cumplimiento de sus
                                            obligaciones.

                                            e) SPORTSPAGE.COM.CO, no alojará material pornográfico.

                                            f) Responder por los servicios propios e información originada directamente
                                            por la misma, además por el uso de marcas, emblemas, nombres o ensenas
                                            comerciales, que sean de su propiedad exclusiva.

                                            g) Velar por que la información que provenga del cliente catalogada como
                                            estrictamente personal, sea guardada por la empresa con absoluta
                                            confidencialidad, garantizando los derechos de acceso, rectificación y
                                            cancelación de los datos personales a instancias del interesado y bajo sus
                                            directas instrucciones.

                                            h) Velar porque los contenidos del portal web- móvil y aplicaciones (Android
                                            e IOS), no tengan carácter pornográfico, xenófobo, discriminatorio, racista,
                                            difamatorio o que de cualquier modo fomenten la violencia.

                                            i) Procurar por un uso legal del portal web – móvil y aplicaciones (Android
                                            e IOS), evitando cualquier clase de actuaciones que resulten claramente
                                            violatorios de los derechos de los usuarios.
                                        </p>
                                        <p>
                                            Por parte del CLIENTE O USUARIO:

                                            Son obligaciones asumidas por el usuario al utilizar el portal web:

                                            a) Realizar un uso lícito de los servicios absteniéndose de efectuar
                                            acciones que provoquen daño o alteración en los contenidos y los datos de
                                            otros usuarios y/o de terceras personas, bajo pena de ser excluido del
                                            acceso a la misma.

                                            b) No incluir contenidos pornográficos.
                                            c) Pretender que sea publicada información falsa o caduca, que contravengan
                                            derechos tan fundamentales, como la integridad, la moral, el honor, o la
                                            intimidad personal. Así como aquellos que contengan información o mensajes
                                            violentos, degradantes o racistas.

                                            d) Abstenerse de introducir virus informáticos que puedan afectar al portal
                                            web – móvil y aplicaciones (Android e IOS) de SPORTSPAGE.COM.CO, o que
                                            puedan dañar e-mails de terceros cuya información se haya obtenido a través
                                            de un aviso publicado por ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S.

                                            e) Garantizar que ninguna de las piezas, imágenes, textos, fotos, videos
                                            publicados en WWW.SPORTSPAGE.COM.CO en su portal web-móvil y aplicaciones
                                            (Android e IOS), afecta derechos de terceros, así sean trabajadores o
                                            contratistas del mismo cliente. Asimismo, EL CLIENTE garantiza que la
                                            información, las piezas, fotos, videos a publicar no constituyen publicidad
                                            engañosa o actos de competencia desleal. En cualquier caso, EL CLIENTE
                                            mantendrá indemne a ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S. ante cualquier
                                            reclamo por usos no autorizados de materiales como obras, programas de
                                            computador, marcas o ante el reclamo de consumidores o competidores
                                            afectados por la calidad objetiva, la veracidad, la actualidad o la
                                            idoneidad de los contenidos publicados.

                                            f) Asumir las consecuencias legales a que den lugar sus publicaciones en
                                            WWW.SPORTSPAGE.COM.CO (en su portal web-móvil y/o aplicaciones Android e
                                            IOS), generando de esta forma publicidad engañosa al consumidor final;
                                            constituyéndose en el responsable directo por las reclamaciones y/o demandas
                                            relacionadas y garantizando mantener indemne a ESCUELAS Y CLUBES
                                            DEPORTIVOS.COM S.A.S. ante las mismas.

                                            g) EL CLIENTE reconoce su deber de informarse sobre cada uno de los
                                            productos y/o servicios que adquiere a través de los portales y/o
                                            plataformas de ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S.; motivo por el cual
                                            deberá considerar en detalle las descripciones, publicidad, condiciones
                                            aplicables a cada servicio y/o producto.
                                            h) En el caso de difundir imágenes o videos, en donde se observe el uso de
                                            menores de edad, éstas deben estar autorizadas por su representante legal.
                                            Sin embargo, ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S., se reserva el derecho
                                            de publicarlas, si considera que va en contra de lo establecido en la ley.

                                            h) Conocer y cumplir las políticas de publicación que le sean aplicables de
                                            acuerdo a estos mismos términos y condiciones.

                                            El incumplimiento de las obligaciones por parte del CLIENTE dará lugar a la
                                            no prestación del servicio de forma justificada por parte de ESCUELAS Y
                                            CLUBES DEPORTIVOS.COM S.A.S.. Quien mantendrá en todo momento la facultad de
                                            resolver el contrato y exigir las indemnizaciones correspondientes o forzar
                                            el cumplimiento del mismo.
                                        </p>
                                        <p>
                                            2. DERECHOS DE LAS PARTES:

                                            Por parte de SPORTSPAGE.COM.CO:

                                            SPORTSPAGE.COM.CO, se reserva el derecho de excluir a los usuarios que
                                            contravengan con su conducta las obligaciones antes establecidas, así como
                                            cancelar la suscripción o servicios, en este caso, podrá proceder
                                            inmediatamente, sin que haya lugar a requerimiento o notificación alguna al
                                            usuario infractor.

                                            SPORTSPAGE.COM.CO, podrá enviar al usuario del portal web – móvil y
                                            aplicaciones (Android e IOS), información publicitaria que sea propia o de
                                            terceros, sin que ello constituya en modo alguno violación de la privacidad,
                                            o que pueda ser entendido como contratación entre las partes.

                                            Por parte del USUARIO o CLIENTE:
                                            El Usuario o Cliente tendrá derecho a la guarda de su intimidad e
                                            integridad, además de los derechos personales derivados del tratamiento
                                            legal y constitucional vigente.

                                            El derecho de retracto está regulado por la ley de consumo vigente en
                                            Colombia en cuanto a sus efectos y plazos. No obstante lo anterior, el
                                            ejercicio de tal derecho conlleva necesariamente la consideración de los
                                            gastos administrativos, financieros, comerciales o de cualquier tipo en los
                                            que efectiva y justificadamente haya incurrido ESCUELAS Y CLUBES
                                            DEPORTIVOS.COM S.A.S. durante la relación comercial; los cuales serán
                                            tenidos en cuenta al momento de realizar la liquidación correspondiente.
                                        </p>
                                        <p>
                                            3. PROTECCION DE LA PROPIEDAD INTELECTUAL

                                            Se entiende por las dos partes comprometidas, SPORTSPAGE.COM.CO y el
                                            cliente, que el diseño, imágenes, marcas, bases de datos, gráficos, frames,
                                            banners, software, distintos códigos, fuente, objeto, y en general los demás
                                            elementos integradores del portal web – móvil y aplicaciones (Android e
                                            IOS), son de propiedad legítima de SPORTSPAGE.COM.CO y/o de ESCUELAS Y
                                            CLUBES DEPORTIVOS.COM S.A.S., quien posee legalmente los derechos exclusivos
                                            para la explotación y uso de los mismos. Por lo anterior, el usuario que
                                            acceda al portal web – móvil y aplicaciones (Android e IOS), no podrá
                                            imitarlos, asimilarlos, transformarlos, registrarlos en ningún lugar o ante
                                            cualquier entidad, no podrá tampoco, reproducirlos, distribuirlos,
                                            transmitirlos, publicitarlos, licenciarlos, cederlos o ejercer derechos de
                                            titularidad, directamente o por intermedio de terceros, crear nuevos
                                            productos o servicios derivados de la información y elementos contenidos en
                                            la página. Lo anterior también aplicará, para diseños, marcas, gráficos,
                                            imágenes, que aparezcan en el portal web, perteneciente a empresas,
                                            entidades o personas naturales colaboradoras o contratantes con ESCUELAS Y
                                            CLUBES DEPORTIVOS.COM S.A.S., salvo el consentimiento expreso de las mismas,
                                            el que en todo caso deberá constar por escrito.

                                            Los derechos de propiedad intelectual sobre los website:
                                            WWW.SPORTSPAGE.COM.CO, son de titularidad exclusiva de ESCUELAS Y CLUBES
                                            DEPORTIVOS.COM S.A.S. Por tanto solo ella podrá ejercer los derechos de
                                            reproducción, distribución, comunicación, transformación y cesión.
                                        </p>
                                        <p>
                                            4. PRODUCTOS Y SERVICIOS DE TERCERAS PERSONAS:

                                            El usuario acepta que al pulsar en los enlaces (links), que lo conecten a
                                            webs de terceras empresas o personas naturales, deja de navegar
                                            enWWW.SPORTSPAGE.COM.CO, exonerando a la misma de cualquier responsabilidad,
                                            daño o perjuicio en la contratación con las terceras empresas. El usuario
                                            deja de navegar en SPORTSPAGE.COM.CO, cuando en el portal web – móvil y
                                            aplicaciones (Android e IOS) enlazada no aparezca la marca SPORTSPAGE,
                                            cualquiera de sus marcas, o el nombre comercial ESCUELAS Y CLUBES
                                            DEPORTIVOS.COM S.A.S. y la dirección o nombre de dominio no tenga incluida
                                            la palabra SPORTSPAGE.
                                        </p>
                                        <p>
                                            5. RESPONSABILIDAD DE SPORTSPAGE.COM.CO

                                            Tanto el portal web de internet como su contenido son de propiedad de
                                            SPORTSPAGE, cuya función principal es la de ser un medio o canal de
                                            información, de forma que no se otorga garantía alguna, expresa, parcial,
                                            total o implícita, sobre la precisión, exactitud, confiabilidad u
                                            oportunidad de la información o del material allí incluido. No existe
                                            tampoco respecto de la información que en el portal web – móvil y
                                            aplicaciones (Android e IOS) se encuentra, recomendación, asesoría o consejo
                                            al usuario, por tanto las decisiones que se relacionen con dicha información
                                            o publicidad, serán de cuenta y riesgo exclusivo del usuario.
                                        </p>
                                        <p>
                                            6. PROTECCIÓN DE DATOS PERSONALES

                                            El sitio WWW.SPORTSPAGE.COM.CO es propiedad de ESCUELAS Y CLUBES
                                            DEPORTIVOS.COM S.A.S.., empresa identificada con NIT: ____________, con
                                            domicilio en la _________________________. Esta política de privacidad es
                                            parte integrante de los Términos y Condiciones de WWW.SPORTSPAGE.COM.CO, y
                                            está vigente desde 1 de enero de 2018.
                                        </p>
                                        <p>
                                            6.1. DATOS DE CARÁCTER PERSONAL

                                            WWW.SPORTSPAGE.COM.CO recabará los datos de carácter personal de los
                                            usuarios de los sitios que conforman WWW.SPORTSPAGE.COM.CO. Incluidos las
                                            aplicaciones Android e IOS.
                                            Para efectos de la política de privacidad se entenderán como datos de
                                            carácter personal todos los datos suministrados por los usuarios a
                                            WWW.SPORTSPAGE.COM.CO al momento de registrarse como usuarios de los sitios,
                                            o al consultar los mismos; entre ellos, pero sin limitarse a los mismos:
                                            nombres y apellidos, razón social, seudónimos, nombres de usuario, tipo y
                                            número de identificación, teléfonos, domicilio, direcciones de
                                            correspondencia, correos electrónicos, sitios web, blogs, contraseñas
                                            utilizadas en WWW.SPORTSPAGE.COM.CO, direcciones IP, datos bancarios como
                                            números de cuentas, tarjetas débito o crédito, etc.

                                            Todos los datos de carácter personal recabados por WWW.SPORTSPAGE.COM.CO
                                            constituyen información relevante para el funcionamiento del sitio y la
                                            relación entre WWW.SPORTSPAGE.COM.CO y sus usuarios. WWW.SPORTSPAGE.COM.CO
                                            no recabará datos sensibles o de menores de edad.
                                        </p>
                                        <p>
                                            6.2. FIN DE LA RECOLECCIÓN DE DATOS

                                            WWW.SPORTSPAGE.COM.CO únicamente recabará los datos de carácter personal que
                                            sean estrictamente necesarios para el correcto y fluido funcionamiento de
                                            los sitios en donde el usuario se registre, de forma que pueda recibir la
                                            información comercial y/o publicitaria relacionada en el portal. El registro
                                            de cada usuario y en consecuencia, la entrega de datos de carácter personal
                                            es absolutamente voluntaria. El usuario asegura y se compromete a entregar
                                            información veraz, actualizada, precisa y comprobable a
                                            WWW.SPORTSPAGE.COM.CO, siendo obligación del usuario mantener la información
                                            entregada con esas características y condiciones. Ante el incumplimiento de
                                            esta obligación el usuario mantendrá indemne a WWW.SPORTSPAGE.COM.CO por el
                                            uso que se haga de información falsa, inexacta o desactualizada, por parte
                                            de WWW.SPORTSPAGE.COM.CO o los terceros autorizados por el usuario.

                                            Los datos personales de los usuarios serán recabados por
                                            WWW.SPORTSPAGE.COM.CO, con fines de funcionamiento del mismo sitio
                                            WWW.SPORTSPAGE.COM.CO, tales como: el registro y validación de usuarios;
                                            permitir el acceso y salida de los usuarios de sus cuentas; administrar las
                                            cuentas de los usuarios; facturación; permitir la consulta de la información
                                            alojada en WWW.SPORTSPAGE.COM.CO; permitir pautar piezas o información
                                            publicitaria; permitir la reproducción y comunicación pública de información
                                            y obras; enviar información comercial relacionada con el portal, etc.
                                            Igualmente, los datos recabados por WWW.SPORTSPAGE.COM.CO tendrá como objeto
                                            la vinculación entre clientes y la información que voluntariamente cada uno
                                            haya entregado o ingresado en las plataformas de WWW.SPORTSPAGE.COM.CO. Los
                                            clientes vinculados podrán ser personas naturales o jurídicas, civiles o
                                            comerciales, de acuerdo a los servicios utilizados por cada cliente y que
                                            son ofrecidos por WWW.SPORTSPAGE.COM.CO.

                                            Los usuarios que consulten en el portal web, móvil y/o aplicaciones (Android
                                            e IOS) y registren sus datos personales, podrán recibir en su correo
                                            electrónico, dirección de correspondencia, o teléfono móvil actualizaciones
                                            o información comercial relacionada con WWW.SPORTSPAGE.COM.CO (provenientes
                                            de ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S.., sus empresas filiales o
                                            matrices o terceros con quienes ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S..
                                            haya suscrito acuerdos de difusión comercial); concretamente, anuncios de
                                            productos o servicios caracterizados para cada cliente, promociones,
                                            activaciones, ofertas, lanzamientos, novedades y/o alianzas comerciales.
                                            WWW.SPORTSPAGE.COM.CO utiliza en el funcionamiento de sus sitios cookies,
                                            aplicaciones y funcionalidades de distinto tipo para personalizar la
                                            experiencia de los usuarios, identificando sus preferencias y búsquedas. En
                                            algunos casos, estas aplicaciones se descargarán automáticamente en los
                                            dispositivos desde los que accedan los usuarios; quienes tendrán la libertad
                                            de borrarlas en cualquier momento.
                                        </p>
                                        <p>
                                            6.3. AUTORIZACIÓN GENERAL

                                            Los usuarios autorizan a WWW.SPORTSPAGE.COM.CO para recabar, administrar y
                                            utilizar sus datos personales de acuerdo a los fines y excepciones
                                            establecidos en la presente política de privacidad. Una vez recabados los
                                            datos personales, WWW.SPORTSPAGE.COM.CO queda autorizado para almacenarlos,
                                            es decir, mantener esos datos en sus servidores y sistemas, y para
                                            utilizarlos dentro del funcionamiento ordinario del sitio. Igualmente, se
                                            otorga una autorización a WWW.SPORTSPAGE.COM.CO para que en cumplimiento de
                                            los fines de funcionamiento del sitio y los servicios ofrecidos entregue la
                                            información de datos personales a terceros para su tratamiento, tales como
                                            prestadores de servicios de alojamiento, registro o conexión, entidades
                                            financieras, intermediarios bancarios, entidades o centrales administradoras
                                            de riesgo, con el fin de reportar cualquier obligación incumplida del
                                            usuario frente a WWW.SPORTSPAGE.COM.CO. De la misma forma, se otorga
                                            autorización a WWW.SPORTSPAGE.COM.CO para ceder los datos de carácter
                                            personal a terceras personas naturales o jurídicas, civiles o comerciales,
                                            quienes a su vez sean clientes de WWW.SPORTSPAGE.COM.CO. y con quienes se
                                            deba contactar con el fin de alcanzar los fines propios de los servicios de
                                            WWW.SPORTSPAGE.COM.CO, tales como, pero sin limitarse a ellos, el contacto
                                            entre comprador y vendedor, el contacto entre arrendador y arrendatario,
                                            contacto entre clientes e intermediaros comerciales interesados en ofrecer
                                            productos o servicios relacionados con la información entregada por cada
                                            cliente, tales como agencias o intermediarios inmobiliarios, entidades
                                            financieros o prestadores de servicios comerciales relacionados directamente
                                            con bienes inmuebles, el aviso clasificado o la información personal
                                            publicada. Igualmente, se otorga autorización para que WWW.SPORTSPAGE.COM.CO
                                            entregue los datos de carácter personal a las empresas que integran el mismo
                                            grupo económico, tales como matrices, filiales y/o sucursales de la primera.

                                            WWW.SPORTSPAGE.COM.CO ante la solicitud de una autoridad judicial o
                                            administrativa competente, entregará la información de carácter personal que
                                            le sea debidamente solicitada, realizando la correspondiente anotación en el
                                            registro donde se encuentra dicha información almacenada.
                                            Al aceptar los términos y condiciones de WWW.SPORTSPAGE.COM.CO, los usuarios
                                            están concediendo la autorización solicitada por la ley para recabar y
                                            utilizar sus datos de carácter personal de acuerdo a la presente política de
                                            privacidad. Quien no acepte los términos y condiciones, y en consecuencia la
                                            política de privacidad, de WWW.SPORTSPAGE.COM.CO no podrá registrarse como
                                            usuario. La presente política de privacidad constituye la copia de la
                                            autorización otorgada por los usuarios; así mismo, WWW.SPORTSPAGE.COM.CO
                                            guardará copia de las versiones anteriores de las políticas de privacidad.
                                            La vigencia de la autorización otorgada por el usuario a
                                            WWW.SPORTSPAGE.COM.CO se contará desde el momento de la aceptación de los
                                            términos y condiciones, hasta un plazo indefinido en el que el usuario
                                            continúe válidamente registrado como tal y hasta por el plazo máximo legal
                                            después de haber sido cancelado su registro en WWW.SPORTSPAGE.COM.CO,
                                            dependiendo de si trata de información positiva o información negativa.

                                            6.4. COOKIES

                                            El usuario y / o quienes ingresen al portal web - móvil y/o aplicaciones
                                            (Android e IOS) SPORTSPAGE.COM.CO han leído, conocen y aceptan que
                                            SPORTSPAGE.COM.CO podrá utilizar un sistema de seguimiento mediante la
                                            utilización de cookies (denominadas las “Cookies”). Las Cookies son pequeños
                                            archivos que automáticamente se instalan en el disco duro, con una duración
                                            limitada en el tiempo que ayudan a personalizar los servicios. También
                                            ofrecemos importantes funcionalidades que sólo están disponibles mediante el
                                            empleo de Cookies. Las Cookies se utilizan con el fin de conocer los
                                            intereses, el comportamiento y la demografía de quienes visitan nuestra
                                            portal Web – móvil y/o aplicaciones (Android e IOS) y de esa forma,
                                            comprender mejor sus necesidades e intereses y darles un mejor servicio o
                                            proveerle información relacionada. También usaremos la información obtenida
                                            por intermedio de las Cookies para analizar las páginas navegadas por el
                                            visitante o usuario, las búsquedas realizadas, mejorar nuestras iniciativas
                                            comerciales y promocionales, mostrar publicidad o promociones, banners de
                                            interés, noticias sobre SPORTSPAGE.COM.CO, perfeccionar nuestra oferta de
                                            contenidos y artículos, personalizar dichos contenidos, presentación y
                                            servicios; también podremos utilizar Cookies para promover y hacer cumplir
                                            las reglas y seguridad del sitio. SPORTSPAGE.COM.CO podrá agregar Cookies en
                                            los e-mails que envíe para medir la efectividad de las promociones.
                                        </p>
                                        <p>
                                            6.5. ACTUALIZACIÓN DE LOS DATOS

                                            Es obligación y responsabilidad de los usuarios mantener actualizada la
                                            información de carácter personal contenida y registrada en su cuenta de
                                            usuario en WWW.SPORTSPAGE.COM.CO. En virtud de dicha obligación los usuarios
                                            se comprometen a actualizar cada mes la información por ellos aportada a
                                            WWW.SPORTSPAGE.COM.CO, o cada que la información registrada presente
                                            cambios.
                                            Igualmente es responsabilidad de los usuarios mantener las condiciones de
                                            seguridad de su cuenta, registro, contraseña y datos bancarios en
                                            WWW.SPORTSPAGE.COM.CO.
                                            WWW.SPORTSPAGE.COM.CO no se responsabiliza por el uso indebido que el
                                            usuario haga de su contraseña, accediendo en lugares o sistemas inseguros, o
                                            permitiendo el acceso a la cuenta a terceros. Las contraseñas escogidas por
                                            los usuarios son personales e intransferibles; cada usuario se compromete a
                                            mantener la custodia secreta de tales contraseñas.
                                        </p>
                                        <p>
                                            6.6. INFORMACIÓN AL USUARIO

                                            WWW.SPORTSPAGE.COM.CO en cumplimiento de las leyes vigentes sobre protección
                                            de datos personales informa a los usuarios, en su condición de fuente de
                                            información que:
                                            La recopilación y eventual uso de la información de carácter personal, es
                                            consecuencia de la prestación de los servicios ofrecidos por
                                            WWW.SPORTSPAGE.COM.CO en su portal web – móvil y aplicaciones (Android e
                                            IOS), el registro de personas como usuarios del mismo, la consulta de los
                                            contenidos, el acceso a las cuentas de cada usurario, la posibilidad de
                                            administrar las mismas y realizar las actividades comerciales y
                                            publicitarias propias del portal. Así como para cumplir con la solicitud de
                                            información que haga cada usuario a ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S.,
                                            para el envío de datos de contacto, alertas y ampliación de información.

                                            El registro de cada usuario será identificado con la denominación de usuario
                                            designada por él mismo.

                                            Ante la información sobre pagos o montos de dinero a cancelar por parte de
                                            los usuarios ante WWW.SPORTSPAGE.COM.CO, los primeros actuarán siempre a
                                            nombre propio y como deudores principales.

                                            La fecha en que el usuario otorga la autorización antes mencionada a
                                            WWW.SPORTSPAGE.COM.CO sobre la recopilación y uso de la información de
                                            carácter personal, corresponderá al momento en que el usuario acepte los
                                            términos y condiciones del sitio y se registre como usuario.

                                            En la medida en que los datos de carácter personal suministrados por el
                                            titular son esenciales para la prestación de los servicios ofrecidos por
                                            WWW.SPORTSPAGE.COM.CO , la solicitud o mandato legal encaminado a eliminar
                                            los datos de la base de datos del encargado, constituye una justa causa para
                                            la no prestación de los servicios por parte de WWW.SPORTSPAGE.COM.CO.
                                        </p>
                                        <p>
                                            6.7. CONSULTAS Y PETICIONES

                                            Los usuarios podrán consultar su información de carácter personal almacenada
                                            por WWW.SPORTSPAGE.COM.CO en cualquier momento; para tal fin deberán enviar
                                            una comunicación a info@SPORTSPAGE.COM.CO. WWW.SPORTSPAGE.COM.CO responderá
                                            dicha solicitud en un plazo máximo de quince (15) días hábiles.

                                            Igualmente, los usuarios podrán solicitar la corrección, actualización o
                                            modificación de sus datos de carácter personal; esta petición se deberá
                                            notificar a WWW.SPORTSPAGE.COM.CO a servicio.cliente@SPORTSPAGE.COM.CO,
                                            indicando la descripción de los hechos que dan lugar a la petición.
                                            WWW.SPORTSPAGE.COM.CO responderá tal petición en un plazo máximo de quince
                                            (15) hábiles.

                                            Las consultas y peticiones deberán ser realizadas directa y personalmente
                                            por el usuario titular de la información. WWW.SPORTSPAGE.COM.CO podrá
                                            solicitar información adicional o utilizar cualquier herramienta que
                                            considere pertinente para verificar la identidad del titular que solicita la
                                            información o el cambio.
                                        </p>
                                        <p>
                                            6.8. MODIFICACIÓN DE LA POLÍTICA DE PRIVACIDAD Y LOS TÉRMINOS Y CONDICIONES

                                            WWW.SPORTSPAGE.COM.CO podrá modificar unilateralmente total o parcialmente
                                            la política de privacidad, así como los términos y condiciones aplicables,
                                            informando oportunamente a los usuarios sobre el cambio. Para tal fin,
                                            WWW.SPORTSPAGE.COM.CO publicará en el sitio los cambios y su fecha de
                                            aplicación con la anticipación necesaria para que los usuarios puedan tener
                                            acceso a los mismos. El usuario que no acepte las nuevas condiciones
                                            establecidas en la política de privacidad, notificará a
                                            WWW.SPORTSPAGE.COM.CO en servicio.cliente@SPORTSPAGE.COM.CO para que se le
                                            dé de baja como usuario registrado; en caso de no recibir notificación
                                            alguna por parte de los usurarios, WWW.SPORTSPAGE.COM.CO podrá válidamente
                                            aplicar la nueva política a dichos usuarios.
                                        </p>
                                        <p>
                                            7. VALIDEZ DE LOS TÉRMINOS Y CONDICIONES

                                            Los usuarios y WWW.SPORTSPAGE.COM.CO aceptan y reconocen que en el caso en
                                            el que alguna de las disposiciones de los términos y condiciones sea
                                            declarada ineficaz parcialmente, nula o inválida por la jurisdicción
                                            competente, las demás cláusulas y obligaciones conservarán su validez.

                                            Estos términos y condiciones vincularán a las partes desde el momento en que
                                            EL CLIENTE los acepte dándose de alta en el cualquiera de los sistemas o
                                            plataformas de ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S., así como haciendo
                                            uso de los mismos.

                                            EL CLIENTE reconoce su deber de informarse sobre cada uno de los productos
                                            y/o servicios que adquiere a través de los portales y/o plataformas de
                                            ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S.; motivo por el cual deberá
                                            considerar en detalle las descripciones, publicidad, condiciones aplicables
                                            a cada servicio y/o producto.
                                        </p>
                                        <p>
                                            8. POLÍTICA DE PUBLICACIONES

                                            Para los usuarios del portal web-móvil y aplicaciones (Android e IOS), que
                                            además deseen publicar avisos clasificados se establecen las siguientes
                                            restricciones de contenido:

                                            a) Contenido alusivo a menores de edad, es decir aquellos solicitados en
                                            favor de adultos y/o empleo.

                                            b) Contenido exclusivo para mayores de edad, tales como aquellos alusivos a
                                            órganos reproductivos de la mujer y/o el hombre o prácticas sexuales
                                            específicas.

                                            c) Aquellos relacionados con servicios de carácter sexual.

                                            d) Contenido relacionado con la comercialización de armas de fuego, aun
                                            aquellas que se consideren como “antigüedad”.

                                            e) Los que tengan que ver con la comercialización de órganos del cuerpo.

                                            f) Contenido alusivo a medicamentos o tratamientos para el V.I.H.

                                            g) Aquellos tendientes a afectar el buen nombre de una persona o entidad, o
                                            que tengan dejos discriminatorios o racistas.

                                            h) Contenido relacionado con la comercialización de derechos de autor y
                                            afines, tales como grabaciones, programas de televisión y radio, libros,
                                            revistas etc.

                                            i) Avisos relacionados con la comercialización de animales.

                                            j) en general aquellos ordenados en otro idioma.
                                        </p>
                                        <p>

                                            8.2. RESTRICCIONES GENERALES DE WWW.SPORTSPAGE.COM.CO

                                            No es permitido realizar Crawling y scrapping de las páginas web de
                                            SPORTSPAGE.COM.CO y todos sus subdominios, del portal web y de las
                                            aplicaciones (Android e IOS) por medio de robots o spiders que no estén
                                            explícitamente autorizados en el archivo www.SPORTSPAGE.COM.CO/robots.txt

                                            No es permitido copiar avisos ofrecidos por www.SPORTSPAGE.COM.CO en su
                                            portal web-móvil y/o aplicaciones (Android e IOS) para republicarlos en
                                            otros portales.

                                            No es permitido copiar ningún tipo de información disponible en
                                            www.SPORTSPAGE.COM.CO en su portal web-móvil y/o aplicaciones (Android e
                                            IOS) con fines.

                                            No es permitido contactar a los anunciantes de avisos publicados en
                                            www.SPORTSPAGE.COM.CO en su portal web-móvil y/o aplicaciones (Android e
                                            IOS) con un fin diferente a la compra, venta o arrendamiento del inmueble.

                                            No es permitido extraer información de www.SPORTSPAGE.COM.CO en su portal
                                            web-móvil y/o aplicaciones para realizar construcción de base de datos con
                                            fines comerciales y/o difusión masiva de información o publicidad.

                                            No es permitido revender los servicios prestados por www.SPORTSPAGE.COM.CO
                                            en su portal web-móvil y/o aplicaciones (Android e IOS) o utilizarlos para
                                            operar como intermediario, canal o medio de comunicación. Queda expresamente
                                            prohibido que EL CLIENTE utilice su oficina virtual, sus cuentas de acceso
                                            al PORTAL, o en general los servicios contratados con www.SPORTSPAGE.COM.CO,
                                            para prestar los mismos servicios a terceras personas, bien sea de forma
                                            gratuita u onerosa, como un servicio independiente o complementario a otras
                                            actividades
                                            No se otorga autorización o licencia para que EL CLIENTE utilice o se
                                            aproveche de las marcas, signos, nombres comerciales o la razón social de
                                            ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S. o sus empresas vinculadas; de manera
                                            que EL CLIENTE no podrá usar las marcas, signos, nombres comerciales o la
                                            razón social de ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S., incluso a través
                                            del empleo de vínculos o enlaces en Internet.
                                        </p>
                                        <p>9. FACTURACIÓN

                                            ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S. ofrece a través de
                                            WWW.SPORTSPAGE.COM.CO en su portal web-móvil y/o aplicaciones (Andriod e
                                            IOS) servicios y productos gratuitos y de pago. En este sentido, cuando los
                                            servicios y/o productos adquiridos por un cliente o usuario generen cobros
                                            por parte de ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S., ésta emitirá la
                                            correspondiente factura, la cual, de acuerdo a los términos y condiciones
                                            aceptados por las partes (ESCUELAS Y CLUBES DEPORTIVOS.COM S.A.S. y el
                                            usuario persona natural o jurídica que acepta los términos y condiciones),
                                            se realizará bajo el siguiente acuerdo de expedición y aceptación de
                                            facturas electrónicas:
                                        </p>
                                        <p>
                                            9.1. INICIO DE OPERACIONES. Las partes acuerdan que la vigencia de éste
                                            inicia con la facturación siguiente a la fecha en que se acepta este
                                            acuerdo.
                                        </p>
                                        <p>
                                            9.2. CAUSALES DE TERMINACIÓN. El presente acuerdo tendrá una duración
                                            indefinida. Sin embargo, podrá darse por terminado por cualquiera de las
                                            partes, previo aviso dado por escrito a su contraparte con 30 (treinta) días
                                            calendario de anticipación.
                                        </p>
                                    </article>
                                </div>
                            </div>

                            <div id="botones" class="form-group form-actions">
                                <div class="col-md-12 col-md-offset-4">
                                    <label>¿Acepta los termninos y condiciones?</label>
                                    <button onclick="guardar()" class="btn btn-sm btn-success"><i
                                                class="fa fa-angle-right"></i><strong> ACEPTAR </strong></button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>


<script>!window.jQuery && document.write(decodeURI('%3Cscript src="../js/vendor/jquery-1.11.1.min.js"%3E%3C/script%3E'));</script>

<!-- Bootstrap.js, Jquery plugins and Custom JS code -->
<script src="../js/vendor/bootstrap.min.js"></script>
<script src="../js/plugins.js"></script>
<script src="../js/app.js"></script>
<script src="../elements/js/customs.js"></script>
<script src="../elements/js/preinscritosClub.js"></script>


</body>
</html>


