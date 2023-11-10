async function gerarSenha(tipoSenha) {
    try {
        const dados = await fetch('../controller/atendimento/gerar_senha.php?tipo=' + tipoSenha);
        const resposta = await dados.json();

        if (!resposta['status']) {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            document.getElementById("senhaGerada").innerHTML = "";
        } else {
            document.getElementById("senhaGerada").innerHTML = resposta['nome_senha'];
            document.getElementById("msgAlerta").innerHTML = "";
        }
    } catch (error) {
        console.error('Erro:', error);
    }
}
