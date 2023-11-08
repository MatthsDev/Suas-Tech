<?php
include "../config/conexao.php";
session_start(); // Inicie a sessão para acessar as variáveis de sessão

// Verifique o nível do usuário
if (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'admin') {
    // O usuário é um administrador.
    $voltar_link = '../painel-adm/adm-view.php';
} elseif (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'usuario') {
    // O usuário é um usuário comum.
    $voltar_link = '../painel-usuario/user-painel.php';
} else {
    // Redirecionar para a página de login ou exibir uma mensagem de erro, pois o nível do usuário não está definido.
    $voltar_link = '../index.php'; // Altere o link para a página de login
}
// Verifica se o usuário está autenticado como admin ou usuário
if (!isset($_SESSION['nome_usuario']) || ($_SESSION['nivel_usuario'] != 'admin' && $_SESSION['nivel_usuario'] != 'usuario')) {
    header("location:../index.php");
    exit; // Encerra o script após redirecionar
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/stylebuscar.css">
        <link rel="website icon" type="png" href="../img/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <title>Buscar Visitas</title>
    </head>
    <body>
        <div class="img">
            <h1 class="titulo-com-imagem">
                <img src="../img/buscarh1.svg" alt="Titulocomimagem">
            </h1>
        </div>
        <div class="camp1">
            <form method="post" action="../controller/parecer/conferir.php">
                <label for="codfam" class="busca">CÓDIGO FAMILIAR:</label>
                <input type="text" name="codfam" class="busca2" placeholder="Digite aqui.." required>
    
                <button type="submit">Buscar</button>
                <a href="visitas.php"><i class="fas fa-arrow-left"></i>Voltar</a>
        </div>    
        <div class="linha"></div>    
        </form>
    </body>
</html>