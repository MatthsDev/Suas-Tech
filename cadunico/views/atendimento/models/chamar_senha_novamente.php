<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/atendimento/user_session/dados.php';

// Receber o ID da senha que será chamada novamente
$id_senha_gerada = filter_input(INPUT_POST, 'id_senha_gerada', FILTER_SANITIZE_NUMBER_INT);

// Verificar se o ID da senha foi recebido
if (!empty($id_senha_gerada)) {

    // Primeiro, selecione o ID da última senha modificada pelo usuário
    $query_select_id = "SELECT id 
                        FROM senhas_geradas 
                        WHERE user_id = :user_id
                        ORDER BY modified DESC
                        LIMIT 1";

    $select_id = $pdo->prepare($query_select_id);
    $select_id->bindValue(":user_id", $id_senha_gerada, PDO::PARAM_INT);
    $select_id->execute();

    $row = $select_id->fetch(PDO::FETCH_ASSOC);
    $id_senha_gerada = $row['id'];

    // Agora, atualize a senha selecionada
    $query_update_senha = "UPDATE senhas_geradas 
                           SET sits_senha_id = 4,
                               modified = NOW()
                           WHERE id = :id_senha_gerada";

    $update_senha = $pdo->prepare($query_update_senha);
    $update_senha->bindValue(":id_senha_gerada", $id_senha_gerada, PDO::PARAM_INT);
    $update_senha->execute();

    // Verificar se a senha foi atualizada com sucesso
    if ($update_senha->rowCount() > 0) {
        // Preparar a QUERY para buscar as informações da senha com o ID especificado
        $query_senha_gerada = "SELECT senger.id AS id_senha_gerada, sen.nome_senha
                                FROM senhas_geradas AS senger
                                INNER JOIN senhas AS sen ON sen.id = senger.senha_id
                                WHERE senger.id = :id_senha_gerada";

        // Preparar e executar a QUERY
        $result_senha_gerada = $pdo->prepare($query_senha_gerada);
        $result_senha_gerada->bindValue(":id_senha_gerada", $id_senha_gerada, PDO::PARAM_INT);
        $result_senha_gerada->execute();

        // Verificar se a senha foi encontrada no banco de dados
        if ($result_senha_gerada->rowCount() > 0) {
            // Ler as informações retornadas do banco de dados
            $row_senha_gerada = $result_senha_gerada->fetch(PDO::FETCH_ASSOC);

            // Extrair os dados da senha
            $nome_senha = $row_senha_gerada['nome_senha'];

            // Criar o array com a posição indicando que não houve erro e a mensagem com a senha chamada novamente
            $retorna = [
                'status' => true,
                'msg' => "<p style='color: green;'>Senha chamada novamente: $nome_senha</p>",
                "id_senha_gerada" => $id_senha_gerada
            ];
        } else {
            // Se a senha não for encontrada, criar o array com a posição indicando que houve erro e a mensagem de erro
            $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Senha não encontrada!</p>"];
        }
    } else {
        // Se houver algum erro ao atualizar a senha, criar o array com a posição indicando que houve erro e a mensagem de erro
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro ao chamar a senha novamente!</p>"];
    }
} else {
    // Se o ID da senha não for recebido, criar o array com a posição indicando que houve erro e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: ID da senha não recebido!</p>"];
}

// Retornar os dados para o JavaScript
echo json_encode($retorna);
?>
