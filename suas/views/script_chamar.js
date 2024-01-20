$(document).ready(function () {
    $('#chamar').click(function () {
        var senhaChamada = $(this).val();
        $.ajax({
            type: 'POST',
            url: 'buscar_senha.php',
            data: { senhaChamada: senhaChamada },
            dataType: 'json',
            success: function (response) {
                if (response.encontrado) {
                    $('#mostrar_nome').text('Nome: ' + response.nome);
                    $('#mostrar_senha').text('Senha: ' + response.senha);


                    // Chama a função de síntese de fala após 4 segundos
                    setTimeout(function () {
                        speakPassword(response.nome, response.senha, response.atendimento);
                    }, 500);
                } else {
                    $('#amostra').text('Não registrado em nosso banco de dados.');
                }
            },
        });
    });
});

function speakPassword(nome, senha, atendimento) {
    var passwordMessage = 'ATENÇÃO, PRÓXIMA SENHA, ' + senha + ', EM NOME DE, ' + nome + ', PARA ATENDIMENTO DE, ' + atendimento;

    // Utilize a API de síntese de fala do navegador
    if ('speechSynthesis' in window) {
        var speech = new SpeechSynthesisUtterance(passwordMessage);
        speech.lang = 'pt-BR'; // Defina o idioma desejado
        window.speechSynthesis.speak(speech);
    } else {
        alert('Seu navegador não suporta a síntese de fala.');
    }
}
