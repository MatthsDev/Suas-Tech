<?php

require_once "conexao.php";
session_start();

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header("location:../index.php");
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$res = $pdo->prepare("SELECT * from usuarios where usuario = :usuario and senha = :senha ");
$res->bindValue(":usuario", $usuario);
$res->bindValue(":senha", $senha);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if ($linhas > 0) {
    $_SESSION['nome_usuario'] = $dados[0]['nome'];
    $_SESSION['user_usuario'] = $dados[0]['usuario'];
    $_SESSION['nivel_usuario'] = $dados[0]['nivel'];

    // Verifique se é o primeiro acesso pela senha
    if ($senha == "@senha123") {
        // Passa o nome do usuário para a página de primeiro acesso
        $_SESSION['nome_user_1_acesso'] = $dados[0]['usuario'];

        // Redirecione para a página de conclusão do cadastro
        header("Location: ../cadunico/painel-usuario/primeiro_acesso.php");
        exit();
    }

    if ($_SESSION['nivel_usuario'] == 'admin') {
        header("location:../cadunico/painel-adm/adm-view.php");
        exit();
    }

    if ($_SESSION['nivel_usuario'] == 'usuario') {
        header("location:../cadunico/painel-usuario/user-painel.php");
        exit();
    }

} else {
    echo "<script language='javascript'>window.alert('Dados Incorretos!!'); </script>";
    echo "<script language='javascript'>window.location='../index.php'; </script>";
}

//FUNÇÃO BOTAO

if (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] == 'admin') {
    echo '<a href="../painel-adm/adm-view.php">Ir para o Painel de Admin</a>';
} elseif (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] == 'usuario') {
    echo '<a href="../painel-usuario/user-painel.php">Ir para o Painel de Usuário</a>';
}
