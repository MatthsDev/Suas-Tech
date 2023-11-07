<?php
// CARREGANDO SCRIPTS DE CONEXÃO E CONFIGURAÇÃO DO SISTEMA (BANCO DE DADOS)
require_once("../config/conexao.php");

// CARREGANDO SESSAO DO USUARIO
session_start();

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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Suas-TECH</title>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/style-folha.css">
        <link rel="website icon" type="png" href="../img/icon.png">
    </head>
<body>
    <h1>FICHA DE EXCLUSÃO DE PESSOA</h1>
<?php
// Inclui o arquivo "conexao.php" que deve conter a configuração da conexão com o banco de dados
include 'function.php';

?>

</body>
</html>