<?php
include_once 'function.php';
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylebuscar.css">
    <link rel="website icon" type="png" href="../img/icon.png">

    <title>Declaração PBF</title>
</head>

<body>


    <h1>DECLARAÇÃO DO CADASTRO ÚNICO</h1>

    <form method="post" action="../controller/declaracao/conferir.php">
        <select name="buscar_dados" required>
            <option value="cpf_dec">CPF:</option>
            <option value="nis_dec">NIS:</option>
        </select>

        <input type="text" name="valorescolhido" placeholder="Digite aqui:" required>
        <br><br><br>
        <button type="submit">BUSCAR</button>
        <hr>

    </form>
</body>

</html>
