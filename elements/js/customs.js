function justNumbers(e)
{
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }




//////////////////////////////////////////////
function cargarModalUserInfo() {
    $("#editarInfo").load(
            "modal/user_setting.php",
            {
                control: "editarInfo_Usuario",
            },
            function () {
                $('#editarInfo').modal('show');
            });

}

function modalMensajeAlerta(id) {
    $("#editarInfo").load(
            "modal/mensajeAlerta.php",
            {
                control: "MensajeAlerta",
                id: id
            },
            function () {
                $('#editarInfo').modal('show');
            });
}


function buscarClaveVieja() {
    $('#clave').val("");
    $('#claveConf').val("");
    $('div#cambio').hide();
    cant = $('#actual').val().length;
    if (cant < 6) {
        $('div#okActual').html("<div style='color:red;'>* La clave debe tener entre 6 y 15 caracteres</div>");
        $('#actual').val("");
        $('#clave').val("");
        $('#claveConf').val("");
        $('div#cambio').hide();
    } else {
        var parametros = {
            "control": 'validarClave',
            "clave": $('#actual').val()
        };

        $.ajax({
            data: parametros,
            url: '../controller/request/usersOn.php',
            type: 'post',
            success: function (str) {
                var res = str.split("|");
                respuesta = res[0];
                if (respuesta == 1) {
                    $('div#cambio').show();
                    $('div#claveActual').hide();
                    $('div#okActual').hide();
                    $('#clave').val("");
                    $('#claveConf').val("");
                } else if (respuesta == 2) {
                    $('div#okActual').show();
                    $('div#okActual').html("<div style='color:red;'>" + res[1] + "</div>");
                } else if (respuesta == 3) {
                    window.location.href = "../index.php";
                }
            }

        });
    }

}

function perfil() {
    var uno = "";
    var dos = "";

    cant = $('#clave').val().length;
    if ($('#clave').val() != "") {
        if (/\s/.test($('#clave').val())) {
            $('div#okKey').html("<div style='color:red;'>* Sin espacios en blanco</div>");
            $('#clave').val("");
            $('#clave').focus();
            $('div#okKey').show();
            $('div#okKey2').hide();
            uno = "";
            return false();
        } else if ((cant < 6) || (cant > 15)) {
            $('div#okKey').html("<div style='color:red;'>* Entre 6 y 15 caracteres</div>");
            $('#clave').val("");
            $('#clave').focus();
            $('div#okKey').show();
            $('div#okKey2').hide();
            uno = "";
            return false();
        } else {
            $('div#okKey').hide();
            $('div#okKey2').hide();
            uno = 'ok';
        }
    } else {
        $('div#okKey').html("<div style='color:red;'>* Digite la clave</div>");
        $('#clave').val("");
        $('#clave').focus();
        $('div#okKey').show();
        $('div#okKey2').hide();
        uno = "";
        return false();
    }

    cant2 = $('#claveConf').val().length;
    if ($('#claveConf').val() != "") {
        if (/\s/.test($('#claveConf').val())) {
            $('div#okKey2').html("<div style='color:red;'>* Sin espacios en blanco</div>");
            $('#claveConf').val("");
            $('#claveConf').focus();
            $('div#okKey2').show();
            dos = "";
            return false();
        } else if ((cant2 < 6) || (cant2 > 15)) {
            $('div#okKey2').html("<div style='color:red;'>* Entre 6 y 15 caracteres</div>");
            $('#claveConf').val("");
            $('#claveConf').focus();
            $('div#okKey2').show();
            dos = "";
            return false();
        } else if ($('#claveConf').val() != $('#clave').val()) {
            $('div#okKey2').html("<div style='color:red;'>* Las claves no coinciden</div>");
            $('#claveConf').val("");
            $('#clave').val("");
            $('#clave').focus();
            $('div#okKey2').show();
            dos = "";
            return false();
        } else {
            $('div#okKey').hide();
            $('div#okKey2').hide();
            dos = 'ok';
        }
    } else {
        $('div#okKey2').html("<div style='color:red;'>* Digite la clave</div>");
        $('#claveConf').val("");
        $('#claveConf').focus();
        $('div#okKey2').show();
        dos = "";
        return false();
    }

    if ((uno == 'ok') && (dos == 'ok')) {
        var parametros = {
            "control": 'cambioClaveUsuario',
            "clave": $('#claveConf').val()
        };

        $.ajax({
            data: parametros,
            url: '../controller/request/usersOn.php',
            type: 'post',
            success: function (respuesta) {
                if (respuesta == 0) {
                    $('div#validar').html("<div style='color:red;'>* Datos incorrectos</div>");
                    $('#clave').val("");
                    $('#claveConf').val("");
                    $('div#validar').show();
                    $('#clave').focus();
                } else if (respuesta == 1) {
                    window.location.href = "../index.php";
                }
            }

        });

    }

}


