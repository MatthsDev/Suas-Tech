// script.js

$(document).ready(function () {
    // Evento de perda de foco no campo de CPF
    $('#cpf').blur(function () {
        // Pega o valor do CPF digitado
        var cpf = $(this).val();

        // Faz a requisição AJAX para o arquivo PHP
        $.ajax({
            type: 'POST',
            url: 'buscar_pessoa.php',
            data: { cpf: cpf },
            dataType: 'json',
            success: function (response) {
                if (response.encontrado) {
                    // Pessoa encontrada, exibe o nome na tela
                    $('#nomePessoa').text('Nome: ' + response.nome);

                    // Torna os botões visíveis
                    $('#btnCadUnico').show();
                    $('#btnBolsaFamilia').show();
                    $('#btnConcessao').show();
                    $('#btnAlistamentoMilitar').show();
                    $('#btnReceitaFederal').show();
                } else {
                    // Pessoa não encontrada, pode exibir uma mensagem de erro se desejar
                    $('#nomePessoa').text('CPF não registrado em nosso banco de dados.');

                    // Torna os botões visíveis
                    $('#btnCadUnico').show();
                    $('#btnBolsaFamilia').show();
                    $('#btnConcessao').show();
                    $('#btnAlistamentoMilitar').show();
                    $('#btnReceitaFederal').show();
                }
            },


            error: function (xhr, status, error) {
                // Trata erros na requisição AJAX
                console.error('Erro na requisição AJAX:', status, error);
            }

        });
    });
    // Evento de clique no botão CADUNICO
    $('#btnCadUnico').click(function () {
        // Torna visíveis as opções do CADUNICO
        $('#cadUnicoOptions').show();

        // Escolhendo CADASTRO todas as outras opções são escondidas
        $('#btnCadastro').click(function () {
            $('#opcoesAtendimento').show();
            $('#btnAtualizacao').hide();
            $('#btnCadastro').hide();
            $('#mensagemCadOptions').text('Atendimento para: CADASTRO');
        });
        // Escolhendo ATUALIZAÇÃO todas as outras opções são escondidas
        $('#btnAtualizacao').click(function () {
            $('#opcoesAtendimento').show();
            $('#btnCadastro').hide();
            $('#btnAtualizacao').hide();
            $('#mensagemCadOptions').text('Atendimento para: ATUALIZAÇÃO');
        });

        // Esconde outras opções
        $('#btnBolsaFamilia').hide();
        $('#btnConcessao').hide();
        $('#btnAlistamentoMilitar').hide();
        $('#btnReceitaFederal').hide();

    });

    // Evento de clique no botão BOLSA FAMÍLIA
    $('#btnBolsaFamilia').click(function () {
        // Torna visíveis as opções do BOLSA FAMÍLIA
        $('#bolsaFamiliaOptions').show();

        // Evento pra tornar visível as opções de prioridade
        $('#btnFolha').click(function () {
            $('#opcoesAtendimento').show();
            $('#btnBloqueio').hide();
            $('#btnFolha').hide();
            $('#btnInformacao').hide();
            $('#mensagemCadOptions').text('Atendimento para pegar FOLHA.');
        });

        $('#btnBloqueio').click(function () {
            $('#opcoesAtendimento').show();
            $('#btnFolha').hide();
            $('#btnBloqueio').hide();
            $('#btnInformacao').hide();
            $('#mensagemCadOptions').text('Atendimento para tratar pendência de BLOQUEIO.');
        });

        $('#btnInformacao').click(function () {
            $('#opcoesAtendimento').show();
            $('#btnBloqueio').hide();
            $('#btnFolha').hide();
            $('#btnInformacao').hide();
            $('#mensagemCadOptions').text('Atendimento para sanar dúvidas.');
        });

        // Esconde outras opções
        $('#btnCadUnico').hide();
        $('#btnConcessao').hide();
        $('#btnAlistamentoMilitar').hide();
        $('#btnReceitaFederal').hide();
    });

    // Evento de clique no botão CONCESSAO
    $('#btnConcessao').click(function () {
        // Torna visíveis as opções da CONCESSAO
        $('#opcoesAtendimento').show();

        // Esconde outras opções
        $('#btnCadUnico').hide();
        $('#btnBolsaFamilia').hide();
        $('#btnAlistamentoMilitar').hide();
        $('#btnReceitaFederal').hide();
    });

    // Evento de clique no botão ALISTAMENTO MILITAR
    $('#btnAlistamentoMilitar').click(function () {
        // Torna visíveis as opções do ALISTAMENTO MILITAR
        $('#opcoesAtendimento').show();

        // Esconde outras opções
        $('#btnCadUnico').hide();
        $('#btnBolsaFamilia').hide();
        $('#btnConcessao').hide();
        $('#btnReceitaFederal').hide();
    });

    // Evento de clique no botão RECEITA FEDERAL
    $('#btnReceitaFederal').click(function () {
        // Torna visíveis as opções da RECEITA FEDERAL
        $('#receitaFederalOptions').show();

        // Evento pra tornar visível as opções de prioridade
        $('#btnCPF').click(function () {
            $('#opcoesAtendimento').show();
            $('#btnCTD').hide();
            $('#btnCPF').hide();
            $('#mensagemCadOptions').text('Atendimento para CPF.');
        });
        $('#btnCTD').click(function () {
            $('#opcoesAtendimento').show();
            $('#btnCPF').hide();
            $('#btnCTD').hide();
            $('#mensagemCadOptions').text('Atendimento para CARTEIRA DE TRABALHO.');
        });

        // Esconde outras opções
        $('#btnCadUnico').hide();
        $('#btnBolsaFamilia').hide();
        $('#btnConcessao').hide();
        $('#btnAlistamentoMilitar').hide();
    });
});



