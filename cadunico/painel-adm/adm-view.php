<?php

// CARREGANDO SCRIPTS DE CONEXÃO E CONFIGURAÇÃO DO SISTEMA ( BANCO DE DADOS )
require_once("../../config/conexao.php");
include '../../config/protecao.php';
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
  
    <div class="img">
      <h1 class="titulo-com-imagem">
        <img class="titulo-com-imagem" src="../img/h1-menu.svg" alt="Titulocomimagem">
      </h1>
    </div>
  <div class="tudo">
    <div class="container">
      <nav> 
        <div class="cadastrar">
          <a class="menu-button" onclick="location.href='cadastro_user.php';">
            <span class="material-symbols-outlined">
              person_add
            </span>
            Cadastrar Usuários
          </a>
        </div>

        <div class="formularios">
          <a class="menu-button" onclick="location.href='../views/forms/menuformulario.php';">
            <span class="material-symbols-outlined">
              forms_add_on
            </span>
            Formulários
          </a>
        </div>

        <div class="parecer">
          <a class="menu-button" onclick="location.href='../views/visit/visitas.php';">
            <span class="material-symbols-outlined">
            location_away
            </span>
            Visitas
          </a>
        </div>

        <div class="visitas">
          <a class="menu-button" onclick="location.href='../controller/folha_pagamento/folha.php';">
            <span class="material-symbols-outlined">
            request_quote
            </span>
            Folha de Pagamento
          </a>
        </div>

        <div class="folha">
          <a class="menu-button" onclick="location.href='../views/declar/declaracao.php';">
            <span class="material-symbols-outlined">
            quick_reference_all
            </span>
            Declarações do Cadastro Único
          </a>
        </div>

        <div class="atendimento">
          <a class="menu-button" onclick="location.href='../views/atendimento/index.php';">
            <span class="material-symbols-outlined">
              contacts
            </span>
            Atendimento
          </a>
        </div>
      <nav>   
    </div>
    <div class="calendario">
    <img class="calendario" src="../img/calend.svg" alt="calend">
    </div> 
  </div>
  <div class="logout">
          <a class="logout" onclick="location.href='../../config/logout.php';">
            <span class="material-symbols-outlined">
              logout
            </span> 
          </a>
        </div>
  </body>
</html>