<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/style-fluxo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Fluxo Diário</title>


</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-fluxo.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <div class="bloco">
            <div class="bloco2">
                <a onclick="goBack()">
                    <i class="fas fa-arrow-left"></i> Voltar ao menu
                </a>
            </div>    
            <?php
            // Execute a query para somar os valores da coluna
            $sql_soma = "SELECT SUM(qtd_marmita) as soma_total FROM fluxo_diario_coz";
            $sqli_soma = "SELECT SUM(marm_entregue) as soma_total FROM fluxo_diario_coz";

            $resultado_soma = $conn->query($sql_soma);
            $resultado2_soma = $conn->query($sqli_soma);

            if ($resultado_soma && $resultado2_soma) {
                $soma_total = $resultado_soma->fetch_assoc()['soma_total'];
                $soma2_total = $resultado2_soma->fetch_assoc()['soma_total'];
                $faltando = $soma_total - $soma2_total;
                echo "Total de marmita(s): " . $soma_total . " para o dia de hoje.<br>";
                echo "Faltam entregar: " . $faltando . " marmita(s) hoje.";
            } else {
                echo "Erro ao calcular a soma: " . $conn->error;
            }
            ?>
            <form action="">
                <label>Buscar Beneficiário: </label>
                <input type="text" id="nis" name="nis" placeholder="Pelo NIS." maxlength="11" required>
                <button type="submit">BUSCAR</button>
            </form>
            <?php
            if (!isset($_GET['nis'])) {
            } else {
                $sql_cod = $conn->real_escape_string($_GET['nis']);
                $sql_dados = "SELECT * FROM fluxo_diario_coz WHERE nis_benef LIKE $sql_cod";
                $sql_query = $conn->query($sql_dados) or die("ERRO ao consultar !" . $conn - error);
            
                if ($sql_query->num_rows == 0) {
            ?>
                    Nenhum resultado encontrado...
                <?php
                } else {
                    $dados = $sql_query->fetch_assoc();
                ?>

                    <br>NOME: <?php echo $dados['nome']; ?> <br>
                    Quantidades de marmitas: <?php echo $dados['qtd_marmita']; ?> <br>
                    CPF: <?php echo $dados['cpf_benef']; ?>
                    <form method="post" action="">
                        <input type=text class="qntm" name="qtd" placeholder="Nº de marmitas">
                        <input type="checkbox" class="check" name="ok">
                        <button type="submit">ENTREGAR</button>
                    </form>
                <?php
                    if (!isset($_POST['ok'])) {
                    } else {
                        //data criada com formato 'DD de mmmm de YYYY'
                        $timestampptbr = time();
                        $data_formatada_at = strftime('%d de %B de %Y', $timestampptbr);
                        $get_rec = "ok";
                        $qtd_entregue = $_POST['qtd'];

                        $sqld = $conn->prepare("UPDATE fluxo_diario_coz SET data_de_entrega=?, marm_entregue=?, entregue=? WHERE nis_benef=?");
                        $sqld->bind_param("ssss", $data_formatada_at, $qtd_entregue, $get_rec, $dados['nis_benef']);
                        if ($sqld->execute()) {
                            echo '<script>alert("Entrega registrada!"); window.location.href = "fluxo_diario.php";</script>';
                        } else {
                            echo "Não salvou" . $sqld->error . "contate o suporte.";
                        }
                    }
                }
            }

            $tbl_fluxo = $conn->query("SELECT nis_benef, nome, encaminhado_cras, qtd_marmita, entregue FROM fluxo_diario_coz");

            if ($tbl_fluxo->num_rows > 0) {

                ?>
        </div>        
        <div class="bloco">
                <table width="650px" border="1">
                    <tr class="titulo">

                        <th class="cabecalho">NIS</th>
                        <th class="cabecalho">NOME</th>
                        <th class="cabecalho">ENCAMINHADO</th>
                        <th class="cabecalho">QUANTIDADE</th>
                        <th class="cabecalho">ENTREGUE</th>

                    </tr>
                    <?php
                    while ($linha = $tbl_fluxo->fetch_assoc()) {
                    ?>
                        <tr class="resultado">
                            <td class="resultado"><?php echo $linha['nis_benef']; ?></td>
                            <td class="resultado"><?php echo $linha['nome']; ?></td>
                            <td class="resultado"><?php echo $linha['encaminhado_cras']; ?></td>
                            <td class="resultado"><?php echo $linha['qtd_marmita']; ?></td>
                            <td class="resultado"><?php echo $linha['entregue']; ?></td>
                        <?php
                    }
                } else {
                        ?>
                        <tr>
                            <td colspan="4">Resultados da pesquisa</td>
                        </tr>
                    <?php
                }
                    ?>
                    </form>
        </div>
    </div>

    <body>
    <script src='../../controller/back.js'></script>
</html>