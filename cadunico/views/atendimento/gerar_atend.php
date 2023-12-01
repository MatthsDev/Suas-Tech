<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

function formatarCPF($cpf)
{
    // Remove caracteres especiais (pontos e traço)
    $cpfFormatado = preg_replace('/[^0-9]/', '', $cpf);

    // Remove o zero à frente, se existir
    $cpfFormatado = ltrim($cpfFormatado, '0');

    return $cpfFormatado;
}

$cpf_dec_formatado = null;
$nom_pessoa = null;

if (isset($_GET['cpf'])) {
    $cpf_dec = $_GET['cpf'];

    // Formata o CPF antes de consultar no banco de dados
    $cpf_dec_formatado = formatarCPF($cpf_dec);

    $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf_dec_formatado");
    $sql->execute(array(':cpf_dec_formatado' => $cpf_dec_formatado));

    if ($sql->rowCount() > 0) {
        $dados = $sql->fetch(PDO::FETCH_ASSOC);
        $nom_pessoa = $dados["nom_pessoa"];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Tech-Suas</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../js/cpfvalid.js"></script>
    <script src="../../js/custom.js"></script>
</head>

<body>
    <a href="index.php">Voltar</a>
    <h2>Gerar senha de atendimento</h2>

    <form method="GET">
        <label>CPF: </label>
        <input type="text" id="cpf" name="cpf" placeholder="Digite o CPF para consultar..." onblur="validarCPF(this)">
        <button type="submit">BUSCAR</button>
    </form>

    <!-- Adicione um novo campo para o nome -->
    <input type="hidden" id="cpf_pess" name="cpf_pess" value="<?php echo $cpf_dec_formatado; ?>">
    
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" placeholder="Digite o nome" value="<?php echo $nom_pessoa; ?>">

    <span id="msgAlerta"></span>
    <p>Senha: <span id="senhaGerada"></span></p>
    <p><button onclick="gerarSenha(1)">PBF NORMAL</button></p>
    <p><button onclick="gerarSenha(2)">PBF PRIORIDADE</button></p>
    <p><button onclick="gerarSenha(3)">PBF SITIO</button></p>
    <p><button onclick="gerarSenha(4)">PBF ESPECIAL</button></p>
</body>

</html>
