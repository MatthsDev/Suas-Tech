$(document).ready(function () {
    $('#chamar').click(function () {
        var senhaChamada = $(this).val();
        var guicheValue = $('#guiche').val();
        var tipoAtendimentoValue = $('#tipoAtendimento').val();
        if (guicheValue) {
            $.ajax({
                type: 'POST',
                url: 'buscar_senha.php',
                data: { 
                    senhaChamada: senhaChamada,
                    guiche: guicheValue,
                    tipoAtendimento: tipoAtendimentoValue
                },
                dataType: 'json',
                success: function (response) {
                    if (response.encontrado) {
                        $('#mostrar_nome').text('Nome: ' + response.nome);
                        $('#mostrar_senha').text('Senha: ' + response.senha);
                        $('#mostrar_guiche').text('Guichê: ' + guicheValue);

                        // Chama a função de síntese de fala após 4 segundos
                        setTimeout(function () {
                            speakPassword(response.nome, response.senha, response.atendimento, guicheValue);
                        }, 500);
                    } else {
                        $('#amostra').text('Não registrado em nosso banco de dados.');
                    }
                },
            });
        } else {
            alert('Por favor, selecione seu GUICHÊ.');
        }
    });
});


function speakPassword(nome, senha, atendimento, guicheValue) {
    var passwordMessage = 'ATENÇÃO, PRÓXIMA SENHA, ' + senha + ', EM NOME DE, ' + nome + ', PARA ATENDIMENTO DE, ' + atendimento + ', VÁ ATÉ, ' + guicheValue;

    // Utilizando a API de síntese de fala do navegador
    if ('speechSynthesis' in window) {
        var speech = new SpeechSynthesisUtterance(passwordMessage);
        speech.lang = 'pt-BR'; // Defina o idioma desejado
        window.speechSynthesis.speak(speech);

        // Pausa de 5 segundos antes da segunda chamada
        setTimeout(function () {
            window.speechSynthesis.speak(new SpeechSynthesisUtterance(passwordMessage));
        }, 15000);
    } else {
        alert('Seu navegador não suporta a síntese de fala.');
    }
}




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
                    $('#tituloAtendimento').show();
                    $('#btnCadUnico').show();
                    $('#btnBolsaFamilia').show();
                    $('#btnConcessao').show();
                    $('#btnAlistamentoMilitar').show();
                    $('#btnReceitaFederal').show();
                } else {
                    // Pessoa não encontrada, pode exibir uma mensagem de erro se desejar
                    $('#nomePessoa').text('CPF não registrado em nosso banco de dados.');

                    // Torna os botões visíveis
                    $('#tituloAtendimento').show();
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
        data: { senha: senhaGerada, cpf: cpf, nome: nome, tipoAtendimento: atendimentoSelecionado, prioridade: prioridade },
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
        $('#tituloAtendimento').hide();

        window.print();

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

// Esconder o botão de impressão inicialmente
$(document).ready(function () {
    $('#btnImprimir').hide();
});

$(document).ready(function () {
    $('#selecionarServico').on('change', function () {
        var servico = $(this).val();

        $.ajax({
            type: 'POST',
            url: 'telaOperador_test.php',
            data: { servico: servico },
            dataType: 'json',
            success: function (response) {

                $('#areaSenhas').empty();

                for (var i = 0; i < response.length; i++) {

                    if (response[i]['situacao_senha'] == '0') {
                        var situacao_senha_print = 'AGUARDANDO';
                    } else if (response[i]['situacao_senha'] == '1') {
                        var situacao_senha_print = 'EM ATENDIMENTO';
                    } else if (response[i]['situacao_senha'] == '2') {
                        var situacao_senha_print = 'AUSENTE';
                    } else if (response[i]['situacao_senha'] == '3') {
                        var situacao_senha_print = 'ENCERRADO';
                    }

                    $('#areaSenhas').append(response[i]['ordem_chegada'] + '.' + response[i]['senha'] + ' ' + response[i]['nome_atendido'] + ' ESTÁ <b>' + situacao_senha_print + '</b><br>');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});



$(document).ready(function () {
    // Esta função será executada quando a página for carregada ou reexibida
    function atualizarPagina() {
        location.reload(); // O parâmetro true força o recarregamento da página do servidor
    }
    // Registre a função para ser chamada quando a página for carregada ou reexibida
    window.addEventListener('pageshow', atualizarPagina);
});