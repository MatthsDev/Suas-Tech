<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Formulário de Senhas</title>
</head>

<body>
    <h2>Formulário de Senhas</h2>
    <form method="POST" action="new/processar_dados.php">
        <label for="nomeSenha">Nome da Senha:</label>
        <input type="text" id="nomeSenha" name="nomeSenha" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" min="1" required>

        <label for="tipoSenha">Tipo da Senha (ID):</label>
        <input type="number" id="tipoSenha" name="tipoSenha" required>

        <label for="situacaoSenha">Situação da Senha (ID):</label>
        <input type="number" id="situacaoSenha" name="situacaoSenha" required>

        <button type="submit">Gerar Senhas</button>
    </form>
</body>
</html>
