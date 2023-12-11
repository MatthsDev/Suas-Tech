<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$cpf = $_POST['cpf'];
$cpfLimpo = preg_replace('/[^0-9]/', '', $cpf);
$cpfLimpo = ltrim($cpfLimpo, '0');

$sql = "SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = '$cpfLimpo'";
$result = $conn->query($sql);

$response = array();

// Adicionando verificação de erro
if (!$result) {
    $response['error'] = "Erro na query: " . $conn->error;
} else {
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

            $log_nome = $tipo_logradouro . " " . $nom_tit . " " . $nom_logradouro_fam;


        $response['existeUsuario'] = true;
        $response['nome'] = $row['nom_pessoa'];
        $response['bairro'] = $nom_localidade_fam;
        $response['log'] = $log_nome;
        $response['numero'] = $num_logradouro;
        $response['nome_social'] = $row['nom_apelido_pessoa'];
        $sexo = $row['cod_sexo_pessoa'];
        if ($sexo == 1) {
            $response['sexo'] = 'MASCULINO';
        } elseif ($sexo == 2) {
            $response['sexo'] = 'FEMININO';
        } else {
            $response['sexo'] = 'Outro';
        }
        $response['nome_mae'] = $row['nom_completo_mae_pessoa'];
        $response['nome_pai'] = $row['nom_completo_pai_pessoa'];
        $response['data_nasc'] = $row['dta_nasc_pessoa'];
        $response['nat_pessoa'] = $row['nom_ibge_munic_nasc_pessoa'];
        $response['nac_pessoa'] = $row['nom_pais_origem_pessoa'];
        $response['tel_pessoa'] = $row['num_tel_contato_1_fam'];
        // $response['email_pessoa'] = $row[''];
        $response['rg'] = $row['num_identidade_pessoa'];
        $response['complemento_rg'] = $row['cod_complemento_pessoa'];
        $response['data_exp_rg'] = $row['dta_emissao_ident_pessoa'];
        $response['sigla_rg'] = $row['sig_orgao_emissor_pessoa'];
        $response['estado_rg'] = $row['sig_uf_ident_pessoa'];
        $response['nis'] = $row['num_nis_pessoa_atual'];
        $response['num_titulo'] = $row['num_titulo_eleitor_pessoa'];
        $response['zone_titulo'] = $row['num_zona_tit_eleitor_pessoa'];
        $response['area_titulo'] = $row['num_secao_tit_eleitor_pessoa'];

        $profissao = $row['cod_principal_trab_memb'];

        if ($profissao == 4) {
            $response['profissao'] = 'CARTEIRA ASSINADA';
        } elseif ($profissao == 1) {
            $response['profissao'] = 'AUTÔNOMO';
        } else {
            $response['profissao'] = 'Outro';
        }
        
        $response['renda_per'] = $row['vlr_renda_media_fam'];
        $response['referencia'] = $row['txt_referencia_local_fam'];
        $response['qtd_pessoa'] = $row['qtd_pessoas_domic_fam'];
    } else {
        $response['existeUsuario'] = false;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
$conn->close();
?>