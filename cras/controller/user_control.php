<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once '../../cadunico/controller/acesso_user/dados_usuario.php';

$setor;

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

$linhas_cpf = 0;

if ($cpf != '') {
    $res_c = $pdo->query("SELECT * FROM cras WHERE cpf = '$cpf'");
    $dados_c = $res_c->fetchAll(PDO::FETCH_ASSOC);
    $linhas_cpf = count($dados_c);

    if ($linhas_cpf != 0) {
        http_response_code(400);
        echo json_encode(array("message" => "Pessoa com CPF já cadastrado!"));
        exit();
    }
}

if ($linhas_cpf == 0) {
    $stmt = $pdo->prepare("INSERT INTO cras (cpf, cod_familiar_fam, nome, data_nasc, nome_social, sexo, outro_sex, 
    cod_familia_indigena_fam, nom_povo_indigena_fam, cod_indigena_reside_fam, nom_reserva_indigena_fam, 
    ind_familia_quilombola_fam, nom_comunidade_quilombola_fam, nome_mae, nome_pai, nac_pessoa, uf_pessoa,
    nat_pessoa, tel_pessoa, email_pessoa, pcd, rg, complemento_rg, data_exp_rg, sigla_rg, estado_rg, nis, num_titulo, zone_titulo, 
    area_titulo, profissao, renda_per, bairro, logradouro, numero, referencia, qtd_pessoa, parentesco, cor_raca, setor) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Verifique a preparação bem-sucedida da instrução
    if ($stmt) {
        $stmt->bindParam(1, $cpf);
        $stmt->bindParam(2, $cod_familiar);
        $stmt->bindParam(3, $nome);
        $stmt->bindParam(4, $data_nasc);
        $stmt->bindParam(5, $nomeSocial);
        $stmt->bindParam(6, $sexo);
        $stmt->bindParam(7, $outr_sexo);
        $stmt->bindParam(8, $grupoIndigena);
        $stmt->bindParam(9, $povoIndigena);
        $stmt->bindParam(10, $grupoReserva);
        $stmt->bindParam(11, $terraIndigina);
        $stmt->bindParam(12, $familiaQuilambola);
        $stmt->bindParam(13, $comunidadeQuilambola);
        $stmt->bindParam(14, $nomeMae);
        $stmt->bindParam(15, $nomePai);
        $stmt->bindParam(16, $nacionalidade);
        $stmt->bindParam(17, $uf);
        $stmt->bindParam(18, $municipio);
        $stmt->bindParam(19, $telefone);
        $stmt->bindParam(20, $email);
        $stmt->bindParam(21, $pcd);
        $stmt->bindParam(22, $rg);
        $stmt->bindParam(23, $complemento_rg);
        $stmt->bindParam(24, $data_exp_rg);
        $stmt->bindParam(25, $sigla_rg);
        $stmt->bindParam(26, $estado_rg);
        $stmt->bindParam(27, $nis);
        $stmt->bindParam(28, $numTitulo);
        $stmt->bindParam(29, $zonaTitulo);
        $stmt->bindParam(30, $area_titulo);
        $stmt->bindParam(31, $profissao);
        $stmt->bindParam(32, $rendaPerCapita);
        $stmt->bindParam(33, $bairro);
        $stmt->bindParam(34, $logradouro);
        $stmt->bindParam(35, $numero);
        $stmt->bindParam(36, $referencia);
        $stmt->bindParam(37, $qtdPessoasCasa);
        $stmt->bindParam(38, $parentesco);
        $stmt->bindParam(39, $cor);
        $stmt->bindParam(40, $setor);

        $stmt->execute();

        echo json_encode(array("message" => "Cadastrado com Sucesso!!"));
    } else {
        http_response_code(500); // Erro interno do servidor
        echo json_encode(array("message" => "Erro ao preparar a consulta SQL."));
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "O CPF não foi fornecido."));
}

// Fechando a conexão PDO (se for necessário)
$pdo = null;
?>
