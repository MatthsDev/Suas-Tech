<?php
// controller/atendimento/gerar_senha.php
include_once '../../../config/conexao.php';

$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);

$retorna = [];

if (!empty($tipo)) {
    $query_senha = "SELECT id, nome_senha 
                    FROM senhas
                    WHERE sits_senha_id = 1
                    AND tipos_senha_id = ?
                    ORDER BY id ASC 
                    LIMIT 1";

    $result_senha = $conn->prepare($query_senha);

    $result_senha->bind_param('i', $tipo);
    $result_senha->execute();
    $result_senha->store_result();

    if ($result_senha->num_rows > 0) {
        $result_senha->bind_result($id, $nome_senha);
        $result_senha->fetch();

        $query_senha_gerada = "INSERT INTO senhas_geradas (senha_id, sits_senha_id, created) VALUES (?, 2, NOW())";
        $cad_senha_gerada = $conn->prepare($query_senha_gerada);
        $cad_senha_gerada->bind_param('i', $id);
        $cad_senha_gerada->execute();

        if ($cad_senha_gerada->affected_rows > 0) {
            $query_edit_senha = "UPDATE senhas SET sits_senha_id=2 WHERE id=? LIMIT 1";
            $edit_senha = $conn->prepare($query_edit_senha);
            $edit_senha->bind_param('i', $id);
            $edit_senha->execute();

            $retorna = ['status' => true, 'nome_senha' => "<span style='color: green;'>$nome_senha</span>"];
        } else {
            $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Senha não gerada!</p>"];
        }
    } else {
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Senhas esgotadas!</p>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Senha não gerada!</p>"];
}

echo json_encode($retorna);
?>
