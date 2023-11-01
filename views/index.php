<?php
require_once("../config/conexao.php");
include ("function.php");
    $conexao_validacao = conexao_validacao();
    $conexao_validacao;

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Suas-TECH</title>
        <link rel="stylesheet" href="../css/menu.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="../../css/style-folha.css">
        <link rel="website icon" type="png" href="../../img/icon.png">
    </head>
<body>
    <header>
        <h1>Formulários</h1>
    </header>
    <div class="container">
        <div class="busca">
            <form action="">
                <input name="cod_fam" class="busca2" placeholder="Digite o COD.FAMILIAR ou NOME do beneficiário." type="text" required>
                <button type="submit">Buscar</button>
            </form>
        </div>
    <table width="650px" border="1">

        <tr class="titulo" >
            <th class="cabecalho">NIS</th>
            <th class="cabecalho">NOME</th>
            <th class="cabecalho">FICHA DE EXCLUSÃO PESSOA</th>
            <th class="cabecalho">TERMO DE DECLARAÇÃO</th>
            <th class="cabecalho">TERMO DE RENDA</th>
            <th class="cabecalho">FICHA DE EXCLUSÃO FAMÍLIA</th>
            
        </tr>
        <a href="" input="radio" name="btn-termo_decl"></a>
        <?php
if (!isset($_GET['cod_fam'])) {
    ?>
        <tr>
            <td colspan="5">Resultados da pesquisa</td>
        </tr>
        <?php
} else {
    $sql_cod = $conn->real_escape_string($_GET['cod_fam']);
    $sql_dados = "SELECT * FROM tbl_tudo WHERE num_nis_pessoa_atual LIKE '%$sql_cod%' OR nom_pessoa LIKE '%$sql_cod%' OR num_cpf_pessoa LIKE '%$sql_cod%'";
    $sql_query = $conn->query($sql_dados) or die("ERRO ao consultar !" . $conn - error);

    if ($sql_query->num_rows == 0) {
        ?>
            <tr class="resultado">
        <td colspan="5">Nenhum resultado encontrado...</td>
            </tr>
                    <?php
} else {
    while ($dados = $sql_query->fetch_assoc()) {
        ?>
                <tr class="resultado">
                    <td class="resultado" data-nis="<?php echo $dados['num_nis_pessoa_atual']; ?>"><?php echo $dados['num_nis_pessoa_atual']; ?></td>
                    <td class="resultado"><?php echo $dados['nom_pessoa']; ?></td>
                    <td class="resultado" data-nome="<?php echo $dados['nom_pessoa']; ?>"><?php echo "<input type='radio' name='btn-ficha_pessoa'>"; ?></td>
                    <td class="resultado"><?php echo "<input type='radio' name='btn-termo_decl'>"; ?></td>
                    <td class="resultado"><?php echo "<input type='radio' name='btn-termo_renda'>"; ?></td>
                    <td class="resultado"><?php echo "<input type='radio' name='btn-ficha_familia'>"; ?></td>
                </tr>
                <?php
        }
    }
}?>
    </table>
</div>
</body>
<script>
function redirecionarParaPaginaFichaPessoa(nome, nis) {
    window.location.href = `ecxpessoa.php?nome=${nome}&nis=${nis}`; // substitua 'ecxpessoa.php' pela sua página de destino
}

const botoesFichaPessoa = document.querySelectorAll("[name='btn-ficha_pessoa']");
botoesFichaPessoa.forEach(botao => {
    botao.addEventListener('click', function() {
        const nome = this.parentElement.parentElement.querySelector("[data-nome]").getAttribute("data-nome");
        const nis = this.parentElement.parentElement.querySelector("[data-nis]").getAttribute("data-nis");
        redirecionarParaPaginaFichaPessoa(nome, nis);
    });
});
</script>
</html>