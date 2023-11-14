<?php

require_once '../../cadunico/controller/validar_cpf.php';

//puxa as informações do formulário '../index.php'
if (isset($_POST['buscar_dados']) && !empty($_POST['buscar_dados'])) {
    $opcao = $_POST['buscar_dados'];
    if($opcao == 'cpf_dec'){
    //cria as variáveis com o valor recebido
        $cpf_dec = ['valorescolhido'];
        $cpf_formatando = sprintf('%011s', $cpf_dec);
        $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);
    }
}