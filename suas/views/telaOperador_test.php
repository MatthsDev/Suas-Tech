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
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="teste_atende/style_atend.css" />
    <link rel="shortcut icon" href="../../cadunico/img/logo.png" type="image/x-icon">
    <script src="script_chamar.js"></script>
    <title>Tela do Operador</title>
</head>

<body>
    <label>GUICHÊ</label>
    <select id="guiche" name="guiche" required>
        <option value="" disabled selected hidden>Selecione</option>
        <option value="guiche1">GUICHÊ 1</option>
        <option value="guiche2">GUICHÊ 2</option>
        <option value="guiche3">GUICHÊ 3</option>
        <option value="guiche4">GUICHÊ 4</option>
        <option value="rf">Receita Federal</option>
        <option value="am">Alistamento Militar</option>
        <option value="co">Concessão</option>
        <option value="bf">Bolsa Família</option>
    </select>

    <label>Consultar os Atendimentos</label>
    <select id="tipoAtendimento" name="tipoAtendimento">
        <option value="" disabled selected hidden>Selecione</option>
        <option value="AMI">Alistamento Militar</option>
        <option value="CAD">CadUnico</option>
        <option value="CONC">Concessão</option>
        <option value="PBF">Programa Bolsa Família</option>
        <option value="RFB">Receita Federal</option>
    </select>

    <div id="areaSenhas"></div>

    <button id="chamar" name="chamar" onclick='chamarSenha()'>CHAMAR</button>
    <button id="atendendo" name="atendendo" onclick='atendendoSenha()'>ATENDENDO</button>
    <button id="ausente" name="ausente" onclick='ausenteSenha()'>AUSENTE</button>
    <button id="encerrado" name="encerrado" onclick='encerradoSenha()'>ENCERRADO</button>

    <p id="mostrar_senha"></p>
    <p id="mostrar_nome"></p>
    <p id="amostra"></p>

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