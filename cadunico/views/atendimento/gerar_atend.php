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
    <script src="/Suas-Tech/cadunico/js/custom.js"></script>
    <script src="/Suas-Tech/cadunico/js/atendimento.js"></script>
    <style>
        @media print {

            /* Estilos para a impressão */
            body {
                font-size: 12pt;
            }

            /* Adicione mais estilos conforme necessário */
        }

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

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        #secao2,
        #secao3 {
            display: none;
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

    <form>
        <label>INFORME O CPF DO USUARIO: </label>
        <input type="text" id="cpf" name="cpf" maxlength="14" onblur="validarCPF(this)" placeholder="Digite o CPF"
            required>
    </form>
    <br>
    <br>
    <label for="nome">Nome:</label>
    <input class="inpu" type="text" id="nome" name="nome" required>
    <br>
    <input type="hidden" id="cpf_pess" name="cpf_pess">


    <br>
    <br>

    <label for="nome">SELECIONE O ATENDIMENTO: </label>
    <select name="atendimentos" id="setorSelect">
        <!-- Opções do Setor serão carregadas dinamicamente aqui -->
    </select>


    <br>
    <br>

    <div id="botoesTiposAtendimento">
        <!-- Botões com os tipos de atendimento serão carregados dinamicamente aqui -->
    </div>



    <span id="msgAlerta"></span>
    <p>Senha: <span id="senhaGerada"></span></p>



    <script src="ajax/ajax_request.js"></script>

    <script>

        // Função para carregar opções de Setor de atendimento
        function carregarSetores() {
            $.ajax({
                url: 'controller/carregar_atendimento.php',
                type: 'GET',
                success: function (data) {
                    $('#setorSelect').html(data);
                }
            });
        }

        // Função para carregar tipos de atendimento com base no setor selecionado
        function carregarTiposAtendimentos(setorSelecionado) {
            $.ajax({
                url: 'controller/carregar_btnSenha.php',
                type: 'GET',
                data: { nomeSetor: setorSelecionado },
                success: function (data) {
                    $('#botoesTiposAtendimento').html(data);
                }
            });
        }


        // Carregar opções de Setor no carregamento da página
        $(document).ready(function () {
            carregarSetores();

            // Atualizar opções de Tipo de Atendimento quando o Setor for alterado
            $('#setorSelect').change(function () {
                var setorSelecionado = $(this).val();
                carregarTiposAtendimentos(setorSelecionado);
            });

            // Manipular o clique nos botões de tipos de atendimento
            $('#botoesTiposAtendimento').on('click', '.btnTipoAtendimento', function () {
                var idTipoAtendimento = $(this).data('id');
            });

        });

        // Função para remover caracteres especiais do CPF
        function removerCaracteresEspeciais(cpf) {
            return cpf.replace(/[^\d]/g, '');
        }


    </script>
</body>

</html>