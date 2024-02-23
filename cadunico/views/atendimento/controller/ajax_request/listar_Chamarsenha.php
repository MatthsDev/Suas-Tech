<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

session_start();

$nomeUser = $_SESSION['user_usuario'];

$sqlSetor = "SELECT * FROM usuarios WHERE usuario = ?";
$stmtSetor = $conn->prepare($sqlSetor);
if (!$stmtSetor) {
    echo "Erro na preparação da consulta: " . $conn->error;
    exit;
}

$stmtSetor->bind_param("s", $nomeUser);
$stmtSetor->execute();
$resultCons = $stmtSetor->get_result();
echo '<div>
        <h2> LISTA ATENDIMENTO </h2>
    </div>';
if ($resultCons->num_rows > 0) {
    $dados_usuario = $resultCons->fetch_assoc();
    $id_user = $dados_usuario['id'];
    $nomeSetor = $dados_usuario['setor'];

    $sqlListar = "SELECT * FROM senhas_geradas WHERE nome_setor = ?";
    $stmtListar = $conn->prepare($sqlListar);
    if (!$stmtListar) {
        echo "Erro na preparação da consulta: " . $conn->error;
        exit;
    }

    $stmtListar->bind_param("s", $nomeSetor);
    $stmtListar->execute();
    $resultTiposAtendimento = $stmtListar->get_result();

    

    echo '
    <table class="tabela_senha">
        <thead class="titulo_senha">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Senha</th>
                <th scope="col">Prefrencial</th>
                <th scope="col">Situação</th>
                <th scope="col">Chamar Novamente</th>
            </tr>
        </thead>
        <tbody>';

    if ($resultTiposAtendimento->num_rows > 0) {

        while ($rowTipoAtendimento = $resultTiposAtendimento->fetch_assoc()) {
            $nomeSenha_lista = $rowTipoAtendimento['senha_id'];
            $nomeSituacao_lista = $rowTipoAtendimento['sits_senha_id'];

            // Consulta para obter o nome da senha com base no ID fornecido
            $sqlSenha = "SELECT nome_senha FROM senhas WHERE id = ?";
            $stmtSenha = $conn->prepare($sqlSenha);
            if (!$stmtSenha) {
                echo "Erro na preparação da consulta da senha: " . $conn->error;
                exit;
            }

            $stmtSenha->bind_param("i", $nomeSenha_lista);
            if (!$stmtSenha->execute()) {
                echo "Erro na execução da consulta da senha: " . $stmtSenha->error;
                exit;
            }

            $resultSenha = $stmtSenha->get_result();
            $rowSenha = $resultSenha->fetch_assoc();

            // Consulta para obter o nome da situação com base no ID fornecido
            $sqlSituacao = "SELECT nome FROM sits_senhas WHERE id = ?";
            $stmtSituacao = $conn->prepare($sqlSituacao);
            if (!$stmtSituacao) {
                echo "Erro na preparação da consulta da situação: " . $conn->error;
                exit;
            }

            $stmtSituacao->bind_param("i", $nomeSituacao_lista);
            if (!$stmtSituacao->execute()) {
                echo "Erro na execução da consulta da situação: " . $stmtSituacao->error;
                exit;
            }

            $resultSituacao = $stmtSituacao->get_result();
            $rowSituacao = $resultSituacao->fetch_assoc();

            echo '
        <tr>
            <td>' . $rowTipoAtendimento['nome_pess'] . '</td>
            <td>' . $rowSenha['nome_senha']. '</td>
            <td>' . $rowTipoAtendimento['tip_senha_id'] . '</td>
            <td>' . $rowSituacao['nome'] . '</td>
            <td><></td>
        </tr>';
        }
        echo '
    </tbody>
</table> ';
    } else {
        echo '<p>Nenhuma senha encontrada </p>';
    }
} else {
    echo '<p>Nenhum usuário encontrado com o nome: </p>';
}
?>
