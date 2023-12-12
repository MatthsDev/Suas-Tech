<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';


$crasAM = "../views/menu-cras-am.php";
$crasST = "../views/menu-cras-st.php";

if ($setor === "CRAS - ANTONIO MATIAS") {
    $caminhomenu = $crasAM;
} elseif ($setor === "CRAS - SANTO AFONSO") {
    $caminhomenu = $crasST;
} else {
    $caminhomenu = "PROBLEMA IDENTIFICADO, CONTATE  O SUPORTE!!";
}
?>