<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

?>
<form method="">
<label>Buscar contrato:</label>
<input type="text" name="buscar" placeholder="Buscar por qualquer informação do contrato...">
<p id="info_paragrafo">caso sua busca seja feita por cnpj lembre-se de colocar os caracter (. / -) para a busca retornar com sucesso.</p>
<button id="btn_busca">BUSCAR</button>
</form>

<?php
if (!isset($_GET['buscar'])) {

} else {
    $contrato = $conn->real_escape_string($_GET['buscar']);
    $valor_contrato = "SELECT * FROM tabela_contrato WHERE num_contrato LIKE '$contrato' OR nome_empresa LIKE '$contrato' OR cnpj LIKE '$contrato'";
    $contrato_query = $conn->query($valor_contrato) or die("ERRO ao consultar!" . $conn - error);

    if ($contrato_query->num_rows == 0) {
        echo '<script>alert("Não existe nenhum contrato com essa informação!"); window.location.href = "/Suas-Tech/suas/views/adm/contratos.php";</script>';
    } else {
        $dados_contrato = $contrato_query->fetch_assoc();
        $id_contrato = $dados_contrato['id_contrato'];
        echo 'Empresa: ' . $dados_contrato['nome_empresa'];
        echo 'Razão Social: ' . $dados_contrato['razao_social'];
        echo "CNPJ: " . $dados_contrato['cnpj'];
        echo "Contato: " . $dados_contrato['num_contato'];
        $itens = $conn->real_escape_string($id_contrato);
        $valor_itens = "SELECT * FROM tabela_itens WHERE id_contrato LIKE '$itens'";
        $itens_query = $conn->query($valor_itens) or die("ERRO ao consultar!" . $conn - error);

        if ($itens_query->num_rows == 0) {
            echo 'Não há itens para esse contrato.';
        } else {
            $soma_vlr_tot = 0;
            ?>
            <button type="button" onclick="editarPrazo()">Editar Prazo</button>
            <table width="650px" border="1">
                <tr>
                    <th>Código do Item</th>
                    <th>NOME</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Total Itens</th>
                </tr>
                <?php
while ($dados_itens = $itens_query->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $dados_itens['num_item']; ?></td>
                    <td><?php echo $dados_itens['nome_produto']; ?></td>
                    <td><?php echo $dados_itens['quantidade']; ?></td>
                    <td><?php
                    $vlr_uni = $dados_itens['valor_unitario'];
                    $vlr_uni = str_replace(',', '.', str_replace('.', '', $vlr_uni));
                    $vlr_uni_formatado = 'R$ ' . number_format((float) $vlr_uni / 100, 2, ',', '.');
                    echo $vlr_uni_formatado;?></td>
                    <td><?php
                    $vlr_tot = $dados_itens['valor_total'];
                    $vlr_tot = str_replace(',', '.', str_replace('.', '', $vlr_tot));
                    $vlr_tot_formatado = 'R$ ' . number_format((float) $vlr_tot / 100, 2, ',', '.');
                    echo $vlr_tot_formatado;
                    
                    // Acumula o valor na variável de soma
                    $soma_vlr_tot += (float) $vlr_tot / 100;
                    ?>
                </td>
                </tr>
                <?php
}

$dados_itens = $itens_query->fetch_assoc();
            ?>
                <tr>
                    <td>Total</td>
                    <td colspan="4">
                        <?php
                        echo "R$ " . number_format($soma_vlr_tot, 2, ',', '.');
                        ?>
                    </td>
                </tr>
            </table>
            <?php
}

    }
}
?>
<script>
    function editarPrazo() {
    var idsSelecionados = [];

    // Percorre todas as checkboxes marcadas e adiciona os IDs ao array
    $('input[name="excluir[]"]:checked').each(function () {
        idsSelecionados.push($(this).val());
    });

    // Verifica se há IDs selecionados
    if (idsSelecionados.length > 0) {
        // Solicita a nova data ao usuário usando window.prompt()
        var novaData = prompt('Informe a nova data (Formato: DD/MM/AAAA)');

        // Verifica se o usuário forneceu uma nova data
        if (novaData !== null) {
            // Aqui você pode ajustar a URL conforme necessário
            var url = '/Suas-Tech/suas/controller/editar_contrato.php';

            // Aqui você pode adicionar outros dados que deseja enviar ao servidor
            var dados = {
                ids: idsSelecionados,
                novaData: novaData
            };

            $.ajax({
                url: url,
                method: 'POST',
                data: dados,
                dataType: 'json',
                success: function (response) {
                    if (response.encontrado) {
                        alert('Data alterada com sucesso!')
                        location.reload()
                    } else {
                        alert('Não houve uma conexão válida, acione o suporte!')
                    }
                },
                error: function (error) {
                    console.error('Erro ao enviar dados: ' + error);
                }
            });
        } else {
            alert('Você cancelou a operação. Nenhuma alteração será feita.');
        }
    } else {
        alert('Nenhum item selecionado. Selecione pelo menos um item para editar.');
    }
}

</script>