<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod_iten = $_POST['cod_iten'];
    $quantidade = $_POST['quantidade'];
    $valor_uni = $_POST['valor_uni'];



    echo json_encode(array('encontrado' => true));
}
