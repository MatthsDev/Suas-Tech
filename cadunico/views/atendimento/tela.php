<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once '../../../config/conexao.php';

    $query_ultimas_senhas = "SELECT senger.id, sen.nome_senha
                            FROM senhas_geradas AS senger
                            INNER JOIN senhas AS sen ON sen.id = senger.senha_id
                            WHERE senger.sits_senha_id = 4
                            ORDER BY senger.id DESC
                            LIMIT 5";
    
    $result_ultimas_senhas = $conn->prepare($query_ultimas_senhas);
    $result_ultimas_senhas->execute();
    
    $ultimasSenhas = [];
    
    while ($row_ultima_senha = $result_ultimas_senhas->fetch()) {
        $ultimasSenhas[] = $row_ultima_senha;
    }
    
    echo json_encode($ultimasSenhas);
    ?>

    <!-- Adicione esta div para exibir as últimas senhas -->
    <div id="listaUltimasSenhas"></div>

    <script src="../../js/custom.js"></script>

</body>

</html>