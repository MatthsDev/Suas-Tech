<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Cadastrar setores de senha</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <h2>Formulário de Senhas</h2>
    <form method="POST" action="/Suas-Tech/cadunico/views/atendimento/models/processar_atend.php">

        <label for="Setor">Atendimento:</label>
        <select id="tipoSenhaSetor" name="tipoSenhaSetor" required>
            <!-- Opções do Setor serão carregadas dinamicamente aqui -->
        </select>

        <label for="normalCheckbox"><br> TIPOS DE FILA QUE O ATENDIMENTO IRA CONTER.<br> 
            <input type="checkbox" id="normalCheckbox" name="tipoSenha[]" value="NORMAL"> NORMAL
        </label>

        <label for="prioridadeCheckbox">
            <input type="checkbox" id="prioridadeCheckbox" name="tipoSenha[]" value="PRIORIDADE"> PRIORIDADE
        </label>

        <label for="pcdCheckbox">
            <input type="checkbox" id="pcdCheckbox" name="tipoSenha[]" value="ESPECIAL"> PCD
        </label>

        <label for="zonaCheckbox">
            <input type="checkbox" id="zonaCheckbox" name="tipoSenha[]" value="ZONA RURAL"> Zona Rural
        </label>





        <button type="submit">Salvar</button>
    </form>

    <script>
         function carregarSetores() {
            $.ajax({
                url: '/Suas-Tech/cadunico/views/atendimento/controller/ajax_request/carregar_setor.php', // Substitua pelo caminho real do arquivo PHP
                type: 'GET',
                success: function (data) {
                    $('#tipoSenhaSetor').html(data);
                }
            });
        }

        $(document).ready(function () {
            carregarSetores();

        });
    </script>
</body >
</html >