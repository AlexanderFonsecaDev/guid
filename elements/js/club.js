
function cargarModalInfo(id){
    $("#editarInfo").load(
            "club/modal_verInfo.php",
            {
                control: "modalInfo",
                id: id
                
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function aprobar(id,estado){
    $("#editarInfo").load(
            "club/modal_verInfo.php",
            {
                control: "aprobacion",
                id: id,
                est: estado
                
            },
            function () {
                $('#editarInfo').modal('show');
            });
}

function usuarioPreinscrito() {
    $("#editarInfo").load(
        "club/modal_verInfo.php",
        {
            control: "aprobacion",
            id: id,
            est: estado

        },
        function () {
            $('#editarInfo').modal('show');
        });
}

function listaPreinscritos(){
    document.dirPagina.pagina.value = '';
    document.dirPagina.submit();
}

function listaClub(){ alert("HOLA");
    document.dirPagina.pagina.value = 'listaClub';
    document.dirPagina.submit();
}