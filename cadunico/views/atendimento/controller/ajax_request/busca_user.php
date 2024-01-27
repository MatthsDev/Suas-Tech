<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$cpf = $_POST['cpf'];
$cpfLimpo = preg_replace('/[^0-9]/', '', $cpf);
$cpfLimpo = ltrim($cpfLimpo, '0');

if (!empty($cpfLimpo)) {
    $sql = "SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = '$cpfLimpo'";
    $result = $conn->query($sql);

    if (!$result) {
        $response['error'] = "Erro na query: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response['existeUsuario'] = true;
            $response['nome'] = $row['nom_pessoa'];
            $response['cpf_pess'] = $cpfLimpo;  
        } else {
            $response['existeUsuario'] = false;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
$conn->close();
?>
