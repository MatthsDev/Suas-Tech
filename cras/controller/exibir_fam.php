<?php
// Incluir o arquivo de conexão com o banco de dados
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar se o campo de busca foi preenchido
    if (isset($_POST['codigo_busca'])) {
        $codigoBusca = $_POST['codigo_busca'];

        // Consultar o banco de dados para obter a quantidade de famílias para o código familiar
        $stmt = $pdo->prepare("SELECT COUNT(*) AS quantidade FROM cras WHERE cod_familiar_fam = ?");
        $stmt->execute([$codigoBusca]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $quantidadeFamilias = $result["quantidade"];
            echo "<p>Quantidade de Famílias para o código $codigoBusca: $quantidadeFamilias</p>";
        } else {
            echo "<p>Ocorreu um erro ao consultar a quantidade de famílias para o código $codigoBusca.</p>";
        }

        // Fechar a conexão PDO
        $pdo = null;
    } else {
        echo "<p>O campo de busca não foi preenchido.</p>";
    }
}
?>
