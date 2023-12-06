<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter dados do formulário
    $nomeBase = htmlspecialchars($_POST['nomeSenha']);
    $quantidade = intval($_POST['quantidade']);
    $tipoSenha = intval($_POST['tipoSenha']);
    $situacaoSenha = intval($_POST['situacaoSenha']);

    try {
        $pdo->beginTransaction();

        // Obter o número mais alto atualmente cadastrado para a senha base
        $sqlMax = "SELECT MAX(CAST(SUBSTRING_INDEX(nome_senha, '-', -1) AS UNSIGNED)) AS max_numero FROM senhas WHERE nome_senha LIKE :nomeBase";
        $stmtMax = $pdo->prepare($sqlMax);
        $stmtMax->bindValue(':nomeBase', $nomeBase . '%');
        $stmtMax->execute();
        $resultMax = $stmtMax->fetch(PDO::FETCH_ASSOC);
        $maxNumero = $resultMax['max_numero'] ?? 0;

        // Se não houver senhas cadastradas ainda, o próximo número será 1
        $proximoNumero = max(1, $maxNumero + 1);

        // Loop para inserir senhas com base na quantidade especificada
        for ($i = $proximoNumero; $i < $proximoNumero + $quantidade; $i++) {
            $nomeSenha = $nomeBase . '-' . $i;
            $sql = "INSERT INTO senhas (nome_senha, tipos_senha_id, sits_senha_id) VALUES (:nome, :tipo_id, :situacao_id)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $nomeSenha);
            $stmt->bindParam(':tipo_id', $tipoSenha);
            $stmt->bindParam(':situacao_id', $situacaoSenha);
            $stmt->execute();
        }

        $pdo->commit();
        echo "Senhas inseridas com sucesso!";
    } catch (Exception $e) {
        $pdo->rollBack();
        echo "Erro ao inserir senhas: " . $e->getMessage();
    }
}
?>
