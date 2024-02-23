<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

session_start();

$nomeUser = $_SESSION['user_usuario'];

$sqlSetor = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sqlSetor);
$stmt->bind_param("s", $nomeUser);
$stmt->execute();
$resultCons = $stmt->get_result();

if ($resultCons->num_rows > 0) {
    $dados_usuario = $resultCons->fetch_assoc();
    $id_user = $dados_usuario['id'];
    $nomeSetor = $dados_usuario['setor'];

    $sqlTiposAtendimento = "SELECT id, tipos_atendimentos FROM tipos_senhas WHERE nomeSetor = ?";
    $stmt = $conn->prepare($sqlTiposAtendimento);
    $stmt->bind_param("s", $nomeSetor);
    $stmt->execute();
    $resultTiposAtendimento = $stmt->get_result();
echo '<div>
        <h2> CHAMAR NOVAMENTE </h2>
    </div>';
    if ($resultTiposAtendimento->num_rows > 0) {
        while ($rowTipoAtendimento = $resultTiposAtendimento->fetch_assoc()) {
            echo '<div><p><button type="button" onclick="chamarSenhaNovamente('.$rowTipoAtendimento['id'].')">
         SENHA: '. $rowTipoAtendimento['tipos_atendimentos'] .'</button></p></div>';
        }
    } else {
        echo '<p>Nenhum tipo de atendimento encontrado para o setor: ' . $nomeSetor . '</p>';
    }
} else {
    echo '<p>Nenhum usuário encontrado com o nome: ' . $nomeUser . '</p>';
}

$conn->close();
?>
