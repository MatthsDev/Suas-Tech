<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

// Verifica se o método da requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os IDs enviados na requisição
    $ids = $_POST['ids'];

    // Solicita a nova data do prazo "Y-m-d" ao usuário
    $dataOriginal = $_POST['novaData'];
    $dataFormatando = DateTime::createFromFormat('d/m/Y', $dataOriginal);
    $novoPrazo = $dataFormatando->format('Y-m-d');

    foreach ($ids as $id) {
        // Solicitação SQL para alterar o prazo no banco de dados
        $edita_prazo = "UPDATE fluxo_diario_coz SET data_limite = '$novoPrazo' WHERE id = $id";

        // Executa a solicitação SQL e verifica se foi bem-sucedida
        if ($conn->query($edita_prazo) === true) {
            // Retorna um JSON indicando que a atualização foi bem-sucedida
            echo json_encode(array('encontrado' => true, 'dataNova' => $novoPrazo, 'id_benef' => $id));
        } else {
            // Retorna um JSON indicando que a atualização falhou, incluindo detalhes do erro
            echo json_encode(array('encontrado' => false, 'erro' => 'Falha na atualização de dados: ' . $conn->error));
        }
    }
} else {
    // Se a requisição não for POST, emite um erro
    http_response_code(400);
    echo json_encode(array('erro' => 'Método de requisição inválido.'));
}
?>
