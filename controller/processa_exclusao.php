<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o array 'excluir' foi enviado
    if (isset($_POST['excluir']) && is_array($_POST['excluir'])) {

        // Inicializa uma string para armazenar as mensagens de exclusão
        $mensagensExclusao = "";

        // Loop através dos IDs a serem excluídos
        foreach ($_POST['excluir'] as $id) {
            // Declarações preparadas para evitar SQL injection
            $sql = "DELETE FROM fluxo_diario_coz WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Executa a exclusão
            if ($stmt->execute()) {
                $mensagensExclusao .= "Registro com ID $id excluído com sucesso.";
            } else {
                $mensagensExclusao .= "Erro ao excluir o registro com ID $id.";
            }
        }

        // Verifique a quantidade de marmitas na tabela fluxo_diario_coz.
        $sql_soma = "SELECT SUM(qtd_marmita) as soma_total FROM fluxo_diario_coz";
        $resultado_soma = $conn->query($sql_soma);
        $soma_total = $resultado_soma->fetch_assoc()['soma_total'];

        // Enquanto a soma total for menor que 200, continue movendo linhas da tabela fila_cozinha para fluxo_diario_coz
        while ($soma_total < 200) {

            // Estabelecendo novo prazo
            $data_hoje = new DateTime();
            $novo_prazo = clone $data_hoje;
            $data_hoje->add(new DateInterval('P90D'));
            $data_formatada = $data_hoje->format('Y-m-d');

            $entregue = 'não';

            // Selecione a primeira linha da tabela fila_cozinha
            $sql_fila_espera = "SELECT * FROM fila_cozinha LIMIT 1";
            $stmt_fila_espera = $pdo->prepare($sql_fila_espera);
            $stmt_fila_espera->execute();
            $dados_fila_espera = $stmt_fila_espera->fetch(PDO::FETCH_ASSOC);

            // Move a linha para a tabela fluxo_diario_coz
            $sql_move_para_fluxo = "INSERT INTO fluxo_diario_coz (nis_benef, num_doc, nome, dt_nasc, nome_mae, cpf_benef, encaminhado_cras, qtd_pessoa, qtd_marmita, entregue, prioridade, data_limite, nome_operador, data_registro) VALUES (:nis_benef, :num_doc, :nome, :dt_nasc, :nome_mae, :cpf_benef, :encaminhado_cras, :qtd_pessoa, :qtd_marmita, :entregue, :prioridade, :data_limite, :nome_operador, :data_registro)";
            $stmt_move_para_fluxo = $pdo->prepare($sql_move_para_fluxo);
            $stmt_move_para_fluxo->bindParam(':nis_benef', $dados_fila_espera['nis_benef']);
            $stmt_move_para_fluxo->bindParam(':num_doc', $dados_fila_espera['num_doc']);
            $stmt_move_para_fluxo->bindParam(':nome', $dados_fila_espera['nome']);
            $stmt_move_para_fluxo->bindParam(':dt_nasc', $dados_fila_espera['dt_nasc']);
            $stmt_move_para_fluxo->bindParam(':nome_mae', $dados_fila_espera['nome_mae']);
            $stmt_move_para_fluxo->bindParam(':cpf_benef', $dados_fila_espera['cpf_benef']);
            $stmt_move_para_fluxo->bindParam(':encaminhado_cras', $dados_fila_espera['encaminhado_cras']);
            $stmt_move_para_fluxo->bindParam(':qtd_pessoa', $dados_fila_espera['qtd_pessoa']);
            $stmt_move_para_fluxo->bindParam(':qtd_marmita', $dados_fila_espera['qtd_marmita']);
            $stmt_move_para_fluxo->bindParam(':prioridade', $dados_fila_espera['prioridade']);
            $stmt_move_para_fluxo->bindParam(':nome_operador', $dados_fila_espera['nome_operador']);
            $stmt_move_para_fluxo->bindParam(':data_registro', $dados_fila_espera['data_registro']);
            $stmt_move_para_fluxo->bindParam(':entregue', $entregue);
            $stmt_move_para_fluxo->bindParam(':data_limite', $data_formatada);

            $stmt_move_para_fluxo->execute();

            // Exclui a linha da tabela fila_cozinha
            $sql_excluir_fila = "DELETE FROM fila_cozinha WHERE id = :id";
            $stmt_excluir_fila = $pdo->prepare($sql_excluir_fila);
            $stmt_excluir_fila->bindParam(':id', $dados_fila_espera['id']);
            $stmt_excluir_fila->execute();

            // Atualiza a soma total
            $soma_total += $dados_fila_espera['qtd_marmita'];
        }

        // Exibe as mensagens em um modal
        echo "<script>
                alert('$mensagensExclusao');
                window.location.href = '/Suas-Tech/controller/conexao_table.php';
            </script>";

    } else {
        echo "Nenhum registro selecionado para exclusão. <br>";
    }
} else {
    echo "Acesso inválido ao script de exclusão. <br>";
}

// Fechar conexão
$conn->close();