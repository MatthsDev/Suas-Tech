<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Formulário de Senhas</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <h2>Formulário de Senhas</h2>
    <form method="POST" action="controller/processar_dados.php">
        <label for="nomeSenha">Nome da Senha:</label>
        <input type="text" id="nomeSenha" name="nomeSenha" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" min="1" required>





        <label for="Setor">Atendimento:</label>
        <select id="setorSelect" name="setor" required>
            <!-- Opções do Setor serão carregadas dinamicamente aqui -->
        </select>

        <label for="tipoAtendimento">Tipo de Atendimento:</label>
        <select id="tipoAtendimentoSelect" name="tipoAtendimento" required>
            <!-- Opções do Tipo de Atendimento serão carregadas dinamicamente aqui -->
        </select>

        <button type="submit">Gerar Senhas</button>
    </form>

    <script>
        // Função para carregar opções de Setor
        function carregarSetores() {
            $.ajax({
                url: 'controller/carregar_atendimento.php', // Substitua pelo caminho real do arquivo PHP
                type: 'GET',
                success: function (data) {
                    $('#setorSelect').html(data);
                }
            });
        }

        function carregarTiposAtendimentos(nomeSetor) {
            $.ajax({
                url: 'controller/carregar_tiposAtendimento.php',
                type: 'GET',
                data: { nomeSetor: nomeSetor },
                success: function (data) {
                    $('#tipoAtendimentoSelect').html(data);
                }
            });
        }

        // Carregar opções de Setor no carregamento da página
        $(document).ready(function () {
            carregarSetores();

            // Atualizar opções de Tipo de Atendimento quando o Setor for alterado
            $('#setorSelect').change(function () {
                var setorSelecionado = $(this).val();
                carregarTiposAtendimentos(setorSelecionado); // Correção aqui
            });
        });
    </script>
</body>

</html>