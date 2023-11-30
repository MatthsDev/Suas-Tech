<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../../cadunico/img/logo.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../cadunico/js/cpfvalid.js"></script>


    <title>Cadastro de setores</title>
</head>
<body>
    <h1>CADASTRO DE SETORES</h1>

    <form>
    <label>CPF da Coordenação: </label>
    <input type="text" name="cpf_coord" onblur="validarCPF(this)" maxlength="14" id="cpf" required>
    <button type="submit">BUSCAR</button>
    </form>
    <?php
if (isset($_GET['cpf_coord'])) {
    $cpf_coord = $_GET['cpf_coord'];

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = :cpf_coord");
    $sql->execute(array(':cpf_coord' => $cpf_coord));

    if ($sql->rowCount() > 0) {
        $dados = $sql->fetch(PDO::FETCH_ASSOC);
        $nome_coord = $dados['nome'];
    } else {
        $nome_coord = "Esse cpf não foi localizado " . $_GET['cpf_coord'] . ". Você pode Cadastrar <a href='../../cadunico/painel-adm/cadastro_user.php'>AQUI</a>";
    
    }

    ?><label>Coordenação Responsável: </label> <?php
    ?><p><?php echo $nome_coord; ?></p><?php
} else {
    ?> <label>Aguardando coordenador responsável</label> <?php
}

$_SESSION['cpf_coord'] = $_GET['cpf_coord'];
$_SESSION['nome_coord'] = $nome_coord  ;
?>

    <form method="post" action="../controller/salvando_setor.php">

    <label>INSTITUIÇÃO: </label>
    <input type="text" name="instituicao" placeholder="Digite o nome da instituição">

    <label>Endereço: </label>
    <input type="text" name="endereco_inst" placeholder="Qual a localidade">

    <label>Código do Estabelecimento: </label>
    <input type="text" name="codigo" placeholder="Caso tenha...">


    <button type="submit">SALVAR</button>

        </form>

        <script src="js/scripts.js"></script>
        <script src="../../cadunico/js/personalise.js"></script>

    </body>
</html>
