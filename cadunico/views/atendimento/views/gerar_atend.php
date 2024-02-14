<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Tech-Suas - Gerar Atendimento</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="../css/style_gerar_atend.css">
    <link rel="shortcut icon" href="../../../../cadunico/img/logo.png" type="image/x-icon">
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="/Suas-Tech/cadunico/js/cpfvalid.js"></script>
    <script src="/Suas-Tech/cadunico/views/atendimento/js/custom.js"></script>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-atendimento.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="tudo">
        <div id="cons_cpf" class="cons_cpf">
        <h2>GERAR SENHA DE ATENDIMENTO </h2>
            <div class="">
                <label>Informe o cpf do usuário: </label>
                <input type="text" id="cpf" name="cpf" maxlength="14" onblur="validarCPF(this)" placeholder="Digite o CPF"
                    required>
            </div>
            <div class="">
                <label for="nome">Nome:</label>
                <input class="inpu" type="text" id="nome" name="nome" required>
            </div>
            <div class="btns">
                <input type="hidden" id="cpf_pess" name="cpf_pess">
                <button onclick="nextStep()">Gerar</button>
                <!--<a href="index.php">Voltar</a>-->
            </div>
        </div>

        <div id="atend_select" class="hidden">
            <label for="nome">SELECIONE O ATENDIMENTO: </label>
            <select name="atendimentos" id="setorSelect">
                <option value="">SELECIONE..</option>

                <!-- Opções do Setor serão carregadas dinamicamente aqui -->
            </select>

            <div class="botoesatend" id="botoesTiposAtendimento">
                <!-- Botões com os tipos de atendimento serão carregados dinamicamente aqui -->
            </div>



            <span id="msgAlerta"></span>
            <p>Senha: <span id="senhaGerada"></span></p>

            <!-- <button onclick="prevStep()">Voltar</button> -->
            <button><a href="/Suas-Tech/cadunico/views/atendimento/gerar_atend.php">Nova senha</a></button>

            <div id="ticketContainer"></div>
        </div>
    </div>

    <script src="/Suas-Tech/cadunico/views/atendimento/ajax/ajax_request.js"></script>

</body>

</html>