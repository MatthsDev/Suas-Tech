<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
//dados totais dos registros de visitas
$sqlr = "SELECT COUNT(*) as total_peixe FROM peixe";
$result = $pdo->query($sqlr);
$row = $result->fetch(PDO::FETCH_ASSOC);
$totalRegistros = $row['total_peixe'];
$numero_parecer = $totalRegistros;

echo $totalRegistros;