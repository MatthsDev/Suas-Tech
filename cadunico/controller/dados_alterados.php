<?php
require_once '../../config/conexao.php';
session_start();
// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar as informações do formulário
    $nome_completo = $_POST['nome_comp'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['dt_nasc'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $cargo = $_POST['cargo'];
    $id_cargo = $_POST['id_cargo'];
    $senha = $_POST['senha'];

    // Obtém o nome do usuário da sessão
    $nome_user = $_SESSION['nome_user_1_acesso'];

    // Atualize as informações na tabela de usuários
    $smtp = $conn->prepare("UPDATE usuarios SET nome=?, senha=?, cpf=?, dt_nasc=?, telefone=?, email=?, cargo=?, id_cargo=? WHERE usuario=?");
    $smtp->bind_param("sssssssss", $nome_completo, $senha, $cpf, $data_nascimento, $telefone, $email, $cargo, $id_cargo, $nome_user);
    if ($smtp->execute()) {
        // Atualização bem-sucedida, redirecione para a página principal ou outra página de sua escolha
        header("Location: ../../index.php");
        exit();
    } else {
        echo "Erro na atualização das informações: " . $smtp->error;
    }

    $smtp->close();
}
