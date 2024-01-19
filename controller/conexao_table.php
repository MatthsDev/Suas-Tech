<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../cadunico/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../cras/css/style-tabela.css">
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
                <th colspan="5" class="cabecalho"><?php echo "LISTA DAS PESSOAS COM O PRAZO VENCIDO"; ?></th>
            </tr>
            <tr>
                <th>NOME:</th>
                <th>DATA CADASTRADO:</th>
                <th>DATA LIMITE:</th>
                <th>ENCAMINHADO:</th>
                <th>AÇÃO</th>
            </tr>
            <?php
foreach ($dados_table_fluxo as $linhas) {
        if ($linhas['data_limite'] <= $data_corrente && $linhas['encaminhado_cras'] == $setor) {

            ?>
                            <tr>
                                <td> <?php echo $linhas['nome']; ?> </td>
                                <td> <?php echo $linhas['data_registro']; ?> </td>
                                <td> <?php echo $linhas['data_limite']; ?> </td>
                                <td> <?php echo $linhas['encaminhado_cras']; ?> </td>
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
    }
    ?>
                </table>
                <div class="botoes">
                    <button type="button" onclick="abrirModal()">Ações</button>
                    <!-- Modal -->
                    <div id="modal" class="modal" style="display: none;">
                        <button type="button" onclick="excluirSelecionados()">Excluir</button>
                        <button type="button" onclick="editarPrazo()">Editar Prazo</button>
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

                function editarPrazo() {
                    // Lógica para editar o prazo
                    // Pode abrir outro modal, redirecionar para uma página de edição, etc.
                    alert('Implemente a lógica para editar o prazo aqui.');
                }
            </script>
        <?php
} else {
    die('Error in query: ' . implode($pdo->errorInfo()));
}

if (empty($dados_table_fluxo)) {
    echo "<tr><td colspan='6'>Nenhuma família fora do prazo.</td></tr>";
}
?>
</div>
</body>

</html>