<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../img/logo.png" type="image/png">
    <link rel="stylesheet"  type="text/css" href="../../css/style-processo.css">
    <title>Cadastro Salvo</title>
</head>
<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

// Inicializa a mensagem como vazia
$mensagem = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tpacesso = $_POST['nivel'];
    $senha_hashed = password_hash("@senha123", PASSWORD_DEFAULT);
    $user_name = $_POST['nome_user'];
    $user_maiusc = strtoupper($user_name);
    $setor = $_POST['setor'];
    $funcao = $_POST['funcao'];
    $email = $_POST['email'];
    $nomeUsuario = gerarNomeUsuario($user_name);

    // Verifica se o nome de usuário já existe no banco de dados
    $verifica_usuario = $conn->prepare("SELECT usuario FROM usuarios WHERE usuario = ?");
    $verifica_usuario->bind_param("s", $nomeUsuario);
    $verifica_usuario->execute();
    $verifica_usuario->store_result();

    if ($verifica_usuario->num_rows > 0) {
        // Se o nome de usuário já está em uso, exibe uma mensagem ou redirecione de volta ao formulário
        echo '<script>alert("Nome de usuário já em uso. Por favor, escolha outro."); window.location.href = "../../painel-adm/cadastro_user.php";</script>';
        exit();
    }

    // Caso o Nome do Usuário seja unico será adicionado ao SQL
    $smtp = $conn->prepare("INSERT INTO usuarios (nome, usuario, senha, nivel, setor, funcao, email, data_registro) VALUES (?,?,?,?,?, ?, ?, NOW())");

    // Verifica se a preparação foi bem-sucedida
    if ($smtp === false) {
        die('Erro na preparação SQL: ' . $conn->error);
    }

    $smtp->bind_param("sssssss", $user_maiusc, $nomeUsuario, $senha_hashed, $tpacesso, $setor, $funcao, $email);

    if ($smtp->execute()) {
        ?>
        <h1>CADASTRO REALIZADO COM SUCESSO!</h1>
        <div class="linha"></div>
        <?php
// Redireciona para a página DE CADASTRAR NOVO USUÁRIO após ALGUNS segundos
        //echo '<script> setTimeout(function(){ window.location.href = "../../painel-adm/cadastro_user.php"; }, 1500); </script>';
    } else {
        echo "ERRO no envio dos DADOS: " . $smtp->error;
    }



    $smtp->close();
    $conn->close();

}

function gerarNomeUsuario($user_name)
{
    // Lógica para gerar o nome de usuário (por exemplo, usando o primeiro nome e sobrenome)
    // Implemente sua própria lógica aqui
    // Exemplo simples: usar as iniciais do primeiro e último nome
    $nomes = explode(" ", $user_name);
    $nomeUsuario = strtolower($nomes[0] . "." . end($nomes));
    return $nomeUsuario;
}

?>

</body>
</html>