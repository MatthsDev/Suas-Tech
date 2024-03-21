<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style-alt-user.css">
    <link rel="website icon" type="image/png" href="../../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>TechSUAS Concessão</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Suas-Tech/concessao/js/script.js"></script>

</head>

<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dt_pg = $_POST['dt_pg'];
    $mes_pg = $_POST['mes_pg'];
    $itens_conc= $_POST['itens_conc'];
    $quantidade = $_POST['quantidade'];
    $valor_unitario = $_POST['valor_unitario'];
    $valor_total = $_POST['valor_total'];
    $situacao = $_POST['situacao'];
    $id_hist = $_POST['id_hist'];

    $smtp = $conn->prepare("UPDATE concessao_historico SET nome_item=?, qtd_item=?, valor_uni=?, valor_total=?, mes_pag=?, pg_data=?, situacao_concessao=? WHERE id_hist=?");
    $smtp->bind_param("ssssssss", $itens_conc, $quantidade, $valor_unitario, $valor_total, $mes_pg, $dt_pg, $situacao, $id_hist);
    if ($smtp->execute()) {
        ?>
            <div class="container">
        <div class="cab0" style="text-align: center;">
            <h2>CONCESSÃO DE BENEFÍCIO EVENTUAL</h2>
            <p>(Amparada pela Lei Municipal nº 1.978, de 01 de novembro de 2017)</p>
        </div>
        <div class="form">
            <p id="num_form"></p>
        </div>
        <div class="cab1">
            <div class="cab11" style="text-align: justify;" style="text-indent: 1cm;">
                <p>Considerando a Lei nº 8.742, de 07 de dezembro de 1973 - Lei Orgânica da Assistência Social, em seu Art. 22;</p>
                <p>Considerando a Lei Municipal n° 1.978, 01 de novembro de 2017 e Pela Resolução CMAS n° 13/2017;</p>
                <p>Considerando a solicitação do Benefício Eventual feita pelo(a) usuário(a) abaixo qualificado(a), e por ele(a) se enquadrar no perfil para acesso a Concessão de Benefício Eventual e apresentar os documentos necessários, conforme anexo;</p>
                <p>Considerando a avaliação técnica da condição de vulnerabilidade social temporária em se apresenta o(a) beneficiário(a);</p>
            </div>
        </div>
    </div>
    <div class="tabela">
    <table align="center" width="500px" border='1'>
        <tr class="resultado">
            <td class="resultado" colspan="2">RESPONSÁVEL:</td>
            <td class="resultado" colspan="9" id="nome_resp"></td>
            <td class="resultado" colspan="2">NATURALIDADE:</td>
            <td class="resultado" colspan="3" id="naturalidade_resp"></td>
        </tr>
        <tr class="resultado">
            <td class="resultado" colspan="2">NOME DA MÃE:</td>
            <td class="resultado" colspan="9" id="nome_m"></td>
            <td class="resultado" colspan="2">CONTATO:</td>
            <td class="resultado" colspan="3" id="contato"></td>
        </tr>
        <tr class="resultado">
            <td class="resultado" colspan="16">Dados dos documentos do(a) Responsável:</td>
        </tr>
        <tr class="resultado">
            <td class="resultado" colspan="3" id="cpf_pessoa"></td>
            <td class="resultado" colspan="1" id="tet_ili"></td>
            <td class="resultado" colspan="9" id="rg_pessoa"></td>
            <td class="resultado" colspan="3" id="nis_pessoa">NIS: </td>
        </tr>
        <tr class="resultado">
            <td class="resultado" colspan="3">BENEFICIÁRIO:</td>
            <td class="resultado" colspan="6" id="nome_benef"></td>
            <td class="resultado" colspan="3">NATURALIDADE:</td>
            <td class="resultado" colspan="4" id="munic_nasc"></td>
        </tr>
        <tr class="resultado">
            <td class="resultado" colspan="3">NOME DA MÃE:</td>
            <td class="resultado" colspan="8" id="nom_mae_pessoa"></td>
            <td class="resultado" colspan="2">RENDA MEDIA:</td>
            <td class="resultado" colspan="3" id="renda_media"></td>
        </tr>
        <tr class="resultado">
            <td class="resultado" colspan="3">ENDEREÇO:</td>
            <td class="resultado" colspan="13" id="endereco_conc"></td>
        </tr>
        <tr class="resultado">
            <td class="resultado" colspan="16">Dados dos documentos do(a) Beneficiário(a):</td>
        </tr>
        <tr class="resultado">
            <td class="resultado" colspan="3" id="cpf_pessoa_b"></td>
            <td class="resultado" colspan="1" id="tet_ili_b"></td>
            <td class="resultado" colspan="9" id="rg_pessoa_b"></td>
            <td class="resultado" colspan="3" id="nis_pessoa_b"></td>
        </tr>
    </table><br>


    <p align="center" width="500px" id="parentes"></p>

    <table align="center" width="500px" border='1'>
        <tr>
            <th>ITEM</th>
            <th>Descrição sucinta do bem, objeto ou serviço a ser concedido.</th>
            <th>QUANT.</th>
            <th>VALOR UN</th>
            <th>VALOR TOTAL</th>
        </tr>
        <tr>
            <td id="nome_item"></td>
            <td id="descricao"></td>
            <td id="qtd_item"></td>
            <td id="valor_uni"></td>
            <td id="valor_total"></td>
        </tr>
    </table><br>
    
    <div class="sbu" style="text-align: right;">
        <p id="local_data"> </p>
    </div>


    <div class="cab2">
        <p>_________________________________________________________________________<br>ASSINATURA DO RESPONSÁVEL:</p>
        <p>____________________________________________________________<br>MARTHONY DORNELAS SANTANA<br>SECRETÁRIO DE ASSISTÊNCIA SOCIAL<br>PORTARIA 143/2023 </p>
    </div>
    </div>
</div>
        
        <!-- <script>
            Swal.fire({
                icon: "success",
                title: "SALVO",
                text: "Dados salvos com sucesso!",
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/Suas-Tech/concessao/views/editar"
                }
            })
        </script> -->
        <?php
    exit();
    } else {
        echo "Erro na atualização das informações: " . $smtp->error;
    }
    $smtp->close();
}
?>

</body>
</html>