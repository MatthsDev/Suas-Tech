<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/style-registrar.css">
    <title>Cadastro Usuários</title>


</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img src="cadunico/img/" alt="NoImage">
        </h1>
    </div>
    <h1>Cadastro de Usuários</h1>

    <div class="container">
    <form method="post" action="../controller/processo_cad_user.php">


            <label>Nome de Usuário:</label>
            <input type="text" name="nome_user" placeholder="Exemplo: cad.silva para o cadastro único" required>
            <br>
            <label>Senha:</label>
            <input type="text" name="senha_user" placeholder="Senha" required>

            <br>
            <label>Tipo de acesso: </label>
            <select name="buscar_dados" required>
                <option value="" disabled selected hidden>Selecione</option>
                <option value="adm">Administrador</option>
                <option value="usuario">Usuário</option>
            </select>


            <br>
            <button type="submit">Cadastrar</button>
            <a href="adm-view.php">
                <i class="fas fa-arrow-left"></i> Voltar ao menu
            </a>
        </form>
    </div>
</body>
</html>
