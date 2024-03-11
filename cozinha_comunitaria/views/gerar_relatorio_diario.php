<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

ob_end_clean();
// Inclua a biblioteca FPDF
require('../../teset/fpdf.php');

$sql = 'SELECT nis_benef, nome, nome_mae, cpf_benef, data_de_entrega, encaminhado_cras, qtd_pessoa, qtd_marmita, marm_entregue, entregue, entregue_por FROM fluxo_diario_coz';
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $data_atual = date('d-m-Y');

    // Crie um objeto FPDF
    $pdf = new FPDF();
    $pdf->SetOrientation('L');
    $pdf->AddPage();

    // Adicione um título
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'RELATORIO DIARIO', 0, 1, 'C');

    // Adicione uma linha em branco
    $pdf->Ln(10);

    // Adicione as colunas
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(30, 10, 'NIS', 1);
    $pdf->Cell(30, 10, 'Nome', 1);
    $pdf->Cell(40, 10, utf8_decode('Nome da Mãe'), 1);
    $pdf->Cell(30, 10, 'CPF', 1);
    $pdf->Cell(30, 10, 'Data de Entrega', 1);
    $pdf->Cell(40, 10, utf8_decode('Encaminhado pelo CRAS'), 1);
    $pdf->Cell(40, 10, utf8_decode('Quantidade de Pessoas na Família'), 1);
    $pdf->Cell(40, 10, 'Marmitas Disponibilizadas', 1);
    $pdf->Cell(40, 10, 'Marmitas Entregues', 1);
    $pdf->Cell(30, 10, 'Entregue', 1);
    $pdf->Cell(40, 10, utf8_decode('Entregue por'), 1);
    $pdf->Ln();

    // Adicione os dados
    $pdf->SetFont('Arial', '', 10);
    while ($linha = $resultado->fetch_assoc()) {
        foreach ($linha as $coluna) {
            $pdf->Cell(30, 10, utf8_decode($coluna), 1);
        }
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