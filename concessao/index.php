<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessão</title>
</head>
<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img src="" alt="Titulocomimagem">
        </h1>
    </div>
<div class="container">
    <form action="">
        <select name="buscar_dados" required>
            <option value="cpf_dec">CPF:</option>
            <option value="nis_dec">NIS:</option>
        </select>
        <input type="text" name="valorescolhido" placeholder="Digite aqui:" required>
        <button type="submit">BUSCAR</button>

        <?php
if (isset($_POST['buscar_dados']) && !empty($_POST['buscar_dados'])) {
    $opcao = $_POST['buscar_dados'];
    if ($opcao == "cpf_dec") {
        $cpf_dec = $_POST['valorescolhido'];
        //dados da tabela com todos os cadastros
        // Consulta preparada para evitar injeção de SQL
        $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf_dec");
        $sql->execute(array(':cpf_dec' => $cpf_dec));

        if ($sql->rowCount() > 0) {

            $dados = $sql->fetch(PDO::FETCH_ASSOC);
            $nome = $dados['nom_pessoa'];
            echo $nome;
        }
    } else {echo "erro não encontrado";}
}

?>

        <a
            href="<?php echo $voltar_link; ?>">
                <i class="fas fa-arrow-left"></i> Voltar ao menu
            </a>
    </form>
    <div class=lin1>
        <div class="linha"></div>
    </div>
</div>
</body>
</html>