<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

echo '
<table class="table table-sm mt-3">
    <thead class="thead-light">
        <tr>
            <th scope="col">SENHA</th>
            <th scope="col">MESA</th>
        </tr>
    </thead>
    <tbody>';

// Execute a consulta SQL
$res_todos = $pdo->query("SELECT senger.id, senger.user_id, sen.nome_senha
FROM senhas_geradas AS senger
INNER JOIN senhas AS sen ON sen.id = senger.senha_id
WHERE senger.sits_senha_id = 4
ORDER BY senger.modified DESC
LIMIT 1;");

// Fetch os resultados
$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);

foreach ($dados_total as $row) {
    $id = $row['id'];
    $nome_senha = $row['nome_senha'];
    $user_id = $row['user_id'];

    // Consulta para obter o guiche associado ao usuário que gerou a senha
        $stmt = $pdo->prepare("SELECT guiche FROM usuarios WHERE id = :user_id");
        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();
        $guiche_result = $stmt->fetch(PDO::FETCH_ASSOC);
        $guiche = $guiche_result['guiche'];

    echo '
        <tr>
            <td>' . $nome_senha . '</td>
             <td>' . $guiche . '</td>
        </tr>';
}

echo '
    </tbody>
</table>';
?>
