<?php
require_once '../../config/conexao.php';
session_start();

$nome_user = $_SESSION['nome_user_1_acesso'];
$nome_user;
$_SESSION['nome_user_1_acesso'] = $nome_user;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Menu</title>
    <link rel="stylesheet" href="../css/p-acesso.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <div class="img">
    <h1 class="titulo-com-imagem">
        <img class="titulo-com-imagem" src="../img/h1-p-acesso.svg" alt="Titulocomimagem">
    </h1>
    </div>
            <h3>Bem-vindo <?php echo $nome_user; ?>, esse é o seu primeiro acesso. Informe seus dados.</h3>
    <h6>todos os campos com * são obrigatórios</h6>

<div class="container">    
    <form method="post" action="../controller/dados_alterados.php">
        <div class="nome">  
            <label>Nome Completo:</label>
            <input type="text" name="nome_comp" placeholder="Digite seu nome completo" required>
        </div>
        
        <div class="cpf">
            <label>CPF:</label>
            <input type="text" name="cpf" placeholder="Apenas numeros" required>
        </div>

        <div class="dtnasc">
            <label>Data de Nascimento:</label>
            <input type="date" name="dt_nasc" required>
        </div>

        <div class="email">
            <label>E-mail:</label>
            <input type="email" name="email" placeholder="Email particular" required>
        </div>

        <div class="telefone">
            <label>Telefone:</label>
            <input type="text" name="telefone" placeholder="Exemplo: (xx) x xxxx-xxxx" required>
        </div>

        <div class="cargo">
            <label>Cargo:</label>
            <input type="text" name="cargo" required>
        </div>

        <div class="idcargo">
            <label>Identificação do Cargo:</label>
            <input type="text" name="id_cargo" placeholder="Matricula ou Certificado" required>
        </div>

        <div class="senha">
            <label>Nova Senha:</label>
            <input type="text" name="senha" placeholder="Escolha uma nova senha" required>
        </div>
        <div class="btn">
            <button type="submit">Concluir Cadastro</button>
        </div>
        <script src="../js/mascaras.js"></script>
    </form>
</div>
</body>
</html>
