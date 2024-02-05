<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

// Obtém o timestamp atual
$timestamp = date('Y-m-d H:i:s');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $stmt = $pdo->prepare('SELECT * FROM senhas ORDER BY tipo_prioridade ASC, ordem_chegada ASC');
    $stmt->execute();

    while ($key = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if ($key['tipo_prioridade'] == 'A' && $key['situacao_senha'] == 0) {
            $senha_chamada = $key['ordem_chegada'] . "." . $key['senha'];
            $nome_atendido = $key['nome_atendido'];

            if ($key['tipo_atendimento'] == "CAD") {
                $tipo_atendimento = 'CADASTRO ÚNICO';
            } elseif ($key['tipo_atendimento'] == "PBF") {
                $tipo_atendimento = 'BOLSA FAMILIA';
            } elseif ($key['tipo_atendimento'] == "CONC") {
                $tipo_atendimento = 'CONCESSÃO';
            } elseif ($key['tipo_atendimento'] == "AMI") {
                $tipo_atendimento = 'ALISTAMENTO MILITAR';
            } elseif ($key['tipo_atendimento'] == "RFB") {
                $tipo_atendimento = 'RECEITA FEDERAL';
            }
            $situacao_senha = 1;

            echo json_encode(array('encontrado' => true, 'senha' => $senha_chamada, 'nome' => $nome_atendido, 'atendimento' => $tipo_atendimento));

            // Prepare a nova consulta utilizando a extensão PDO
            $stmtUpdate = $pdo->prepare("UPDATE senhas SET situacao_senha=?, atendente=?, data_hora_atendido=?, setor_atendido=? WHERE nome_atendido=?");
            if (!$stmtUpdate) {
                die('Erro na preparação da consulta: ' . $pdo->errorInfo());
            }

            // Execute a nova consulta com os parâmetros necessários
            $stmtUpdate->execute([$situacao_senha, $nome, $timestamp, $setor, $nome_atendido]);

            exit; // A instrução exit encerra a execução após encontrar uma senha válida.
        } else if ($key['tipo_prioridade'] == 'M' && $key['ordem_chegada'] <= 2 && $key['situacao_senha'] == 0){
            $senha_chamada = $key['ordem_chegada'] . "." . $key['senha'];
            $nome_atendido = $key['nome_atendido'];

            if ($key['tipo_atendimento'] == "CAD") {
                $tipo_atendimento = 'CADASTRO ÚNICO';
            } elseif ($key['tipo_atendimento'] == "PBF") {
                $tipo_atendimento = 'BOLSA FAMILIA';
            } elseif ($key['tipo_atendimento'] == "CONC") {
                $tipo_atendimento = 'CONCESSÃO';
            } elseif ($key['tipo_atendimento'] == "AMI") {
                $tipo_atendimento = 'ALISTAMENTO MILITAR';
            } elseif ($key['tipo_atendimento'] == "RFB") {
                $tipo_atendimento = 'RECEITA FEDERAL';
            }
            $situacao_senha = 1;

            echo json_encode(array('encontrado' => true, 'senha' => $senha_chamada, 'nome' => $nome_atendido, 'atendimento' => $tipo_atendimento));

            // Prepare a nova consulta utilizando a extensão PDO
            $stmtUpdate = $pdo->prepare("UPDATE senhas SET situacao_senha=?, atendente=?, data_hora_atendido=?, setor_atendido=? WHERE nome_atendido=?");
            if (!$stmtUpdate) {
                die('Erro na preparação da consulta: ' . $pdo->errorInfo());
            }

            // Execute a nova consulta com os parâmetros necessários
            $stmtUpdate->execute([$situacao_senha, $nome, $timestamp, $setor, $nome_atendido]);

            exit; // A instrução exit encerra a execução após encontrar uma senha válida.
        } else if ($key['tipo_prioridade'] == 'S' && $key['ordem_chegada'] <= 2 && $key['situacao_senha'] == 0){
            $senha_chamada = $key['ordem_chegada'] . "." . $key['senha'];
            $nome_atendido = $key['nome_atendido'];

            if ($key['tipo_atendimento'] == "CAD") {
                $tipo_atendimento = 'CADASTRO ÚNICO';
            } elseif ($key['tipo_atendimento'] == "PBF") {
                $tipo_atendimento = 'BOLSA FAMILIA';
            } elseif ($key['tipo_atendimento'] == "CONC") {
                $tipo_atendimento = 'CONCESSÃO';
            } elseif ($key['tipo_atendimento'] == "AMI") {
                $tipo_atendimento = 'ALISTAMENTO MILITAR';
            } elseif ($key['tipo_atendimento'] == "RFB") {
                $tipo_atendimento = 'RECEITA FEDERAL';
            }
            $situacao_senha = 1;

            echo json_encode(array('encontrado' => true, 'senha' => $senha_chamada, 'nome' => $nome_atendido, 'atendimento' => $tipo_atendimento));

            // Prepare a nova consulta utilizando a extensão PDO
            $stmtUpdate = $pdo->prepare("UPDATE senhas SET situacao_senha=?, atendente=?, data_hora_atendido=?, setor_atendido=? WHERE nome_atendido=?");
            if (!$stmtUpdate) {
                die('Erro na preparação da consulta: ' . $pdo->errorInfo());
            }

            // Execute a nova consulta com os parâmetros necessários
            $stmtUpdate->execute([$situacao_senha, $nome, $timestamp, $setor, $nome_atendido]);

            exit; // A instrução exit encerra a execução após encontrar uma senha válida.
        } else if ($key['tipo_prioridade'] == 'B' && $key['ordem_chegada'] <= 2 && $key['situacao_senha'] == 0){
            $senha_chamada = $key['ordem_chegada'] . "." . $key['senha'];
            $nome_atendido = $key['nome_atendido'];

            if ($key['tipo_atendimento'] == "CAD") {
                $tipo_atendimento = 'CADASTRO ÚNICO';
            } elseif ($key['tipo_atendimento'] == "PBF") {
                $tipo_atendimento = 'BOLSA FAMILIA';
            } elseif ($key['tipo_atendimento'] == "CONC") {
                $tipo_atendimento = 'CONCESSÃO';
            } elseif ($key['tipo_atendimento'] == "AMI") {
                $tipo_atendimento = 'ALISTAMENTO MILITAR';
            } elseif ($key['tipo_atendimento'] == "RFB") {
                $tipo_atendimento = 'RECEITA FEDERAL';
            }
            $situacao_senha = 1;

            echo json_encode(array('encontrado' => true, 'senha' => $senha_chamada, 'nome' => $nome_atendido, 'atendimento' => $tipo_atendimento));

            // Prepare a nova consulta utilizando a extensão PDO
            $stmtUpdate = $pdo->prepare("UPDATE senhas SET situacao_senha=?, atendente=?, data_hora_atendido=?, setor_atendido=? WHERE nome_atendido=?");
            if (!$stmtUpdate) {
                die('Erro na preparação da consulta: ' . $pdo->errorInfo());
            }

            // Execute a nova consulta com os parâmetros necessários
            $stmtUpdate->execute([$situacao_senha, $nome, $timestamp, $setor, $nome_atendido]);

            exit; // A instrução exit encerra a execução após encontrar uma senha válida.
        }
    }

    // Se o loop terminar e nenhuma senha for encontrada, envie uma resposta indicando que não foi encontrado.
    echo json_encode(array('encontrado' => false, 'mensagem' => 'Senha não encontrada.'));
} else {
    echo json_encode(array('erro' => 'Método de requisição inválido!'));
}