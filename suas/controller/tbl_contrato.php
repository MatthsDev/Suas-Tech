<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$tbl_contrato = $conn->query("SELECT * FROM tabela_contrato");

if ($tbl_contrato->num_rows > 0) {
    ?>
    </div>
    <div class="bloco">
        <table width="650px" border="1">
            <tr class="titulo">
                <th class="cabecalho">Nº CONTRATO</th>
                <th class="cabecalho">DATA ASSINATURA</th>
                <th class="cabecalho">VIGÊNCIA</th>
                <th class="cabecalho">NOME EMPRESA</th>
                <th class="cabecalho">CNPJ</th>
                <th class="cabecalho">CONTATO</th>
                <th class="cabecalho">EMAIL</th>
                <th class="cabecalho">VALOR</th>
            </tr>
            <?php
$contador = 0;
    while ($linha = $tbl_contrato->fetch_assoc()) {
        $contador++;
        ?>
                <tr class="resultado">
                    <td class="resultado"><?php echo $linha['num_contrato']; ?></td>
                    <td class="resultado"><?php echo $linha['data_assinatura']; ?></td>
                    <td class="resultado"><?php echo $linha['vigencia']; ?></td>
                    <td class="resultado"><?php echo $linha['nome_empresa']; ?></td>
                    <td class="resultado"><?php echo $linha['cnpj']; ?></td>
                    <td class="resultado"><?php echo $linha['num_contato']; ?></td>
                    <td class="resultado"><?php echo $linha['email_emp']; ?></td>
                    <td class="resultado"><?php echo $linha['valor_contrato']; ?></td>
                </tr>
                <?php
}

    // Verifica se há registros excedentes para a lista de espera
    if ($soma_total >= 200) {
        echo "<tr><td colspan='6'>Lista de espera para registros excedentes.</td></tr>";
    }

} else {
    ?>
            <tr>
                <td colspan="6">Resultados da pesquisa</td>
            </tr>
            <?php
}
