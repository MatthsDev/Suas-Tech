<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$tbl_fluxo = $conn->query("SELECT nis_benef, nome, encaminhado_cras, qtd_marmita, entregue, prioridade FROM fluxo_diario_coz ORDER BY prioridade DESC LIMIT 20");

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
                <!-- Adicionei uma coluna para exibir a prioridade/urgência -->
            </tr>
            <?php
$contador = 0;
    while ($linha = $tbl_fluxo->fetch_assoc()) {
        $contador++;
        ?>
                <tr class="resultado">
                    <td class="resultado"><?php echo $linha['nis_benef']; ?></td>
                    <td class="resultado"><?php echo $linha['nome']; ?></td>
                    <td class="resultado"><?php echo $linha['encaminhado_cras']; ?></td>
                    <td class="resultado"><?php echo $linha['qtd_marmita']; ?></td>
                    <td class="resultado"><?php echo $linha['entregue']; ?></td>
                    <!-- Exibição da prioridade/urgência -->
                </tr>
                <?php
}

    // Verifica se há registros excedentes para a lista de espera
    if ($contador >= 20) {
        echo "<tr><td colspan='6'>Lista de espera para registros excedentes.</td></tr>";
    }

} else {
    ?>
            <tr>
                <td colspan="6">Resultados da pesquisa</td>
            </tr>
            <?php
}

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