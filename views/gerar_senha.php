<?php

$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);

if(!empty($tipo)){
    $retorna = ['status' => false, 'mss' => "<p style='color: green;'> Senha gerada!</p>"];
}else{
    $retorna = ['status' => true, 'mss' => "<p style='color: #f00;'> Erro: Senha não gerada!</p>"];
}

echo json_encode($retorna);