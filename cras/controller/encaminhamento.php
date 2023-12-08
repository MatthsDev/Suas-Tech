<?php

// Inclui o arquivo "conexao.php" que deve conter a configuração da conexão com o banco de dados
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

$usuario = $dados['nome'];
$cargo = $dados['cargo'];
$idcargo = $dados['id_cargo'];

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

if (isset($_POST['buscar_dados'])) {

    $cpf_nis = $_POST['buscar_dados'];

    if ($cpf_nis == 'cpf_dec') {
        $dados = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf_dec");
        $dados->execute(array(":cpf_dec" => $cpf_nis));

        
    } elseif ($cpf_nis == 'nis_dec') {

    }
}
