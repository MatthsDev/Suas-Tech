<?php

session_start(); // Inicie a sessão para acessar as variáveis de sessão
include '../cadunico/config/conexao.php';

// Verifique o nível do usuário
if (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'admin') {
    // O usuário é um administrador.
    $voltar_link = '../../painel-adm/adm-view.php';
} elseif (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'usuario') {
    // O usuário é um usuário comum.
    $voltar_link = '../../painel-usuario/user-painel.php';
} else {
    // Redirecionar para a página de login ou exibir uma mensagem de erro, pois o nível do usuário não está definido.
    $voltar_link = '../../index.php'; // Altere o link para a página de login
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessão</title>
</head>
<body>
    <form method="post" action="controller/buscar_dados.php" required>
    <p><label>CPF: </label> <input type="text" name="cpf_dec" spacehold="Digite o CPF..."></p>
    <input type="submit" name="btn" value="Enviar">
</body>
</html>