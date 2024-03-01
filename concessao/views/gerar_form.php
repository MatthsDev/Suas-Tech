<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Gerar Formulário</title>
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="/Suas-Tech/img/logo.png">
    <link rel="stylesheet" href="../css/style_gerar_form.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Suas-Tech/concessao/js/script.js"></script>
    <script>
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
</head>

<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img src="../img/h1-relatorio.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <form action="/Suas-Tech/concessao/controller/gerar_form.php" method="POST">
            <div id="form">
                <label>CPF DO RESPONSÁVEL:</label>
                <input type="text" name="cpf" id="cpf"  maxlength="14" required>

                <label>NIS DO BENEFIÁRIO:</label>
                <input type="text" name="nis"  maxlength="11" required>

                <label>Mês de Pagamento</label>
                <select name="mes_pg" id="mes_pg" required>
                    <option value="" disabled selected hidden>Selecione</option>
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

                <p>QUAL PARENTESCO O RESPONSÁVEL TEM COM O BENEFICIÁRIO?</label>
                    <select name="parentesco" id="parentesco" required>
                        <option value="" disabled selected hidden>Selecione</option>
                        <option value="UNIPESSOAL">Unipessoal</option>
                        <option value="CONJUGE">Conjuge</option>
                        <option value="FILHO(A)">Filho(a)</option>
                        <option value="ENTEADO(A)">Enteado(a)</option>
                        <option value="NETO OU BISNETO">Neto ou Bisneto</option>
                        <option value="PAI OU MAE">Pai ou Mae</option>
                        <option value="SOGRO(A)">Sogro(a)</option>
                        <option value="IRMAOS OU IRMA">Irmão ou Irmã</option>
                        <option value="GENRO OU NORA">Genro ou Nora</option>
                        <option value="OUTRO PARENTE">Outro Parente</option>
                        <option value="NAO PARENTE">Não Parente</option>
                    </select>
            </div>

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
                    <td>
                        <select name="itens_conc" required>
                            <option value="" disabled selected hidden>Selecione</option>
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
                    <td><input type="text" name="quantidade" class="quantidade"></td>
                    <td><input type="text" name="valor_unitario" class="valor-unitario"></td>
                    <td><input type="text" name="valor_total" class="valor-total" readonly></td>
                </tr>
            </table>
            <div class="btn">
                <button type="submit" id="btn_gerar">GERAR CAPA</button>
            </div>
        </form>
    </div>
</body>

</html>
