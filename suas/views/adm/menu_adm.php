<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Suas-Tech/img/logo.png" type="image/x-icon">
    <title>Administrativo</title>
</head>
<body>

<button type="button" id="cadastrar_contrato" onclick="window.location.href='/Suas-Tech/suas/views/adm/cadastro_contrato.php'">Cadastrar Contrato</button>
<button type="button" id="consulta_contrato" onclick="window.location.href='/Suas-Tech/suas/views/adm/contratos.php'">Contratos</button>

</body>
</html>

