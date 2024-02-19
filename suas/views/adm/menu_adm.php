<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Suas-Tech/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>TechSUAS - Administrativo</title>
    <link rel="stylesheet" href="css/style_menu.css">
</head>
<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../adm/img/h1-adm.svg" alt="Titulocomimagem">
        </h1>
</div>
<div class="apelido">    
        <h3>Bem-vindo (a)
            <?php echo $apelido; ?>.
        </h3> 
    </div> 
        <div class="container">
            <nav>
                <div class="btn">
                    <a class="menu-button" id="cadastrar_contrato" onclick="window.location.href='/Suas-Tech/suas/views/adm/cadastro_contrato.php'">
                        <span class="material-symbols-outlined">
                        contract_edit
                        </span>
                        Cadastrar Contratos
                    </a>
                </div>
                <div class="btn">
                    <a class="menu-button" id="cadastrar_contrato" onclick="window.location.href='/Suas-Tech/suas/views/adm/contratos.php'">
                        <span class="material-symbols-outlined">
                        contract
                        </span>
                        Consultar Contratos
                    </a>
                </div>
            </nav>
        </div>
<footer><img src="img/footer-adm.svg" alt=""></footer>
</body>
</html>

