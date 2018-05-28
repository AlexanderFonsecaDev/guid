function showState() {
    var idP = $('#pais').val();


    if (idP !== "") {
        var parametros = {
            'control': "mostrarDeptos",
            'pais': idP
        };
        $.ajax({
            type: "POST",
            url: "../controller/request/preinscritosClubOn.php",
            data: parametros,
            cache: false,
            success: function (opciones) {
                $("#depto").html(opciones);
                $('div#divDepto').show();
            }
        });
    }
}

function showCity() {
    var idP = $('#pais').val();
    var idD = $('#depto').val();

    if (idD !== "") {
        var parametros = {
            'control': "mostrarCiudades",
            'pais': idP,
            'depto': idD
        };
        $.ajax({
            type: "POST",
            url: "../controller/request/preinscritosClubOn.php",
            data: parametros,
            cache: false,
            success: function (opciones) {
                $("#ciud").html(opciones);
                $('div#divCiudad').show();
            }
        });
    }
}


function validar() {
    $('div#usuario').show();
    $('div#club').hide();
    $('dic#dataFull').hide();
    var pNom = $('#pNom').val();
    var sNom = $('#sNom').val();
    var pApel = $('#pApel').val();
    var sApel = $('#sApel').val();
    var tipu = $('#tipu').val();
    var ced = $('#ced').val();
    var mail1 = $('#mail1').val();
    var mail2 = $('#mail2').val();
    var tel = $('#tel').val();
    var cel = $('#cel').val();


    if (pNom === "") {
        ocultar1();
        console.log('error');
        $("#pNom").focus();
        $('#valpNom').html("<div style='color:red;'>* Digite el nombre </div>");
        $('#valpNom').show();
        return;
    }

    if (pApel === "") {
        ocultar1();
        console.log('error');
        $("#pApel").focus();
        $('#valpApel').html("<div style='color:red;'>* Digite el apellido </div>");
        $('#valpApel').show();
        return;
    }

    if (sApel === "") {
        ocultar1();
        console.log('error');
        $("#sApel").focus();
        $('#valsApel').html("<div style='color:red;'>* Digite el apellido </div>");
        $('#valsApel').show();
        return;
    }

    if (tipu === "") {
        ocultar1();
        console.log('error');
        $("#tipu").focus();
        $('#valTipu').html("<div style='color:red;'>* Seleccione tipo de idenficaci&oacute;n </div>");
        $('#valTipu').show();
        return;
    }

    if (ced === "") {
        ocultar1();
        console.log('error');
        $("#ced").focus();
        $('#valCed').html("<div style='color:red;'>* Digite el n&uacute;mero de c&eacute;dula </div>");
        $('#valCed').show();
        return;
    }

    if (ced.length < 7) {
        ocultar1();
        console.log('error');
        $("#ced").focus();
        $('#valCed').html("<div style='color:red;'>* N&uacute;mero de c&eacute;dula no valido</div>");
        $('#valCed').show();
        return;
    }

    if (ced !== "") {
        var parametros = {
            "control": 'validarCedulaPre',
            "ced": ced
        };
        $.ajax({
            data: parametros,
            url: '../controller/request/clubsOn.php',
            type: 'post',
            success: function (respuesta) {
                if (respuesta === '1') {
                    ocultar1();
                    console.log('error');
                    $("#ced").focus();
                    $('#valCed').html("<div style='color:red;'>* Este documento ya se encuentra registrado en el sistema</div>");
                    $('#valCed').show();
                    return;
                }
            }

        });
    }

    if (mail1 === "") {
        ocultar1();
        console.log('error');
        $("#mail1").focus();
        $('#valMail').html("<div style='color:red;'>* Digite el email </div>");
        $('#valMail').show();
        return;
    }

    var rtaM1 = validarEmail(mail1);
    if (rtaM1 === 2) {
        ocultar1();
        console.log('error');
        $("#mail1").focus();
        $('#valMail').html("<div style='color:red;'>* No es un email </div>");
        $('#valMail').show();
        return;
    }

    if (mail2 === "") {
        ocultar1();
        console.log('error');
        $("#mail2").focus();
        $('#valMail2').html("<div style='color:red;'>* Digite el email </div>");
        $('#valMail2').show();
        return;
    }

    var rtaM2 = validarEmail(mail2);
    if (rtaM2 === 2) {
        ocultar1();
        console.log('error');
        $("#mail2").focus();
        $('#valMail2').html("<div style='color:red;'>* No es un email </div>");
        $('#valMail2').show();
        return;
    }

    if (mail1 !== mail2) {
        ocultar1();
        $('#mail1').val("");
        $('#mail2').val("");
        console.log('error');
        $("#mail1").focus();
        $('#valMail').html("<div style='color:red;'>* Los campos de email no coinciden </div>");
        $('#valMail').show();
        return;
    }

    if (cel === "") {
        ocultar1();
        console.log('error');
        $("#cel").focus();
        $('#valCel').html("<div style='color:red;'>* Digite el n&uacute;mero de celular </div>");
        $('#valCel').show();
        return;
    }

    if (cel.length < 10) {
        ocultar1();
        console.log('error');
        $("#cel").focus();
        $('#valCel').html("<div style='color:red;'>* N&uacute;mero de celular no valido</div>");
        $('#valCel').show();
        return;
    }

    validar2();

}

