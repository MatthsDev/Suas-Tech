<?php

require_once "conexao.php";
session_start();

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header("location:../index.php");
}

$usuario = $_POST['usuario'];
$senha_login = $_POST['senha'];

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
$stmt->bindValue(":usuario", $usuario);
$stmt->execute();

$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if ($dados && password_verify($senha_login, $dados['senha'])) {
    $_SESSION['nome_usuario'] = $dados['nome'];
    $_SESSION['user_usuario'] = $dados['usuario'];
    $_SESSION['nivel_usuario'] = $dados['nivel'];

    // Verifique se é o primeiro acesso pela senha
    if ($senha_login == "@senha123") {
        // Passa o nome do usuário para a página de primeiro acesso
        $_SESSION['nome_user_1_acesso'] = $dados['usuario'];

        // Redirecione para a página de conclusão do cadastro
        header("Location: ../cadunico/views/primeiro_acesso.php");
        exit();
    }

    // Redirecione com base no nível de acesso
    if ($_SESSION['nivel_usuario'] == 'admin') {
        header("location:../cadunico/painel-adm/adm-view.php");
        exit();
    } elseif ($_SESSION['nivel_usuario'] == 'usuario') {
        header("location:../cadunico/painel-usuario/user-painel.php");
        exit();
    }
} else {
    echo "<script language='javascript'>window.alert('Senha incorreta!'); </script>";
    echo "<script language='javascript'>window.location='../index.php'; </script>";
}

