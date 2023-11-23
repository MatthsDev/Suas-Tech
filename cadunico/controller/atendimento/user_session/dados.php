<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

if(!isset($_SESSION )){
    session_start();
}

$user_name = $_SESSION['user_usuario'];

$sql = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :user_usuario");
$sql->execute(array(':user_usuario' => $user_name));
if ($sql->rowCount() > 0) {
    $dados = $sql->fetch(PDO::FETCH_ASSOC);
    $id_user = $dados['id'];

}