function permisos(id) {
    $("#editarInfo").load(
            "modal/asignarPermisos.php",
            {
                control: "asignarPermisos",
                id: id
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function cambiarPermiso(idUMP, idU, menu, profile, campo) {

    if (campo == '1') {
        est = $("#ver" + menu).val();
    } else if (campo == '2') {
        est = $("#crear" + menu).val();
    } else if (campo == '3') {
        est = $("#editar" + menu).val();
    }

    if (est == '1') {
        estado = '0';
    } else {
        estado = '1';
    }


    var parametros = {
        "control": 'cambiarPermisos',
        "idUMP": idUMP,
        "idU": idU,
        "profile": profile,
        "menu": menu,
        "estado": estado,
        "campo": campo
    };
    $.ajax({
        url: "../controller/request/usersOn.php",
        type: "POST",
        data: parametros,
        success: function (rta) {
            if (campo == '1') {
                $("#ver" + menu).val(estado);
            } else if (campo == '2') {
                $("#crear" + menu).val(estado);
            } else if (campo == '3') {
                $("#editar" + menu).val(estado);
            }
        }
    });

}

function estadoUsuario(id, prof) {

    est = $("#estado" + id).val();

    if (est == 1) {
        var retVal = confirm("¿Está seguro de eleminiar este usuario?");
        estado = '2';
    } else {
        var retVal = confirm("¿Está seguro de activar este usuario?");
        estado = '1';
    }

    if (retVal == true) {

        var parametros = {
            "control": 'cambiarEstadoUsuario',
            "id": id,
            "estado": estado,
            "perfil": prof,
        };
        $.ajax({
            url: "../controller/request/usersOn.php",
            type: "POST",
            data: parametros,
            success: function (rta) {

                if (rta == 1) {
                    location.reload();
                    return true;
                } else {
                    alert(rta);
                    location.reload();
                    return true;
                }
            }
        });
    } else {
        location.reload();
    }
}

function cargarModalAgregarUsuario() {
    $("#editarInfo").load(
            "modal/userEdit.php",
            {
                control: "AgregarUsuarioNuevo",
            },
            function () {
                $('#editarInfo').modal('show');
            });

}

function desbloqueoUsuario(id) {
    var parametros = {
        "control": 'desbloqueoUsuario',
        "id": id,
    };
    $.ajax({
        url: "../controller/request/usersOn.php",
        type: "POST",
        data: parametros,
        success: function (rta) {
            alert(rta);
            location.reload();
            return true;
        }
    });
}


function cargarModalEditarUsuario(id) {
    $("#editarInfo").load(
            "modal/userEdit.php",
            {
                control: "EditarInfoUsuario",
                id: id
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function cargarModalAgregarEstablecimiento() {
    $("#editarInfo").load(
            "modal/establecimientoModalCrear.php",
            {
                control: "AgregarEstablecimiento",
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function estadoNegocio(id) {
    est = $("#estado" + id).val();

    if (est == 1) {
        var retVal = confirm("¿Está seguro de eleminiar este negocio?");
        estado = '0';
    } else {
        var retVal = confirm("¿Está seguro de activar este negocio?");
        estado = '1';
    }


    if (retVal == true) {


        var parametros = {
            "control": 'cambiarEstadoNegocio',
            "id": id,
            "estado": estado,
        };
        $.ajax({
            url: "../controller/request/establishmentOn.php",
            type: "POST",
            data: parametros,
            success: function (rta) {
                if (rta == 1) {
                    location.reload();
                    return true;
                } else {
                    location.reload();
                    alert(rta);
                    return true;
                }
            }
        });
    } else {
        location.reload();
    }
}


function cargarModalEditarNegocio(id) {
    $("#editarInfo").load(
            "modal/establecimientoModalEditar.php",
            {
                control: "EditarEstablecimiento",
                id: id

            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function cargarModalAgregarProducto() {
    $("#editarInfo").load(
            "modal/productosModal.php",
            {
                control: "CrearProducto",
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function cargarModalEditarProducto(id) {
    $("#editarInfo").load(
            "modal/productosModal.php",
            {
                control: "EditarProducto",
                id: id,
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function estadoProd(id) {

    var retVal = confirm("¿Está seguro de eleminiar este producto de la ruta ?");
    if (retVal == true) {

        est = $("#estado" + id).val();
        if (est == '1') {
            estado = '0';
        } else {
            estado = '1';
        }


        var parametros = {
            "control": 'cambiarEstadoProducto',
            "id": id,
            "estado": estado,
        };
        $.ajax({
            url: "../controller/request/productsOn.php",
            type: "POST",
            data: parametros,
            success: function (rta) {
                if (rta == 1) {
                    location.reload();
                    return true;
                } else {
                    location.reload();
                    alert(rta);
                    return true;
                }
            }
        });
    } else {
        location.reload();
    }
}


function cargarModalAgregarRuta() {
    $("#editarInfo").load(
            "modal/rutasModal.php",
            {
                control: "CrearRuta",
            },
            function () {
                $('#editarInfo').modal('show');
            });
}


function cargarModalEditarRuta(id) {
    $("#editarInfo").load(
            "modal/rutasModal.php",
            {
                control: "EditarRuta",
                idR: id,
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function estadoRuta(id) {

    var retVal = confirm("¿Desea eleminar la ruta y sus negocios vinculados?");
    if (retVal == true) {
        est = $("#estado" + id).val();
        if (est == '1') {
            estado = '0';
        } else {
            estado = '1';
        }


        var parametros = {
            "control": 'cambiarEstadoRuta',
            "id": id,
            "estado": estado,
        };
        $.ajax({
            url: "../controller/request/routesOn.php",
            type: "POST",
            data: parametros,
            success: function (rta) {
                if (rta == 1) {
                    location.reload();
                    return true;
                } else {
                    location.reload();
                    alert(rta);
                    return true;
                }
            }
        });
    } else {
        location.reload();
    }
}

function estadoRutaInfo(id, idR) {
    var retVal = confirm("¿Está seguro de eleminiar este negocio de la ruta ?");
    if (retVal == true) {
        var parametros = {
            "control": 'cambiarEstadoRutaInfo',
            "id": id,
            "idR": idR,
        };
        $.ajax({
            url: "../controller/request/routesOn.php",
            type: "POST",
            data: parametros,
            success: function (rta) {
                if (rta == 1) {
                    location.reload();
                    return true;
                } else {
                    location.reload();
                    alert(rta);
                    return true;
                }
            }
        });

    } else {
        location.reload();
    }


}


function asignarNegocioRuta(id) {
    $("#editarInfo").load(
            "modal/rutasModal.php",
            {
                control: "AsignaNegocioRuta",
                idR: id,
            },
            function () {
                $('#editarInfo').modal('show');
            });
}


function irListaRutaNegocio(id) {
    document.dirPagina.idRuta.value = id;
    document.dirPagina.pagina.value = 'ListaRutaNegocios';
    document.dirPagina.submit();
}

function volverListaRutas() {
    document.dirPagina.pagina.value = 'ListaRutas';
    document.dirPagina.submit();
}

function cambiarPuesto(idiR, orden, idR, dir, cant) {
    var i = 1;
    while (i <= cant) {
        $('div#' + i).hide();
        i++;
    }


    var parametros = {
        "control": 'cambiarPuestoInfoRuta',
        "id": idiR,
        "idR": idR,
        "orden": orden,
        "dir": dir
    };
    $.ajax({
        url: "../controller/request/routesOn.php",
        type: "POST",
        data: parametros,
        success: function (rta) {
            if (rta == '1') {
                location.reload();
            } else {
                alert(rta);
                i = 1;
                while (i <= cant) {
                    $('div#' + i).show();
                    i++;
                }
            }
        }
    });
}

function modalChat(id) {
    $("#editarInfo").load(
            "modal/modalChat.php",
            {
                control: "AsignaNegocioRuta",
                idR: id,
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function activarRutaModal(idA, idR) {
    var parametros = {
        "control": 'activarRutaPorAdmin',
        "idA": idA,
        "idR": idR,
    };
    $.ajax({
        url: "../controller/request/routesOn.php",
        type: "POST",
        data: parametros,
        success: function (rta) {
            if (rta == '1') {
                location.reload();
            } else {
                alert(rta);
                location.reload();
            }
        }

    });
}


function irListaRutaDia(id) {
    document.dirPagina.idRuta.value = id;
    document.dirPagina.pagina.value = 'ListaRutaDia';
    document.dirPagina.submit();
}

function volverInfoRutaDia() {
    document.dirPagina.pagina.value = '';
    document.dirPagina.idRuta.value = '';
    document.dirPagina.submit();
}


function pdfAlert(id) {
    document.descargaPdfAlert.control.value = "pdfAlert";
    document.descargaPdfAlert.id.value = id;
    document.descargaPdfAlert.submit();
}