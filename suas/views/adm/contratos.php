<?php
// Arquivos necessários
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Suas-Tech/img/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Cadastrar Contrato</title>
</head>
<body>
<!-- Formulário de busca -->
<form method="">
<label>Buscar contrato:</label>
<input type="text" name="buscar" placeholder="Buscar por qualquer informação do contrato..." required>
<p id="info_paragrafo">caso sua busca seja feita por cnpj lembre-se de colocar os caracter (. / -) para a busca retornar com sucesso.</p>
<button id="btn_busca">BUSCAR</button>
</form>

<?php
// Verifica se o parâmetro 'buscar' não está definido na URL
if (!isset($_GET['buscar'])) {

} else {
    // Obtém o valor do parâmetro 'buscar' e evita injeção de SQL
    $contrato = $conn->real_escape_string($_GET['buscar']);
    // Consulta o banco de dados com base no contrato informado
    $valor_contrato = "SELECT * FROM tabela_contrato WHERE num_contrato LIKE '$contrato' OR nome_empresa LIKE '$contrato' OR cnpj LIKE '$contrato'";
    $contrato_query = $conn->query($valor_contrato) or die("ERRO ao consultar!" . $conn - error);

    // Verifica se nenhum contrato foi encontrado
    if ($contrato_query->num_rows == 0) {
        ?>
        <script>
            Swal.fire({
            icon: "error",
            title: "NÃO ENCONTRADO",
            text: "Não existe nenhum contrato com essa informação!",
            confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/Suas-Tech/suas/views/adm/contratos.php";
                }
            });
        </script>
        <?php
    } else {
        // Exibe informações do contrato encontrado
        $dados_contrato = $contrato_query->fetch_assoc();
        $id_contrato = $dados_contrato['id_contrato'];

        echo 'Empresa: ' . $dados_contrato['nome_empresa'];
        echo 'Razão Social: ' . $dados_contrato['razao_social'];
        echo "CNPJ: " . $dados_contrato['cnpj'];
        echo "Contato: " . $dados_contrato['num_contato'];
        echo "Número: " . $dados_contrato['num_contrato'];
        // cria uma sessão para transmitir o valor para outro php
            $_SESSION['num_contrato'] = $dados_contrato['num_contrato'];

        // Consulta itens relacionados ao contrato
        $itens = $conn->real_escape_string($id_contrato);
        $valor_itens = "SELECT * FROM tabela_itens WHERE id_contrato LIKE '$itens'";
        $itens_query = $conn->query($valor_itens) or die("ERRO ao consultar!" . $conn - error);

        // Verifica se existem itens relacionados ao contrato
        if ($itens_query->num_rows == 0) {
            echo 'Não há itens para esse contrato.';
        } else {
            $soma_vlr_tot = 0;
            ?>
            <!-- Formulário para editar prazo -->
            <div id="form_ed_data">
            <form method="POST" action="/Suas-Tech/suas/controller/editar_prazo.php">
            <label>Nova data</label>
            <input type="date" name="data_alt">
            <label>Apotilamento</label>
            <input type="text" name="apostilamento_alt">
            <button type="submit">SALVAR</button>
        </form>
        </div>
        <button id="mostrar_form">Editar dados</button>
            <!-- Tabela de itens do contrato -->
            <table width="650px" border="1">
                <tr>
                    <th>Código do Item</th>
                    <th>NOME</th>
                    <th>Quantidade</th>
                    <th>Valor Unitário</th>
                    <th>Total Itens</th>
                </tr>
                <?php
                
                // Loop para exibir os itens
                while ($dados_itens = $itens_query->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $dados_itens['num_item']; ?></td>
                    <td><?php echo $dados_itens['nome_produto']; ?></td>
                    <td><?php echo $dados_itens['quantidade']; ?></td>
                    <td><?php
                        // Formata o valor unitário
                        $vlr_uni = $dados_itens['valor_unitario'];
                        $vlr_uni = str_replace(',', '.', str_replace('.', '', $vlr_uni));
                        $vlr_uni_formatado = 'R$ ' . number_format((float) $vlr_uni / 100, 2, ',', '.');
                        echo $vlr_uni_formatado;?></td>
                    <td><?php
                        // Formata o valor total
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
            ?>
                <tr>
                    <td>Total</td>
                    <td colspan="4">
                        <?php
                        // Exibe o total da soma dos valores
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
    $(document).ready(function(){
        $('#form_ed_data').hide()
    })
    $('#mostrar_form').click(function(){
        $('#mostrar_form').hide()
        $('#form_ed_data').show()
    })
</script>
</body>
    
</html>