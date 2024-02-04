<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../cadunico/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../cras/css/style-tabela.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


    <title>Tabela</title>
</head>

<body>


    <?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

$data_corrente = date('Y-m-d');
$table_fluxo = $pdo->prepare('SELECT * FROM fluxo_diario_coz');
$table_fluxo->execute();

if ($table_fluxo) {
    $dados_table_fluxo = $table_fluxo->fetchAll(PDO::FETCH_ASSOC);
    ?>

<div class="container">

    <form action="processa_exclusao.php" method="post">
        <table width="650px" border="1">
            <tr>
                <th colspan="7" class="cabecalho"><?php echo "LISTA DAS PESSOAS COM DIVERGENCIAS NA COZINHA COMUNITÁRIA"; ?></th>
            </tr>
            <tr>
                <th>CPF:</th>
                <th>NOME:</th>
                <th>DATA CADASTRADO:</th>
                <th>DATA LIMITE:</th>
                <th>ENCAMINHADO</th>
                <th>MOTIVO</th>
                <th>AÇÃO</th>
            </tr>
            <?php
foreach ($dados_table_fluxo as $linhas) {
        if ($linhas['data_limite'] <= $data_corrente && $linhas['encaminhado_cras'] == $setor) {

            ?>
                            <tr>
                                <td> <?php echo $linhas['cpf_benef']; ?> </td>
                                <td> <?php echo $linhas['nome']; ?> </td>
                                <td> <?php echo $linhas['data_registro']; ?> </td>
                                <td> <?php echo $linhas['data_limite']; ?> </td>
                                <td> <?php echo $linhas['encaminhado_cras']; ?> </td>
                                <td> FORA DO PRAZO </td>
                                <td class="check" >
                                <label class="urg">
                                <input type="checkbox" name="excluir[]" value="<?php echo $linhas['id']; ?>">
                                <span class="checkmark"></span>
                                </label>
                                </td>
                            </tr>
                    <?php
// Define a variável de sessão com base na presença de valores na variável
            $_SESSION['fluxo_diario_coz_has_values'] = $linhas['nome'];
        }

        if ($linhas['limiter'] >= 3) {
            ?>
            <tr>
            <td> <?php echo $linhas['cpf_benef']; ?> </td>
            <td> <?php echo $linhas['nome']; ?> </td>
            <td> <?php echo $linhas['data_registro']; ?> </td>
            <td> <?php echo $linhas['data_limite']; ?> </td>
            <td> <?php echo $linhas['encaminhado_cras']; ?> </td>
            <td> <?php echo $linhas['limiter']; ?> FALTAS </td>
            <td class="check" >
            <label class="urg">
            <input type="checkbox" name="excluir[]" value="<?php echo $linhas['id']; ?>">
            <span class="checkmark"></span>
            </label>
            </td>
        </tr>
        <?php
    }
}
    ?>
                </table>
                <div class="botoes">
                    <button type="button" onclick="abrirModal()">Ações</button>
                    <!-- Modal -->
                    <div id="modal" class="modal" style="display: none;">
                        <button type="button" onclick="excluirSelecionados()">Excluir</button>
                        <button type="button" onclick="editarPrazo(<?php echo $linhas['id']; ?>)">Editar Prazo</button>
                    </div>
                </div>
                <!-- Fim Modal -->

            </form>
            <script>
                function abrirModal() {
                    document.getElementById('modal').style.display = 'block';
                }

                function excluirSelecionados() {
                    document.forms[0].submit(); // Envia o formulário
                }

                function editarPrazo(id) {
    var novoPrazo = window.prompt('Informe o novo prazo para esta família (Formato: DD/MM/AAAA)');

    // Utiliza o moment.js para formatar a data
    var dataFormatada = moment(novoPrazo, 'DD/MM/YYYY').format('YYYY-MM-DD');

    $.ajax({
        url: 'editarPrazo.php',
        method: 'POST',
        data: {
            id: id,
            novoPrazo: dataFormatada
        },
        dataType: 'json',
        success: function(response) {
            if (response.encontrado) {
                alert('Data alterada com sucesso!');
                location.reload();
            } else {
                alert('Erro ao salvar a data! Consulte o SUPORTE DDV.');
            }
        },
        error: function(error) {
            console.error('Erro ao enviar dados: ' + error);
        }
    });
}

            </script>
        <?php
} else {
    die('Error in query: ' . implode($pdo->errorInfo()));
}

if (empty($dados_table_fluxo)) {
    echo "<tr><td colspan='7'>Nenhuma família fora do prazo.</td></tr>";
}
?>
</div>
</body>

</html>