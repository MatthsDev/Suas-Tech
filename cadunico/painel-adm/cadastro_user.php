<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
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
    <title>Cadastro Usuários</title>


</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img src="../img/h1-cad-user.svg" alt="NoImage">
        </h1>
    </div>

    <div class="container">
        <form method="post" action="../controller/acesso_user/processo_cad_user.php">
            <div class="nome">
                <label>Nome completo:</label>
                <input type="text" class="nome" name="nome_user" placeholder="Sem Abreviação." required>
            </div>
            <div class="email">
                <label>E-mail:</label>
                <input type="email" name="email" placeholder="Digite aqui seu e-mail." required>
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
    <select name="setor" required>
        <option value="" disabled selected hidden>Selecione</option>
        <?php

$consultaSetores = $conn->query("SELECT instituicao, nome_instit FROM setores");

// Verifica se há resultados na consulta
if ($consultaSetores->num_rows > 0) {
    
    // Loop para criar as opções do select
    while ($setor = $consultaSetores->fetch_assoc()) {
        echo '<option value="' . $setor['instituicao'] . ' - ' . $setor['nome_instit'] . '">' . $setor['instituicao'] . ' - ' . $setor['nome_instit'] . '</option>';
    }
}
?>
    </select>
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
