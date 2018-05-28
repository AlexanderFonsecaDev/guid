function cargarModalAgregarDeporte(id) {
    $("#editarInfo").load(
        "blog/modal_deporte.php",
        {
            control: "EdicionDeporte",
        },
        function () {
            $('#editarInfo').modal('show');
        });
}

function cargarModalAgregarPost() {
    $("#editarInfo").load(
        "blog/modal_post.php",
        {
            control: "NuevaPublicacion",
        },
        function () {
            $('#editarInfo').modal('show');
        });
}

function cargarModalAgregarEtiquetas(pais, depto, ciudad, ruta) {
    $("#editarInfo").load(
        "blog/modal_etiqueta.php",
        {
            control: "NuevaCiudad",
            pais: pais,
            depto: depto,
            ciudad: ciudad,
            ruta: ruta

        },
        function () {
            $('#editarInfo').modal('show');
        });
}

function subirImagen() {
    $("#editarInfo").load(
        "blog/modalUpload.php",
        {
            control: "subirimagen",
        },
        function () {
            $('#editarInfo').modal('show');
        });
}

function cargarModalBorrarPublicacion(publicacion) {
    $("#editarInfo").load(
        "blog/modal_post.php",
        {
            control: "BorrarPublicacion",
        },
        function () {
            $('#editarInfo').modal('show');
        });
}

function categorias() {
    document.dirPagina.pagina.value = 'ListaCategorias';
    document.dirPagina.submit();
}

function agregarPublicacion() {
    document.dirPagina.pagina.value = 'AgregarPublicacion';
    document.dirPagina.submit();
}

function editarPublicacion(idPublicacion) {
    document.dirPagina.pagina.value = 'actualizarPublicacion';
    document.dirPagina.idPublicacion.value = idPublicacion;
    document.dirPagina.submit();
}

function posts(idP, idD) {
    document.dirPagina.idPais.value = idP;
    document.dirPagina.idDepto.value = idD;
    document.dirPagina.pagina.value = 'ListaCiudad';
    document.dirPagina.submit();
}

function etiqueta(idP, idD) {
    document.dirPagina.idPais.value = idP;
    document.dirPagina.idDepto.value = idD;
    document.dirPagina.pagina.value = 'ListaCiudad';
    document.dirPagina.submit();
}

function volver() {
    document.dirPagina.submit();
}

function volver2(idP) {
    document.dirPagina.idPais.value = idP;
    document.dirPagina.idDepto.value = "";
    document.dirPagina.pagina.value = 'ListaDepto';
    document.dirPagina.submit();
}

