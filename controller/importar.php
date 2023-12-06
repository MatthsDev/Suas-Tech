<?php
require_once '../config/conexao.php';

// Ajustar o limite de upload
ini_set('upload_max_filesize', '100M');
// Ajustar o limite total para o formulário
ini_set('post_max_size', '150M');
// Ajustar o tempo máximo de execução do script
ini_set('max_execution_time', 240);
//Ajustar o tamanho da memoria
ini_set('memory_limit', '512M');
// Ajuste conforme necessário
set_time_limit(300);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arquivoCSV = $_FILES["arquivoCSV"]["tmp_name"];
    $csv_tbl = $_POST['csv_tbl'];

    // Faça a leitura do arquivo CSV e atualize o banco de dados conforme necessário
    if (($handle = fopen($arquivoCSV, "r")) !== false) {

        if ($csv_tbl == 'tudo') {

            //limpa os dados da tabela antes de repor os novos dados
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $limpTabela = "tbl_tudo";
            $sqli = "DELETE FROM $limpTabela";
            $pdo->exec($sqli);

            // Execute a consulta SQL de atualização
            $sql = "INSERT INTO tbl_tudo IGNORE 1 ROWS (cd_ibge,
        cod_familiar_fam,
        dat_cadastramento_fam,
        dat_atual_fam,
        cod_est_cadastral_fam,
        cod_forma_coleta_fam,
        dta_entrevista_fam,
        nom_localidade_fam,
        nom_tip_logradouro_fam,
        nom_titulo_logradouro_fam,
        nom_logradouro_fam,
        num_logradouro_fam,
        des_complemento_fam,
        des_complemento_adic_fam,
        num_cep_logradouro_fam,
        cod_unidade_territorial_fam,
        nom_unidade_territorial_fam,
        txt_referencia_local_fam,
        nom_entrevistador_fam,
        num_cpf_entrevistador_fam,
        vlr_renda_media_fam,
        fx_rfpc,
        vlr_renda_total_fam,
        marc_pbf,
        qtde_meses_desat_cat,
        cod_local_domic_fam,
        cod_especie_domic_fam,
        qtd_comodos_domic_fam,
        qtd_comodos_dormitorio_fam,
        cod_material_piso_fam,
        cod_material_domic_fam,
        cod_agua_canalizada_fam,
        cod_abaste_agua_domic_fam,
        cod_banheiro_domic_fam,
        cod_escoa_sanitario_domic_fam,
        cod_destino_lixo_domic_fam,
        cod_iluminacao_domic_fam,
        cod_calcamento_domic_fam,
        cod_familia_indigena_fam,
        cod_povo_indigena_fam,
        nom_povo_indigena_fam,
        cod_indigena_reside_fam,
        cod_reserva_indigena_fam,
        nom_reserva_indigena_fam,
        ind_familia_quilombola_fam,
        cod_comunidade_quilombola_fam,
        nom_comunidade_quilombola_fam,
        qtd_pessoas_domic_fam,
        qtd_familias_domic_fam,
        qtd_pessoa_inter_0_17_anos_fam,
        qtd_pessoa_inter_18_64_anos_fam,
        qtd_pessoa_inter_65_anos_fam,
        val_desp_energia_fam,
        val_desp_agua_esgoto_fam,
        val_desp_gas_fam,
        val_desp_alimentacao_fam,
        val_desp_transpor_fam,
        val_desp_aluguel_fam,
        val_desp_medicamentos_fam,
        nom_estab_assist_saude_fam,
        cod_eas_fam,
        nom_centro_assist_fam,
        cod_centro_assist_fam,
        num_ddd_contato_1_fam,
        num_tel_contato_1_fam,
        ic_tipo_contato_1_fam,
        ic_envo_sms_contato_1_fam,
        num_tel_contato_2_fam,
        num_ddd_contato_2_fam,
        ic_tipo_contato_2_fam,
        ic_envo_sms_contato_2_fam,
        cod_cta_energ_unid_consum_fam,
        ind_parc_mds_fam,
        ref_cad,
        ref_pbf,
        cod_familiar_fam_,
        cod_est_cadastral_memb,
        ind_trabalho_infantil_pessoa,
        nom_pessoa,
        num_nis_pessoa_atual,
        nom_apelido_pessoa,
        cod_sexo_pessoa,
        dta_nasc_pessoa,
        cod_parentesco_rf_pessoa,
        cod_raca_cor_pessoa,
        nom_completo_mae_pessoa,
        nom_completo_pai_pessoa,
        cod_local_nascimento_pessoa,
        sig_uf_munic_nasc_pessoa,
        nom_ibge_munic_nasc_pessoa,
        cod_ibge_munic_nasc_pessoa,
        nom_pais_origem_pessoa,
        cod_pais_origem_pessoa,
        cod_certidao_registrada_pessoa,
        fx_idade,
        marc_pbf_,
        cod_certidao_civil_pessoa,
        cod_livro_termo_certid_pessoa,
        cod_folha_termo_certid_pessoa,
        cod_termo_matricula_certid_pessoa,
        nom_munic_certid_pessoa,
        cod_ibge_munic_certid_pessoa,
        cod_cartorio_certid_pessoa,
        num_cpf_pessoa,
        num_identidade_pessoa,
        cod_complemento_pessoa,
        dta_emissao_ident_pessoa,
        sig_uf_ident_pessoa,
        sig_orgao_emissor_pessoa,
        num_cart_trab_prev_soc_pessoa,
        num_serie_trab_prev_soc_pessoa,
        dta_emissao_cart_trab_pessoa,
        sig_uf_cart_trab_pessoa,
        num_titulo_eleitor_pessoa,
        num_zona_tit_eleitor_pessoa,
        num_secao_tit_eleitor_pessoa,
        cod_deficiencia_memb,
        ind_def_cegueira_memb,
        ind_def_baixa_visao_memb,
        ind_def_surdez_profunda_memb,
        ind_def_surdez_leve_memb,
        ind_def_fisica_memb,
        ind_def_mental_memb,
        ind_def_sindrome_down_memb,
        ind_def_transtorno_mental_memb,
        ind_ajuda_nao_memb,
        ind_ajuda_familia_memb,
        ind_ajuda_especializado_memb,
        ind_ajuda_vizinho_memb,
        ind_ajuda_instituicao_memb,
        ind_ajuda_outra_memb,
        cod_sabe_ler_escrever_memb,
        ind_frequenta_escola_memb,
        nom_escola_memb,
        cod_escola_local_memb,
        sig_uf_escola_memb,
        nom_munic_escola_memb,
        cod_ibge_munic_escola_memb,
        cod_censo_inep_memb,
        cod_curso_frequenta_memb,
        cod_ano_serie_frequenta_memb,
        cod_curso_frequentou_pessoa_memb,
        cod_ano_serie_frequentou_memb,
        cod_concluiu_frequentou_memb,
        grau_instrucao,
        cod_trabalhou_memb,
        cod_afastado_trab_memb,
        cod_agricultura_trab_memb,
        cod_principal_trab_memb,
        cod_trabalho_12_meses_memb,
        qtd_meses_12_meses_memb,
        fx_renda_individual_805,
        fx_renda_individual_808,
        fx_renda_individual_809_1,
        fx_renda_individual_809_2,
        fx_renda_individual_809_3,
        fx_renda_individual_809_4,
        fx_renda_individual_809_5,
        marc_sit_rua,
        ind_dormir_rua_memb,
        qtd_dormir_freq_rua_memb,
        ind_dormir_albergue_memb,
        qtd_dormir_freq_albergue_memb,
        ind_dormir_dom_part_memb,
        qtd_dormir_freq_dom_part_memb,
        ind_outro_memb,
        qtd_freq_outro_memb,
        cod_tempo_rua_memb,
        ind_motivo_perda_memb,
        ind_motivo_ameaca_memb,
        ind_motivo_probs_fam_memb,
        ind_motivo_alcool_memb,
        ind_motivo_desemprego_memb,
        ind_motivo_trabalho_memb,
        ind_motivo_saude_memb,
        ind_motivo_pref_memb,
        ind_motivo_outro_memb,
        ind_motivo_nao_sabe_memb,
        ind_motivo_nao_resp_memb,
        cod_tempo_cidade_memb,
        cod_vive_fam_rua_memb,
        cod_contato_parente_memb,
        ind_ativ_com_escola_memb,
        ind_ativ_com_coop_memb,
        ind_ativ_com_mov_soc_memb,
        ind_ativ_com_nao_sabe_memb,
        ind_ativ_com_nao_resp_memb,
        ind_atend_cras_memb,
        ind_atend_creas_memb,
        ind_atend_centro_ref_rua_memb,
        ind_atend_inst_gov_memb,
        ind_atend_inst_nao_gov_memb,
        ind_atend_hospital_geral_memb,
        cod_cart_assinada_memb,
        ind_dinh_const_memb,
        ind_dinh_flanelhinha_memb,
        ind_dinh_carregador_memb,
        ind_dinh_catador_memb,
        ind_dinh_servs_gerais_memb,
        ind_dinh_pede_memb,
        ind_dinh_vendas_memb,
        ind_dinh_outro_memb,
        ind_dinh_nao_resp_memb,
        ind_atend_nenhum_memb,
        ref_cad_,
        ref_pbf_) VALUES (:cd_ibge,
:cod_familiar_fam,
:dat_cadastramento_fam,
:dat_atual_fam,
:cod_est_cadastral_fam,
:cod_forma_coleta_fam,
:dta_entrevista_fam,
:nom_localidade_fam,
:nom_tip_logradouro_fam,
:nom_titulo_logradouro_fam,
:nom_logradouro_fam,
:num_logradouro_fam,
:des_complemento_fam,
:des_complemento_adic_fam,
:num_cep_logradouro_fam,
:cod_unidade_territorial_fam,
:nom_unidade_territorial_fam,
:txt_referencia_local_fam,
:nom_entrevistador_fam,
:num_cpf_entrevistador_fam,
:vlr_renda_media_fam,
:fx_rfpc,
:vlr_renda_total_fam,
:marc_pbf,
:qtde_meses_desat_cat,
:cod_local_domic_fam,
:cod_especie_domic_fam,
:qtd_comodos_domic_fam,
:qtd_comodos_dormitorio_fam,
:cod_material_piso_fam,
:cod_material_domic_fam,
:cod_agua_canalizada_fam,
:cod_abaste_agua_domic_fam,
:cod_banheiro_domic_fam,
:cod_escoa_sanitario_domic_fam,
:cod_destino_lixo_domic_fam,
:cod_iluminacao_domic_fam,
:cod_calcamento_domic_fam,
:cod_familia_indigena_fam,
:cod_povo_indigena_fam,
:nom_povo_indigena_fam,
:cod_indigena_reside_fam,
:cod_reserva_indigena_fam,
:nom_reserva_indigena_fam,
:ind_familia_quilombola_fam,
:cod_comunidade_quilombola_fam,
:nom_comunidade_quilombola_fam,
:qtd_pessoas_domic_fam,
:qtd_familias_domic_fam,
:qtd_pessoa_inter_0_17_anos_fam,
:qtd_pessoa_inter_18_64_anos_fam,
:qtd_pessoa_inter_65_anos_fam,
:val_desp_energia_fam,
:val_desp_agua_esgoto_fam,
:val_desp_gas_fam,
:val_desp_alimentacao_fam,
:val_desp_transpor_fam,
:val_desp_aluguel_fam,
:val_desp_medicamentos_fam,
:nom_estab_assist_saude_fam,
:cod_eas_fam,
:nom_centro_assist_fam,
:cod_centro_assist_fam,
:num_ddd_contato_1_fam,
:num_tel_contato_1_fam,
:ic_tipo_contato_1_fam,
:ic_envo_sms_contato_1_fam,
:num_tel_contato_2_fam,
:num_ddd_contato_2_fam,
:ic_tipo_contato_2_fam,
:ic_envo_sms_contato_2_fam,
:cod_cta_energ_unid_consum_fam,
:ind_parc_mds_fam,
:ref_cad,
:ref_pbf,
:cod_familiar_fam_,
:cod_est_cadastral_memb,
:ind_trabalho_infantil_pessoa,
:nom_pessoa,
:num_nis_pessoa_atual,
:nom_apelido_pessoa,
:cod_sexo_pessoa,
:dta_nasc_pessoa,
:cod_parentesco_rf_pessoa,
:cod_raca_cor_pessoa,
:nom_completo_mae_pessoa,
:nom_completo_pai_pessoa,
:cod_local_nascimento_pessoa,
:sig_uf_munic_nasc_pessoa,
:nom_ibge_munic_nasc_pessoa,
:cod_ibge_munic_nasc_pessoa,
:nom_pais_origem_pessoa,
:cod_pais_origem_pessoa,
:cod_certidao_registrada_pessoa,
:fx_idade,
:marc_pbf_,
:cod_certidao_civil_pessoa,
:cod_livro_termo_certid_pessoa,
:cod_folha_termo_certid_pessoa,
:cod_termo_matricula_certid_pessoa,
:nom_munic_certid_pessoa,
:cod_ibge_munic_certid_pessoa,
:cod_cartorio_certid_pessoa,
:num_cpf_pessoa,
:num_identidade_pessoa,
:cod_complemento_pessoa,
:dta_emissao_ident_pessoa,
:sig_uf_ident_pessoa,
:sig_orgao_emissor_pessoa,
:num_cart_trab_prev_soc_pessoa,
:num_serie_trab_prev_soc_pessoa,
:dta_emissao_cart_trab_pessoa,
:sig_uf_cart_trab_pessoa,
:num_titulo_eleitor_pessoa,
:num_zona_tit_eleitor_pessoa,
:num_secao_tit_eleitor_pessoa,
:cod_deficiencia_memb,
:ind_def_cegueira_memb,
:ind_def_baixa_visao_memb,
:ind_def_surdez_profunda_memb,
:ind_def_surdez_leve_memb,
:ind_def_fisica_memb,
:ind_def_mental_memb,
:ind_def_sindrome_down_memb,
:ind_def_transtorno_mental_memb,
:ind_ajuda_nao_memb,
:ind_ajuda_familia_memb,
:ind_ajuda_especializado_memb,
:ind_ajuda_vizinho_memb,
:ind_ajuda_instituicao_memb,
:ind_ajuda_outra_memb,
:cod_sabe_ler_escrever_memb,
:ind_frequenta_escola_memb,
:nom_escola_memb,
:cod_escola_local_memb,
:sig_uf_escola_memb,
:nom_munic_escola_memb,
:cod_ibge_munic_escola_memb,
:cod_censo_inep_memb,
:cod_curso_frequenta_memb,
:cod_ano_serie_frequenta_memb,
:cod_curso_frequentou_pessoa_memb,
:cod_ano_serie_frequentou_memb,
:cod_concluiu_frequentou_memb,
:grau_instrucao,
:cod_trabalhou_memb,
:cod_afastado_trab_memb,
:cod_agricultura_trab_memb,
:cod_principal_trab_memb,
:cod_trabalho_12_meses_memb,
:qtd_meses_12_meses_memb,
:fx_renda_individual_805,
:fx_renda_individual_808,
:fx_renda_individual_809_1,
:fx_renda_individual_809_2,
:fx_renda_individual_809_3,
:fx_renda_individual_809_4,
:fx_renda_individual_809_5,
:marc_sit_rua,
:ind_dormir_rua_memb,
:qtd_dormir_freq_rua_memb,
:ind_dormir_albergue_memb,
:qtd_dormir_freq_albergue_memb,
:ind_dormir_dom_part_memb,
:qtd_dormir_freq_dom_part_memb,
:ind_outro_memb,
:qtd_freq_outro_memb,
:cod_tempo_rua_memb,
:ind_motivo_perda_memb,
:ind_motivo_ameaca_memb,
:ind_motivo_probs_fam_memb,
:ind_motivo_alcool_memb,
:ind_motivo_desemprego_memb,
:ind_motivo_trabalho_memb,
:ind_motivo_saude_memb,
:ind_motivo_pref_memb,
:ind_motivo_outro_memb,
:ind_motivo_nao_sabe_memb,
:ind_motivo_nao_resp_memb,
:cod_tempo_cidade_memb,
:cod_vive_fam_rua_memb,
:cod_contato_parente_memb,
:ind_ativ_com_escola_memb,
:ind_ativ_com_coop_memb,
:ind_ativ_com_mov_soc_memb,
:ind_ativ_com_nao_sabe_memb,
:ind_ativ_com_nao_resp_memb,
:ind_atend_cras_memb,
:ind_atend_creas_memb,
:ind_atend_centro_ref_rua_memb,
:ind_atend_inst_gov_memb,
:ind_atend_inst_nao_gov_memb,
:ind_atend_hospital_geral_memb,
:cod_cart_assinada_memb,
:ind_dinh_const_memb,
:ind_dinh_flanelhinha_memb,
:ind_dinh_carregador_memb,
:ind_dinh_catador_memb,
:ind_dinh_servs_gerais_memb,
:ind_dinh_pede_memb,
:ind_dinh_vendas_memb,
:ind_dinh_outro_memb,
:ind_dinh_nao_resp_memb,
:ind_atend_nenhum_memb,
:ref_cad_,
:ref_pbf_)";

            //prepara a declaração
            $stmt = $conn->prepare($sql);

            while (($data = fgetcsv($handle, 1000, ";")) !== false) {

                print_r($data);
                // $data contém os dados de cada linha do CSV
                if (count($data) >= 206) {
                    $cd_ibge = $data[0];
                    $cod_familiar_fam = $data[1];
                    $dat_cadastramento_fam = $data[2];
                    $dat_atual_fam = $data[3];
                    $cod_est_cadastral_fam = $data[4];
                    $cod_forma_coleta_fam = $data[5];
                    $dta_entrevista_fam = $data[6];
                    $nom_localidade_fam = $data[7];
                    $nom_tip_logradouro_fam = $data[8];
                    $nom_titulo_logradouro_fam = $data[9];
                    $nom_logradouro_fam = $data[10];
                    $num_logradouro_fam = $data[11];
                    $des_complemento_fam = $data[12];
                    $des_complemento_adic_fam = $data[13];
                    $num_cep_logradouro_fam = $data[14];
                    $cod_unidade_territorial_fam = $data[15];
                    $nom_unidade_territorial_fam = $data[16];
                    $txt_referencia_local_fam = $data[17];
                    $nom_entrevistador_fam = $data[18];
                    $num_cpf_entrevistador_fam = $data[19];
                    $vlr_renda_media_fam = $data[20];
                    $fx_rfpc = $data[21];
                    $vlr_renda_total_fam = $data[22];
                    $marc_pbf = $data[23];
                    $qtde_meses_desat_cat = $data[24];
                    $cod_local_domic_fam = $data[25];
                    $cod_especie_domic_fam = $data[26];
                    $qtd_comodos_domic_fam = $data[27];
                    $qtd_comodos_dormitorio_fam = $data[28];
                    $cod_material_piso_fam = $data[29];
                    $cod_material_domic_fam = $data[30];
                    $cod_agua_canalizada_fam = $data[31];
                    $cod_abaste_agua_domic_fam = $data[32];
                    $cod_banheiro_domic_fam = $data[33];
                    $cod_escoa_sanitario_domic_fam = $data[34];
                    $cod_destino_lixo_domic_fam = $data[35];
                    $cod_iluminacao_domic_fam = $data[36];
                    $cod_calcamento_domic_fam = $data[37];
                    $cod_familia_indigena_fam = $data[38];
                    $cod_povo_indigena_fam = $data[39];
                    $nom_povo_indigena_fam = $data[40];
                    $cod_indigena_reside_fam = $data[41];
                    $cod_reserva_indigena_fam = $data[42];
                    $nom_reserva_indigena_fam = $data[43];
                    $ind_familia_quilombola_fam = $data[44];
                    $cod_comunidade_quilombola_fam = $data[45];
                    $nom_comunidade_quilombola_fam = $data[46];
                    $qtd_pessoas_domic_fam = $data[47];
                    $qtd_familias_domic_fam = $data[48];
                    $qtd_pessoa_inter_0_17_anos_fam = $data[49];
                    $qtd_pessoa_inter_18_64_anos_fam = $data[50];
                    $qtd_pessoa_inter_65_anos_fam = $data[51];
                    $val_desp_energia_fam = $data[52];
                    $val_desp_agua_esgoto_fam = $data[53];
                    $val_desp_gas_fam = $data[54];
                    $val_desp_alimentacao_fam = $data[55];
                    $val_desp_transpor_fam = $data[56];
                    $val_desp_aluguel_fam = $data[57];
                    $val_desp_medicamentos_fam = $data[58];
                    $nom_estab_assist_saude_fam = $data[59];
                    $cod_eas_fam = $data[60];
                    $nom_centro_assist_fam = $data[61];
                    $cod_centro_assist_fam = $data[62];
                    $num_ddd_contato_1_fam = $data[63];
                    $num_tel_contato_1_fam = $data[64];
                    $ic_tipo_contato_1_fam = $data[65];
                    $ic_envo_sms_contato_1_fam = $data[66];
                    $num_tel_contato_2_fam = $data[67];
                    $num_ddd_contato_2_fam = $data[68];
                    $ic_tipo_contato_2_fam = $data[69];
                    $ic_envo_sms_contato_2_fam = $data[70];
                    $cod_cta_energ_unid_consum_fam = $data[71];
                    $ind_parc_mds_fam = $data[72];
                    $ref_cad = $data[73];
                    $ref_pbf = $data[74];
                    $cod_familiar_fam_ = $data[75];
                    $cod_est_cadastral_memb = $data[76];
                    $ind_trabalho_infantil_pessoa = $data[77];
                    $nom_pessoa = $data[78];
                    $num_nis_pessoa_atual = $data[79];
                    $nom_apelido_pessoa = $data[80];
                    $cod_sexo_pessoa = $data[81];
                    $dta_nasc_pessoa = $data[82];
                    $cod_parentesco_rf_pessoa = $data[83];
                    $cod_raca_cor_pessoa = $data[84];
                    $nom_completo_mae_pessoa = $data[85];
                    $nom_completo_pai_pessoa = $data[86];
                    $cod_local_nascimento_pessoa = $data[87];
                    $sig_uf_munic_nasc_pessoa = $data[88];
                    $nom_ibge_munic_nasc_pessoa = $data[89];
                    $cod_ibge_munic_nasc_pessoa = $data[90];
                    $nom_pais_origem_pessoa = $data[91];
                    $cod_pais_origem_pessoa = $data[92];
                    $cod_certidao_registrada_pessoa = $data[93];
                    $fx_idade = $data[94];
                    $marc_pbf_ = $data[95];
                    $cod_certidao_civil_pessoa = $data[96];
                    $cod_livro_termo_certid_pessoa = $data[97];
                    $cod_folha_termo_certid_pessoa = $data[98];
                    $cod_termo_matricula_certid_pessoa = $data[99];
                    $nom_munic_certid_pessoa = $data[100];
                    $cod_ibge_munic_certid_pessoa = $data[101];
                    $cod_cartorio_certid_pessoa = $data[102];
                    $num_cpf_pessoa = $data[103];
                    $num_identidade_pessoa = $data[104];
                    $cod_complemento_pessoa = $data[105];
                    $dta_emissao_ident_pessoa = $data[106];
                    $sig_uf_ident_pessoa = $data[107];
                    $sig_orgao_emissor_pessoa = $data[108];
                    $num_cart_trab_prev_soc_pessoa = $data[109];
                    $num_serie_trab_prev_soc_pessoa = $data[110];
                    $dta_emissao_cart_trab_pessoa = $data[111];
                    $sig_uf_cart_trab_pessoa = $data[112];
                    $num_titulo_eleitor_pessoa = $data[113];
                    $num_zona_tit_eleitor_pessoa = $data[114];
                    $num_secao_tit_eleitor_pessoa = $data[115];
                    $cod_deficiencia_memb = $data[116];
                    $ind_def_cegueira_memb = $data[117];
                    $ind_def_baixa_visao_memb = $data[118];
                    $ind_def_surdez_profunda_memb = $data[119];
                    $ind_def_surdez_leve_memb = $data[120];
                    $ind_def_fisica_memb = $data[121];
                    $ind_def_mental_memb = $data[122];
                    $ind_def_sindrome_down_memb = $data[123];
                    $ind_def_transtorno_mental_memb = $data[124];
                    $ind_ajuda_nao_memb = $data[125];
                    $ind_ajuda_familia_memb = $data[126];
                    $ind_ajuda_especializado_memb = $data[127];
                    $ind_ajuda_vizinho_memb = $data[128];
                    $ind_ajuda_instituicao_memb = $data[129];
                    $ind_ajuda_outra_memb = $data[130];
                    $cod_sabe_ler_escrever_memb = $data[131];
                    $ind_frequenta_escola_memb = $data[132];
                    $nom_escola_memb = $data[133];
                    $cod_escola_local_memb = $data[134];
                    $sig_uf_escola_memb = $data[135];
                    $nom_munic_escola_memb = $data[136];
                    $cod_ibge_munic_escola_memb = $data[137];
                    $cod_censo_inep_memb = $data[138];
                    $cod_curso_frequenta_memb = $data[139];
                    $cod_ano_serie_frequenta_memb = $data[140];
                    $cod_curso_frequentou_pessoa_memb = $data[141];
                    $cod_ano_serie_frequentou_memb = $data[142];
                    $cod_concluiu_frequentou_memb = $data[143];
                    $grau_instrucao = $data[144];
                    $cod_trabalhou_memb = $data[145];
                    $cod_afastado_trab_memb = $data[146];
                    $cod_agricultura_trab_memb = $data[147];
                    $cod_principal_trab_memb = $data[148];
                    $cod_trabalho_12_meses_memb = $data[149];
                    $qtd_meses_12_meses_memb = $data[150];
                    $fx_renda_individual_805 = $data[151];
                    $fx_renda_individual_808 = $data[152];
                    $fx_renda_individual_809_1 = $data[153];
                    $fx_renda_individual_809_2 = $data[154];
                    $fx_renda_individual_809_3 = $data[155];
                    $fx_renda_individual_809_4 = $data[156];
                    $fx_renda_individual_809_5 = $data[157];
                    $marc_sit_rua = $data[158];
                    $ind_dormir_rua_memb = $data[159];
                    $qtd_dormir_freq_rua_memb = $data[160];
                    $ind_dormir_albergue_memb = $data[161];
                    $qtd_dormir_freq_albergue_memb = $data[162];
                    $ind_dormir_dom_part_memb = $data[163];
                    $qtd_dormir_freq_dom_part_memb = $data[164];
                    $ind_outro_memb = $data[165];
                    $qtd_freq_outro_memb = $data[166];
                    $cod_tempo_rua_memb = $data[167];
                    $ind_motivo_perda_memb = $data[168];
                    $ind_motivo_ameaca_memb = $data[169];
                    $ind_motivo_probs_fam_memb = $data[170];
                    $ind_motivo_alcool_memb = $data[171];
                    $ind_motivo_desemprego_memb = $data[172];
                    $ind_motivo_trabalho_memb = $data[173];
                    $ind_motivo_saude_memb = $data[174];
                    $ind_motivo_pref_memb = $data[175];
                    $ind_motivo_outro_memb = $data[176];
                    $ind_motivo_nao_sabe_memb = $data[177];
                    $ind_motivo_nao_resp_memb = $data[178];
                    $cod_tempo_cidade_memb = $data[179];
                    $cod_vive_fam_rua_memb = $data[180];
                    $cod_contato_parente_memb = $data[181];
                    $ind_ativ_com_escola_memb = $data[182];
                    $ind_ativ_com_coop_memb = $data[183];
                    $ind_ativ_com_mov_soc_memb = $data[184];
                    $ind_ativ_com_nao_sabe_memb = $data[185];
                    $ind_ativ_com_nao_resp_memb = $data[186];
                    $ind_atend_cras_memb = $data[187];
                    $ind_atend_creas_memb = $data[188];
                    $ind_atend_centro_ref_rua_memb = $data[189];
                    $ind_atend_inst_gov_memb = $data[190];
                    $ind_atend_inst_nao_gov_memb = $data[191];
                    $ind_atend_hospital_geral_memb = $data[192];
                    $cod_cart_assinada_memb = $data[193];
                    $ind_dinh_const_memb = $data[194];
                    $ind_dinh_flanelhinha_memb = $data[195];
                    $ind_dinh_carregador_memb = $data[196];
                    $ind_dinh_catador_memb = $data[197];
                    $ind_dinh_servs_gerais_memb = $data[198];
                    $ind_dinh_pede_memb = $data[199];
                    $ind_dinh_vendas_memb = $data[200];
                    $ind_dinh_outro_memb = $data[201];
                    $ind_dinh_nao_resp_memb = $data[202];
                    $ind_atend_nenhum_memb = $data[203];
                    $ref_cad_ = $data[204];
                    $ref_pbf_ = $data[205];

                } else {
                    // Se não houver dados suficientes, talvez imprima um aviso ou lide com isso de acordo com a lógica do seu aplicativo
                    echo "Linha CSV incompleta: " . implode(",", $data) . "<br>";
                    print_r($data);
                    return;
                }
                // Atribuir valores aos placeholders e executar a declaração
                $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss",
                    $cd_ibge,
                    $cod_familiar_fam,
                    $dat_cadastramento_fam,
                    $dat_atual_fam,
                    $cod_est_cadastral_fam,
                    $cod_forma_coleta_fam,
                    $dta_entrevista_fam,
                    $nom_localidade_fam,
                    $nom_tip_logradouro_fam,
                    $nom_titulo_logradouro_fam,
                    $nom_logradouro_fam,
                    $num_logradouro_fam,
                    $des_complemento_fam,
                    $des_complemento_adic_fam,
                    $num_cep_logradouro_fam,
                    $cod_unidade_territorial_fam,
                    $nom_unidade_territorial_fam,
                    $txt_referencia_local_fam,
                    $nom_entrevistador_fam,
                    $num_cpf_entrevistador_fam,
                    $vlr_renda_media_fam,
                    $fx_rfpc,
                    $vlr_renda_total_fam,
                    $marc_pbf,
                    $qtde_meses_desat_cat,
                    $cod_local_domic_fam,
                    $cod_especie_domic_fam,
                    $qtd_comodos_domic_fam,
                    $qtd_comodos_dormitorio_fam,
                    $cod_material_piso_fam,
                    $cod_material_domic_fam,
                    $cod_agua_canalizada_fam,
                    $cod_abaste_agua_domic_fam,
                    $cod_banheiro_domic_fam,
                    $cod_escoa_sanitario_domic_fam,
                    $cod_destino_lixo_domic_fam,
                    $cod_iluminacao_domic_fam,
                    $cod_calcamento_domic_fam,
                    $cod_familia_indigena_fam,
                    $cod_povo_indigena_fam,
                    $nom_povo_indigena_fam,
                    $cod_indigena_reside_fam,
                    $cod_reserva_indigena_fam,
                    $nom_reserva_indigena_fam,
                    $ind_familia_quilombola_fam,
                    $cod_comunidade_quilombola_fam,
                    $nom_comunidade_quilombola_fam,
                    $qtd_pessoas_domic_fam,
                    $qtd_familias_domic_fam,
                    $qtd_pessoa_inter_0_17_anos_fam,
                    $qtd_pessoa_inter_18_64_anos_fam,
                    $qtd_pessoa_inter_65_anos_fam,
                    $val_desp_energia_fam,
                    $val_desp_agua_esgoto_fam,
                    $val_desp_gas_fam,
                    $val_desp_alimentacao_fam,
                    $val_desp_transpor_fam,
                    $val_desp_aluguel_fam,
                    $val_desp_medicamentos_fam,
                    $nom_estab_assist_saude_fam,
                    $cod_eas_fam,
                    $nom_centro_assist_fam,
                    $cod_centro_assist_fam,
                    $num_ddd_contato_1_fam,
                    $num_tel_contato_1_fam,
                    $ic_tipo_contato_1_fam,
                    $ic_envo_sms_contato_1_fam,
                    $num_tel_contato_2_fam,
                    $num_ddd_contato_2_fam,
                    $ic_tipo_contato_2_fam,
                    $ic_envo_sms_contato_2_fam,
                    $cod_cta_energ_unid_consum_fam,
                    $ind_parc_mds_fam,
                    $ref_cad,
                    $ref_pbf,
                    $cod_familiar_fam_,
                    $cod_est_cadastral_memb,
                    $ind_trabalho_infantil_pessoa,
                    $nom_pessoa,
                    $num_nis_pessoa_atual,
                    $nom_apelido_pessoa,
                    $cod_sexo_pessoa,
                    $dta_nasc_pessoa,
                    $cod_parentesco_rf_pessoa,
                    $cod_raca_cor_pessoa,
                    $nom_completo_mae_pessoa,
                    $nom_completo_pai_pessoa,
                    $cod_local_nascimento_pessoa,
                    $sig_uf_munic_nasc_pessoa,
                    $nom_ibge_munic_nasc_pessoa,
                    $cod_ibge_munic_nasc_pessoa,
                    $nom_pais_origem_pessoa,
                    $cod_pais_origem_pessoa,
                    $cod_certidao_registrada_pessoa,
                    $fx_idade,
                    $marc_pbf_,
                    $cod_certidao_civil_pessoa,
                    $cod_livro_termo_certid_pessoa,
                    $cod_folha_termo_certid_pessoa,
                    $cod_termo_matricula_certid_pessoa,
                    $nom_munic_certid_pessoa,
                    $cod_ibge_munic_certid_pessoa,
                    $cod_cartorio_certid_pessoa,
                    $num_cpf_pessoa,
                    $num_identidade_pessoa,
                    $cod_complemento_pessoa,
                    $dta_emissao_ident_pessoa,
                    $sig_uf_ident_pessoa,
                    $sig_orgao_emissor_pessoa,
                    $num_cart_trab_prev_soc_pessoa,
                    $num_serie_trab_prev_soc_pessoa,
                    $dta_emissao_cart_trab_pessoa,
                    $sig_uf_cart_trab_pessoa,
                    $num_titulo_eleitor_pessoa,
                    $num_zona_tit_eleitor_pessoa,
                    $num_secao_tit_eleitor_pessoa,
                    $cod_deficiencia_memb,
                    $ind_def_cegueira_memb,
                    $ind_def_baixa_visao_memb,
                    $ind_def_surdez_profunda_memb,
                    $ind_def_surdez_leve_memb,
                    $ind_def_fisica_memb,
                    $ind_def_mental_memb,
                    $ind_def_sindrome_down_memb,
                    $ind_def_transtorno_mental_memb,
                    $ind_ajuda_nao_memb,
                    $ind_ajuda_familia_memb,
                    $ind_ajuda_especializado_memb,
                    $ind_ajuda_vizinho_memb,
                    $ind_ajuda_instituicao_memb,
                    $ind_ajuda_outra_memb,
                    $cod_sabe_ler_escrever_memb,
                    $ind_frequenta_escola_memb,
                    $nom_escola_memb,
                    $cod_escola_local_memb,
                    $sig_uf_escola_memb,
                    $nom_munic_escola_memb,
                    $cod_ibge_munic_escola_memb,
                    $cod_censo_inep_memb,
                    $cod_curso_frequenta_memb,
                    $cod_ano_serie_frequenta_memb,
                    $cod_curso_frequentou_pessoa_memb,
                    $cod_ano_serie_frequentou_memb,
                    $cod_concluiu_frequentou_memb,
                    $grau_instrucao,
                    $cod_trabalhou_memb,
                    $cod_afastado_trab_memb,
                    $cod_agricultura_trab_memb,
                    $cod_principal_trab_memb,
                    $cod_trabalho_12_meses_memb,
                    $qtd_meses_12_meses_memb,
                    $fx_renda_individual_805,
                    $fx_renda_individual_808,
                    $fx_renda_individual_809_1,
                    $fx_renda_individual_809_2,
                    $fx_renda_individual_809_3,
                    $fx_renda_individual_809_4,
                    $fx_renda_individual_809_5,
                    $marc_sit_rua,
                    $ind_dormir_rua_memb,
                    $qtd_dormir_freq_rua_memb,
                    $ind_dormir_albergue_memb,
                    $qtd_dormir_freq_albergue_memb,
                    $ind_dormir_dom_part_memb,
                    $qtd_dormir_freq_dom_part_memb,
                    $ind_outro_memb,
                    $qtd_freq_outro_memb,
                    $cod_tempo_rua_memb,
                    $ind_motivo_perda_memb,
                    $ind_motivo_ameaca_memb,
                    $ind_motivo_probs_fam_memb,
                    $ind_motivo_alcool_memb,
                    $ind_motivo_desemprego_memb,
                    $ind_motivo_trabalho_memb,
                    $ind_motivo_saude_memb,
                    $ind_motivo_pref_memb,
                    $ind_motivo_outro_memb,
                    $ind_motivo_nao_sabe_memb,
                    $ind_motivo_nao_resp_memb,
                    $cod_tempo_cidade_memb,
                    $cod_vive_fam_rua_memb,
                    $cod_contato_parente_memb,
                    $ind_ativ_com_escola_memb,
                    $ind_ativ_com_coop_memb,
                    $ind_ativ_com_mov_soc_memb,
                    $ind_ativ_com_nao_sabe_memb,
                    $ind_ativ_com_nao_resp_memb,
                    $ind_atend_cras_memb,
                    $ind_atend_creas_memb,
                    $ind_atend_centro_ref_rua_memb,
                    $ind_atend_inst_gov_memb,
                    $ind_atend_inst_nao_gov_memb,
                    $ind_atend_hospital_geral_memb,
                    $cod_cart_assinada_memb,
                    $ind_dinh_const_memb,
                    $ind_dinh_flanelhinha_memb,
                    $ind_dinh_carregador_memb,
                    $ind_dinh_catador_memb,
                    $ind_dinh_servs_gerais_memb,
                    $ind_dinh_pede_memb,
                    $ind_dinh_vendas_memb,
                    $ind_dinh_outro_memb,
                    $ind_dinh_nao_resp_memb,
                    $ind_atend_nenhum_memb,
                    $ref_cad_,
                    $ref_pbf_
                );
                $stmt->execute();

            }
            if ($stmt->execute()) {
                echo "";
            } else {
                echo "Erro ao executar a consulta: " . $stmt->error;
            }

        } elseif ($csv_tbl == 'folha') {
            echo 'não foi estabelecido uma conexão com essa tabela.';
        }

        // Fechar a declaração e o arquivo CSV
        $stmt->close();
        fclose($handle);
        $conn->close();

        echo "Importação concluída com sucesso! " . $csv_tbl;
        echo '<br>upload_max_filesize: ' . ini_get('upload_max_filesize') . '<br>';
        echo 'post_max_size: ' . ini_get('post_max_size') . '<br>';
        echo 'max_execution_time: ' . ini_get('max_execution_time') . '<br>';
    }
} else {
    echo "Erro ao abrir o arquivo CSV.";
}
