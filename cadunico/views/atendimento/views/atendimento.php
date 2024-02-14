<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Tech-Suas - Chamar Atendimento</title>
    <link rel="stylesheet" href="../css/style_chamada.css">
    <link rel="shortcut icon" href="../../../../cadunico/img/logo.png" type="image/x-icon">
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-atendimento.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="tudo">

        <h2>Chamar Senha</h2>

        <div class="btns">

            <?php
            // Botao para chamar a funcao "chamarSenha". Funcao que chama a senha 
            echo "<div><p><button type='button' onclick='chamarSenha(17)'>CONVENCIONAL</button></p></div>";

            echo "<div><p><button type='button' onclick='chamarSenha(2)'>PREFERENCIAL CONVENCIONAL</button></p></div>";

            echo "<div><p><button type='button' onclick='chamarSenha(3)'>PREFERENCIAL SITIO</button></p></div>";

            echo "<div><p><button type='button' onclick='chamarSenha(15)'>PREFERENCIAL ESPECIAL </button></p></div>";

            // Recuperar a senhas geradas que estao salva na tabela "senhas_geradas", com a situacao 2 "Emitida"
            $query_senhas_geradas = "SELECT senger.id,
                            sen.nome_senha,
                            tip.nomeSetor
                            FROM senhas_geradas AS senger
                            INNER JOIN senhas AS sen ON sen.id=senger.senha_id
                            INNER JOIN tipos_senhas AS tip ON tip.id=sen.tipos_senha_id
                            WHERE senger.sits_senha_id = 2 
                            ORDER BY senger.id ASC";
            //Prepara a QUERY
            $result_senhas_geradas = $conn->prepare($query_senhas_geradas);

            //Executar a QUERY
            $result_senhas_geradas->execute();

            // Inicio SELETOR que esta ao redor da lista de senha que he utilizada no JS para excluir a senha chamada
            echo "<div id='lista-senha-gerada'>";

            // Leer los datos retornados del banco de datos
            while ($row_senha_gerada = $result_senhas_geradas->fetch()) {
                if (is_array($row_senha_gerada)) {
                    // Extraer para imprimir a través de la clave en el array
                    extract($row_senha_gerada);

                    // Inicio SELETOR utilizado para indicar cuál contraseña debe ser excluida cuando la misma sea llamada
                    echo "<div id='senha-gerada-$id'>";

                    // Imprimir los datos de la contraseña
                    echo "id: $id <br>";
                    echo "Nome da senha: $nome_senha <br>";
                    echo "Tipo da senha: $nome <br>";

                    echo "<hr>";

                    // Fin SELETOR utilizado para indicar cuál contraseña debe ser excluida cuando la misma sea llamada
                    echo "</div>";
                }
            }
            // Fim SELETOR que esta ao redor da lista de senha que he utilizada no JS para excluir a senha chamada
            echo "</div>";
            ?>

        </div>
        <div class="senha">
            <!-- Receber a mensagem de erro do JavaScript -->
            <h2 id="msgAlerta">Senha chamada:</h2>
        </div>
    </div>
    <script src="/Suas-Tech/cadunico/views/atendimento/js/custom.js"></script>

</body>

</html>