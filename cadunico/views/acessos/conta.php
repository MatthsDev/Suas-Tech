<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/dados_usuario.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="image/png" href="../img/logo.png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Sala do Usuário</title>
    <style>
        .edicao {
            display: none;
        }
    </style>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <!--<img src="../../img/h1.svg" alt="Titulocomimagem">-->
        </h1>
    </div>

    <form method="post" action="../../controller/acesso_user/salva_alteracao.php">
        <div id="nomeVisual">
            Nome completo: <?php echo $nome; ?>
            <button type="button" onclick="iniciarEdicao('nome')">Editar</button> <br>
        </div>
        <!-- Campos de edição (inicialmente ocultos) -->
        <div id="nomeEdicao" class="edicao">
            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" oninput="sempre_maiusculo(this)" required>
        </div>

        <div id="apelidoVisual">
            Como quer ser chamado(a)? <?php echo $apelido; ?>
            <button type="button" onclick="iniciarEdicao('apelido')">Editar</button> <br>
        </div>
        <!-- Campos de edição (inicialmente ocultos) -->
        <div id="apelidoEdicao" class="edicao">
            <label for="apelido">Como quer ser chamado(a)? </label>
            <input type="text" id="apelido" name="apelido" value="<?php echo $apelido; ?>" oninput="sempre_maiusculo(this)" required>
        </div>

<?php echo "CPF: " . $cpf . "<br>";
echo "Data de Nascimento: " . $dtNasc . "<br>"; ?>

        <div id="teleVisual">
            Contato: <?php echo $telefone; ?>
            <button type="button" onclick="iniciarEdicao('tele')">Editar</button><br>
        </div>
        <!-- Campos de edição (inicialmente ocultos) -->
        <div id="teleEdicao" class="edicao">
            <label for="tele">Contato: </label>
            <input type="text" id="tele" name="tele" value="<?php echo $telefone; ?>" required>
        </div>

        <div id="emailVisual">
            Email: <?php echo $email; ?>
            <button type="button" onclick="iniciarEdicao('email')">Editar</button><br>
        </div>
        <!-- Campos de edição (inicialmente ocultos) -->
        <div id="emailEdicao" class="edicao">
            <label for="email">Email: </label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>

        <div id="cargoVisual">
            Cargo: <?php echo $cargo; ?>
            <button type="button" onclick="iniciarEdicao('cargo')" id=>Editar</button><br>
        </div>
        <!-- Campos de edição (inicialmente ocultos) -->
        <div id="cargoEdicao" class="edicao">
            <label for="cargo">Cargo: </label>
            <input type="text" id="cargo" name="cargo" value="<?php echo $cargo; ?>" oninput="sempre_maiusculo(this)" required>
        </div>

        <div id="idcargoVisual">
            Certificado ou Matricula: <?php echo $idcargo; ?>
            <button type="button" id="sempre_maiusculo(this)">Editar</button><br>
        </div>
        <!-- Campos de edição (inicialmente ocultos) -->
        <div id="idcargoEdicao" class="edicao">
            <label for="idcargo">Certificado ou Matricula: </label>
            <input type="text" id="idcargo" name="idcargo" value="<?php echo $idcargo; ?>" required>
        </div>

        <button type="submit">Salvar Alterações</button>
    </form>

    <a href="<?php echo $voltar_link; ?>">
        <i class="fas fa-arrow-left"></i> Voltar ao menu
    </a>
    
        <script src='../js/personalise.js'></script>
</body>

</html>
