//Voce pode criar um evento On Submit para cada formulário
$('#formLogin').on("submit", function (event) {
    event.preventDefault();
    console.log(('#formLogin').serialize());
    $.ajax({
        url: "logins.php",
        method: "POST",
        data: $('#formLogin').serialize(),
        beforeSend: function () {
            $("#btnLogin").html('<span class="spinner-border spinner-border-sm"></span> aguarde...');
        },
        success: function (retorno) { //FUNÇÃO DE CALLBACK
            var res = JSON.parse(retorno);

            if (res.logado == true) {

                //toastr.success('Perfeito!', res['mensagem']);

                setTimeout(function () {
                    window.location.href = "index.php";
                }, 5000);
            } else {
                //toastr.error(res.mensagem);
            }

        },
        error: function (request, status, error) {
            // swal.fire({
            //     title: '<strong>Algo deu errado</strong>',
            //     icon: 'error',
            //     html: "<p>Código: " + request.status + "</p><p> status: " +status + "</p><p> erro: "+error+"</p>",                
            //   });
          }
    });
}
);  