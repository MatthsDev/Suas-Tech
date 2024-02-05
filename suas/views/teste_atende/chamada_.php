<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

if (isset($_POST['chamar'])) {
    $chamandoSenha = $_POST['chamar'];
    $senhaAtendimento = $pdo->prepare('SELECT * FROM senhas WHERE tipo_atendimento = :chamar ORDER BY tipo_prioridade ASC, ordem_chegada ASC');
    $senhaAtendimento->bindParam(':chamar', $chamandoSenha);
    $senhaAtendimento->execute();

    $senhas = $senhaAtendimento->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($senhas);
    exit;
}

// Após verificar a senha a ser chamada
$atualizarSituacao = $pdo->prepare('UPDATE senhas SET situacao_senha = 2 WHERE ordem_chegada = :ordem_chegada');
$atualizarSituacao->bindParam(':ordem_chegada', $ordem_chegada);
$atualizarSituacao->execute();