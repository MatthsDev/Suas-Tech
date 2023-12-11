<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-suporte.css">
    <link rel="website icon" type="png" href="../cadunico/img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Suporte - DDV</title>
</head>
<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="img/h1-ddv.png" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <div class="menu"> 
            <nav>
                <div class="btn">
                    <a class="menu-button" onclick="location.href='../cadunico/painel-adm/adm-view.php';">
                    CadÚnico ADM
                    </a>
                </div> 
                <div class="btn">
                    <a class="menu-button" onclick="location.href='../cadunico/painel-usuario/user-painel.php';">
                    CadÚnico USER
                    </a>
                </div>    
                <div class="btn">
                        <a class="menu-button" onclick="location.href='../cozinha_comunitaria/menu.php';">
                        Cozinha Comunitária
                        </a>
                </div>
                <div class="btn">
                        <a class="menu-button" onclick="location.href='../cras/views/menu-cras-am.php';">
                        CRAS Antonio Matias
                        </a>
                </div>
                <div class="btn">
                        <a class="menu-button" onclick="location.href='../cras/views/menu-cras-st.php';">
                        CRAS Santo Afonso
                        </a>
                </div>
            </nav>
        </div>  
        <div class="drop-all">
            <div class="menu-drop">
                <button class="logout" type="button" name="drop">
                <span class="material-symbols-outlined">
                Settings
                </span> 
            <div class="drop-content">
                <a title="Sair" href='../config/logout.php';>
                <span title="Sair" class="material-symbols-outlined">logout</span>    
                </a>
                <a title="Alterar Usuário" href='conta.php';>
                <span  class="material-symbols-outlined">manage_accounts</span>       
                </a>
            </div>
        </div> 
</body>
</html>
