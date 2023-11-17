<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/style-reg-user.css">
    <title>Cadastro Usuários</title>


</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img src="../img/h1-cad-user.svg" alt="NoImage">
        </h1>
    </div>

    <div class="container">
        <form method="post" action="../controller/processo_cad_user.php">
            <div class="nome">
                <label>Nome de Usuário:</label>
                <input type="text" name="nome_user" placeholder="Ex: cad.(usuario) para o cadastro único" required>
            </div>
            <div class="tipodeacesso">
                <label>Tipo de acesso: </label>
                <select name="nivel" required>
                    <option value="" disabled selected hidden>Selecione</option>
                    <option value="admin">Administrador</option>
                    <option value="usuario">Usuário</option>
                </select>
            </div>
            <div class="setor">    
                <label>Setor:</label>
                <input type="text" name="setor" placeholder="De qual instância" required>
            </div>
            <div class="btns">
                <button type="submit">Cadastrar</button>
                <a href="adm-view.php">
                <i class="fas fa-arrow-left"></i> Voltar ao menu
                </a>
            </div>    
        </form>
    </div>
</body>
</html>
