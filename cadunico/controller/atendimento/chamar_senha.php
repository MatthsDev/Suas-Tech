<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/atendimento/user_session/dados.php';

// Receber o tipo que a senha deve ser chamada
$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);

// Verifica se vem o tipo de senha que deve ser chamada
if (!empty($tipo)) {

    // Preparar a QUERY
    $result_senha_gerada = $pdo->prepare("SELECT senger.id id_senha_gerada,
                sen.nome_senha
                FROM senhas_geradas AS senger
                INNER JOIN senhas AS sen ON sen.id=senger.senha_id
                WHERE senger.sits_senha_id = 2
                AND sen.tipos_senha_id=:tipos_senha_id
                ORDER BY senger.id ASC 
                LIMIT 1");

    $result_senha_gerada->bindValue(":tipos_senha_id", $tipo);
    $result_senha_gerada->execute();

    // Verificar se encontrou algum registro no BD
    $linhas = $result_senha_gerada->rowCount();

    if ($linhas > 0) {
        // Ler as informações retornadas do banco de dados
        $row_senha_gerada = $result_senha_gerada->fetch(PDO::FETCH_ASSOC);

        if ($row_senha_gerada) {
            // Extrair para imprimir através da chave no array
            extract($row_senha_gerada);

            // Alterar o status da senha gerada e incluir o ID do usuário logado
            $query_edit_senha_gerada = "UPDATE senhas_geradas 
                        SET sits_senha_id = 4, 
                            modified = NOW(),
                            user_id = :id_user
                        WHERE id=:id_senha_gerada";

            // Prepara a QUERY
            $edit_senha_gerada = $pdo->prepare($query_edit_senha_gerada);
            $edit_senha_gerada->bindValue(":id_user", $id_user, PDO::PARAM_INT);
            $edit_senha_gerada->bindValue(":id_senha_gerada", $id_senha_gerada, PDO::PARAM_INT);

            // Executar a QUERY
            $edit_senha_gerada->execute();

            // Criar o array com a posição indicando que não houve erro e a mensagem com a senha
            $retorna = [
                'status' => true,
                'msg' => "<p style='color: green;'>Senha chamada: $nome_senha</p>",
                "id_senha_gerada" => $id_senha_gerada
            ];
        } else {
            // Se não houver resultados, criar o array com a posição indicando que houve erro e a mensagem de erro
            $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Tipo de senha não encontrada!</p>"];
        }
    } else {
        // Criar o array com a posição indicando que houve erro e a mensagem de erro
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Tipo de senha não encontrada!</p>"];
    }
} else {
    // Criar o array com a posição indicando que houve erro e a mensagem de erro
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Senha não chamada!</p>"];
}

// Retornar os dados para o JavaScript
echo json_encode($retorna);
?>
