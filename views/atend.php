<!-- view/index.php -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Seu Projeto</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../js/custom.js"></script>
    <h2>Gerar senha de atendimento</h2>

    <span id="msgAlerta"></span>
    <p>Senha: <span id="senhaGerada"></span></p>
    
    <p><button onclick="gerarSenha(1)">Gerar Senha Tipo 1</button></p>
    <p><button onclick="gerarSenha(2)">Gerar Senha Tipo 2</button></p>
    <!-- Adicione botões ou elementos conforme necessário -->
</body>

</html>