<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Cadastrar setores de senha</title>
</head>

<body>
    <h2>Formulário de Senhas</h2>
    <form method="POST" action="controller/processar_atend.php">

        <label for="Setor">Setor de Atendimento</label>
        <input type="text" id="tipoSenhaSetor" name="tipoSenhaSetor" required>

        <label for="normalCheckbox">
            <input type="checkbox" id="normalCheckbox" name="tipoSenha[]" value="normal"> Normal
        </label>

        <label for="prioridadeCheckbox">
            <input type="checkbox" id="prioridadeCheckbox" name="tipoSenha[]" value="prioridade"> Prioridade
        </label>

        <label for="pcdCheckbox">
            <input type="checkbox" id="pcdCheckbox" name="tipoSenha[]" value="especial"> PCD
        </label>

        <label for="zonaCheckbox">
            <input type="checkbox" id="zonaCheckbox" name="tipoSenha[]" value="zona rural"> Zona Rural
        </label>





        <button type="submit">Salvar</button>
    </form>

    <script>
</body >
</html >