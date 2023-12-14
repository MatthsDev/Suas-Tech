<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

$cpf = $_POST['cpf'];
$cpfLimpo = preg_replace('/[^0-9]/', '', $cpf);
$cpfLimpo = ltrim($cpfLimpo, '0');



$response = array();


if (!empty($cpfLimpo)) {
    $sql = "SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = '$cpfLimpo'";
    $result = $conn->query($sql);


    if (!$result) {
        $response['error'] = "Erro na query: " . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Define as variáveis do endereço
            $tipo_logradouro = $row["nom_tip_logradouro_fam"];
            $nom_logradouro_fam = $row["nom_logradouro_fam"];
            $num_logradouro_fam = $row["num_logradouro_fam"];


            if ($num_logradouro_fam == "") {
                $num_logradouro = "S/N";
            } else {
                $num_logradouro = $num_logradouro_fam;
            }

            $nom_localidade_fam = $row["nom_localidade_fam"];
            $nom_titulo_logradouro_fam = $row["nom_titulo_logradouro_fam"];


            if ($nom_titulo_logradouro_fam == "") {
                $nom_tit = "";
            } else {
                $nom_tit = $nom_titulo_logradouro_fam;
            }

            $txt_referencia_local_fam = $row["txt_referencia_local_fam"];


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
            $response['uf_pessoa'] = $row['sig_uf_munic_nasc_pessoa'];


// ====================== CODIGO PCD INDIGENA E QUILOMBOA ==========================================================================

            $cod_fam_ind = $row['cod_familia_indigena_fam'];
            $response['cod_fam_ind'] = $cod_fam_ind;//FAMILIA INDIGINA S/N

            $nom_fam_ind = $row['nom_povo_indigena_fam']; 
            $response['povoIndigena'] = $nom_fam_ind; //NOME DO POVO

            $cod_indigena_res = $row['cod_indigena_reside_fam'];
            $response['cod_indigena_res'] = $cod_indigena_res; //RESIDE EM RESERVA

            $terra_indigina_fam = $row['nom_reserva_indigena_fam'];
            $response['terraIndigina'] = $terra_indigina_fam;

          

            $cod_fam_qui = $row['ind_familia_quilombola_fam'];
            $response['familiaQuilambola'] = $cod_fam_qui;//FAMILIA INDIGINA S/N

            $nom_fam_quilo = $row['nom_comunidade_quilombola_fam'];
            $response['comunidadeQuilambola'] = $nom_fam_quilo;

            

//=================================================================================================================================


            $response['nat_pessoa'] = $row['nom_ibge_munic_nasc_pessoa'];

            $nacionalidade = $row['nom_pais_origem_pessoa'];
            if ($nacionalidade != 0) {
                $response['nac_pessoa'] = 'BRASIL';
            }

            $response['tel_pessoa'] = $row['num_tel_contato_1_fam'];
            
 
            // $response['email_pessoa'] =' $row[''];
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
            if ($profissao == 4 || $profissao == 6) {
                $response['profissao'] = 'EMPREGADO COM CARTEIRA ASSINADA';
            } elseif ($profissao == 1) {
                $response['profissao'] = 'AUTÔNOMO';
            } elseif ($profissao == 2) {
                $response['profissao'] = 'TRAB. TEMPORARIO EM AREA RURAL';
            } elseif ($profissao == 3 || $profissao == 5) {
                $response['profissao'] = 'EMPREGADO SEM CARTEIRA ASSINADA';
            } elseif ($profissao == 7) {
                $response['profissao'] = 'TRABALHADOR NÃO REMUNERADO';
            } elseif ($profissao == 8) {
                $response['profissao'] = 'MILITAR OU SERVIDOR PUBLICO';
            } elseif ($profissao == 9 || $profissao == 10) {
                $response['profissao'] = 'ESTAGIÁRIO OU APRENDIZ';
            } else {
                $response['profissao'] = 'OUTRO';
            }

            $response['renda_per'] = $row['vlr_renda_media_fam'];
            $response['referencia'] = $row['txt_referencia_local_fam'];
            $response['qtd_pessoa'] = $row['qtd_pessoas_domic_fam'];
        } else {
            $response['existeUsuario'] = false;
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
$conn->close();
?>