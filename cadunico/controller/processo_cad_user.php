<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../style-registrar.css">
    <link rel="shortcut icon" href="../../img/logo.png" type="image/png">
    <title>Cadastro Salvo</title>
    <link rel="stylesheet" href="../../css/style-processo.css">
</head>
<body>

<?php
require_once '../../config/conexao.php';

// Inicializa a mensagem como vazia
$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tpacesso = $_POST['nivel'];
    $senha_hashed = password_hash("@senha123", PASSWORD_DEFAULT);
    $user_name = $_POST['nome_user'];
    $setor = $_POST['setor'];
    $email = $_POST['email'];

    // Adiciona a data e hora atual ao SQL
    $smtp = $conn->prepare("INSERT INTO usuarios (usuario, senha, nivel, setor, email, data_registro) VALUES (?,?,?,?, NOW())");

    // Verifica se a preparação foi bem-sucedida
    if ($smtp === false) {
        die('Erro na preparação SQL: ' . $conn->error);
    }

    $smtp->bind_param("sssss", $user_name, $senha_hashed, $tpacesso, $setor, $email);

    if ($smtp->execute()) {?>
        <h1>DADOS ENVIADOS COM SUCESSO!</h1>
        <div class="linha"></div>
        <?php
        // Redireciona para a página DE CADASTRAR NOVO USUÁRIO após ALGUNS segundos
        echo '<script> setTimeout(function(){ window.location.href = "../painel-adm/cadastro_user.php"; }, 1500); </script>';
    } else {
        echo "ERRO no envio dos DADOS: " . $smtp->error;
    }

    $smtp->close();
    $conn->close();
}
?>

</body>
</html>