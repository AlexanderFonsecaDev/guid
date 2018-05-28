function nuevaPublicidad() {
    $("#editarInfo").load(
        "publicidad/modal_Publicidad.php",
        {
            control: "NuevaPublicidad"

        },
        function () {
            $('#editarInfo').modal('show');
        });
}

function ultimasNoticias() {
    $("#editarInfo").load(
        "publicidad/modal_ultimasNoticias.php",
        {
            control: "UltimasNoticias"

        },
        function () {
            $('#editarInfo').modal('show');
        });
}

