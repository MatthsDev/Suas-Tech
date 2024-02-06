<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../../cadunico/img/logo.png">
    <link rel="stylesheet" href="../css/stylebanco.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Importar CSV</title>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-banco.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <form action="../controller/import.php" method="POST" enctype="multipart/form-data">

            <label>Qual tabela você pretende atualizar: </label>
            <select name="csv_tbl" required>
                <option value="tudo">Base de Dados do Cadastro Único</option>
                <option value="folha">Folha de Pagamento</option>

            </select>

            Selecione o arquivo CSV: <input type="file" name="arquivoCSV" id="arquivoCSV" accept=".csv">
            <button type="submit" value="Importar"> Importar </button>
            <div class="btn">
                <a onclick="goBack()">
                    <i class="fas fa-arrow-left"></i> Voltar ao menu
                </a>
            </div>
        </form>
    </div>
</body>
<script src='../../controller/back.js'></script>

</html>