function validar2() {
    $('div#usuario').hide();
    $('div#club').show();

    var dep = $('#dep').val();
    var nomC = $('#nomC').val();
    var nitC = $('#nitC').val();
    var pais = $('#pais').val();
    var depto = $('#depto').val();
    var ciud = $('#ciud').val();
    var mail1C = $('#mail1C').val();
    var mail2C = $('#mail2C').val();
    var archivo = $('#pdf').val();

    if (dep === "") {
        ocultar2();
        console.log('error');
        $("#dep").focus();
        $('#valDep').html("<div style='color:red;'>* Seleccione un deporte </div>");
        $('#valDep').show();
        return;
    }

    if (nomC === "") {
        ocultar2();
        console.log('error');
        $("#nomC").focus();
        $('#valNomC').html("<div style='color:red;'>* Digite el nombre del club </div>");
        $('#valNomC').show();
        return;
    }

    if (nitC === "") {
        ocultar2();
        console.log('error');
        $("#nitC").focus();
        $('#valNit').html("<div style='color:red;'>* Digite el número de registro del club </div>");
        $('#valNit').show();
        return;
    }


    if (pais === "") {
        ocultar2();
        console.log('error');
        $("#pais").focus();

        $('#valPais').html("<div style='color:red;'>* Seleccione un pa&iacute;s </div>");
        $('#valPais').show();
        return;
    }

    if (depto === "") {
        ocultar2();
        console.log('error');
        $("#depto").focus();

        $('#valDepto').html("<div style='color:red;'>* Seleccione un departamento </div>");
        $('#valDepto').show();
        return;
    }

    if (ciud === "") {
        ocultar2();
        console.log('error');
        $("#ciud").focus();

        $('#valCiu').html("<div style='color:red;'>* Seleccione una ciudad </div>");
        $('#valCiu').show();
        return;
    }

    if (mail1C === "") {
        ocultar2();
        console.log('error');
        $("#mail1C").focus();
        $('#valMailC1').html("<div style='color:red;'>* Digite el email </div>");
        $('#valMailC1').show();
        return;
    }

    var rtaM1 = validarEmail(mail1C);
    if (rtaM1 === 2) {
        ocultar2();
        console.log('error');
        $("#mail1C").focus();
        $('#valMailC1').html("<div style='color:red;'>* No es un email </div>");
        $('#valMailC1').show();
        return;
    }

    if (mail2C === "") {
        ocultar2();
        console.log('error');
        $("#mail2C").focus();
        $('#valMailC2').html("<div style='color:red;'>* Digite el email </div>");
        $('#valMailC2').show();
        return;
    }

    var rtaM2 = validarEmail(mail2C);
    if (rtaM2 === 2) {
        ocultar2();
        console.log('error');
        $("#mail2C").focus();
        $('#valMailC2').html("<div style='color:red;'>* No es un email </div>");
        $('#valMailC2').show();
        return;
    }

    if (mail1C !== mail2C) {
        ocultar2();
        $('#mail1C').val("");
        $('#mail2C').val("");
        console.log('error');
        $("#mail1C").focus();
        $('#valMailC1').html("<div style='color:red;'>* Los campos de email no coinciden </div>");
        $('#valMailC1').show();
        return;
    }

    var extensionesPermitidas = new Array(".pdf");
    if (!archivo) {

        ocultar2();
        console.log('error');
        $("#pdf").focus();
        $('#valFile').html("<div style='color:red;'>* Cargue un archivo PDF con la informaci&oacute;n de registro de su club deportivo</div>");
        $('#valFile').show();
        return;
    } else {

        var extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
        var permitida = false;
        for (var i = 0; i < extensionesPermitidas.length; i++) {
            if (extensionesPermitidas[i] === extension) {
                permitida = true;
                mostrar();
            }
        }
        if (permitida === false) {

            ocultar2();
            console.log('error');
            $("#pdf ").val('');
            $("#pdf").focus();
            $('#valFile').html("<div style='color:red;'>* El tipo de archivo que esta subiendo no es permitido</div>");
            $('#valFile').show();
            return;

        }
    }


}

