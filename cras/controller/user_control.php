<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$cpf = ($_POST["cpf"]);
$nome = ($_POST["nome"]);
$data_nasc = ($_POST["data_nasc"]);
$nomeSocial = ($_POST["nome_social"]);
$sexo = ($_POST["sexo"]);
$nomeMae = ($_POST["nome_mae"]);
$nomePai = ($_POST["nome_pai"]);
$nacionalidade = ($_POST["nac_pessoa"]);
$uf = ($_POST["uf_pessoa"]);
$municipio = ($_POST["nat_pessoa"]);
$telefone = ($_POST["tel_pessoa"]);
$email = ($_POST["email_pessoa"]);
// $pcd = ($_POST["pcd"]);
// $gpte = ($_POST["gpte"]);
// $quilombo = ($_POST["quilombo"]);
$rg = ($_POST["rg"]);
$complemento_rg = ($_POST["complemento_rg"]);
$data_exp_rg = ($_POST["data_exp_rg"]);
$sigla_rg = ($_POST["sigla_rg"]);
$estado_rg = ($_POST["estado_rg"]);
$nis = ($_POST["nis"]);
$numTitulo = ($_POST["num_titulo"]);
$zonaTitulo = ($_POST["zone_titulo"]);
$secaoTitulo = ($_POST["area_titulo"]);
$profissao = ($_POST["profissao"]);
$rendaPerCapita = ($_POST["renda_per"]);
$bairro = ($_POST["bairro"]);
$logradouro = ($_POST["log"]);
$numero = ($_POST["numero"]);
$referencia = ($_POST["referencia"]);
$qtdPessoasCasa = ($_POST["qtd_pessoa"]);

$stmt = $conn->prepare("INSERT INTO cras_user (
    cpf, nome, data_nasc, nome_social, sexo, nome_mae, nome_pai, nac_pessoa, uf_pessoa, nat_pessoa,
    tel_pessoa, email_pessoa, rg, complemento_rg, data_exp_rg, sigla_rg, estado_rg, nis, num_titulo,
    zone_titulo, area_titulo, profissao, renda_per, bairro, logradouro, numero, referencia, qtd_pessoa
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)


");

if ($stmt === false) {
    die("Erro na preparação da declaração: " . $conn->error);
}

$params = array(
    $cpf, $nome, $dataNascimento, $nomeSocial, $sexo, $nomeMae, $nomePai, $nacionalidade, $uf, $municipio,
    $telefone, $email, $rg, $complemento_rg, $data_exp_rg, $sigla_rg, $estado_rg, $nis, $numTitulo, $zonaTitulo,
    $areaTitulo, $profissao, $rendaPerCapita, $bairro, $logradouro, $numero, $referencia, $qtdPessoasCasa

);

// Vincular os parâmetros usando chamada de usuário variável
$paramsType = str_repeat('s', count($params));
array_unshift($params, $paramsType);
call_user_func_array(array($stmt, 'bind_param'), $params);

if ($stmt->execute()) {
    // Redirecionar para a tela de cadastro
    header("Location: /Suas-Tech/cras/views/cadastro_usuario.php");
    exit();
} else {
    echo "Erro na inserção de dados: " . $stmt->error;
}
// Fechar a declaração e a conexão
$stmt->close();
$conn->close();

?>