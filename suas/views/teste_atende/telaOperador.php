<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

if (isset($_POST['servico'])) {
    $servico = $_POST['servico'];
    $senhaAtendimento = $pdo->prepare('SELECT * FROM senhas WHERE tipo_atendimento = :servico ORDER BY tipo_prioridade ASC, ordem_chegada ASC');
    $senhaAtendimento->bindParam(':servico', $servico);
    $senhaAtendimento->execute();

    $senhas = $senhaAtendimento->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($senhas);
    exit;
}

// Após verificar a senha a ser chamada
$atualizarSituacao = $pdo->prepare('UPDATE senhas SET situacao_senha = 2 WHERE ordem_chegada = :ordem_chegada');
$atualizarSituacao->bindParam(':ordem_chegada', $ordem_chegada);
$atualizarSituacao->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_atend.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../js/cpfvalid.js"></script>
    <script src="script.js"></script>
    <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
    <title>Atendimento</title>

</head>
<body>

    <select id="selecionarServico">
        <option value="" disabled selected hidden>Selecione</option>
        <option value="AMI">Alistamento Militar</option>
        <option value="CAD">CadUnico</option>
        <option value="CONC">Concessão</option>
        <option value="PBF">Programa Bolsa Família</option>
        <option value="RFB">Receita Federal</option>
    </select>

<div id="areaSenhas"></div>

<div id="acao_atendimento">
    <button value="chamar">CHAMAR</button>
    <button value="atendendo">ATENDENDO</button>
    <button value="ausente">AUSENTE</button>
    <button value="encerrado">ENCERRADO</button>
</div>

<script>
    $(document).ready(function () {
            // Esta função será executada quando a página for carregada ou reexibida
            function atualizarPagina() {
                location.reload(true); // O parâmetro true força o recarregamento da página do servidor
            }

            // Registre a função para ser chamada quando a página for carregada ou reexibida
            window.addEventListener('pageshow', atualizarPagina);
        });
</script>
</body>
</html>
