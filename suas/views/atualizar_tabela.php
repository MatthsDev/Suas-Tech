<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../../cadunico/img/logo.png">
    <title>Importar CSV</title>
</head>
<body>
    <form action="import.php" method="POST" enctype="multipart/form-data">

        <labal>Qual tabela você pretende atualizar: </label>
        <select name="csv_tbl" required>
        <option value="tudo">Base de Dados do Cadastro Único</option>
        <option value="folha">Folha de Pagamento</option>

    </select>

       Selecione o arquivo CSV: <input type="file" name="arquivoCSV" id="arquivoCSV" accept=".csv">
                                <input type="submit" value="Importar">

    </form>
</body>
</html>
