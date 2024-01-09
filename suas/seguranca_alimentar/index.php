<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-index.css">
    <link rel="shortcut icon" href="/Suas-Tech/cadunico/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Segurança Alimentar Nutricional</title>
</head>
<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="img/h1-seg-alim.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="apelido">    
        <h3>Bem-vindo (a)
            <?php echo $apelido; ?>.
        </h3> 
    </div> 
<div class="container">
        <div class="menu"> 
            <na<div class="button">
                    <a class="menu-button" onclick="location.href='cadastro_operadores.php';">
                    <span class="material-symbols-outlined">
                        event_upcoming
                    </span>
                    Agendar Visita 
                    </a>
                </div> 
                <div class="button">
                    <a class="menu-button" onclick="location.href='views/fluxo_diario.php';">
                    <span class="material-symbols-outlined">
                        calendar_add_on
                    </span>
                    Registro
                    </a>
                </div>    
                <div class="button">
                        <a class="menu-button" onclick="location.href='views/estoque.php';">
                        <span class="material-symbols-outlined">
                            feature_search
                        </span>
                        Consulta
                        </a>
                </div>
                <div class="button">
                    <a class="menu-button" onclick="location.href='views/testecartao.php';">
                    <span class="material-symbols-outlined">
                        inventory
                    </span>
                    Estoque
                    </a>
                </div>
            </nav>
            <footer><img src="img/footer-seg-alim.svg" alt=""></footer>
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
            <a title="Alterar Usuário" href='../../cozinha_comunitaria/views/conta.php';>
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