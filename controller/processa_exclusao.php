<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

// Função para mover dados da tbl_b para tbl_a quando a quantidade permitir
function moverDados($conn) {
    $query = "SELECT * FROM tbl_b";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $quantidade_tbl_a = obterQuantidadeTblA($conn);
            if ($quantidade_tbl_a + $row['quantidade_itens'] <= 100) {
                // Mover dados para tbl_a
                $insert_query = "INSERT INTO tbl_a (NOME, numero_identificacao, quantidade_itens, fim_do_prazo) VALUES ('{$row['NOME']}', '{$row['numero_identificacao']}', '{$row['quantidade_itens']}', '{$row['fim_do_prazo']}')";
                $conn->query($insert_query);

                // Remover dados da tbl_b
                $delete_query = "DELETE FROM tbl_b WHERE id = {$row['id']}";
                $conn->query($delete_query);
            } else {
                break; // Parar o loop se a quantidade máxima for atingida
            }
        }
    }
}

// Função para obter a quantidade atual na tbl_a
function obterQuantidadeTblA($conn) {
    $query = "SELECT SUM(quantidade_itens) as total FROM tbl_a";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    return $row['total'];
}

// Função para verificar e mover dados antes de excluir da tbl_a
function verificarMoverExcluir($conn, $id) {
    $query = "SELECT * FROM tbl_a WHERE id = $id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $quantidade_tbl_a = obterQuantidadeTblA($conn);

        // Verifica se a exclusão permitirá adicionar novos registros na tbl_a
        if ($quantidade_tbl_a - $row['quantidade_itens'] < 100) {
            // Mover dados da tbl_b para tbl_a
            moverDados($conn);
        }

        // Excluir dados da tbl_a
        $delete_query = "DELETE FROM tbl_a WHERE id = $id";
        $conn->query($delete_query);
    }
}

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
                // Verificar e mover dados antes de excluir da tbl_a
                verificarMoverExcluir($conn, $id);
            } else {
                $mensagensExclusao .= "Erro ao excluir o registro com ID $id.";
            }
        }

        // Verifique a quantidade de marmitas na tabela fluxo_diario_coz.
        $sql_soma = "SELECT SUM(qtd_marmita) as soma_total FROM fluxo_diario_coz";
        $resultado_soma = $conn->query($sql_soma);
        $soma_total = $resultado_soma->fetch_assoc()['soma_total'];

        // Se houver vagas disponíveis, move registros da fila_cozinha para fluxo_diario_coz
        $sql_fila_espera = "SELECT * FROM fila_cozinha LIMIT $soma_total";
        $stmt_fila_espera = $pdo->prepare($sql_fila_espera);
        $stmt_fila_espera->execute();
        $dados_fila_espera = $stmt_fila_espera->fetchAll(PDO::FETCH_ASSOC);

        foreach ($dados_fila_espera as $dados) {

            $data_hoje = new DateTime();
            $novo_prazo = clone $data_hoje;
            $data_hoje->add(new DateInterval('P90D'));

            // Verifica se há vagas disponíveis estritamente menor que 200
            if ($soma_total < 200) {

                $sql_insercao_fluxo_diario = "INSERT INTO fluxo_diario_coz (nis_benef, num_doc, nome, dt_nasc, nome_mae, cpf_benef, encaminhado_cras, qtd_pessoa, qtd_marmita, entregue, prioridade, data_limite, nome_operador, data_registro) VALUES (:nis_benef, :num_doc, :nome, :dt_nasc, :nome_mae, :cpf_benef, :encaminhado_cras, :qtd_pessoa, :qtd_marmita, :entregue, :prioridade, :data_limite, :nome_operador, :data_registro)";
                $stmt_insercao_fluxo_diario = $pdo->prepare($sql_insercao_fluxo_diario);
                $stmt_insercao_fluxo_diario->bindParam(':nis_benef', $dados['nis_benef']);
                $stmt_insercao_fluxo_diario->bindParam(':nome', $dados['nome']);
                $stmt_insercao_fluxo_diario->bindParam(':num_doc', $dados['num_doc']);
                $stmt_insercao_fluxo_diario->bindParam(':dt_nasc', $dados['dt_nasc']);
                $stmt_insercao_fluxo_diario->bindParam(':nome_mae', $dados['nome_mae']);
                $stmt_insercao_fluxo_diario->bindParam(':cpf_benef', $dados['cpf_benef']);
                $stmt_insercao_fluxo_diario->bindParam(':encaminhado_cras', $dados['encaminhado_cras']);
                $stmt_insercao_fluxo_diario->bindParam(':qtd_pessoa', $dados['qtd_pessoa']);
                $stmt_insercao_fluxo_diario->bindParam(':qtd_marmita', $dados['qtd_marmita']);
                $stmt_insercao_fluxo_diario->bindParam(':entregue', $dados['entregue']);
                $stmt_insercao_fluxo_diario->bindParam(':prioridade', $dados['prioridade']);
                $stmt_insercao_fluxo_diario->bindParam(':nome_operador', $dados['nome_operador']);
                $stmt_insercao_fluxo_diario->bindParam(':data_registro', $dados['data_registro']);
                $stmt_insercao_fluxo_diario->bindParam(':data_limite', $data_hoje->format('Y-m-d'));
                $stmt_insercao_fluxo_diario->execute();

                // Atualiza a soma total após a inserção
                $sql_atualiza_soma = "SELECT SUM(qtd_marmita) as soma_total FROM fluxo_diario_coz";
                $resultado_atualiza_soma = $conn->query($sql_atualiza_soma);
                $soma_total = $resultado_atualiza_soma->fetch_assoc()['soma_total'];

                // Exclusão dos registros movidos da fila_cozinha
                $idsExclusaoFilaEspera = array_column($dados_fila_espera, 'id');
                if (!empty($idsExclusaoFilaEspera)) {
                    $sqlExclusaoFilaEspera = "DELETE FROM fila_cozinha WHERE id IN (" . implode(',', $idsExclusaoFilaEspera) . ") AND id NOT IN (SELECT id FROM fluxo_diario_coz)";
                    $stmtExclusaoFilaEspera = $pdo->prepare($sqlExclusaoFilaEspera);
                    $stmtExclusaoFilaEspera->execute();
                }
            }
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
?>
