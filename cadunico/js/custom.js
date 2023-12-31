async function gerarSenha(tipoSenha) {
    try {
        // Obtenha o nome da pessoa do campo de entrada
        const nomePessoa = document.getElementById("nome").value;
        // Obtenha o nome da pessoa do campo de entrada
        const cpfPessoa = document.getElementById("cpf_pess").value;

        // Adicione o nome da pessoa à URL da requisição
        const dados = await fetch(`../../controller/atendimento/gerar_senha.php?tipo=${tipoSenha}&nome=${nomePessoa}&cpf_pess=${cpfPessoa}`);

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
            
            // Limpar o campo do nome após a geração da senha
            document.getElementById("nome").value = "";
            // Limpar o campo do nome após a geração da senha
            document.getElementById("cpf_pess").value = "";
        }
    } catch (error) {
        console.error('Erro:', error.message);
        document.getElementById("msgAlerta").innerHTML = 'Erro na requisição. Verifique o console para mais detalhes.';
        document.getElementById("senhaGerada").innerHTML = "";
    }
}


// Funcao chamar senha conforme o tipo de senha recebido
async function chamarSenha(tipoSenha) {
    //console.log("Chamar senha, tipo de senha: " + tipoSenha);

    // Chamar o arquivo PHP para chamar a senha
    const dados = await fetch('../../controller/atendimento/chamar_senha.php?tipo=' + tipoSenha);

    // Ler os dados retornado pelo PHP
    const resposta = await dados.json();
    console.log(resposta);

    // Acessar o IF quando houve erro no arquivo "chamar_senha.php"
    if (!resposta['status']) {
        // Enviar a mensagem de erro para o SELETOR "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else { // Acessar o ELSE quando nao houve erro no arquivo "chamar_senha.php"
        // Enviar a mensagem de erro para o SELETOR "msgAlerta"
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];

        // Recuperar o SELETOR que esta ao redor da lista de senha
        var listaSenha = document.getElementById("lista-senha-gerada");

        // Recuperar o SELETOR da senha chamada
        var senha = document.getElementById("senha-gerada-" + resposta['id_senha_gerada']);

        // Remover a senha chamada da lista 
        listaSenha.removeChild(senha);
    }
}

// Função para obter as últimas senhas e atualizar dinamicamente a lista
async function obterUltimasSenhas() {
    try {
        const dados = await fetch('../../views/atendimento/tela.php');

        if (!dados.ok) {
            throw new Error('Erro na requisição: ' + dados.status);
        }

        const resposta = await dados.json();

        // Atualizar dinamicamente a lista de últimas senhas na página
        atualizarListaSenhas(resposta);
    } catch (error) {
        console.error('Erro na requisição:', error.message);
    }
}

// Função para obter as últimas senhas e atualizar dinamicamente a lista
async function obterUltimasSenhas() {
    try {
        const dados = await fetch('../../views/atendimento/tela.php');

        if (!dados.ok) {
            throw new Error('Erro na requisição: ' + dados.status);
        }

        const resposta = await dados.json();

        // Atualizar dinamicamente a lista de últimas senhas na página
        atualizarListaSenhas(resposta);
    } catch (error) {
        console.error('Erro na requisição:', error.message);
    }
}

