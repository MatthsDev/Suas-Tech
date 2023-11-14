<?php

require_once '../../cadunico/controller/validar_cpf.php';

//puxa as informações do formulário '../index.php'
if (isset($_POST['buscar_dados']) && !empty($_POST['buscar_dados'])) {
    $opcao = $_POST['buscar_dados'];
    if ($opcao == 'cpf_dec') {
        //cria as variáveis com o valor recebido
        $cpf_dec = ['valorescolhido'];

        //formato do CPF '000.000.000-00'
        $cpf_formatando = sprintf('%011s', $cpf_dec);
        $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);

    // Consulta SQL para buscar informações na tabela com base no Código Familiar
    $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE cod_familiar_fam = :codfam");
    $sql->bindParam(':codfam', $codfam, PDO::PARAM_STR);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        
        // Recupera os dados da consulta
        $dados = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }
}
