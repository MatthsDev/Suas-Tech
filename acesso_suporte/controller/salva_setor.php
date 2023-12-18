<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../cadunico/css/style-processo.css">
    <link rel="shortcut icon" href="../cadunico/img/logo.png" type="image/png">
    <title>Cadastro Salvo</title>
    <link rel="stylesheet" href="../css/style-processo.css">
</head>
<body>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

// Inicializa a mensagem como vazia
$mensagem = "";

// Verifica se o formulário foi enviado
if (isset($_SESSION['cpf_coord']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf_coord = $_SESSION['cpf_coord'];
    $nome_coord = $_POST['nome_coord_resp'];
    $instituicao = $_POST['instituicao'];
    $nome_instit = $_POST['nome_instit'];
    $rua = $_POST['rua'];
    $num = $_POST['num'];
    $bairro = $_POST['bairro'];
    if (!isset($_POST['cod_instit'])) {
        $cod_instit = "";

    } else {
        $cod_instit = $_POST['cod_instit'];
    }

    $cod_contrato = $_POST['cod_contrato'];
    $contato = $_POST['contato'];
    $emailInstit = $_POST['emailInstit'];

    $nomeInst_no_repeat = $conn->prepare("SELECT nome_instit FROM setores WHERE nome_instit = ?");
    $nomeInst_no_repeat->bind_param("s", $nome_instit);
    $nomeInst_no_repeat->execute();
    $nomeInst_no_repeat->store_result();

    if ($nomeInst_no_repeat->num_rows > 0) {
        // Se o nome de usuário já está em uso, exibe uma mensagem ou redirecione de volta ao formulário
        echo '<script>alert("Setor já registrado."); window.location.href = "../suas/views/setores.php";</script>';
        exit();
    }

    $query = $conn->prepare("INSERT INTO SETORES (cod_contrato, instituicao, nome_instit, rua, numero, bairro, email, cod_instit, responsavel, cpf_coord)
                                VALUES (?,?,?,?,?,?,?,?,?,?)");

    $query->bind_param("ssssssssss", $cod_contrato, $instituicao, $nome_instit, $rua, $num, $bairro, $emailInstit, $cod_instit, $nome_coord, $cpf_coord);

    if ($query->execute()) {?>

        <h1>DADOS ENVIADOS COM SUCESSO!</h1>
        <div class="linha"></div>
        <?php
// Redireciona para a página DE CADASTRAR NOVO seetor após ALGUNS segundos
        echo '<script> setTimeout(function(){ window.location.href = "../acesso_suporte/index.php"; }, 1500); </script>';
    } else {
        echo "ERRO no envio dos DADOS: " . $query->error;
    }

    $query->close();
    $conn->close();
}
?>

</body>
</html>