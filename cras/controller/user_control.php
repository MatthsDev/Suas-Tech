<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$cpf = ($_POST["cpf"]);
$nome = ($_POST["nome"]);
$data_nasc = ($_POST["data_nasc"]);
$nomeSocial = ($_POST["nome_social"]);
$sexo = ($_POST["sexo"]);
$outr_sexo = ($_POST["outroSexo"]);

$nomeMae = ($_POST["nome_mae"]);
$nomePai = ($_POST["nome_pai"]);
$nacionalidade = ($_POST["nac_pessoa"]);
$uf = ($_POST["uf_pessoa"]);
$municipio = ($_POST["nat_pessoa"]);
$telefone = ($_POST["tel_pessoa"]);
$email = ($_POST["email_pessoa"]);
$grupoIndigena = ($_POST["grupoIndigena"]);
$povoIndigena = ($_POST["povoIndigena"]);
$grupoReserva = ($_POST["grupoReserva"]);
$terraIndigina = ($_POST["terraIndigina"]);
$familiaQuilambola = ($_POST["familiaQuilambola"]);
$comunidadeQuilambola = ($_POST["comunidadeQuilambola"]);

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


$cpfExistente = false;
$consultaCpf = $conn->prepare("SELECT COUNT(*) FROM cras WHERE cpf = ?");
$consultaCpf->bind_param("s", $cpf);
$consultaCpf->execute();
$consultaCpf->bind_result($count);
$consultaCpf->fetch();

if ($count > 0) {
    $cpfExistente = true;
}

$consultaCpf->close();

if ($cpfExistente) {
    echo "CPF já cadastrado. Por favor, verifique os dados.";
} else {
        $stmt = $conn->prepare("INSERT INTO cras (
            cpf, nome, data_nasc, nome_social, sexo, outro_sex, cod_familia_indigena_fam, nom_povo_indigena_fam, cod_indigena_reside_fam, 
            nom_reserva_indigena_fam, ind_familia_quilombola_fam, nom_comunidade_quilombola_fam, nome_mae, nome_pai, nac_pessoa, uf_pessoa, 
            nat_pessoa, tel_pessoa, email_pessoa, rg, complemento_rg, data_exp_rg, sigla_rg, estado_rg, nis, num_titulo, zone_titulo, area_titulo, 
            profissao, renda_per, bairro, logradouro, numero, referencia, qtd_pessoa
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); 

        if ($stmt === false) {
            die("Erro na preparação da declaração: " . $conn->error);
        }

        $stmt->bind_param("sssssssssssssssssssssssssssssssssss",$cpf, $nome, $data_nasc, $nomeSocial, $sexo, $outr_sexo, $grupoIndigena, $povoIndigena,
        $grupoReserva, $terraIndigina, $familiaQuilambola, $comunidadeQuilambola, $nomeMae, $nomePai, $nacionalidade, $uf, $municipio,
            $telefone, $email, $rg, $complemento_rg, $data_exp_rg, $sigla_rg, $estado_rg, $nis, $numTitulo, $zonaTitulo,
            $area_titulo, $profissao, $rendaPerCapita, $bairro, $logradouro, $numero, $referencia, $qtdPessoasCasa

        );
        if ($stmt->execute()) {
            // Redirecionar para a tela de cadastro
            header("Location: /Suas-Tech/cras/views/cadastro_usuarios.php");
            exit();
        } else {
            echo "Erro na inserção de dados: " . $stmt->error;
        }
    }
        // Fechar a declaração e a conexão
        $stmt->close();
        $conn->close();
   
?>