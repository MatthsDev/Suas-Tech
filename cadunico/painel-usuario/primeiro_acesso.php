<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Menu</title>
    <link rel="stylesheet" href="../css/adm.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../img/logo.png">
</head>

<body>

    <div class="img">
    <h1 class="titulo-com-imagem">
        <img class="titulo-com-imagem" src="../img/h1-primeiro.svg" alt="Titulocomimagem">
    </h1>
    </div>

    <h6>todos os campos com * são obrigatórios</h6>
<form method="post" action="">

    <!-- Adicione campos para coletar informações adicionais -->
    <label>Nome Completo:</label>
    <input type="text" name="nome_comp" placeholder="Digite seu nome completo" required>

    <label>CPF:</label>
    <input type="text" name="cpf" placeholder="Apenas numeros" required>

    <label>Data de Nascimento:</label>
    <input type="date" name="dt_nasc" required>

    <label>E-mail:</label>
    <input type="email" name="email" placeholder="Email particular" required>

    <label>Telefone:</label>
    <input type="email" name="email" placeholder="Exemplo: (xx) x xxxx-xxxx" required>


    <button type="submit">Concluir Cadastro</button>
</form>

</body>
</html>
