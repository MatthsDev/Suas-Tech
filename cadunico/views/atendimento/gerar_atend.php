<!-- view/index.php -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Tech-Suas</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../js/custom.js"></script>
</head>

<body>
    <h2>Gerar senha de atendimento</h2>

    <span id="msgAlerta"></span>
    <p>Senha: <span id="senhaGerada"></span></p>
    <p><button onclick="gerarSenha(1)">Gerar Senha Tipo 1</button></p>
    <p><button onclick="gerarSenha(2)">Gerar Senha Tipo 2</button></p>
</body>

</html>
