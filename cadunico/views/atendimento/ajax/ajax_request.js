// Função para carregar opções de Setor de atendimento
function carregarSetores() {
    $.ajax({
        url: '/Suas-Tech/cadunico/views/atendimento/controller/ajax_request/carregar_atendimento.php',
        type: 'GET',
        success: function (data) {
            $('#setorSelect').html(data);
        }
    });
}

// Função para carregar tipos de atendimento com base no setor selecionado
function carregarTiposAtendimentos(setorSelecionado) {
    $.ajax({
        url: '/Suas-Tech/cadunico/views/atendimento/controller/ajax_request/carregar_btnSenha.php',
        type: 'GET',
        data: { nomeSetor: setorSelecionado },
        success: function (data) {
            $('#botoesTiposAtendimento').html(data);
        }
    });
}


$(document).ready(function () {
    carregarSetores();
    var timer;

    $('#cpf').on('input', function () {
        clearTimeout(timer);
        timer = setTimeout(function () {
            verificarUsuario();
        }, 500);
    });

    // Atualizar opções de Tipo de Atendimento quando o Setor for alterado
    $('#setorSelect').change(function () {
        var setorSelecionado = $(this).val();
        carregarTiposAtendimentos(setorSelecionado);
    });

    // Manipular o clique nos botões de tipos de atendimento
    $('#botoesTiposAtendimento').on('click', '.btnTipoAtendimento', function () {
        var idTipoAtendimento = $(this).data('id');
    });

});

// Função para remover caracteres especiais do CPF
function removerCaracteresEspeciais(cpf) {
    return cpf.replace(/[^\d]/g, '');
}


function verificarUsuario() {
    var cpf = $('#cpf').val();

    $.ajax({
        url: '/Suas-Tech/cadunico/views/atendimento/controller/ajax_request/busca_user.php',
        method: 'POST',
        data: { cpf: cpf },
        dataType: 'json',
        success: function (data) {
            if (data.existeUsuario) {
                $('#nome').val(data.nome);
                $('#cpf_pess').val(data.cpf_pess);
            } else {
                $('#nome').val('');
                $('#cpf_pess').val(removerCaracteresEspeciais(cpf));
            }
        },
        error: function () {
            alert('Erro na requisição AJAX');
        }
    });
}

function nextStep() {
    document.getElementById('cons_cpf').classList.add('hidden');
    document.getElementById('atend_select').classList.remove('hidden');
}
function prevStep() {
    document.getElementById('cons_cpf').classList.remove('hidden');
    document.getElementById('atend_select').classList.add('hidden');
}







