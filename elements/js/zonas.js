function cargarModalAgregarPais(id) {
    $("#editarInfo").load(
            "zonas/modal_Pais.php",
            {
                control: "NuevoPais",
                ruta: id
                
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function cargarModalAgregarDepto(pais,depto,ruta) {
    $("#editarInfo").load(
            "zonas/modal_Depto.php",
            {
                control: "NuevoDepto",
                pais: pais,
                depto: depto,
                ruta: ruta
                
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function cargarModalAgregarCiudad(pais,depto,ciudad,ruta){
    $("#editarInfo").load(
            "zonas/modal_Ciudad.php",
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


function deptos(id){
    document.dirPagina.idPais.value = id;
    document.dirPagina.pagina.value = 'ListaDepto';
    document.dirPagina.submit();
}

function ciudades(idP,idD){
    document.dirPagina.idPais.value = idP;
    document.dirPagina.idDepto.value = idD;
    document.dirPagina.pagina.value = 'ListaCiudad';
    document.dirPagina.submit();
}

function volver(){
    document.dirPagina.submit();
}

function volver2(idP){
    document.dirPagina.idPais.value = idP;
    document.dirPagina.idDepto.value = "";
    document.dirPagina.pagina.value = 'ListaDepto';
    document.dirPagina.submit();
}

