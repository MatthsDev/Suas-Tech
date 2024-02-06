<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Tech-Suas</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
    
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script src="/Suas-Tech/cadunico/js/cpfvalid.js"></script>
    <script src="/Suas-Tech/cadunico/views/atendimento/js/custom.js"></script>
    <style>
   
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .hidden {
            display: none;
        }

        #botoesTiposAtendimento{
            display: flex;
            flex-flow: nowrap;
            
        }
    </style>
</head>

<body>
    <a href="index.php">Voltar</a><br>

    <br>

    <h2>GERAR SENHA DE ATENDIMENTO </h2>
    <br>

    <br>
    <br>

    <div id="cons_cpf" class="cons_cpf">
        <label>INFORME O CPF DO USUARIO: </label>
        <input type="text" id="cpf" name="cpf" maxlength="14" onblur="validarCPF(this)" placeholder="Digite o CPF"
            required>
        <label for="nome">Nome:</label>
        <input class="inpu" type="text" id="nome" name="nome" required>
        <br>
        <input type="hidden" id="cpf_pess" name="cpf_pess">
        <button onclick="nextStep()">Next</button>
    </div>

    <div id="atend_select" class="hidden">
        <label for="nome">SELECIONE O ATENDIMENTO: </label>
        <select name="atendimentos" id="setorSelect">
            <option value="">SELECIONE..</option>

            <!-- Opções do Setor serão carregadas dinamicamente aqui -->
        </select>


        <br>
        <br>

        <div id="botoesTiposAtendimento">
            <!-- Botões com os tipos de atendimento serão carregados dinamicamente aqui -->
        </div>



        <span id="msgAlerta"></span>
        <p>Senha: <span id="senhaGerada"></span></p>
        <br>
        <br>
        <br>
        <br>
        <button onclick="prevStep()">Voltar</button>
        <button><a href="/Suas-Tech/cadunico/views/atendimento/gerar_atend.php"> NOVA SENHA</a></button>

        <div id="ticketContainer"></div>
    </div>


    <script src="/Suas-Tech/cadunico/views/atendimento/ajax/ajax_request.js"></script>

    <script>
    

    </script>
</body>

</html>