<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../cadunico/img/logo.png">

    <title>Cadastro de setores</title>
</head>
<body>
    <h1>CADASTRO DE SETORES</h1>
    <form method="post" action="../controller/salvando_setor.php">

    <label>INSTITUIÇÃO: </label>
    <input type="text" name="instituicao" spaceholder="Digite o nome da instituição">

    <label>Endereço: </label>
    <input type="text" name="endereco_inst" spaceholder="Qual a localidade">

    <label>Código do Estabelecimento: </label>
    <input type="text" name="codigo" spaceholder="Caso tenha...">

    <label>Coordenação Responsável: </label>
    <input type="text" name="responsavel" spaceholder="Nome do Responsável">

    <label>CPF da Coordenação: </label>
    <input type="text" name="cpf_coord">

        </form>
    </body>
</html>