function mostrar() {
    $('div#usuario').hide();
    $('div#club').hide();
    $('div#dataFull').show();
}

function guardar() {
    $('div#botones').hide();

    var formData = new FormData($("#elformulario")[0]);
    formData.append("control", "guardarPreInscrito");
    console.log(formData);

    $.ajax({
        url: '../controller/request/preinscritosClubOn.php',
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
        success: function (respuesta) {
            alert(respuesta);
            if (respuesta === '1') {
                ocultar1();
                console.log('error');
                $("#ced").focus();
                $('#valCed').html("<div style='color:red;'>* Este documento ya se encuentra registrado en el sistema</div>");
                $('#valCed').show();
                return;
            }
        },
        //si ha ocurrido un error
        error: function () {
            alert("todo salio mal");
        }
    });

    /**var pNom = $('#pNom').val();
    var sNom = $('#sNom').val();
    var pApel = $('#pApel').val();
    var sApel = $('#sApel').val();
    var tipu = $('#tipu').val();
    var ced = $('#ced').val();
    var mail1 = $('#mail1').val();
    var tel = $('#tel').val();
    var cel = $('#cel').val();
    var dep = $('#dep').val();
    var nomC = $('#nomC').val();
    var nitC = $('#nitC').val();
    var pais = $('#pais').val();
    var depto = $('#depto').val();
    var ciud = $('#ciud').val();
    var mail1C = $('#mail1C').val();
    var archivo = $('#pdf')[0].files[0];

    var parametros = {
        "control": 'guardarPreInscrito',
        "pNom": pNom,
        "sNom": sNom,
        "pApel": pApel,
        "sApel": sApel,
        "tipu": tipu,
        "ced": ced,
        "mail": mail1,
        "tel": tel,
        "cel": cel,
        "dep": dep,
        "nomC": nomC,
        "nitC": nitC,
        "pais": pais,
        "depto": depto,
        "ciud": ciud,
        "mailC": mail1C,
        "archivo": archivo

    };
    $.ajax({
        data: parametros,
        url: '../controller/request/preinscritosClubOn.php',
        type: 'post',
        success: function (respuesta) {
            alert(respuesta);
            if (respuesta === '1') {
                ocultar1();
                console.log('error');
                $("#ced").focus();
                $('#valCed').html("<div style='color:red;'>* Este documento ya se encuentra registrado en el sistema</div>");
                $('#valCed').show();
                return;
            }
        }

    });**/


}


function volver() {
    limpia2();
    ocultar2();
    ocultar1();
    $('div#usuario').show();
    $('div#club').hide();
}


function ocultar1() {
    $('#valpNom').hide();
    $('#valpApel').hide();
    $('#valsApel').hide();
    $('#valTipu').hide();
    $('#valCed').hide();
    $('#valMail').hide();
    $('#valMail2').hide();
    $('#valCel').hide();

}

function ocultar2() {
    $('#valDep').hide();
    $('#valNomC').hide();
    $('#valNit').hide();
    $('#valPais').hide();
    $('#valDepto').hide();
    $('#valCiu').hide();
    $('#valMailC1').hide();
    $('#valMailC2').hide();
    $('#valFile').hide();

}

function limpia1() {
    $('#pNom').val("");
    $('#sNom').val("");
    $('#pApel').val("");
    $('#sApel').val("");
    $('#tipu').val("");
    $('#ced').val("");
    $('#mail1').val("");
    $('#mail2').val("");
    $('#tel').val("");
    $('#cel').val("");
}

function limpia2() {
    $('#dep').val("");
    $('#nomC').val("");
    $('#nitC').val("");
    $('#pais').val("");
    $('#depto').val("");
    $('#ciud').val("");
    $('#mail1C').val("");
    $('#mail2C').val("");
    $('#pdf').val("");
}


function validarEmail(elemento) {
    var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if (!regex.test(elemento)) {
        return 2;
    } else {
        return 1;
    }

}