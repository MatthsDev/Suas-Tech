<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$sql = "SELECT DISTINCT nomeSetor FROM tipos_senhas";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    // Loop para criar as opções do select
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['nomeSetor'] . '">' . $row['nomeSetor'] . '</option>';
    }
} else {
    // Se não houver setores, ainda assim, mostra uma opção padrão
    echo '<option value="">Nenhum setor encontrado</option>';
}

// Fecha a conexão com o banco de dados
$conn->close();
?>