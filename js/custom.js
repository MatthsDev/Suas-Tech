// Função para gerar senha conforme o tipo da senha enviado no parâmetro
async function gerarSenha(tipoSenha) {
    try {
        // Chamar o arquivo PHP para gerar a senha
        const response = await fetch(`../controller/atendimento/gerar_senha.php?tipo=${tipoSenha}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
            },
            credentials: 'same-origin',
        });

        // Verificar se a resposta é bem-sucedida
        if (!response.ok) {
            throw new Error(`Erro na requisição: ${response.status}`);
        }

        // Ler os dados retornados pelo PHP
        const data = await response.json();
        console.log(data);

        // Verificar se houve erro no arquivo "gerar_senha.php"
        if (!data['status']) {
            // Enviar a mensagem de erro para o seletor "msgAlerta"
            document.getElementById("msgAlerta").innerHTML = data['msg'];
            // Apagar a senha gerada anteriormente
            document.getElementById("senhaGerada").innerHTML = "";
        } else {
            // Enviar a senha gerada para o seletor "senhaGerada"
            document.getElementById("senhaGerada").innerHTML = data['nome_senha'];
            // Apagar a mensagem de erro, caso exista
            document.getElementById("msgAlerta").innerHTML = "";
        }
    } catch (error) {
        // Lidar com erros durante a execução da função
        console.error('Erro:', error.message);
        // Exibir mensagem de erro no seletor "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = `<p style='color: #f00;'>Erro: ${error.message}</p>`;
        // Apagar a senha gerada anteriormente
        document.getElementById("senhaGerada").innerHTML = "";
    }
}
