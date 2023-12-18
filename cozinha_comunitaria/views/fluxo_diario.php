<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Fluxo Diário</title>


</head>
<body>
    <h1>FLUXO DIÁRiO</h1>

    <form action="">
    <label>Buscar Beneficiário: </label>
    <input type="text" id="nis" name="nis" placeholder="Pelo NIS." maxlength="11" required>

    <?php
if (!isset($_GET['nis'])) {

} else {
    $sql_cod = $conn->real_escape_string($_GET['nis']);
    $sql_dados = "SELECT * FROM fluxo_diario_coz WHERE nis_benef LIKE $sql_cod";
    $sql_query = $conn->query($sql_dados) or die("ERRO ao consultar !" . $conn - error);

    if ($sql_query->num_rows == 0) {
        ?>
        Nenhum resultado encontrado...
                    <?php
} else {
        $dados = $sql_query->fetch_assoc();
        ?>

NOME: <?php echo $dados['nome']; ?> CPF: <?php echo $dados['cpf_benef']; ?> <br>

    <?php
}
}

$tbl_fluxo = $conn->query("SELECT nis_benef, nome, encaminhado_cras, qtd_marmita FROM fluxo_diario_coz");

if($tbl_fluxo->num_rows > 0){
    ?>
    <br><br><br><br><table width="650px" border="1">
        <tr class="titulo" >
                
                <th class="cabecalho">NIS</th>    
                <th class="cabecalho">NOME</th>
                <th class="cabecalho">CRAS</th>
                <th class="cabecalho">QUANTIDADES</th>
                    
            </tr>
    <?php
            while($linha = $tbl_fluxo->fetch_assoc()){
        ?>
        <tr class="resultado">
        <td class="resultado"><?php echo $linha['nis_benef']; ?></td>
        <td class="resultado"><?php echo $linha['nome']; ?></td>
        <td class="resultado"><?php echo $linha['encaminhado_cras']; ?></td>
        <td class="resultado"><?php echo $linha['qtd_marmita']; ?></td>
    <?php
    }
}else{
    ?>
    <tr>    
    <td colspan="4">Resultados da pesquisa</td>   
</tr>
<?php
}
?>
        </form>
    <body>
</html>
