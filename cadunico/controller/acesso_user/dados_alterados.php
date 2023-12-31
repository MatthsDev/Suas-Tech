<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
session_start();

// Verifique se a sessão foi iniciada
if (!isset($_SESSION['nome_user_1_acesso'])) {
    echo "Erro: A variável de sessão 'nome_user_1_acesso' não está definida.";
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

    $smtp = $conn->prepare("UPDATE usuarios SET nome=?, apelido=?, senha=?, cpf=?, dt_nasc=?, telefone=?, email=?, cargo=?, id_cargo=? WHERE usuario=?");

    if (!$smtp) {
        die('Erro na preparação da consulta: ' . $conn->error);
    }
    
    $smtp->bind_param("ssssssssss", $nome_completo, $apelido, $senha_hashed, $cpf, $data_nascimento, $telefone, $email, $cargo, $id_cargo, $nome_user);
    

    //echo "Nome Completo: " . $nome_completo . "<br>";
    //echo "Senha Hashed: " . $senha_hashed . "<br>";
    //echo "Data Nascimento: " . $data_nascimento . "<br>";
    //echo "Telefone: " . $telefone . "<br>";
    //echo "Email: " . $email . "<br>";
    //echo "Cargo: " . $cargo . "<br>";
    //echo "ID: " . $id_cargo . "<br><br>";
    //echo "Nome de Usuário: " . $nome_user . "<br>";

    if ($smtp->execute()) {

        // Atualização bem-sucedida, redirecione para a página de Login
        echo "<script language='javascript'>window.alert('Dados alterados com sucesso.'); </script>";
        header("Location: ../../../index.php");
        exit();
    } else {
        echo "Erro na atualização das informações: " . $smtp->error;
    }

    $smtp->close();
}
