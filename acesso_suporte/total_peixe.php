<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/visitas.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../../js/scriptTelaChamada.js"></script>
    <script src="script_chamar.js"></script>
    <title>Tela de Chamadas</title>
</head>
<body>

<nav>

    <div class="grafico">
        <canvas id="graficoPizza"></canvas>
    </div>
</nav>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
//dados totais dos registros de visitas
$sqlr = "SELECT COUNT(*) as total_peixe FROM peixe";
$result = $pdo->query($sqlr);
$row = $result->fetch(PDO::FETCH_ASSOC);
$totalRegistros = $row['total_peixe'];
$numero_parecer = $totalRegistros;

echo $totalRegistros;

$sql_ano = 'SELECT local_cadastro AS lc_cad, COUNT(*) AS quantidade
FROM peixe
GROUP BY local_cadastro
ORDER BY lc_cad DESC';
$resultado_p_ano = $conn->query($sql_ano);

while ($linha = $resultado_p_ano->fetch_assoc()) {
    $local_cadastro[] = $linha['lc_cad'];
    $quantidades[] = $linha['quantidade'];

}
//$sql = "SELECT * FROM tbl_tudo WHERE dat_atual_fam LIKE '%$sql_ano%'";
?>
    <script>
    // Dados para o gráfico de pizza
    var anos = <?php echo json_encode($local_cadastro); ?>;
    var quantidades = <?php echo json_encode($quantidades); ?>;

    // Adiciona volaroe às quantidades
    quantidades.push(volaroe);

    // Crie o gráfico de pizza
    var ctx = document.getElementById('graficoPizza').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: anos.concat(['Visitas Feitas']),
            datasets: [{
                data: quantidades,
                backgroundColor: ['#13294b', '#065f33', '#8b0000', '#cd5c5c', '#008080', '#2e8b57', '#00ff00', '#ff9900']
            }]
        },
        options: {
        responsive: true,
        legend: {
            display: true, // Exibe a legenda
            position: 'right', // Posição da legenda (pode ser 'top', 'bottom', 'left', 'right')
            labels: {
                fontColor: 'black', // Cor do texto da legenda
                fontSize: 12 // Tamanho do texto da legenda
            }
        }
    }
    });
    </script>

</body>
</html>