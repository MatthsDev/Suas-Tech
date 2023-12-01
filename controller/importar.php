<?php
require_once '../config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arquivoCSV = $_FILES["arquivoCSV"]["tmp_name"];

    // Faça a leitura do arquivo CSV e atualize o banco de dados conforme necessário
    if (($handle = fopen($arquivoCSV, "r")) !== false) {

        // Execute a consulta SQL de atualização
        $sql = "INSERT INTO unipessoal_sem_upload (ref, uf, gigov, ibge, municipio, nis, nome) VALUES (?,?,?,?,?,?,?)";

        //prepara a declaração
        $stmt = $conn->prepare($sql);

        while (($data = fgetcsv($handle, 1000, ";")) !== false) {

            //print_r($data);
            // $data contém os dados de cada linha do CSV
            if (count($data) >= 7) {
                $ref = $data[0];
                $uf = $data[1];
                $gigov = $data[2];
                $ibge = $data[3];
                $municipio = $data[4];
                $nis = $data[5];
                $nome = $data[6];

            } else {
                // Se não houver dados suficientes, talvez imprima um aviso ou lide com isso de acordo com a lógica do seu aplicativo
                echo "Linha CSV incompleta: " . implode(",", $data) . "<br>";
                return;
            }
            // Atribuir valores aos placeholders e executar a declaração
            $stmt->bind_param("sssssss", $ref, $uf, $gigov, $ibge, $municipio, $nis, $nome);
            $stmt->execute();

        }
        if ($stmt->execute()) {
            echo "Importação concluída com sucesso!";
        } else {
            echo "Erro ao executar a consulta: " . $stmt->error;
        }

    }

    // Fechar a declaração e o arquivo CSV
    $stmt->close();
    fclose($handle);
    $conn->close();

    echo "Importação concluída com sucesso!";
} else {
    echo "Erro ao abrir o arquivo CSV.";
}
