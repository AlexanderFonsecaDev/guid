function justNumbers(e)
{
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum === 8) || (keynum === 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function entrar() {

    $('#boton').hide();
    $('#mensaje').hide();
    $('#mensajeSession').hide();
    var user = $('#ced').val();
    var pass = $('#clave').val();
    if (user === "") {
        $('#ced').val('');
        $('#clave').val('');
        $("#ced").focus();
        $('#boton').show();
        $('#msj').text("Campo cédula no puede ser vacío");
        $('#mensaje').show();
    } else if ($('#ced').val().length < 6) {
        $('#ced').val('');
        $('#clave').val('');
        $("#ced").focus();
        $('#boton').show();
        $('#msj').text("Número de cédula demasiado corto");
        $('#mensaje').show();
    } else if (pass === "") {
        $('#ced').val('');
        $('#clave').val('');
        $("#clave").focus();
        $('#boton').show();
        $('#msj').text("Campo password no puede ser vacío");
        $('#mensaje').show();
    } else if ($('#clave').val().length < 5) {
        $('#ced').val('');
        $('#clave').val('');
        $("#clave").focus();
        $('#boton').show();
        $('#msj').text("Password no valido");
        $('#mensaje').show();
    } else {
        $('#boton').hide();
        $('#mensaje').hide();
        var parametros = {
            "control": 'loginValidate',
            "ced": $('#ced').val(),
            "clave": $('#clave').val()
        };
        $.ajax({
            data: parametros,
            url: 'controller/request/loginOn.php',
            type: 'post',
            success: function (respuesta) { 
                if (respuesta === '1') {
                    window.location.href = "views/config.php";
                } else {
                    $('#ced').val('');
                    $('#clave').val('');
                    $('#boton').show();
                    $('#msj').text(respuesta);
                    $('#mensaje').show();
                }
            }

        });
    }
}


function recuperar() {
    var user = $('#cedR').val();
    $('#valCedR').hide();
    $('div#btn-save').hide();
    if (user === "") {
        $('#cedR').val('');
        $('#valCedR').html("<div style='color:red;'>Digite su c&eacute;dula</div>");
        $('#valCedR').show();
        $('div#btn-save').show();
    } else if ($('#cedR').val().length < 6) {
        $('#cedR').val('');
        $('#valCedR').html("<div style='color:red;'>N&uacute;mero de c&eacute;dula demasiado corto</div>");
        $('#valCedR').show();
        $('div#btn-save').show();
    } else {
        $('#valCedR').hide();
        var parametros = {
            "control": 'recuperarClave',
            "user": user,

        };
        $.ajax({
            data: parametros,
            url: 'controller/request/loginOn.php',
            type: 'post',
            success: function (respuesta) { 
                if (respuesta === '1') {
                    $('#cedR').val('');
                    $('#valCedR').html("<div style='color:green;'>** Su clave acaba de ser restaurada, por favor revise su correo ** </div>");
                    $('#valCedR').show();
                    $('div#btn-save').show();
                } else if (respuesta === '0') {
                    $('#cedR').val('');
                    $('#valCedR').html("<div style='color:red;'>* Este usuario no esta registrado en el sistema </div>");
                    $('#valCedR').show();
                    $('div#btn-save').show();
                } else if (respuesta === '2') {
                    $('#cedR').val('');
                    $('#valCedR').html("<div style='color:red;'>* Error al restaurar la clave </div>");
                    $('#valCedR').show();
                    $('div#btn-save').show();
                }else if (respuesta === '3') {
                    $('#cedR').val('');
                    $('#valCedR').html("<div style='color:red;'>* Error este usuario fue desactivado del sistema </div>");
                    $('#valCedR').show();
                    $('div#btn-save').show();
                }
            }

        });
    }
}
