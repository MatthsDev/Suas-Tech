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
    <form method="POST" action="/Suas-Tech/cadunico/views/atendimento/models/processar_atend.php">

        <label for="Setor">NOME DO SETOR DO ATENDIMENTO</label><br> 
        <input type="text" id="tipoSenhaSetor" name="tipoSenhaSetor" placeholder="Gerar fila de atendimento para... "required>
        <br>
        <br>

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
</body>
</html>