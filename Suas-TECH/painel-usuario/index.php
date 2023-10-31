<?php

// CARREGANDO SCRIPTS DE CONEXÃO E CONFIGURAÇÃO DO SISTEMA ( BANCO DE DADOS )
require_once("../config/conexao.php");

//CARREGANDO SESSAO DO USUARIO
session_start();
if(!isset($_SESSION['nome_usuario']) || $_SESSION['nivel_usuario'] != 'usuario'){
	header("location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SYCAD</title>
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>

    <div class="button-container">
    
    <button class="menu-button" onclick="location.href='../formulario/index.php';">
      <i class="fas fa-file-alt"></i> Formulários
    </button>

  </div>


</body>
</html>