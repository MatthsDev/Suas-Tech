<!DOCTYPE html>
<html lang="pt-br">

<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('../../img/marca.png');
        background-size: cover;
        background-repeat: no-repeat;
    }

    select {
        width: auto;
        /* Define a largura para automática */
    }

    /* Seu estilo adicional aqui */

    #form-container {
        width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        /* Adicione um fundo branco semitransparente ao formulário */
    }

    #title {
        font-size: 26px;
        font-weight: bold;
        text-align: center;
    }

    #subtitle {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin-top: 10px;
    }

    #form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    select,
    input,
    textarea {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
    }

    textarea {
        height: 100px;
    }

    #right-align {
        font-size: 20px;
        text-align: right;
    }

    .signature-line {
        margin-top: 20px;
        font-size: 20px;
        text-align: center;
    }

    #justified-text {
        text-align: justify;
        font-size: 16px;
        text-indent: 50px;
        margin-top: 20px;
    }
    .conteudo{
    display:block;
    padding: 0px 5px 0px 30px;
}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../../img/logo.png">
    <link rel="stylesheet" href="stylegerar.css">
    <title>documento oficial do cadastro único - são bento do una</title>
</head>

<body>
    <br><br><br><br><br><br>
    <div id="title">DECLARAÇÃO DE DESLIGAMENTO VOLUNTÁRIO DO PROGRAMA BOLSA FAMÍLIA</div>

    <h2>(Base legal: inc. XVII do caput do art. 24 e §§ 6º a 8º do art. 27 da Portaria MDS nº 897/2023)</h2>

    <?php
ini_set('memory_limit', '256M');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

require_once "../../../config/conexao.php";

if(isset($_POST['nis_dec'])){
    $opcao = $_POST['nis_dec'];

        $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf_dec");
        $sql->execute(array(':cpf_dec' => $cpf_dec));

}