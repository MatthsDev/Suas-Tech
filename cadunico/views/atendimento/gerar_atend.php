<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Tech-Suas</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../../js/custom.js"></script>
</head>

<body>
    <a href="index.php">Voltar</a>
    <h2>Gerar senha de atendimento</h2>

    <span id="msgAlerta"></span>
    <p>Senha: <span id="senhaGerada"></span></p>
    <p><button onclick="gerarSenha(1)">Gerar Senha Tipo 1</button></p>
    <p><button onclick="gerarSenha(2)">Gerar Senha Tipo 2</button></p>

    <form>
    <label>CPF: </label>
    <input type="text" name="cpf_dec" placeholder="Digite o CPF para consultar...">
    <button type="submit">BUSCAR</button>
    </form>

    <?php
        if (!isset($_GET['cpf_dec'])){
            echo "Não localizado";
        }else{
            $cpf_dec = $_GET['cpf_dec'];
            $sql = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf_dec");
            $sql->execute(array(':cpf_dec' => $cpf_dec));

            if ($sql->rowCount() > 0) {
                $dados = $sql->fetch(PDO::FETCH_ASSOC);
                $nom_pessoa = $dados["nom_pessoa"];}

            echo $cpf_dec . $nom_pessoa;
        }
    ?>
</body>

</html>