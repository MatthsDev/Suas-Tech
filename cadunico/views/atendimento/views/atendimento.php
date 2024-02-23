<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Tech-Suas - Chamar Atendimento</title>
    <link rel="stylesheet" href="../css/style_chamada.css">
    <link rel="shortcut icon" href="../../../../cadunico/img/logo.png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

</head>

<body>
    <!-- <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-atendimento.svg" alt="Titulocomimagem">
        </h1>
    </div> -->
    <div class="tudo">

        <div class="block">
            <div class="botoesatend" id="botoesTiposAtendimento">
                <!-- Botões com os tipos de atendimento serão carregados dinamicamente aqui -->
            </div>

            <!-- <div class="nova_cham" id="nova_cham">
                 Botões com os tipos de atendimento serão carregados dinamicamente aqui 
            </div> -->


            <div class="listaChamada" id="listaChamada">
            </div>
        </div>


        <div class="block">
            <div class="senha">
                <!-- Receber a mensagem de erro do JavaScript -->
                <h2 id="msgAlerta">Senha chamada:</h2>
            </div>
        </div>
    </div>


    <script>

        function listarSenhas(){
            $.ajax({
                url: '/Suas-Tech/cadunico/views/atendimento/controller/ajax_request/listar_Chamarsenha.php',
                type: 'GET',
                success: function (data) {
                    $('#listaChamada').html(data);
                }
            })
        }

        // Função para carregar tipos de atendimento com base no setor selecionado
        function carregarTiposAtendimentos() {
            $.ajax({
                url: '/Suas-Tech/cadunico/views/atendimento/controller/ajax_request/carregar_btnChamarsenha.php',
                type: 'GET',
                success: function (data) {
                    $('#botoesTiposAtendimento').html(data);
                }
            });
        }

         // Função para carregar tipos de atendimento com base no setor selecionado
         function carregarNovaChamada() {
            $.ajax({
                url: '/Suas-Tech/cadunico/views/atendimento/controller/ajax_request/carregar_btnAgain.php',
                type: 'GET',
                success: function (data) {
                    $('#nova_cham').html(data);
                }
            });
        }


        $(document).ready(function () {
            carregarTiposAtendimentos();
            carregarNovaChamada();
            listarSenhas();

        });
    </script>


    <script src="/Suas-Tech/cadunico/views/atendimento/js/custom.js"></script>

</body>

</html>