<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../cadunico/css/visitas.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style-control_p.css">
    <link rel="shortcut icon" href="/Suas-Tech/img/logo.png" type="image/x-icon">

    <title>TechSUAS - Controle de Cadastros Peixe</title>
</head>

<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="img/h1-controle.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <div class="grafico">
            <canvas id="graficoPizza"></canvas>
        </div>
        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
        //dados totais dos registros de visitas
        $sqlr = "SELECT COUNT(*) as total_peixe FROM peixe";
        $result = $pdo->query($sqlr);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalRegistros = $row['total_peixe'];
        $numero_parecer = $totalRegistros;
        ?>
        <div class="total">
            <p>Total Cadastrados: <?php echo $totalRegistros; ?></p>
        </div>
        <?php
        $sql_ano = 'SELECT local_cadastro AS lc_cad, COUNT(*) AS quantidade
    FROM peixe
    GROUP BY local_cadastro
    ORDER BY lc_cad DESC';
        $resultado_p_local = $conn->query($sql_ano);

        while ($linha = $resultado_p_local->fetch_assoc()) {
            $local_cadastro[] = $linha['lc_cad'];
            $quantidades[] = $linha['quantidade'];
        }
        //$sql = "SELECT * FROM tbl_tudo WHERE dat_atual_fam LIKE '%$sql_ano%'";
        ?>
        <script>
            // Dados para o gráfico de pizza
            var anos = <?php echo json_encode($local_cadastro); ?>;
            var quantidades = <?php echo json_encode($quantidades); ?>;

            console.log(anos);
            console.log(quantidades);

            // Crie o gráfico de pizza
            var ctx = document.getElementById('graficoPizza').getContext('2d');
            var myPieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: anos.concat(['Cadastros Realizados']),
                    datasets: [{
                        data: quantidades,
                        backgroundColor: ['#13294b', '#1f7a8c', '#40b9d4', '#9ad2e8', '#ff8200', '#ffd33d', '#ff6347', '#ffaec0'
]
                    }]
                },
                options: {
                    responsive: true,
                    legend: {
                        display: true, // Exibe a legenda
                        position: 'top', // Posição da legenda (pode ser 'top', 'bottom', 'left', 'right')
                        labels: {
                            fontColor: 'black', // Cor do texto da legenda
                            fontSize: 14 // Tamanho do texto da legenda
                        }
                    }
                }
            });
        </script>
    </div>
</body>

</html>