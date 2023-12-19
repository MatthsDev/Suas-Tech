<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$cpf = ($_POST["cpf"]);
$cod_familiar = ($_POST["codigo_familiar"]);
$nome = ($_POST["nome"]);
$data_nasc = ($_POST["data_nasc"]);
$nomeSocial = ($_POST["nome_social"]);
$sexo = ($_POST["sexo"]);
$outr_sexo = isset($_POST["outroSexo"]) ? $_POST["outroSexo"] : null;

$sitRUA = ($_POST["sitRUA"]);
$pcd = ($_POST["tipoDeficiencia"]);

$nomeMae = ($_POST["nome_mae"]);
$nomePai = ($_POST["nome_pai"]);
$nacionalidade = ($_POST["nac_pessoa"]);
$uf = ($_POST["uf_pessoa"]);
$municipio = ($_POST["nat_pessoa"]);
$telefone = ($_POST["tel_pessoa"]);
$email = ($_POST["email_pessoa"]);
$cor = ($_POST["cor"]);
$parentesco = ($_POST["parentesco"]);

$grupoIndigena = isset($_POST["grupoIndigena"]) ? $_POST["grupoIndigena"] : null;
$povoIndigena = isset($_POST["povoIndigena"]) ? $_POST["povoIndigena"] : null;
$grupoReserva = isset($_POST["grupoReserva"]) ? $_POST["grupoReserva"] : null;
$terraIndigina = isset($_POST["terraIndigina"]) ? $_POST["terraIndigina"] : null;
$familiaQuilambola = isset($_POST["familiaQuilambola"]) ? $_POST["familiaQuilambola"] : null;
$comunidadeQuilambola = isset($_POST["comunidadeQuilambola"]) ? $_POST["comunidadeQuilambola"] : null;

$rg = ($_POST["rg"]);
$complemento_rg = ($_POST["complemento_rg"]);
$data_exp_rg = ($_POST["data_exp_rg"]);
$sigla_rg = ($_POST["sigla_rg"]);
$estado_rg = ($_POST["estado_rg"]);
$nis = ($_POST["nis"]);
$numTitulo = ($_POST["num_titulo"]);
$zonaTitulo = ($_POST["zone_titulo"]);
$area_titulo = ($_POST["area_titulo"]);
$profissao = ($_POST["profissao"]);
$rendaPerCapita = ($_POST["renda_per"]);

$bairro = ($_POST["bairro"]);
$logradouro = ($_POST["log"]);
$numero = ($_POST["numero"]);
$referencia = ($_POST["referencia"]);
$qtdPessoasCasa = ($_POST["qtd_pessoa"]);

$linhas_cpf = 0; // Inicializa a variável $linhas_cpf com 0

if ($cpf != '') {
    // Verificar se o CPF já está cadastrado para outro paciente
    $res_c = $pdo->query("SELECT * FROM creas WHERE cpf = '$cpf'");
    $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
    $linhas_cpf = count($dados_c);

    if ($linhas_cpf != 0) {
        http_response_code(400); // Retorna código 400 (Bad Request)
        echo json_encode(array("message" => "Pessoa com CPF já cadastrado!"));
        exit();
    }
}

if ($linhas_cpf == 0) {

    $stmt = $conn->prepare("INSERT INTO creas (cpf, cod_familiar_fam, nome, data_nasc, nome_social, sexo, outro_sex, 
    cod_familia_indigena_fam, nom_povo_indigena_fam, cod_indigena_reside_fam, nom_reserva_indigena_fam, 
    ind_familia_quilombola_fam, nom_comunidade_quilombola_fam, nome_mae, nome_pai, nac_pessoa, uf_pessoa,
    nat_pessoa, tel_pessoa, email_pessoa, pcd, rg, complemento_rg, data_exp_rg, sigla_rg, estado_rg, nis, num_titulo, zone_titulo, 
    area_titulo, profissao, renda_per, bairro, logradouro, numero, referencia, qtd_pessoa, parentesco, cor_raca, sit_rua) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssss", $cpf, $cod_familiar, $nome, $data_nasc, $nomeSocial,
        $sexo, $outr_sexo, $grupoIndigena, $povoIndigena, $grupoReserva, $terraIndigina,
        $familiaQuilambola, $comunidadeQuilambola, $nomeMae, $nomePai, $nacionalidade, $uf,
        $municipio, $telefone, $email, $pcd, $rg, $complemento_rg, $data_exp_rg, $sigla_rg, $estado_rg, $nis,
        $numTitulo, $zonaTitulo, $area_titulo, $profissao, $rendaPerCapita, $bairro, $logradouro,
        $numero, $referencia, $qtdPessoasCasa, $parentesco, $cor, $sitRUA);
    $stmt->execute();

    echo json_encode(array("message" => "Cadastrado com Sucesso!!"));

} else {
    if ($linhas_cpf != 0) {
        http_response_code(400); // Retorna código 400 (Bad Request)
        echo json_encode(array("message" => "O CPF não foi fornecido."));
    }
}
$stmt_verifica->close();
$conn->close();




?>