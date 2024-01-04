<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../../img/logo.png">
    <link rel="stylesheet" href="../../css/stylegerar.css">
    <title>documento oficial do cadastro único - são bento do una</title>
</head>

<body>
    <br><br><br><br><br><br>
    <div id="title">PARECER TÉCNICO DE VISITA DOMICILIAR</div>

    <?php

require_once '../../../config/conexao.php';

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

$data_atual = date('d, m, Y');
$ano_atual = date('Y');
// PEGANDO OS DADOS DO FORMULÁRIO
// Verifique se o array da sessão existe e obtenha os valores dele
session_start();

if (isset($_SESSION['dados_conferidos'])) {
    $dados_conferidos = $_SESSION['dados_conferidos'];
    $numero_parecer = $dados_conferidos['numero_parecer'];
    $cod_familiar = $dados_conferidos['cod_familiar'];
    $nom_pessoa = $dados_conferidos['nom_pessoa'];
    $texto_parecer = $dados_conferidos['texto_parecer'];
    $nis_responsavel_formatado = $dados_conferidos['nis_rf'];
    $data_formatada = $dados_conferidos['data_formatada'];
    $endereco_conpleto = $dados_conferidos['endereco_conpleto'];
    $sexo = $dados_conferidos['sexo'];
    $nom_mae_rf = $dados_conferidos['nom_mae_rf'];
    $sexo1 = $dados_conferidos['sexo1'];
    $acao = $dados_conferidos['acao'];
    $parecer_tec = $dados_conferidos['parecer_tec'];
    $data_formatada_at = $dados_conferidos['data_formatada_at'];
    $cpf_formatado = $dados_conferidos['cpf_formatado'];

} else {
    echo "ERRO no armazenamento dos dados.";
}

$smtp = $conn->prepare("INSERT INTO historico_parecer_visita (numero_parecer, cod_familiar, nome, restante, data_atual) VALUES (?,?,?,?,?)");
$smtp->bind_param("sssss", $numero_parecer, $cod_familiar, $nom_pessoa, $texto_parecer, $data_atual);

$cod_familiar_formatado = substr_replace(str_pad($cod_familiar, 11, "0", STR_PAD_LEFT), '-', 9, 0);
if ($smtp->execute()) {

} else {
    echo "ERRO no envio dos DADOS: " . $smtp->error;
}
$smtp->close();
$conn->close();

// Conteúdo do SVG
$svg_pacth = '../../img/timbre.svg';
$svg = file_get_contents($svg_pacth);
//'<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="40" stroke="black" stroke-width="3" fill="red" /></svg>';
//receber os dados do formulário
$dados_post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
// Verifique se o arquivo foi lido com sucesso
?>
<div class="conteudo">
    <?php
echo "<br>Parecer: " . $numero_parecer . "/" . $ano_atual . "<br>";
echo "<br><br><label>CÓDIGO FAMILIAR: " . $cod_familiar_formatado . "</label><br>";
echo "<label>NIS do Responsável pela(o) Unidade Familiar (RUF): " . $nis_responsavel_formatado . "</label>";
echo "<br><p style='text-align:justify; text-indent: 50px;'>De acordo com o art. 18 da PORTARIA N° 177, DE 16 DE JUNHO DE 2011 DO MINISTÉRIO DE ESTADO DO DESENVOLVIMENTO SOCIAL E COMBATE À FOME, o município apenas efetuará a exclusão lógica do cadastro da família da base do CadÚnico quando ocorrer *falecimento de toda a família, *recusa da família em prestar informações, *omissões ou prestação de informações inverídicas pela família, *solicitação da família, *decisão judicial ou *não localização da família para atualização ou revisão cadastral, por período igual ou superior a quatro anos contados da inclusão ou da última atualização cadastral.</p>";
echo "<p style='text-align:justify; text-indent: 50px;'>Foi realizado no dia " . $data_formatada . ", no endereço " . $endereco_conpleto . " declarado por " . $nom_pessoa . ", CPF: " . $cpf_formatado . ", " . $sexo . " " . $nom_mae_rf . ", mas " . $sexo1 . " " . $acao . ". Em busca ativa obteve a seguinte informação " . $parecer_tec . "</p>";
echo "<br><br><p style='text-align:right;'>São Bento do Una - PE, " . $data_formatada_at . ".</p>";
echo "<br><br><p style='text-align:center;'>_____________________________________________________________________________<br> ENTREVISTADOR DO CADASTRO ÚNICO</p><br>";
echo "<br><br><p style='text-align:center;'>_____________________________________________________________________________<br> COORDENAÇÃO CADASTRO ÚNICO E BOLSA FAMÍLIA</p>";
echo "</body>";
echo "</html>";

echo '<script> setTimeout(function(){ window.location.href = "../../views/visit/buscarvisita.php"; }, 3000); </script>';
?>
</div>
    <script> window.onload = function() { window.print();};
    </script>