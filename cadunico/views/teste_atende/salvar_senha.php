<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
error_log("Início do script PHP");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe a senha, CPF e nome enviados via POST
    $senha = $_POST["senha"];
    $cpf = $_POST["cpf"];


    if ($_POST["nome"] == "CPF não registrado em nosso banco de dados."){
        $nome_pessoa = "CPF desconhecido";
    }else{
        $nome_pessoa = $_POST["nome"];
    }



    // Obtém o timestamp atual
    $timestamp = date('Y-m-d H:i:s');

    // Verifica se a senha já existe no banco de dados
    $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM senhas WHERE senha = :senha");
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $contagem = ($result['count'] > 0) ? $result['count'] + 1 : 1;
    $senha_formatada = $contagem . "." . $senha;

    // Insere a senha no banco de dados
    $stmt = $pdo->prepare("INSERT INTO senhas (ordem_chegada, senha, cpf_atendido, nome_atendido, data_hora_registro) VALUES (:ordem_chegada, :senha, :cpf_atendido, :nome_atendido, :data_hora_registro)");
    $stmt->bindValue(":nome_atendido", ($nome_pessoa ?? 'NULL'), PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':ordem_chegada', $contagem);
    $stmt->bindParam(':data_hora_registro', $timestamp);
    $stmt->bindParam(':cpf_atendido', $cpf);

    if ($stmt->execute()) {

        echo json_encode(['status' => 'success', 'response.senha_formatada' => $senha_formatada]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Erro ao salvar a senha no banco de dados!']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de requisição inválido!']);
}

error_log("Fim do script PHP");
