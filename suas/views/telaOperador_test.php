<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script_chamar.js"></script>

    <title>Tela do Operador</title>
</head>
<body>

<button id="chamar" name="chamar" onclick='chamarSenha()'>CHAMAR</button>
<button id="atendendo" name="atendendo" onclick='atendendoSenha()'>ATENDENDO</button>
<button id="ausente" name="ausente" onclick='ausenteSenha()'>AUSENTE</button>
<button id="encerrado" name="encerrado" onclick='encerradoSenha()'>ENCERRADO</button>

<p id="mostrar_senha"></p>
<p id="mostrar_nome"></p>
<p id="amostra"></p>
</body>
</html>