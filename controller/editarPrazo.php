<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe a data do novo prazo "Y-m-d"
    $novoPrazo = $_POST['novoPrazo'];
    $id = $_POST['id'];

    // Solicitação SQL para alterar o prazo no banco de dados
    $edita_prazo = "UPDATE fluxo_diario_coz SET data_limite = '$novoPrazo' WHERE id = $id";

    // Executa a solicitação SQL e verifica se foi bem-sucedida
    if ($conn->query($edita_prazo) === true) {
        // Retorna um JSON indicando que a atualização foi bem-sucedida
        echo json_encode(array('encontrado' => true));
    } else {
        // Retorna um JSON indicando que a atualização falhou, incluindo detalhes do erro
        echo json_encode(array('encontrado' => false, 'erro' => 'Falha na atualização de dados: ' . $conn->error));
    }
} else {
    // Retorna um JSON indicando que o método de requisição não é válido (não é POST)
    echo json_encode(array('erro' => 'Método de requisição inválido!'));
}
