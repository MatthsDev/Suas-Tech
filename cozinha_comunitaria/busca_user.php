<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$cpf = $_POST['cpf'];
$cpfLimpo = preg_replace('/[^0-9]/', '', $cpf);
$cpfLimpo = ltrim($cpfLimpo, '0');

$sql = "SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = '$cpfLimpo'";
$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Define as variáveis do endereço
    $tipo_logradouro = $row["nom_tip_logradouro_fam"];
    $nom_logradouro_fam = $row["nom_logradouro_fam"];
    $num_logradouro_fam = $row["num_logradouro_fam"];
    
    

    // Verifica se o número do logradouro está vazio
    if ($num_logradouro_fam == "") {
        $num_logradouro = "S/N";
    } else {
        $num_logradouro = $num_logradouro_fam;
    }

    $nom_localidade_fam = $row["nom_localidade_fam"];
    $nom_titulo_logradouro_fam = $row["nom_titulo_logradouro_fam"];
    
    // Verifica se o título do logradouro está vazio
    if ($nom_titulo_logradouro_fam == "") {
        $nom_tit = "";
    } else {
        $nom_tit = $nom_titulo_logradouro_fam;
    }

    $txt_referencia_local_fam = $row["txt_referencia_local_fam"];
    
    // Verifica se a referência está vazia
    if ($txt_referencia_local_fam == "") {
        $referencia = "SEM REFERÊNCIA";
    } else {
        $referencia = $txt_referencia_local_fam;
    }

    // Monta o endereço completo
    // $endereco_completo = $tipo_logradouro . " " . $nom_tit . " " . $nom_logradouro_fam . ", " . $num_logradouro . " - " . $nom_localidade_fam . ", " . $referencia;
    $log_nome = $tipo_logradouro . " " . $nom_tit . " " . $nom_logradouro_fam;


    $response['existeUsuario'] = true;
    $response['nome'] = $row['nom_pessoa']; 
    $response['bairro'] =  $nom_localidade_fam ;
    $response['log'] =  $log_nome;
    $response['numero'] =  $num_logradouro;
    $response['referencua'] = $referencia;
    // $response['enderecoCompleto'] = $endereco_completo;
} else {
    $response['existeUsuario'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
$conn->close();

?>
