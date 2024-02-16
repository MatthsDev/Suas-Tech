<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

include_once '../controller/acesso_user/dados_usuario.php';


?>

<!DOCTYPE html>
<html lang="pt-BR">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Cadastro Único</title>
    <link rel="stylesheet" href="../css/adm.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../img/logo.png">
  </head>

  <body>
  <div class="usertext">
    <h3>Bem-vindo (a)
        <?php echo $apelido; ?>
    </h3>
  </div>  
    <div class="img">
      <h1 class="titulo-com-imagem">
        <img class="titulo-com-imagem" src="../img/h1-menu.svg" alt="Titulocomimagem">
      </h1>
    </div>
  <div class="tudo">
    <div class="container">
      <nav> 
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
            Declarações Cadastro Único
          </a>
        </div>

        <div class="atendimento">
          <a class="menu-button" onclick="location.href='../views/atendimento/index.php';">
            <span class="material-symbols-outlined">
              contacts
            </span>
            Atendimento
          </a>
          <div class="peixe">
          <a class="menu-button" target="_blank" href='/Suas-Tech/suas/peixe/logado/form.php';">
            <span class="material-symbols-outlined">
              set_meal
            </span>
            Cadastro Peixe
          </a>
        </div>
        </div>
      <nav>   
    </div>
    <div class="calend">  
      <div class="calendendario">
        <img class="calendario" src="../img/calend.svg" alt="calend">
      </div> 
    </div>  
  </div>
  <div class="drop-all">
  <div class="menu-drop">
    <button class="logout" type="button" name="drop">
      <span class="material-symbols-outlined">
        Settings
      </span> 
      <div class="drop-content">
        <a title="Sair" href='../../config/logout.php';>
        <span title="Sair" class="material-symbols-outlined">logout</span>    
        </a>
        <a title="Alterar Usuário" href='../views/acessos/conta.php';>
        <span  class="material-symbols-outlined">manage_accounts</span>       
        </a>
        <?php
    if($nivel == 'suport'){
        ?> <a title="Suporte" href='/Suas-Tech/acesso_suporte/index.php';>
        <span  class="material-symbols-outlined">rule_settings</span>       
        </a> <?php
        exit();
    }
    ?>   
      </div>
  </div>
  </body>
</html>