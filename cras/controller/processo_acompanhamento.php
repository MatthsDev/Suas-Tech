<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//data criada com formato 'DD de mmmm de YYYY'
$timestampptbr = time();
$data_formatada_at = strftime('%d de %B de %Y', $timestampptbr);

// Consulta SQL para contar os registros
$sqlr = "SELECT COUNT(*) as total_registros FROM cras_historico";
$result = $pdo->query($sqlr);
$row = $result->fetch(PDO::FETCH_ASSOC);
$totalRegistros = $row['total_registros'];
$numero_parecer = $totalRegistros + 1;
$ano = date('Y');
$num_ano = $numero_parecer . "/" . $ano;

$setor_form = $_POST['setor'];
$texto_parecer = $_POST['texto_parecer'];
$itens_conc = $_POST['itens_conc'];
$nis_pessoa = $_SESSION['nis'];
$nome_pessoa = $_SESSION['nome'];
$cpf_formatado = $_SESSION['cpf'];
$qtd = $_SESSION['qtd_pessoa'];
$mae_pessoa = $_SESSION['nome_mae'];

$smtp = $conn->prepare("INSERT INTO cras_historico (num_parecer_hist, nis, nome, cpf, quant_pessoa, text_parecer, remetent, destino, cod_familia, itens_concedido, data_registro) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

// Verifica se a preparação foi bem-sucedida
if ($smtp === false) {
    die('Erro na preparação SQL: ' . $conn->error);
}

$smtp->bind_param("sssssssssss", $num_ano, $nis_pessoa, $nome_pessoa, $cpf_formatado, $qtd, $texto_parecer, $setor, $setor_form, $ano, $itens_conc, $data_formatada_at);

if ($setor_form === "COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA") {

    $stpt = $conn->prepare("INSERT INTO fluxo_diario_coz (nis_benef, num_doc, nome, cpf_benef, encaminhado_cras, qtd_pessoa) VALUES (?,?,?,?,?,?)");

// Verifica se a preparação foi bem-sucedida
    if ($stpt === false) {
        die('Erro na preparação SQL: ' . $conn->error);
    }
    $stpt->bind_param("ssssss", $nis_pessoa, $num_ano, $nome_pessoa, $cpf_formatado, $setor, $qtd);

    if ($stpt->execute()) {
        echo "<br><br><br>enviado com sucesso COZINHA";
    } else {
        echo "nada";
    }
}

if ($smtp->execute()) {
    echo "enviado com sucesso";
} else {
    echo "nada";
}
