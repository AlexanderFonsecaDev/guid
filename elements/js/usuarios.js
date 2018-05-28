
function cargarModalEnvioMail(mail) { 
    $("#editarInfo").load(
            "usuarios/modal_EnviarMail.php",
            {
                control: "EnviarMailUsuario",
                mail: mail

            },
            function () {
                $('#editarInfo').modal('show');
            });
}
