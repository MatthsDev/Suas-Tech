<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
session_start();

$nomeUser = $_SESSION['user_usuario'];

// Consulta para obter informações do usuário
$sqlUser = "SELECT id, setor FROM usuarios WHERE usuario = ?";
$stmtUser = $conn->prepare($sqlUser);
$stmtUser->bind_param("s", $nomeUser);
$stmtUser->execute();
$resultUser = $stmtUser->get_result();

if ($resultUser->num_rows > 0) {
    $dadosUsuario = $resultUser->fetch_assoc();
    $idUsuario = $dadosUsuario['id'];
    $nomeSetor = $dadosUsuario['setor'];

    // Consulta para listar senhas geradas no setor do usuário
    $sqlListarSenhas = "SELECT sg.*, s.nome_senha, ts.tipos_atendimentos, ss.nome 
                        FROM senhas_geradas sg
                        INNER JOIN senhas s ON sg.senha_id = s.id
                        INNER JOIN tipos_senhas ts ON sg.tip_senha_id = ts.id
                        INNER JOIN sits_senhas ss ON sg.sits_senha_id = ss.id
                        WHERE sg.nome_setor = ?";
    $stmtListarSenhas = $conn->prepare($sqlListarSenhas);
    $stmtListarSenhas->bind_param("s", $nomeSetor);
    $stmtListarSenhas->execute();
    $resultSenhas = $stmtListarSenhas->get_result();

    if ($resultSenhas->num_rows > 0) {
        echo '<div>
                <h2> LISTA ATENDIMENTO </h2>
              </div>
              <table class="tabela_senha">
                <thead class="titulo_senha">
                  <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Preferencial</th>
                    <th scope="col">Situação</th>
                    <th scope="col">Chamar Novamente</th>
                  </tr>
                </thead>
                <tbody>';

        while ($rowSenha = $resultSenhas->fetch_assoc()) {
            echo '<tr>
                    <td>' . $rowSenha['nome_pess'] . '</td>
                    <td>' . $rowSenha['nome_senha'] . '</td>
                    <td>' . $rowSenha['tipos_atendimentos'] . '</td>
                    <td>' . $rowSenha['nome'] . '</td>
                    <td><></td>
                  </tr>';
        }

        echo '</tbody></table>';
    } else {
        echo '<p>Nenhuma senha encontrada</p>';
    }
} else {
    echo '<p>Nenhum usuário encontrado com o nome: ' . $nomeUser . '</p>';
}
?>
