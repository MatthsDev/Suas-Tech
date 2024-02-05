<?php
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

    exit; // Adicionei a instrução exit para encerrar a execução após encontrar uma senha válida.
}