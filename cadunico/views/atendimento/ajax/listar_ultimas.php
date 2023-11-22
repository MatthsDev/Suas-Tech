<?php
require_once("../../../../config/conexao.php");

echo '
<table class="table table-sm mt-3">
    <thead class="thead-light">
        <tr>
            <th scope="col">ULTIMAS CHAMADAS</th>
        </tr>
    </thead>
    <tbody>';

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
        <tr>
            <td>' . $nome_senha . '</td>
        </tr>';
}

echo '
    </tbody>
</table>';
