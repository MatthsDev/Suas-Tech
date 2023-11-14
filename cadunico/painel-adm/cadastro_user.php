<?php
include_once '../../config/sessao.php';
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
    <form method="post" action="post">
        <label>CPF: </label>
        <input type="text" name="cpf_dec" placeholder="Digite o CPF..." required><br>

        <label>NOME: </label>
        <input type="text" name="nome_dec" placeholder="Digite o nome completo..." required><br>

        <label>Tipo de acesso: </label>
        <select name="buscar_dados" required>
            <option value="" disabled selected hidden>Selecione o perfil</option>
            <option value="adm">Administrador</option>
            <option value="usuario">Usuário</option>
        </select>

        <br>
        <button type="submit">Cadastrar</button>
        <a href="<?php echo $voltar_link; ?>">
                <i class="fas fa-arrow-left"></i> Voltar ao menu
            </a>
    </form>
    <?php
require_once '../../config/validar_cpf.php';
if (!isset($_POST['cpf_dec'])) {

} else {
    $cpf_dec = $_POST['cpf_dec'];
    $nome_dec = $_POST['nome_dec'];
    $tpacesso = $_POST['buscar_dados'];
    //$smtp = $conn->prepare("INSERT INTO usuarios (cpf_dec, nome_dec, buscar_dados, setor) VALUES (?,?,?,?)");
    //$smtp->bind_param("sssss", $codigo_familiar, $nomerf, $data_visita, $acao_visita, $parecer);
    echo $nome_dec;
    echo $cpf_dec;
    echo $tpacesso;
}
?>
    <div class=lin1>
        <div class="linha"></div>
    </div>
</div>
</body>
</html>
