<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

ob_end_clean();
// Inclua a biblioteca FPDF
require('../../teset/fpdf.php');

$sql = 'SELECT nis_benef, nome, cpf_benef, data_de_entrega, encaminhado_cras, qtd_pessoa, qtd_marmita, marm_entregue FROM fluxo_diario_coz';
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $data_atual = date('d-m-Y');

    // Crie um objeto FPDF
    $pdf = new FPDF();
    $pdf->AddPage('L');

    // Adicione um título
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'RELATÓRIO DIÁRIO', 0, 1, 'C');

    // Adicione uma linha em branco
    $pdf->Ln(10);

// Larguras das células de cabeçalho
$largura_nis = 20;
$largura_nome = 80;
$largura_cpf = 25;
$largura_data_entrega = 30;
$largura_acompanhado = 40;
$largura_qtd_pessoa = 25;
$largura_marmitas_disp = 25;
$largura_marmitas_entregues = 25;

// Adicione as colunas
$pdf->SetFont('Arial', '', 8);
$pdf->Cell($largura_nis, 10, 'NIS', 1);
$pdf->Cell($largura_nome, 10, 'NOME', 1);
$pdf->Cell($largura_cpf, 10, 'CPF', 1);
$pdf->Cell($largura_data_entrega, 10, 'DATA ENTREGA', 1);
$pdf->Cell($largura_acompanhado, 10, utf8_decode('ACOMPANHADO'), 1);
$pdf->Cell($largura_qtd_pessoa, 10, utf8_decode('QTD PESSOA'), 1);
$pdf->Cell($largura_marmitas_disp, 10, 'MARMITA DISP', 1);
$pdf->Cell($largura_marmitas_entregues, 10, 'ENTREGUE', 1);
$pdf->Ln();

// Adicione os dados
$pdf->SetFont('Arial', '', 8);
while ($linha = $resultado->fetch_assoc()) {
    // Adicione cada coluna com a largura correspondente
    $pdf->Cell($largura_nis, 10, utf8_decode($linha['nis_benef']), 1);
    $pdf->Cell($largura_nome, 10, utf8_decode($linha['nome']), 1);
    $pdf->Cell($largura_cpf, 10, utf8_decode($linha['cpf_benef']), 1);
    $pdf->Cell($largura_data_entrega, 10, utf8_decode($linha['data_de_entrega']), 1);
    $pdf->Cell($largura_acompanhado, 10, utf8_decode($linha['encaminhado_cras']), 1);
    $pdf->Cell($largura_qtd_pessoa, 10, utf8_decode($linha['qtd_pessoa']), 1);
    $pdf->Cell($largura_marmitas_disp, 10, utf8_decode($linha['qtd_marmita']), 1);
    $pdf->Cell($largura_marmitas_entregues, 10, utf8_decode($linha['marm_entregue']), 1);
    $pdf->Ln();
}


    // Nome do arquivo
    $pdf_nome = 'RELATORIO_' . $data_atual . '.pdf';

    // Saída para o navegador
    $pdf->Output($pdf_nome, 'D');

    // Atualize os dados na tabela
    $editar_sql = "UPDATE fluxo_diario_coz SET data_de_entrega = NULL, marm_entregue = 0, entregue = 'não', entregue_por = NULL";
    if ($conn->query($editar_sql) === true) {
        echo '<script>alert("Relatório gerado com sucesso!"); window.location.href = "fluxo_diario.php";</script>';
    } else {
        echo 'Falha na atualização de dados' . $conn->error;
    }
} else {
    echo 'Nenhum dado encontrado na tabela.';
}

// Feche a conexão com o banco de dados
$conn->close();
?>