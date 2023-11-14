<?php
include_once 'config/sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="cadunico/img/logo.png">
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
    <form action="">
        <label>CPF: </label>
        <input type="text" name="cpf_dec" placeholder="Digite o CPF..." required><br>
        
        <label>NOME: </label>
        <input type="text" name="nome_dec" placeholder="Digite o nome completo..." required><br>

        <label>Tipo de acesso: </label>
        <select name="buscar_dados" required>
            <option value="adm">Administrador:</option>
            <option value="usuario">Usuário:</option>
        </select>

        <button type="submit">Cadastrar</button>
        <br>
        <a href="<?php echo $voltar_link; ?>">
                <i class="fas fa-arrow-left"></i> Voltar ao menu
            </a>
    </form>
    <?php
    require_once 'config/validar_cpf.php';
    ?>
    <div class=lin1>
        <div class="linha"></div>
    </div>
</div>
</body>
</html>
