<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

    $sql_csv = 'SELECT nis_benef, nome, nome_mae, cpf_benef, data_de_entrega, encaminhado_cras, qtd_pessoa, qtd_marmita, marm_entregue, limiter, entregue, data_limite, entregue_por, data_registro FROM fluxo_diario_coz';
    $resultado_csv = $conn->query($sql_csv);

    if ($resultado_csv->num_rows > 0) {
        $data_atual = date('d-m-Y');

        while ($row = $resultado_csv->fetch_assoc()) {
            // Verifica se a coluna 'entregue' é igual a 'não'

            if ($row['entregue'] == "ok") {
                $editar_sqli = "UPDATE fluxo_diario_coz SET limiter = 0 WHERE nis_benef = '{$row['nis_benef']}'";
                if ($conn->query($editar_sqli) === true) {
                    echo '';
                } else {
                    echo 'Falha na atualização de dados' . $conn->error;
                }
            }

            if ($row['entregue'] == 'não') {
                // Incrementa o valor da coluna 'limiter' em 1
                $limiterAtualizado = $row['limiter'] + 1;
    
                // Atualiza o registro no banco de dados com o novo valor de 'limiter'
                $updateSql = "UPDATE fluxo_diario_coz SET limiter = $limiterAtualizado WHERE nis_benef = '{$row['nis_benef']}'";
                $conn->query($updateSql);
            }
        }

        // Nome do arquivo
        $csv_nome = 'fluxo_diario' . $data_atual . '.csv';

        // Nome das colunas
        $titulo_colunas = array('NIS', 'NOME', 'NOME DA MAE', 'CPF', 'DATA DA ENTREGA', 'ENCAMINHADO PELO', 'QUANTIDADE DE PESSOAS NA FAMILIA', 'MARMITAS DISPONIBILIZADAS', 'MARMITAS ENTREGUES', 'LIMITE', 'ENTREGUE', 'DATA DE ACOMPANHAMENTO', 'ENTREGUE POR', 'DATA DE REGISTRO DA FAMILIA');

        // Abrindo o arquivo
        $arquivo_csv = fopen($csv_nome, 'w');

        // Incorporando o nome das colunas no arquivo
        fputcsv($arquivo_csv, $titulo_colunas);

        // Escreve os dados no arquivo
        while ($linha = $resultado_csv->fetch_assoc()) {
            fputcsv($arquivo_csv, $linha);
        }

        fclose($arquivo_csv);

        // Define os headers para forçar o download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $csv_nome . '"');

        // Lê o arquivo CSV e exibe no navegador
        readfile($csv_nome);

        // Exclui o arquivo CSV após o download (opcional)
        unlink($csv_nome);

        // Atualiza os dados na tabela
        $editar_sql = "UPDATE fluxo_diario_coz SET data_de_entrega = NULL, marm_entregue = 0, entregue = 'não', entregue_por = NULL";
        if ($conn->query($editar_sql) === true) {
            echo '<script>alert("Relatório gerado com sucesso!"); window.location.href = "fluxo_diario.php";</script>';
        } else {
            echo 'Falha na atualização de dados' . $conn->error;
        }

    } else {
        echo 'Nenhum dado encontrado na tabela.';
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    echo '<script>alert("Relatório gerado com sucesso!"); window.location.href = "fluxo_diario.php";</script>';