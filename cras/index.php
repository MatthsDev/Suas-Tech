<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once 'controller/condi-img-title.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style-menu.css">
    <link rel="website icon" type="png" href="img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title><?php echo $tituloDeAcordoComSetor; ?></title>
</head>
<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="<?php echo $imagemDeAcordoComSetor; ?>" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="apelido">    
        <h3>Bem-vindo (a)
            <?php echo $apelido; ?>.
        </h3> 
    </div>    
    <div class="container">
        <div class="menu"> 
            <nav>
                <div class="btn">
                    <a class="menu-button" onclick="location.href='cadastro_operadores.php';">
                    <span class="material-symbols-outlined">
                        deployed_code_account
                    </span>
                    Acompanhamento de Usuários
                    </a>
                </div>
                <div class="btn">
                    <a class="menu-button" onclick="location.href='views/cadastro_usuarios.php';">
                    <span class="material-symbols-outlined">
                        content_paste_go
                    </span>
                    Parecer Técnico 
                    </a>
                </div>
            </nav>
        </div>  
        <!--<footer><img src="../img/   " alt=""></footer>-->
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
            <a title="Alterar Usuário" href='views/conta.php';>
            <span  class="material-symbols-outlined">manage_accounts</span>       
            </a>
        </div>
    </div>    

</body>
</html>
