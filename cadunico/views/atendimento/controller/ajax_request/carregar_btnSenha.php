<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$nomeSetor = $_GET['nomeSetor'];

// Consulta SQL para obter os setores
$sqlSetores = "SELECT DISTINCT * FROM tipos_senhas";
$resultSetores = $conn->query($sqlSetores);

// Verifica se há resultados
if ($resultSetores->num_rows > 0) {


    $sqlTiposAtendimento = "SELECT id, tipos_atendimentos FROM tipos_senhas WHERE nomeSetor = '$nomeSetor'";
    $resultTiposAtendimento = $conn->query($sqlTiposAtendimento);

    // Verifica se há resultados
    if ($resultTiposAtendimento->num_rows > 0) {
        while ($rowTipoAtendimento = $resultTiposAtendimento->fetch_assoc()) {
            echo '<p><button id="btnCADUNICO2" onclick="gerarSenhaImprimir('.$rowTipoAtendimento['id'].')"> 
            '. $nomeSetor .' '. $rowTipoAtendimento['tipos_atendimentos'] .'</button></p>';
        }
    }
} else {
    echo '<p>Nenhum setor encontrado</p>';
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
