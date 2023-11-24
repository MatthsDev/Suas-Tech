<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

echo '
<div class="cont_ult1">
    <div class="cont-txt">
            <span class="ultsenha">ULTIMAS CHAMADAS</span> 
    </div>

    <div class="cont-num">';

// Execute a consulta SQL
$res_todos = $pdo->query("SELECT senger.id, sen.nome_senha
FROM senhas_geradas AS senger
INNER JOIN senhas AS sen ON sen.id = senger.senha_id
WHERE senger.sits_senha_id = 4
ORDER BY senger.modified DESC
LIMIT 5;");

// Fetch os resultados
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_total as $row) {
    $id = $row['id'];
    $nome_senha = $row['nome_senha'];

    echo '
            <span class="ultnum">' . $nome_senha . '</span><br>
       ';
}

echo '
   </div>
</div>';