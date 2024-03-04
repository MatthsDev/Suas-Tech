<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';


$sql_ed_conc = $pdo->prepare("SELECT * FROM concessao_historico WHERE id_hist = :id_hist");
$sql_ed_conc->execute(array(':id_hist' => $_POST['id_concessao']));

if ($sql_ed_conc->rowCount() > 0) {
    $conc = $sql_ed_conc->fetch(PDO::FETCH_ASSOC);
    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style-alt-user.css">
    <link rel="website icon" type="image/png" href="../../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>TechSUAS Concessão</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Suas-Tech/concessao/js/script.js"></script>

</head>

<body>
<h2><?php
echo 'Feito por ' . $conc['operador'] . ' em ' . $conc['data_registro'];
    ?></h2>
<h3>DADOS DO FORMULÁRIO</h3>
<?php
echo 'Nº: ' . $conc['num_form'] . '/' . $conc['ano_form'] . '<br>';
    if ($funcao == "Tecnico(a)") {
    echo '<b>Parecer Tecnico: </b>' . $conc['parecer'] . '<br>';
    }
    ?>
<div class="visual">
<?php
    echo 'Mês de Pagamento: ' . $conc['mes_pag'] . '<br>';
    echo 'PAGO: ' . $conc['pg_data'] . '<br>';
    echo 'SITUAÇÃO: ' . $conc['situacao_concessao'] . '<br>';
?>
<table width="500px" border="1" id="tabelaItens">
<tr>
    <th colspan="4">TABELA ITENS</th>
</tr>
<tr>
    <th>Nome</th>
    <th>Quantidade</th>
    <th>Valor Unitário</th>
    <th>Valor Total</th>
</tr>
<tr>
    <td><?php echo $conc['nome_item']; ?></td>
    <td><?php echo $conc['qtd_item']; ?></td>
    <td><?php echo $conc['valor_uni']; ?></td>
    <td><?php echo $conc['valor_total']; ?></td>
</tr>
</table>

</div>
<form method="POST" action="/Suas-Tech/concessao/controller/salva_alt_conc.php" class="editar_info" style="display: none">
<!--Tabela inicialmente oculta-->
    <input name="id_hist" value="<?php echo $conc['id_hist']; ?>" style="display: none">
    <label>PAGO:</label>
    <input type="date" name="dt_pg" value="<?php echo $conc['pg_data']; ?>" requires>

    <label>SITUAÇÃO:</label>
    <select name="situacao">
        <option><?php echo $conc['situacao_concessao']; ?></option>
        <option value="EM PROCESSO">EM PROCESSO</option>
        <option value="ENCAMINHADO">ENCAMINHADO</option>
        <option value="PAGO">PAGO</option>
        <option value="FINALIZADO">FINALIZADO</option>
    </select>

    <label>MÊS DE PAGAMENTO:</label>
    <select name="mes_pg">
        <option><?php echo $conc['mes_pag'];?></option>
        <option value="Janeiro">Janeiro</option>
        <option value="Feveiro">Feveiro</option>
        <option value="Março">Março</option>
        <option value="Abril">Abril</option>
        <option value="Maio">Maio</option>
        <option value="Junho">Junho</option>
        <option value="Julho">Julho</option>
        <option value="Agosto">Agosto</option>
        <option value="Setembro">Setembro</option>
        <option value="Outubro">Outubro</option>
        <option value="Novembro">Novembro</option>
        <option value="Dezembro">Dezembro</option>
    </select>

        <table width="500px" border="1" id="tabelaItens">
            <tr>
                <th colspan="4">TABELA ITENS modo de edição</th>
            </tr>
            <tr>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Valor Unitário</th>
                <th>Valor Total</th>
            </tr>
            <tr>
                <td>
                    <select name="itens_conc" required>
                        <option><?php echo $conc['nome_item']; ?></option>
                        <?php
$consultaSetores = $conn->query("SELECT caracteristica FROM concessao_itens");
    // Verifica se há resultados na consulta
    if ($consultaSetores->num_rows > 0) {
        // Loop para criar as opções do select
        while ($setor = $consultaSetores->fetch_assoc()) {
            echo '<option value="' . $setor['caracteristica'] . '">' . $setor['caracteristica'] . '</option>';
        }
    }
    ?>
                    </select>
                </td>
                <td><input type="text" name="quantidade" class="quantidade" value="<?php echo $conc['qtd_item']; ?>"></td>
                <td><input type="text" name="valor_unitario" class="valor-unitario" value="<?php echo $conc['valor_uni']; ?>"></td>
                <td><input type="text" name="valor_total" class="valor-total" readonly></td>
            </tr>
            </table>
            <button type="submit">SALVAR</button>
        </form>

        <button type="button" id="btn_editar">EDITAR</button>

<h3>DADOS DO BENEFICIÁRIO</h3>
<?php
    echo 'Nome: ' . $conc['nome_benef'] . '<br>';
    echo 'NIS: ' . $conc['nis_benef'] . '<br>';
    echo 'Endereço: ' . $conc['endereco'] . '<br>';
    echo 'Renda Media: R$ ' . $conc['renda_media'] . ',00<br>';

    ?>
<h3>DADOS DO RESPONSÁVEL</h3>
<?php
$idConcessao = $conc['id_concessao'];
    $sql_respo = $pdo->prepare("SELECT * FROM concessao_tbl WHERE id_concessao = :id_conc");
    $sql_respo->execute(array(':id_conc' => $idConcessao));

    if ($sql_respo->rowCount() > 0) {
        $resp = $sql_respo->fetch(PDO::FETCH_ASSOC);
        echo 'NOME: ' . $resp['nome'] . '<br>';
        echo 'CPF: ' . $resp['cpf_pessoa'] . '<br>';
        echo 'Endereço: ' . $resp['endereco'] . '<br>';
        echo 'O responsável é ' . $conc['parentesco'] . '.';
    }

}
?>

<script>
$(document).ready(function () {
    $('#btn_editar').click(function () {
        $('.editar_info').show()
        $('.visual').hide()
        $('#btn_editar').hide()
    })
})
$(document).ready(function () {
    // Máscara para formatar os números
    $('.valor-unitario').mask('000000,00', { reverse: true });


    // Função para calcular o total
    function calcularTotal() {
        // Recebe a quantidade e valor unitário
        var quantidade = parseFloat($(".quantidade").val().replace(",", ".")) || 0;
        var valorUnitario = parseFloat($(".valor-unitario").val().replace(",", ".")) || 0;

        // Calcula o total e formata como moeda brasileira
        var total = quantidade * valorUnitario;


    // Formata o total como string
    var formattedTotal = total.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

    // Define o valor formatado no campo
    $(".valor-total").val(formattedTotal);
    }
    // Anexa a função aos eventos de alteração de entrada
    $(".quantidade, .valor-unitario").on("input", calcularTotal);
});
</script>
</body>
</html>
