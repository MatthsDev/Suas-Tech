<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../style-registrar.css">
    <link rel="shortcut icon" href="../../img/logo.png" type="image/png">
    <title>Registrar visitas</title>
    <link rel="stylesheet" href="../../css/style-processo.css">
</head>
<body>

<?php
require_once '../../config/conexao.php';
// Inicializa a mensagem como vazia
$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tpacesso = $_POST['buscar_dados'];
    $user_senha = $_POST['senha_user'];
    $user_name = $_POST['nome_user'];

    $smtp = $conn->prepare("INSERT INTO usuarios_test (buscar_dados, senha_user, nome_user) VALUES (?,?,?)");
    $smtp->bind_param("sss", $tpacesso, $user_senha, $user_name);

    if ($smtp->execute()) {?>
        <H1 >"DADOS ENVIADOS COM SUCESSO!" </H1>
        <div class="linha"></div>
        <?php
// Redireciona para a página registrar.html após 3 segundos
        echo '<script> setTimeout(function(){ window.location.href = "../painel-adm/cadastro_user.php"; }, 3000); </script>';

    } else {
        echo "ERRO no envio dos DADOS: " . $smtp->error;
    }

    $smtp->close();
    $conn->close();

}
?>