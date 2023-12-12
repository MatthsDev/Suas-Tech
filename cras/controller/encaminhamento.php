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
        $cpf = $_POST['valorescolhido'];
        $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :valorescolhido");
        $sql->execute(array(':valorescolhido' => $cpf));

            if($sql->rowCount() > 0){
                $dados = $sql->fetch(PDO::FETCH_ASSOC);
                $dados = 
                $local = $dados['nom_pessoa'];
                $local = $dados['nom_localidade_fam'];
                $local = $dados['nom_localidade_fam'];
                $local = $dados['nom_localidade_fam'];
                $local = $dados['nom_localidade_fam'];
                $local = $dados['nom_localidade_fam'];
                $local = $dados['nom_localidade_fam'];

                echo $local . $dados['nom_pessoa'];

            }else{

            }


    } elseif ($cpf_nis == 'nis_dec') {
        $nis = $_POST['valorescolhido'];
        $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_nis_pessoa_atual = :valorescolhido");
        $sql->execute(array(':valorescolhido' => $nis));
        
        if($sql->rowCount() > 0){
            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            $local = $dados['nom_localidade_fam'];
            $local = $dados['nom_pessoa'];
            $local = $dados['nom_localidade_fam'];
            $local = $dados['nom_localidade_fam'];
            $local = $dados['nom_localidade_fam'];
            $local = $dados['nom_localidade_fam'];
            $local = $dados['nom_localidade_fam'];

            echo $local . $dados['nom_pessoa'];

        }else{

        }
    }

}
