<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Suas-Tech/config/sessao.php';

$tipo = filter_input(INPUT_GET, 'tipo');
$nomePessoa = filter_input(INPUT_GET, 'nome');
$cpfPessoa = $_GET['cpf_pess'];


$retorna = [];

if (!empty($tipo) && !empty($nomePessoa)) {
    $query_senha = "SELECT id, nome_senha 
                    FROM senhas
                    WHERE sits_senha_id = 1
                    AND tipos_senha_id = ?
                    ORDER BY id ASC 
                    LIMIT 1";

    $result_senha = $conn->prepare($query_senha);

    if ($result_senha) {
        $result_senha->bind_param('i', $tipo);
        $result_senha->execute();
        $result_senha->store_result();

        if ($result_senha->num_rows > 0) {
            $result_senha->bind_result($id, $nome_senha);
            $result_senha->fetch();

            $query_senha_gerada = "INSERT INTO senhas_geradas (senha_id, nome_pess, cpf_pess, sits_senha_id, created) VALUES (?, ?, ?, 2, NOW())";

            $cad_senha_gerada = $conn->prepare($query_senha_gerada);

            if ($cad_senha_gerada) {
                $cad_senha_gerada->bind_param('isi', $id, $nomePessoa, $cpfPessoa);
                $cad_senha_gerada->execute();

                if ($cad_senha_gerada->affected_rows > 0) {
                    $query_edit_senha = "UPDATE senhas SET sits_senha_id=2 WHERE id=? LIMIT 1";
                    $edit_senha = $conn->prepare($query_edit_senha);

                    if ($edit_senha) {
                        $edit_senha->bind_param('i', $id);
                        $edit_senha->execute();

                        $retorna = ['status' => true, 'nome_senha' => "<span style='color: green;'>$nome_senha</span>"];
                    } else {
                        $retorna = ['status' => false, 'msg' => 'Erro ao preparar a terceira query'];
                    }
                } else {
                    $retorna = ['status' => false, 'msg' => 'Erro ao gerar a senha'];
                }
            } else {
                $retorna = ['status' => false, 'msg' => 'Erro ao preparar a segunda query'];
            }
        } else {
            $retorna = ['status' => false, 'msg' => 'Senhas esgotadas'];
        }
    } else {
        $retorna = ['status' => false, 'msg' => 'Erro ao preparar a primeira query'];
    }
} else {
    $retorna = ['status' => false, 'msg' => 'Tipo ou nome não fornecidos'];
}

// Garante que o cabeçalho seja interpretado como JSON
header('Content-Type: application/json');

// Retorna a resposta como JSON
echo json_encode($retorna);
?>
