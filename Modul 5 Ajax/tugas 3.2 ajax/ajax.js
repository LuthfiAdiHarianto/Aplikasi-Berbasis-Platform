$(document).ready(function () {

    $("#shoutbutton").click(function () {

        let message = $("#msg").val();

        if (message === "") {
            alert("Pesan tidak boleh kosong!");
            return;
        }

        $.ajax({
            url: "process.php",   // file backend
            type: "POST",
            data: { msg: message },
            success: function (response) {
                $("#data").html(response);
                $("#msg").val(""); // kosongkan input
            },
            error: function () {
                alert("Terjadi error saat mengirim data.");
            }
        });

    });

});