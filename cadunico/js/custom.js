async function gerarSenha(tipoSenha) {
    try {
        const dados = await fetch('../controller/atendimento/gerar_senha.php?tipo=' + tipoSenha);
        
        if (!dados.ok) {
            throw new Error('Erro na requisição: ' + dados.status);
        }

        const resposta = await dados.json();

        if (!resposta.status) {
            document.getElementById("msgAlerta").innerHTML = resposta.msg;
            document.getElementById("senhaGerada").innerHTML = "";
        } else {
            document.getElementById("senhaGerada").innerHTML = resposta.nome_senha;
            document.getElementById("msgAlerta").innerHTML = "";
        }
    } catch (error) {
        console.error('Erro:', error.message);
        document.getElementById("msgAlerta").innerHTML = 'Erro na requisição. Verifique o console para mais detalhes.';
        document.getElementById("senhaGerada").innerHTML = "";
    }
}
