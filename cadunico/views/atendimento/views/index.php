<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Tech-Suas</title>
</head>

<body>
    <a href="gerar_atend.php">Gerar Senha</a><br>
    <a href="atendimento.php">Chamar Senha</a><br>
    <a href="liberar_senha.php">Liberar Senha</a><br>
    
    <a href="tela.php">Tela</a><br><br><br><br><br>


    <a href="man.php">cadastrar senha<+/a><br>
    <a href="cadastrar_setores.php">cadastrar Atendimento "(para cadastrar senha, é necessario gerar o atendimento e os tipos de fila)"</a><br>
</body>
</html>