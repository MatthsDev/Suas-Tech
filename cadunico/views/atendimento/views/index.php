<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Tech-Suas</title>
    <link rel="stylesheet" href="../css/style_atend.css">
    <link rel="shortcut icon" href="../../../../cadunico/img/logo.png" type="image/x-icon">
</head>

<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-atendimento.svg" alt="Titulocomimagem">
        </h1>
</div> 
<div class="container">
    <nav>
        <div>    
            <a href="gerar_atend.php">Gerar Senha</a>
        </div>
        <div>
            <a href="atendimento.php">Chamar Senha</a>
        </div>
        <div>
            <a href="liberar_senha.php">Liberar Senha</a>
        </div>
        <div>
            <a href="tela.php">Tela</a>
        </div>
        <div>
            <a href="man.php">cadastrar senha</a>
        </div>
        <div>
            <a href="cadastrar_setores.php">cadastrar Atendimento</a>
        </div>
    </nav>
</div>
</body>
</html>