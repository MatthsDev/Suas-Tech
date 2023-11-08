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
    <title>TechSUAS - Menu</title>
    <link rel="stylesheet" href="../css/adm.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../img/logo.png">
  </head>

  <body>
   <nav> 
    <div class="img">
      <h1 class="titulo-com-imagem">
        <img src="../img/h1-menu.svg" alt="Titulocomimagem">
      </h1>
    </div>
    <div class="container">

      <div class="formularios">
        <button class="menu-button" onclick="location.href='../views/menuformulario.html';">
          <span class="material-symbols-outlined">
            forms_add_on
          </span>
         Formulários
        </button>
      </div>

      <div class="parecer">
        <button class="menu-button" onclick="location.href='#';">
          <span class="material-symbols-outlined">
            forum
          </span>
           Parecer
        </button>
      </div>

      <div class="visitas"></div>
        <button class="menu-button" onclick="location.href='../views/visitas.php';">
          <span class="material-symbols-outlined">
            location_away
          </span>
           Visitas
        </button>
      </div>
    </div>
    
  </body>
</html>