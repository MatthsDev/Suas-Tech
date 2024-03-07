<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>TechSUAS - login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/Suas-Tech/cadunico/css/login.css">
    <link rel="shortcut icon" href="/Suas-Tech/cadunico/img/logo.png" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';


// Verifique se a sessão foi iniciada
if (!isset($_SESSION['nome_user_1_acesso'])) {
    ?>
    <script>
    Swal.fire({
    icon: "error",
    title: "ERRO",
    text: "A variável de sessão 'nome_user_1_acesso' não está definida.",
    confirmButtonText: 'OK',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "../../../index.php";
        }
    });
    </script>
    <?php
    exit();
}

$nome_user = $_SESSION['nome_user_1_acesso'];
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar as informações do formulário
    $nome_completo = $_POST['nome_comp'];
    $apelido =$_POST['apelido'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['dt_nasc'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
    $id_cargo = $_POST['id_cargo'];
    $senha_hashed = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    // Obtém o nome do usuário da sessão

    $smtp = $conn->prepare("UPDATE usuarios SET nome=?, apelido=?, senha=?, cpf=?, dt_nasc=?, telefone=?, email=?, cargo=?, id_cargo=?, acesso=? WHERE usuario=?");

    if (!$smtp) {
        die('Erro na preparação da consulta: ' . $conn->error);
    }
        $acesso = "0";
    $smtp->bind_param("sssssssssss", $nome_completo, $apelido, $senha_hashed, $cpf, $data_nascimento, $telefone, $email, $cargo, $id_cargo, $acesso, $nome_user);
    

    //echo "Nome Completo: " . $nome_completo . "<br>";
    //echo "Senha Hashed: " . $senha_hashed . "<br>";
    //echo "Data Nascimento: " . $data_nascimento . "<br>";
    //echo "Telefone: " . $telefone . "<br>";
    //echo "Email: " . $email . "<br>";
    //echo "Cargo: " . $cargo . "<br>";
    //echo "ID: " . $id_cargo . "<br><br>";
    //echo "Nome de Usuário: " . $nome_user . "<br>";

    if ($smtp->execute()) {
        ?>
        <script>
        Swal.fire({
        icon: "success",
        title: "SALVO",
        text: "Dados alterados com sucesso!",
        confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "../../../index.php";
            }
        });
        </script>
        <?php
        exit();
    } else {
        echo "Erro na atualização das informações: " . $smtp->error;
    }

    $smtp->close();
}
?>
</body>
</html>