<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../style-registrar.css">
    <link rel="shortcut icon" href="../../img/logo.png" type="image/png">
    <title>Cadastro salvo</title>
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
    $user_senha = "@senha123";
    $user_name = $_POST['nome_user'];
    $setor = $_POST['setor'];

    // Adiciona a data e hora atual ao SQL
    $smtp = $conn->prepare("INSERT INTO usuarios (usuario, senha, nivel, setor, data_registro) VALUES (?,?,?,?, NOW())");

    // Verifica se a preparação foi bem-sucedida
    if ($smtp === false) {
        die('Erro na preparação SQL: ' . $conn->error);
    }

    $smtp->bind_param("ssss", $user_name, $user_senha, $tpacesso, $setor);

    if ($smtp->execute()) {?>
        <H1 >"DADOS ENVIADOS COM SUCESSO!" </H1>
        <div class="linha"></div>
        <?php
// Redireciona para a página registrar.html após 3 segundos
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