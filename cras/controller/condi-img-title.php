<?php
include_once '../../cadunico/controller/acesso_user/dados_usuario.php';


$tituloCras1 = "Cras Antonio Matias";
$tituloCras2 = "Cras Santo Afonso";

$imgCras1 = "../img/h1-cras-antonio.svg";
$imgCras2 = "../img/h1-cras-santo.svg";

if ($setor === "SETOR A") {
    $tituloDeAcordoComSetor = $tituloCras1;
    $imagemDeAcordoComSetor = $imgCras1;
} elseif ($setor === "CADUNICO") {
    $tituloDeAcordoComSetor = $tituloCras2;
    $imagemDeAcordoComSetor = $imgCras2;
} elseif ($nivel === "admin") {
    $tituloDeAcordoComSetor = $tituloCras2;
    $imagemDeAcordoComSetor = $imgCras2;
} else {
    $tituloDeAcordoComSetor = "SETOR NÃO IDENTIFICADO!!";
    $imagemDeAcordoComSetor = "SETOR NÃO IDENTIFICADO!!";
}
?>