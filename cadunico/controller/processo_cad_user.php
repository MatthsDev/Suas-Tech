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
    $smtp->execute();

    $smtp->close();
    $conn->close();

}
?>