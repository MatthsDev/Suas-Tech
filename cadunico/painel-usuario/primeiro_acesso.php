<?php
require_once '../../config/conexao.php';
session_start();

$nome_user = $_SESSION['nome_user_1_acesso'];
echo $nome_user;
$_SESSION['nome_user_1_acesso'] = $nome_user;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Menu</title>
    <link rel="stylesheet" href="../css/adm.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../img/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/andr-04/vanilla-masker/master/dist/vanilla-masker.min.js"></script>
    <script src="../js/jquery.mask.min.js"></script>
    <script src="../js/jquery.mask.js"></script>
</head>

<body>
    <script src="../js/cpfvalid.js"></script>
    <div class="img">
        <h1 class="titulo-com-imagem">
            
            <img class="titulo-com-imagem" src="../img/h1-primeiro.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <h3>Bem-vindo
        <?php echo $nome_user; ?>, esse é o seu primeiro acesso. Informe seus dados.
    </h3>
    <h6>todos os campos com * são obrigatórios</h6>
    <form method="post" action="../controller/dados_alterados.php">

        <label>Nome Completo:</label>
        <input type="text" name="nome_comp" placeholder="Digite seu nome completo" required>

        <label>CPF:</label>
        <input type="text" id="cpf" name="cpf" placeholder="Apenas números" maxlength="14" required
            onblur="validarCPF(this)" required>

        <div id="res" name="res"></div>

        <label>Data de Nascimento:</label>
        <input type="date" name="dt_nasc" required>

        <label>E-mail:</label>
        <input type="email" name="email" placeholder="Email particular" required>

        <label>Telefone:</label>
        <input type="text" id="telefone" name="telefone" placeholder="Exemplo: (xx) x xxxx-xxxx" required>

        <label>Cargo:</label>
        <input type="text" name="cargo" required>

        <label>Identificação do Cargo:</label>
        <input type="text" name="id_cargo" placeholder="Matricula ou Certificado" required>

        <label>Nova Senha:</label>
        <input type="text" name="senha" placeholder="Escolha uma nova senha" required>

        <button type="submit">Concluir Cadastro</button>
    </form>

</body>

</html>