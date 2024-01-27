<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o array 'tipoSenha' foi enviado
    if (isset($_POST['tipoSenha']) && is_array($_POST['tipoSenha'])) {
        // Recupera o valor do campo 'tipoSenhaSetor'
        $tipoSenhaSetor = $_POST['tipoSenhaSetor'];

        // Loop através dos atendimentos selecionados e insere no banco de dados
        foreach ($_POST['tipoSenha'] as $tipoSenha) {
            // Insere os dados no banco de dados
            // Substitua 'sua_tabela' pelo nome real da tabela onde você deseja armazenar os dados
            $sql = "INSERT INTO tipos_senhas (nomeSetor, tipos_atendimentos) VALUES ('$tipoSenhaSetor', '$tipoSenha')";

            if ($conn->query($sql) === TRUE) {
                echo "Atendimento inserido com sucesso!";
            } else {
                echo "Erro ao inserir atendimento: " . $conn->error;
            }
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "Nenhum atendimento selecionado.";
    }
}
?>
