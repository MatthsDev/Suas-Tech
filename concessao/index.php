<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Concessão</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="/Suas-Tech/img/logo.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="img">
    <h1 class="titulo-com-imagem">
        <img src="" alt="Titulocomimagem">
    </h1>
    </div>
    <div class="container">
    <div class="apelido">
        <h3>Bem-vindo (a)
            <?php echo $apelido; ?>.
        </h3>
    </div>
<nav>

    <div class="parecer">
        <a class="menu-button" onclick="location.href='views/cadastro_pessoa.php';">
        <span class="material-symbols-outlined">
        quick_reference_all
        </span>
        Cadastrar Pessoa
        </a>
    </div>

    <div class="atendimento">
        <a class="menu-button" onclick="location.href='views/gerar_form.php';">
        <span class="material-symbols-outlined">
            contacts
        </span>
        Gerar Formulário
        </a>
    </div>

    <div class="atendimento">
        <a class="menu-button" onclick="location.href='';">
        <span class="material-symbols-outlined">
            contacts
        </span>
        Consultar Concessão
        </a>
    </div>

    <div class="atendimento">
        <a class="menu-button" onclick="location.href='';">
        <span class="material-symbols-outlined">
            contacts
        </span>
        Cadastrar Itens
        </a>
    </div>

    <div class="atendimento">
        <a class="menu-button" onclick="location.href='';">
        <span class="material-symbols-outlined">
            contacts
        </span>
        Editar informações
        </a>
    </div>
    </div>
</nav>


</body>
</html>