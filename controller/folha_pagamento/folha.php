<?php
session_start(); // Inicie a sessão para acessar as variáveis de sessão

// Verifique o nível do usuário
if (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'admin') {
    // O usuário é um administrador.
    $voltar_link = '../../painel-adm/adm-view.php';
} elseif (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'usuario') {
    // O usuário é um usuário comum.
    $voltar_link = '../../painel-usuario/user-painel.php';
} else {
    // Redirecionar para a página de login ou exibir uma mensagem de erro, pois o nível do usuário não está definido.
    $voltar_link = '../index.php'; // Altere o link para a página de login
}
require_once '../../config/sessao.php';
ini_set('memory_limit', '256M');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Folha de Pagamento</title>
    <link rel="stylesheet" type="text/css" href="style-folha.css">
    <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img src="h1.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <div class="busca">
            <form action="">
                <input name="cod_fam" class="busca2" placeholder="Digite o CPF ou NOME do beneficiário." type="text" required>
                <button type="submit">Buscar</button>
            <a
            href="<?php echo $voltar_link; ?>">
                <i class="fas fa-arrow-left"></i> Voltar ao menu
            </a>
            </form>
        </div>
        <table width="650px" border="1">

            <tr class="titulo" >

                <th class="cabecalho">CÓDIGO FAMILIAR</th>
                <th class="cabecalho">NOME</th>
                <th class="cabecalho">NIS</th>
                <th class="cabecalho">BENEFÍCIO</th>
                <th class="cabecalho">DATA ATUALIZAÇÃO</th>
                <th class="cabecalho">TIPO BENEFÍCIO</th>

            </tr>

    <?php
if (!isset($_GET['cod_fam'])) {
    ?>

        <tr>
            <td colspan="5">Resultados da pesquisa</td>
        </tr>

        <?php
} else {
    $sql_cod = $conn->real_escape_string($_GET['cod_fam']);
    $sql_dados = "SELECT * FROM folha_pag WHERE rf_cpf LIKE '%$sql_cod%' OR rf_nome LIKE '%$sql_cod%' ";
    $sql_query = $conn->query($sql_dados) or die("ERRO ao consultar!" . $conn - error);

    if ($sql_query->num_rows == 0) {
        ?>
            <tr class="resultado">
        <td colspan="6">Nenhum resultado encontrado...</td>
            </tr>
                    <?php
} else {
        while ($dados = $sql_query->fetch_assoc()) {
            ?>
                    <tr class="resultado">
                        <td class="resultado"><?php echo $dados['cod_familiar']; ?></td>
                        <td class="resultado"><?php echo $dados['rf_nome']; ?></td>
                        <td class="resultado"><?php echo $dados['rf_nis']; ?></td>
                        <td class="resultado"><?php echo $dados['sitfam']; ?></td>
                        <td class="resultado"><?php echo $dados['dt_atu_cadastral']; ?></td>
                        <td class="resultado"><?php echo $dados['tp_benef']; ?></td>
                    </tr>
    <?php
}
    }
}?>
        </table>
    </div>
</body>
</html>
