<?php

// Inclui o arquivo "conexao.php" que deve conter a configuração da conexão com o banco de dados
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

$usuario = $dados['nome'];
$cargo = $dados['cargo'];
$idcargo = $dados['id_cargo'];

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

// Busca os dados, conforme o que foi selecionado no formulário
$buscaDados = $_POST['buscar_dados'];
$cpf_nis = $_POST['valorescolhido'];
$encaminhamento = $_POST['direcao'];
$texto = $_POST['texto'];

// Verifica se a busca selecionada é por CPF
if ($cpf_nis == 'cpf_dec' ){

    // Prepara e executa a consulta SQL
    $dados = $conn->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf_nis");
    $dados->execute(array(':cpf_nis' => $cpf_nis));

    // Verifica se foram encontrados resultados
    if ($dados->rowCount() > 0){
        // Obtém os dados encontrados
        $dadosEncontrados = $dados->fetch(PDO::FETCH_ASSOC);
        // Obtém o nome da pessoa a partir dos dados
        $nom_pessoa = $dadosEncontrados['nom_pessoa'];

        // Exibe o nome da pessoa
        echo $nom_pessoa;
    }
}
?>
