<?php
include_once '../../config/sessao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../img/logo.png">
    <title>Cadastro Usuários</title>
    <script>
        function formatarCPF(cpf) {
            // Remove caracteres não numéricos
            cpf = cpf.replace(/\D/g, '');

            // Adiciona ponto e traço conforme o formato do CPF
            cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');

            // Atualiza o valor no campo
            document.getElementById('cpf_dec').value = cpf;
        }

        function validarCPF(cpf) {
    // Remove caracteres não numéricos
    cpf = cpf.replace(/\D/g, '');

    // Verifica se o CPF possui 11 dígitos
    if (cpf.length !== 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais, o que torna o CPF inválido
    if (/^(\d)\1+$/.test(cpf)) {
        return false;
    }

    // Calcula os dígitos verificadores
    var v1 = 0;
    for (var i = 0; i < 9; i++) {
        v1 += parseInt(cpf.charAt(i)) * (10 - i);
    }
    v1 = (v1 * 10) % 11;

    var v2 = 0;
    for (var i = 0; i < 10; i++) {
        v2 += parseInt(cpf.charAt(i)) * (11 - i);
    }
    v2 = (v2 * 10) % 11;

    // Compara os dígitos verificadores com os dígitos informados
    if ((v1 === 10 ? 0 : v1) !== parseInt(cpf.charAt(9)) || (v2 === 10 ? 0 : v2) !== parseInt(cpf.charAt(10))) {
        return false;
    }

    // Se todas as verificações passaram, o CPF é válido
    return true;
}

        function processarCPF() {
            // Obtém o valor do campo CPF
            var cpf = document.getElementById('cpf_dec').value;

            // Formata o CPF
            formatarCPF(cpf);

            // Valida o CPF
            var cpfValido = validarCPF(cpf);

            // Exibe uma mensagem de validação (pode ser personalizada conforme sua necessidade)
            if (cpfValido) {
                <?php
// Inicializa a mensagem como vazia
$mensagem = "";

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $cpf_dec = $_POST['cpf_dec'];

    // Se o CPF for válido, continua com as outras operações
    require_once '../../config/conexao.php';

    $nome_dec = $_POST['nome_dec'];
    $tpacesso = $_POST['buscar_dados'];
    $user_senha = $_POST['senha_user'];
    $user_name = $_POST['nome_user'];

    $smtp = $conn->prepare("INSERT INTO usuarios_test (cpf_dec, nome_dec, buscar_dados, senha_user, nome_user) VALUES (?,?,?,?,?)");
    $smtp->bind_param("sssss", $cpf_dec, $nome_dec, $tpacesso, $user_senha, $user_name);

    if ($smtp->execute()) {
        $mensagem = "Dados enviados com sucesso!";
    } else {
        $mensagem = "ERRO no envio dos DADOS: " . $smtp->error;
    }

    $smtp->close();
    $conn->close();
    echo '<script> setTimeout(function(){ window.location.href = "cadastro_user.php"; }, 300); </script>';
            }
?>
            } else {
                alert('CPF inválido!');
            }
        }
    </script>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img src="cadunico/img/" alt="NoImage">
        </h1>
    </div>
    <h1>Cadastro de Usuários</h1>

    <div class="container">
        <form method="post" action="">

            <label>CPF: </label>
            <input type="text" id="cpf_dec" name="cpf_dec" placeholder="Digite o CPF..." required
                oninput="formatarCPF(this.value)"><br>

            <label>NOME: </label>
            <input type="text" name="nome_dec" placeholder="Digite o nome completo..." required><br>

            <label>Tipo de acesso: </label>
            <select name="buscar_dados" required>
                <option value="" disabled selected hidden>Selecione</option>
                <option value="adm">Administrador</option>
                <option value="usuario">Usuário</option>
            </select>

            <br>
            <label>Nome de Usuário:</label>
            <input type="text" name="nome_user">
            <br>
            <label>Senha:</label>
            <input type="text" name="senha_user">

            <br>
            <button type="button" onclick="processarCPF()">Cadastrar</button>
            <a href="<?php echo $voltar_link; ?>">
                <i class="fas fa-arrow-left"></i> Voltar ao menu
            </a>
        </form>

        <div class="lin1">
            <div class="linha"></div>
        </div>
    </div>
</body>

</html>