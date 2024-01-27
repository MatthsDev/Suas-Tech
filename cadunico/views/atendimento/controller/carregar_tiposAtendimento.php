<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

// Verifica se o parâmetro 'nomeSetor' foi recebido
if(isset($_GET['nomeSetor'])) {
  
    // Obtém o nomeSetor da requisição
    $nomeSetor = $_GET['nomeSetor'];

    // Consulta SQL para obter tipos de atendimentos para o nomeSetor
    $sql = "SELECT DISTINCT id, tipos_atendimentos FROM tipos_senhas WHERE nomeSetor = '$nomeSetor'";
    $result = $conn->query($sql);

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        // Loop para criar as opções do select
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id'] . '">' . $row['tipos_atendimentos'] . '</option>';
        }
    } else {
        echo '<option value="">Nenhum tipo de atendimento encontrado para este setor</option>';
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    echo '<option value="">Parâmetro "nomeSetor" não recebido</option>';
}
?>
