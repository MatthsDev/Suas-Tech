<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

$dados_cartao = $conn->query("SELECT nis_benef, nome FROM fluxo_diario_coz");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartão Cozinha Comunitaria</title>
    <link rel="stylesheet" href="../css/stylecartao.css">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
</head>
<body>
<div class="viewport">
        <div class="container">
            <?php
            if ($dados_cartao->num_rows > 0) {
                while ($linha = $dados_cartao->fetch_assoc()) {
                    $nome = str_replace(' ', '&nbsp;', $linha['nome']);
                    $nis = str_replace(' ', '&nbsp;', $linha['nis_benef']);

                    echo "<div class='card'>";
                    echo "<img src='../img/CARTÃO COZINHA.svg' alt='cartaocozinha'>";
                    echo "<div class='name'>" . $nome . "</div>";
                    echo "<div class='nis'>" . $nis . "</div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
    </body>
</html>