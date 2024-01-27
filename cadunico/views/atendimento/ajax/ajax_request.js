$(document).ready(function () {
    var timer;

    $('#cpf').on('input', function () {
        clearTimeout(timer);
        timer = setTimeout(function () {
            verificarUsuario();
        }, 500);
    });
});

function verificarUsuario() {
    var cpf = $('#cpf').val();

    $.ajax({
        url: '/Suas-Tech/cadunico/views/atendimento/controller/busca_user.php',
        method: 'POST',
        data: { cpf: cpf },
        dataType: 'json',
        success: function (data) {
            if (data.existeUsuario) {
                $('#nome').val(data.nome);
                $('#cpf_pess').val(data.cpf_pess);
            } else {
                $('#nome').val('');
                $('#cpf_pess').val('');
            }
        },
        error: function () {
            alert('Erro na requisição AJAX');
        }
    });
}

function preencherCampos(data) {
    verificarOutroSexo();
}

function limparCampos() {
    verificarOutroSexo();
}

