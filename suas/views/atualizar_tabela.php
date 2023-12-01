<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar CSV</title>
</head>
<body>
    <form action="../../controller/importar.php" method="post" enctype="multipart/form-data">
        Selecione o arquivo CSV: <input type="file" name="arquivoCSV" accept=".csv">
        <input type="submit" value="Importar">
    </form>
</body>
</html>
