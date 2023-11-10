<?php

// Incluir a conexão com o BD
include_once '../../config/conexao.php';

// Receber o tipo para o qual a senha deve ser gerada
$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);

// Inicializar o array de resposta
$retorna = [];

// Verificar se o tipo de senha foi recebido
if (!empty($tipo)) {

    // Criar a QUERY para recuperar os registros do BD
    $query_senha = "SELECT id, nome_senha 
                    FROM senhas
                    WHERE sits_senha_id=:sits_senha_id
                    AND tipos_senha_id=:tipos_senha_id
                    ORDER BY id ASC 
                    LIMIT 1";

    // Preparar a QUERY
    $result_senha = $conn->prepare($query_senha);

    // Substituir o link pelo valor
    $result_senha->bindValue(':sits_senha_id', 1, PDO::PARAM_INT);
    $result_senha->bindParam(':tipos_senha_id', $tipo, PDO::PARAM_INT);

    // Executar a QUERY
    $result_senha->execute();

    // Verificar se encontrou algum registro no BD
    if ($result_senha->rowCount() > 0) {

        // Ler as informações retornadas do banco de dados
        $row_senha = $result_senha->fetch(PDO::FETCH_ASSOC);

        // Extrair para imprimir através da chave no array
        extract($row_senha);

        // Criar a QUERY para cadastrar a senha gerada
        $query_senha_gerada = "INSERT INTO senhas_geradas (senha_id, sits_senha_id, created) VALUES (:id, 2, NOW())";

        // Preparar a QUERY
        $cad_senha_gerada = $conn->prepare($query_senha_gerada);

        // Substituir os links pelos valores
        $cad_senha_gerada->bindParam(':id', $id, PDO::PARAM_INT);

        // Executar a QUERY
        $cad_senha_gerada->execute();

        // Retornar TRUE quando cadastrou a senha e FALSE quando não conseguir cadastrar
        if ($cad_senha_gerada->rowCount() > 0) {

            // Alterar o status da senha
            $query_edit_senha = "UPDATE senhas SET sits_senha_id=2 WHERE id=:id LIMIT 1";

            // Preparar a QUERY
            $edit_senha = $conn->prepare($query_edit_senha);

            // Substituir o link pelo valor
            $edit_senha->bindParam(':id', $id, PDO::PARAM_INT);

            // Executar a QUERY
            $edit_senha->execute();

            // Criar o array com a posição indicando que não houve erro e retorna a senha
            $retorna = ['status' => true, 'nome_senha' => "<span style='color: green;'>$nome_senha</span>"];
        } else {
            // Criar o array com a posição indicando que houve erro e a mensagem de erro
            $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Senha não gerada!</p>"];
        }
    } else {
        // Criar o array com a posição indicando que houve erro e a mensagem de erro
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Senhas esgotadas!</p>"];
    }
} else {
    // Criar o array com a posição indicando que houve erro e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Senha não gerada!</p>"];
}

// Retornar os dados para o JavaScript
echo json_encode($retorna);
?>