// Função para gerar senha com base nas opções escolhidas
function gerarSenha(prioridade) {
    // Lógica para gerar senha com base na prioridade
    var atendimentoSelecionado = '';

    if ($('#btnCadUnico').is(':visible')) {
        atendimentoSelecionado = 'CAD';
    } else if ($('#btnBolsaFamilia').is(':visible')) {
        atendimentoSelecionado = 'PBF';
    } else if ($('#btnConcessao').is(':visible')) {
        atendimentoSelecionado = 'CONC';
    } else if ($('#btnAlistamentoMilitar').is(':visible')) {
        atendimentoSelecionado = 'AMI';
    } else if ($('#btnReceitaFederal').is(':visible')) {
        atendimentoSelecionado = 'RFB';
    }
    // Concatena o atendimento selecionado com a prioridade
    var senhaGerada = atendimentoSelecionado + prioridade;

    // Exibe a senha gerada na tela
    $('#senhaGerada').text('Senha gerada: ' + senhaGerada);

    // Obtém CPF e Nome 
    var cpf = $('#cpf').val();
    var nome = $('#nomePessoa').text().replace('Nome: ', '');

    // Limpa mensagens de erro anteriores
    $('#mensagemErro').text('');

    // Faz a requisição AJAX para o arquivo PHP para salvar no banco de dados
    $.ajax({
        type: 'POST',
        url: 'salvar_senha.php',
        data: { senha: senhaGerada, cpf: cpf, nome: nome },
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                var senhaFormatada = response['response.senha_formatada'];
                // Exibe a senha formatada na tela
                $('#senhaFormatada').text('Sua senha é: ' + senhaFormatada);

                // Exibe informações no ticket
                $('#ticket').text('Nome: ' + nome + '<br>' +
                    'Atendimento: ' + atendimentoSelecionado + '<br>' +
                    'Senha: ' + response.senha_formatada + '<br>' +
                    'Hora de Chegada: ' + response.data_atual);

                // Exibe o botão de impressão
                $('#btnImprimir').show();
            } else {
                console.error('Erro ao salvar a senha:', response.message);
                // Exibe a mensagem de erro para o usuário
                $('#mensagemErro').text('Erro ao salvar a senha. Por favor, tente novamente.');
            }
        },
        error: function (xhr, status, error) {
            // Trata erros na requisição AJAX
            console.error('Erro na requisição AJAX:', status, error);
            // Exibe a mensagem de erro para o usuário
            $('#mensagemErro').text('Erro ao salvar a senha. Por favor, tente novamente.');
        }
    });
    //function imprimirTicket() {
    // Exibe informações no ticket
    //window.print();
    //location.reload(true);
    //}
}

$(document).ready(function () {
    $('#alta, #media, #medbaixa, #baixa').click(function () {
        $('#conteiner_prioridade').hide();
    });
});

$(document).ready(function () {
    $('#btnImprimir').click(function () {
        $('#btnImprimir').hide();
        $('#divcpf').hide();
        setTimeout(function () {
            location.reload(true);
        }, 6000);
    });
});

function abrirModal() {
    document.getElementById('modal').style.display = 'block';
}

function fecharModal() {
    document.getElementById('modal').style.display = 'none';
}

function imprimirTicket() {
    // Exibe informações no ticket
    window.print();
    fecharModal();

        // Aguarde 5 segundos antes de recarregar a página

}

// Função para imprimir o ticket
//function imprimirTicket() {
//}

// Esconder o botão de impressão inicialmente
$(document).ready(function () {
    $('#btnImprimir').hide();
});