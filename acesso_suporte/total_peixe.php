<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teste_atende/style_atend.css" />
    <link rel="shortcut icon" href="../../cadunico/img/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../../js/scriptTelaChamada.js"></script>
    <script src="script_chamar.js"></script>
    <title>Tela de Chamadas</title>
</head>
<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
//dados totais dos registros de visitas
$sqlr = "SELECT COUNT(*) as total_peixe FROM peixe";
$result = $pdo->query($sqlr);
$row = $result->fetch(PDO::FETCH_ASSOC);
$totalRegistros = $row['total_peixe'];
$numero_parecer = $totalRegistros;

echo $totalRegistros;
?>
</body>
</html>