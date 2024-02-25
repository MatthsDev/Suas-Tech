<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/Suas-Tech/config/sessao.php';

$tipo = filter_input(INPUT_GET, 'tipo', FILTER_VALIDATE_INT);
$nomePessoa = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cpfPessoa = filter_input(INPUT_GET, 'cpf_pess', FILTER_SANITIZE_FULL_SPECIAL_CHARS);


$retorna = [];

// Consulta ao banco de dados usando prepare
try {
    $sql = "SELECT nomeSetor FROM tipos_senhas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $tipo, PDO::PARAM_INT);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $nomeSetor = $row['nomeSetor'];
    } else {
        echo "Nenhum resultado encontrado.";
        exit(); // Encerra o script se nenhum resultado for encontrado
    }
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
    exit(); // Encerra o script em caso de erro na consulta
}

// Consulta ao banco de dados para gerar a senha
try {
    $query_senha = "SELECT id, nome_senha, tipos_senha_id 
                    FROM senhas
                    WHERE sits_senha_id = 1
                    AND tipos_senha_id = :tipo
                    ORDER BY id ASC 
                    LIMIT 1";

    $result_senha = $pdo->prepare($query_senha);
    
    if ($result_senha) {
        $result_senha->bindParam(':tipo', $tipo, PDO::PARAM_INT);
        $result_senha->execute();

        if ($result_senha->rowCount() > 0) {
            $row = $result_senha->fetch(PDO::FETCH_ASSOC);
            $id = $row['id'];
            $nome_senha = $row['nome_senha'];
            $tipos_senha_id = $row['tipos_senha_id'];

            $query_senha_gerada = "INSERT INTO senhas_geradas (senha_id, nome_pess, cpf_pess, sits_senha_id, tip_senha_id, nome_setor, created) 
            VALUES (?, ?, ?, 2, ?, ?, NOW())";

            $cad_senha_gerada = $pdo->prepare($query_senha_gerada);

            if ($cad_senha_gerada) {
                $cad_senha_gerada->bindParam(1, $id, PDO::PARAM_INT);
                $cad_senha_gerada->bindParam(2, $nomePessoa, PDO::PARAM_STR);
                $cad_senha_gerada->bindParam(3, $cpfPessoa, PDO::PARAM_STR);
                $cad_senha_gerada->bindParam(4, $tipos_senha_id, PDO::PARAM_INT);
                $cad_senha_gerada->bindParam(5, $nomeSetor, PDO::PARAM_STR);
                $cad_senha_gerada->execute();

                if ($cad_senha_gerada->rowCount() > 0) {
                    $query_edit_senha = "UPDATE senhas SET sits_senha_id=2 WHERE id=:id LIMIT 1";
                    $edit_senha = $pdo->prepare($query_edit_senha);

                    if ($edit_senha) {
                        $edit_senha->bindParam(':id', $id, PDO::PARAM_INT);
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
} catch (PDOException $e) {
    echo "Erro na consulta: " . $e->getMessage();
    exit(); // Encerra o script em caso de erro na consulta
}

// Garante que o cabeçalho seja interpretado como JSON
header('Content-Type: application/json');

// Retorna a resposta como JSON
echo json_encode($retorna);
?>
