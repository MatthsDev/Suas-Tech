<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/visitas_pend.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<form method="POST" action="excluir_item.php">
    <?php
    $sql_dados = $conn->query("SELECT * FROM concessao_itens ORDER BY nome_item");

    if ($sql_dados->num_rows > 0) {
        ?>
        <table width="650px" border="1">
    <tr class="titulo" >
        <th class="cabecalho">Código Item</th>
        <th class="cabecalho">Caracteristica</th>
        <th class="cabecalho">Nome do Item</th>
    </tr>

        <?php

        while ($dados = $sql_dados->fetch_assoc()) {
            ?>
        <tr class="resultado">
            <td class="resultado"><?php echo $dados['cod_item']; ?></td>
            <td class="resultado"><?php echo $dados['caracteristica']; ?></td>
            <td class="resultado"><?php echo $dados['nome_item']; ?></td>
            <td class="check">
            <label class="urg">
            <input type="checkbox" name="excluir[]" value="<?php echo $dados['id_itens_conc']; ?>">
            <span class="checkmark"></span>
            </label>
            </td>
        </tr>
<?php
        }
    } else {
        ?>
        <tr>
            <td colspan="3">Resultados da pesquisa</td>
        </tr>
        <?php
    }
?>
</table>

            <div id="modal">
                <button type="button" onclick="excluirSelecionados()">Excluir</button>
            </div>
        </form>

        <script>
            function excluirSelecionados() {
                document.forms[0].submit(); // Envia o formulário
            }
        </script>
    </body>
    </html>