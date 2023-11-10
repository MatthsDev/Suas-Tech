<?php
include "../config/conexao.php";
session_start(); // Inicie a sessão para acessar as variáveis de sessão

// Verifique o nível do usuário
if (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'admin') {
    // O usuário é um administrador.
    $voltar_link = '../painel-adm/adm-view.php';
} elseif (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'usuario') {
    // O usuário é um usuário comum.
    $voltar_link = '../painel-usuario/user-painel.php';
} else {
    // Redirecionar para a página de login ou exibir uma mensagem de erro, pois o nível do usuário não está definido.
    $voltar_link = '../index.php'; // Altere o link para a página de login
}
// Verifica se o usuário está autenticado como admin ou usuário
if (!isset($_SESSION['nome_usuario']) || ($_SESSION['nivel_usuario'] != 'admin' && $_SESSION['nivel_usuario'] != 'usuario')) {
  header("location:../index.php");
  exit; // Encerra o script após redirecionar
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/stylebuscar.css">
    <link rel="website icon" type="png" href="../img/icon.png">
    <title>Declaração PBF</title>
</head>

<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img src="../img/h1-declaração.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <form method="post" action="../controller/declaracao/conferir.php">
        <select name="buscar_dados" required>
            <option value="cpf_dec">CPF:</option>
            <option value="nis_dec">NIS:</option>
        </select>
        <input type="text" name="valorescolhido" placeholder="Digite aqui:" required>
        <br><br><br>
        <button type="submit">BUSCAR</button>
        <hr>
    </form>
</body>

</html>
