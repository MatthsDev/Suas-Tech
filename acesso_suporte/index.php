<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ACESSO RESTRITO<h1>

    <div class="cadastrar">
    <a class="menu-button" href='../cadunico/painel-adm/adm-view.php';>
            CadÚnico ADM
          </a><br><hr>
          <a class="menu-button" href='../cadunico/painel-usuario/user-painel.php';>
            CadÚnico COMUM
          </a><br><hr>

          <div class="cadastrar">
    <a class="menu-button" href='../cozinha_comunitaria/menu.php';>
            Cozinha Comunitária
          </a><br><hr>

          <div class="cadastrar">
    <a class="menu-button" href='../cras/index.php';>
            CRAS
          </a><br><hr>


        </div>
</body>
</html>
