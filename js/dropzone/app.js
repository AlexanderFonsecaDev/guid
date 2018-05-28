$(document).ready(function () {

    $("div#subida").dropzone({
        url: "../controller/upload.php",
        uploadMultiple: true,
        maxFiles: 5,
        acceptedFiles: 'image/*',
        success : function () {
          alert("Subida con exito");
        },
    });
});