<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

$data_atual = date('Y');
$qtd_conc = "SELECT COUNT(*) as total_registros FROM concessao_historico WHERE YEAR(ano_form) = $data_atual";

$stmt = $pdo->query($qtd_conc);
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$num_form = $result['total_registros'] + 1;
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Concessão</title>
    <link rel="stylesheet" href="#">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="/Suas-Tech/img/logo.png">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="../css/style_impr_form.css">

</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST['cpf'])) {

            $nis_resp = $_POST['nis'];
            $cpf_resp = $_POST['cpf'];
            $mes_pg = $_POST['mes_pg'];
            $parentesco = $_POST['parentesco'];


        ?>

            <?php

            $sql_query_resp = $pdo->prepare("SELECT * FROM concessao_tbl WHERE cpf_pessoa = :cpf_resp");
            $sql_query_resp->bindParam(':cpf_resp', $cpf_resp, PDO::PARAM_STR);
            $sql_query_resp->execute();

            $sql_query_benef = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_nis_pessoa_atual = :nis_resp");
            $sql_query_benef->bindParam(':nis_resp', $nis_resp, PDO::PARAM_STR);
            $sql_query_benef->execute();

            if ($sql_query_resp->rowCount() > 0 && $sql_query_benef->rowCount() > 0) {
                $dados_resp = $sql_query_resp->fetch(PDO::FETCH_ASSOC);

            ?>

                <h2>CONCESSÃO DE BENEFÍCIO EVENTUAL</h2>
                <p>(Amparada pela Lei Municipal nº 1.978, de 01 de novembro de 2017)</p>
                <p>Formulário: <?php echo $num_form; ?> / <?php echo $data_atual; ?></p>
                <p>Considerando a Lei nº 8.742, de 07 de dezembro de 1973 - Lei Orgânica da Assistência Social, em seu Art. 22;</p>
                <p>Considerando a Lei Municipal n° 1.978, 01 de novembro de 2017 e Pela Resolução CMAS n° 13/2017;</p>
                <p>Considerando a solicitação do Benefício Eventual feita pelo(a) usuário(a) abaixo qualificado(a), e por ele(a) se enquadrar no perfil para acesso a Concessão de Benefício Eventual e apresentar os documentos necessários, conforme anexo;</p>
                <p>Considerando a avaliação técnica da condição de vulnerabilidade social temporária em se apresenta o(a) beneficiário(a);</p>

                <table border='1'>
                    <tr class="resultado">
                        <td class="resultado" colspan="2">RESPONSÁVEL:</td>
                        <td class="resultado" colspan="9"> <b> <?php echo $dados_resp['nome']; ?> </b> </td>
                        <td class="resultado" colspan="2">NATURALIDADE:</td>
                        <td class="resultado" colspan="3"> <b> <?php echo $dados_resp['naturalidade']; ?></td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="2">NOME DA MÃE:</td>
                        <td class="resultado" colspan="9"> <b> <?php echo $dados_resp['nome_mae']; ?> </b> </td>
                        <td class="resultado" colspan="2">CONTATO:</td>
                        <td class="resultado" colspan="3"><b> <?php echo $dados_resp['contato']; ?> </b></td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="16">Dados dos documentos do(a) Responsável:</td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="3">CPF: <b> <?php echo $_POST['cpf']; ?></b></td>
                        <td class="resultado" colspan="1">T.E: <b> <?php echo $dados_resp['tit_eleitor_pessoa']; ?></b></td>
                        <td class="resultado" colspan="9">RG: <b> <?php echo $dados_resp['rg_pessoa']; ?></b></td>
                        <td class="resultado" colspan="3">NIS: <b> <?php echo $dados_resp['nis_pessoa']; ?></b></td>
                    </tr>
                    <?php



                    $dados_benef = $sql_query_benef->fetch(PDO::FETCH_ASSOC);

                    $renda = $dados_benef['vlr_renda_media_fam'];
                    // Formatando o número como moeda brasileira
                    $renda_formatado = number_format($renda, 2, ',', '.');

                    $rg_benef = $dados_benef['num_identidade_pessoa'];
                    $rg_benef = ltrim($rg_benef, '0');
                    $rg_benef_formatado = number_format($rg_benef, 0, '', '.');

                    $tit_benef = $dados_benef['num_titulo_eleitor_pessoa'];
                    // Adicionar hífens na formatação
                    $tit_benef = substr($tit_benef, -12);
                    $tit_benef_formatado = implode('-', str_split($tit_benef, 4));

                    //Formatando o CPF
                    $cpf_benef = $dados_benef['num_cpf_pessoa'];
                    $cpf_formatando_benef = sprintf('%011s', $cpf_benef);
                    $cpf_formatado_benef = substr($cpf_formatando_benef, 0, 3) . '.' . substr($cpf_formatando_benef, 3, 3) . '.' . substr($cpf_formatando_benef, 6, 3) . '-' . substr($cpf_formatando_benef, 9, 2);

                    //Define as variáveis com o endereço
                    $tipo_logradouro = $dados_benef["nom_tip_logradouro_fam"];
                    $nom_logradouro_fam = $dados_benef["nom_logradouro_fam"];
                    $num_logradouro_fam = $dados_benef["num_logradouro_fam"];
                    if ($num_logradouro_fam == "") {
                        $num_logradouro = "S/N";
                    } else {
                        $num_logradouro = $dados_benef["num_logradouro_fam"];
                    }
                    $nom_localidade_fam = $dados_benef["nom_localidade_fam"];
                    $nom_titulo_logradouro_fam = $dados_benef["nom_titulo_logradouro_fam"];
                    if ($nom_titulo_logradouro_fam == "") {
                        $nom_tit = "";
                    } else {
                        $nom_tit = $dados_benef["nom_titulo_logradouro_fam"];
                    }
                    $txt_referencia_local_fam = $dados_benef["txt_referencia_local_fam"];
                    if ($txt_referencia_local_fam == "") {
                        $referencia = "SEM REFERÊNCIA";
                    } else {
                        $referencia = $dados_benef["txt_referencia_local_fam"];
                    }
                    $endereco_completo = $tipo_logradouro . " " . $nom_tit . " " . $nom_logradouro_fam . ", " . $num_logradouro . " - " . $nom_localidade_fam . ", " . $referencia;
                    ?>
                    <tr class="resultado">
                        <td class="resultado" colspan="3">BENEFICIÁRIO:</td>
                        <td class="resultado" colspan="6"> <b> <?php echo $dados_benef['nom_pessoa']; ?> </b> </td>
                        <td class="resultado" colspan="3">NATURALIDADE:</td>
                        <td class="resultado" colspan="4"> <b> <?php echo $dados_benef['nom_ibge_munic_nasc_pessoa']; ?></td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="3">NOME DA MÃE:</td>
                        <td class="resultado" colspan="8"> <b> <?php echo $dados_benef['nom_completo_mae_pessoa']; ?> </b> </td>
                        <td class="resultado" colspan="2">RENDA MEDIA:</td>
                        <td class="resultado" colspan="3"><b> R$ <?php echo $renda_formatado; ?> </b></td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="3">ENDEREÇO:</td>
                        <td class="resultado" colspan="13"> <b> <?php echo $endereco_completo; ?> </b> </td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="16">Dados dos documentos do(a) Beneficiário(a):</td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="3">CPF: <b><?php echo $cpf_formatado_benef; ?></b></td>
                        <td class="resultado" colspan="1">T.E: <b><?php echo $tit_benef_formatado; ?></b></td>
                        <td class="resultado" colspan="9">RG: <b><?php echo $rg_benef_formatado; ?></b></td>
                        <td class="resultado" colspan="3">NIS: <b><?php echo $dados_benef['num_nis_pessoa_atual']; ?></b></td>
                    </tr>
                </table>
                <p>QUAL PARENTESCO O RESPONSÁVEL TEM COM O BENEFICIÁRIO?: <b><?php echo $_POST['parentesco']; ?></b></p>

                <table border='1'>
                    <tr>
                        <th>ITEM</th>
                        <th>Descrição sucinta do bem, objeto ou serviço a ser concedido.</th>
                        <th>QUANT.</th>
                        <th>VALOR UN</th>
                        <th>VALOR TOTAL</th>
                    </tr>
                    <tr>
                        <td><?php echo $_POST['itens_conc']; ?></td>
                        <td><?php echo $_POST['itens_conc']; ?></td>
                        <td><?php echo $_POST['quantidade']; ?></td>
                        <td><?php echo $_POST['valor_unitario']; ?></td>
                        <td><?php echo $_POST['valor_total']; ?></td>
                    </tr>
                </table>

                <p>São Bento do Una - PE ____ de _____________ de <?php echo $data_atual ?></p>
                <p>_________________________________________________________________________</p>
                <p>ASSINATURA DO RESPONSÁVEL:</p>
                <p>____________________________________________________________</p>
                <p>MARTHONY DORNELAS SANTANA <br>
                    SECRETÁRIO DE ASSISTÊNCIA SOCIAL<br>
                    PORTARIA 143/2023 </p>

            <?php
            } elseif ($sql_query_resp->rowCount() > 0 && $sql_query_benef->rowCount() == 0) {
                $dados_resp = $sql_query_resp->fetch(PDO::FETCH_ASSOC);
            ?>
                <script>
                    Swal.fire({
                        title: "DADOS DO BENFICIÁRIO",
                        text: "Beneficiário sem cadastro.",
                        html: `
                        <label>BENEFICIÁRIO:</label>
                        <input type="text" name="beneficio">
                        <label>NATURALIDADE:</label>
                        <input type="text" name="naturalidade">
                        <label>NOME DA MÃE:</label>
                        <input type="text" name="nome_mae_benef">
                        <label>RENDA MEDIA:</label>
                        <label>ENDEREÇO:</label>
                        <input type="text" name="endereco_resp">
                        <label>CPF:</label>
                        <input type="text" name="cpf_beneficio">
                        <label>T.E:</label>
                        <input type="text" name="te_beneficio">
                        <label>RG:</label>
                        <input type="text" name="rg_beneficio">
                        <label>NIS:</label>
                        <input type="text" name="nis_beneficio">
                        `,
                        confirmButtonText: 'OK',
                    })
                </script>
                <h2>CONCESSÃO DE BENEFÍCIO EVENTUAL</h2>
                <p>(Amparada pela Lei Municipal nº 1.978, de 01 de novembro de 2017)</p>
                <p>Formulário: <?php echo $num_form; ?> / <?php echo $data_atual; ?></p>
                <p>Considerando a Lei nº 8.742, de 07 de dezembro de 1973 - Lei Orgânica da Assistência Social, em seu Art. 22;</p>
                <p>Considerando a Lei Municipal n° 1.978, 01 de novembro de 2017 e Pela Resolução CMAS n° 13/2017;</p>
                <p>Considerando a solicitação do Benefício Eventual feita pelo(a) usuário(a) abaixo qualificado(a), e por ele(a) se enquadrar no perfil para acesso a Concessão de Benefício Eventual e apresentar os documentos necessários, conforme anexo;</p>
                <p>Considerando a avaliação técnica da condição de vulnerabilidade social temporária em se apresenta o(a) beneficiário(a);</p>

                <table border='1'>
                    <tr class="resultado">
                        <td class="resultado" colspan="2">RESPONSÁVEL:</td>
                        <td class="resultado" colspan="9"> <b> <?php echo $dados_resp['nome']; ?> </b> </td>
                        <td class="resultado" colspan="2">NATURALIDADE:</td>
                        <td class="resultado" colspan="3"> <b> <?php echo $dados_resp['naturalidade']; ?></td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="2">NOME DA MÃE:</td>
                        <td class="resultado" colspan="9"> <b> <?php echo $dados_resp['nome_mae']; ?> </b> </td>
                        <td class="resultado" colspan="2">CONTATO:</td>
                        <td class="resultado" colspan="3"><b> <?php echo $dados_resp['contato']; ?> </b></td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="16">Dados dos documentos do(a) Responsável:</td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="3">CPF: <b> <?php echo $_POST['cpf']; ?></b></td>
                        <td class="resultado" colspan="1">T.E: <b> <?php echo $dados_resp['tit_eleitor_pessoa']; ?></b></td>
                        <td class="resultado" colspan="9">RG: <b> <?php echo $dados_resp['rg_pessoa']; ?></b></td>
                        <td class="resultado" colspan="3">NIS: <b> <?php echo $dados_resp['nis_pessoa']; ?></b></td>
                    </tr>

                    <tr class="resultado">
                        <td class="resultado" colspan="3">BENEFICIÁRIO:</td>
                        <td class="resultado" colspan="6"> <b><input type="text" name="beneficio"></b> </td>
                        <td class="resultado" colspan="3">NATURALIDADE:</td>
                        <td class="resultado" colspan="4"> <b> <input type="text" name="naturalidade"></td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="3">NOME DA MÃE:</td>
                        <td class="resultado" colspan="8"> <b><input type="text" name="nome_mae_benef"></b> </td>
                        <td class="resultado" colspan="2">RENDA MEDIA:</td>
                        <td class="resultado" colspan="3"><b> R$ <input type="text" name="renda_benef"></b></td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="3">ENDEREÇO:</td>
                        <td class="resultado" colspan="13"> <b><input type="text" name="endereco_resp"></b> </td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="16">Dados dos documentos do(a) Beneficiário(a):</td>
                    </tr>
                    <tr class="resultado">
                        <td class="resultado" colspan="3">CPF: <b><input type="text" name="cpf_beneficio"></b></td>
                        <td class="resultado" colspan="1">T.E: <b><input type="text" name="te_beneficio"></b></td>
                        <td class="resultado" colspan="9">RG: <b><input type="text" name="rg_beneficio"></b></td>
                        <td class="resultado" colspan="3">NIS: <b><input type="text" name="nis_beneficio"></b></td>
                    </tr>
                </table>
                <p>QUAL PARENTESCO O RESPONSÁVEL TEM COM O BENEFICIÁRIO?: <b> <select name="parentesco" id="parentesco" required>
                            <option value="" disabled selected hidden>Selecione</option>
                            <option value="UNIPESSOAL">Unipessoal</option>
                            <option value="CONJUGE">Conjuge</option>
                            <option value="FILHO(A)">Filho(a)</option>
                            <option value="ENTEADO(A)">Enteado(a)</option>
                            <option value="NETO OU BISNETO">Neto ou Bisneto</option>
                            <option value="PAI OU MAE">Pai ou Mae</option>
                            <option value="SOGRO(A)">Sogro(a)</option>
                            <option value="IRMAOS OU IRMA">Irmão ou Irmã</option>
                            <option value="GENRO OU NORA">Genro ou Nora</option>
                            <option value="OUTRO PARENTE">Outro Parente</option>
                            <option value="NAO PARENTE">Não Parente</option>
                        </select>
                    </b></p>

                <table border='1'>
                    <tr>
                        <th>ITEM</th>
                        <th>Descrição sucinta do bem, objeto ou serviço a ser concedido.</th>
                        <th>QUANT.</th>
                        <th>VALOR UN</th>
                        <th>VALOR TOTAL</th>
                    </tr>
                    <tr>
                        <td><?php echo $_POST['itens_conc']; ?></td>
                        <td><?php echo $_POST['itens_conc']; ?></td>
                        <td><?php echo $_POST['quantidade']; ?></td>
                        <td><?php echo $_POST['valor_unitario']; ?></td>
                        <td><?php echo $_POST['valor_total']; ?></td>
                    </tr>
                </table>

                <p>São Bento do Una - PE ____ de _____________ de <?php echo $data_atual ?></p>
                <p>_________________________________________________________________________</p>
                <p>ASSINATURA DO RESPONSÁVEL:</p>
                <p>____________________________________________________________</p>
                <p>MARTHONY DORNELAS SANTANA <br>
                    SECRETÁRIO DE ASSISTÊNCIA SOCIAL<br>
                    PORTARIA 143/2023 </p>
        <?php
            }
        }
        ?>
    </div>
</body>

</html>