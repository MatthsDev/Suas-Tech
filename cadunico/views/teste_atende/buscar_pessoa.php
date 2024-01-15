<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

function limparCPF($cpf) {
    // Remover caracteres indesejados
    $cpfLimpo = preg_replace('/[^0-9]/', '', $cpf);

    // Remover zeros à esquerda
    $cpfLimpo = ltrim($cpfLimpo, '0');

    return $cpfLimpo;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpfInput = $_POST["cpf"];
    $cpf = limparCPF($cpfInput);

    if (!$cpf){
        echo '';
    }
    
    // Consulta a pessoa pelo CPF
    $stmt = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf_pessoa");
    $stmt->execute(array(':cpf_pessoa' => $cpf));
    
    if ($stmt->rowCount() > 0) {
        // Pessoa encontrada
        $dados_atende = $stmt->fetch(PDO::FETCH_ASSOC);
        $nome_pessoa = $dados_atende['nom_pessoa'];

        // Retorna os dados em formato JSON
        echo json_encode(array('encontrado' => true, 'nome' => $nome_pessoa));
    } else {
        // Pessoa não encontrada
        echo json_encode(array('encontrado' => false, 'erro' => $stmt->errorInfo()));
    }
} else {
    echo json_encode(array('erro' => 'Método de requisição inválido!'));
}
?>

