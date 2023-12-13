<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/style-reg-user.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Cadastro de Operadores</title>


</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img src="../img/h1-cadastrar.svg" alt="NoImage">
        </h1>
    </div>

    <div class="container">
        <form method="post" action="../cadunico/controller/acesso_user/processo_cad_user.php">
            <div class="nome">
                <label>Nome completo:</label>
                <input type="text" class="nome" name="nome_user" placeholder="Sem Abreviação." required>
            </div>
            <div class="email">
                <label>E-mail:</label>
                <input type="email" name="email" placeholder="Digite aqui seu e-mail" required>
            </div>
            <div class="tipodeacesso">
                <label>Tipo de acesso: </label>
                <select name="nivel" required>
                    <option value="" disabled selected hidden>Selecione</option>
                    <option value="admin">Administrador</option>
                    <option value="usuario">Usuário</option>
                </select>
            </div>
            <div class="setor">
                <label>Setor:</label>
                <input type="text" name="setor" placeholder="De qual instância" required>
            </div>
            <div class="tipodeacesso">
                <label>Função: </label>
                <select name="funcao" required>
                    <option value="" disabled selected hidden>Selecione</option>
                    <option value="1">Coordenação</option>
                    <option value="2">Tecnico(a)</option>
                    <option value="3">Outros</option>
                </select>
            <div class="btns">
                <button type="submit">Cadastrar</button>
                <a onclick="goBack()">
                <i class="fas fa-arrow-left"></i> Voltar ao menu
                </a>
            </div>
            </div>
        </form>
    </div>
    <script src='../../controller/back.js'></script>
</body>
</html>
