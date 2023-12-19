<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$cpf = ($_POST["cpf"]);
$cod_familiar = ($_POST["codigo_familiar"]);
$nome = ($_POST["nome"]);
$data_nasc = ($_POST["data_nasc"]);
$nomeSocial = ($_POST["nome_social"]);
$sexo = ($_POST["sexo"]);
$outr_sexo = isset($_POST["outroSexo"]) ? $_POST["outroSexo"] : null;

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

if ($cpf != '') {
    $stmt = $pdo->prepare("SELECT * FROM cras WHERE cpf = ?");
    $stmt->execute([$cpf]);
    $linhas_cpf = $stmt->rowCount();

    if ($linhas_cpf != 0) {
        echo json_encode(["status" => "error", "message" => "CPF já cadastrado!"]);
    } else {
        $stmt = $conn->prepare("INSERT INTO cras (cpf, cod_familiar_fam, nome, data_nasc, nome_social, sexo, outro_sex, 
    cod_familia_indigena_fam, nom_povo_indigena_fam, cod_indigena_reside_fam, nom_reserva_indigena_fam, 
    ind_familia_quilombola_fam, nom_comunidade_quilombola_fam, nome_mae, nome_pai, nac_pessoa, uf_pessoa,
    nat_pessoa, tel_pessoa, email_pessoa, pcd, rg, complemento_rg, data_exp_rg, sigla_rg, estado_rg, nis, num_titulo, zone_titulo, 
    area_titulo, profissao, renda_per, bairro, logradouro, numero, referencia, qtd_pessoa, parentesco, cor_raca) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("sssssssssssssssssssssssssssssssssssssss", $cpf, $cod_familiar, $nome, $data_nasc, $nomeSocial,
            $sexo, $outr_sexo, $grupoIndigena, $povoIndigena, $grupoReserva, $terraIndigina,
            $familiaQuilambola, $comunidadeQuilambola, $nomeMae, $nomePai, $nacionalidade, $uf,
            $municipio, $telefone, $email, $pcd, $rg, $complemento_rg, $data_exp_rg, $sigla_rg, $estado_rg, $nis,
            $numTitulo, $zonaTitulo, $area_titulo, $profissao, $rendaPerCapita, $bairro, $logradouro,
            $numero, $referencia, $qtdPessoasCasa, $parentesco, $cor);
    }
    $stmt->execute();
    echo json_encode(["status" => "success", "message" => "Cadastrado com Sucesso!!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Erro ao cadastrar. CPF não informado!"]);
}
$stmt->close();
$conn->close();





?>