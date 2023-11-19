<?php
include "../../config/sessao.php";
include '../controller/dados_usuario.php';
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/styledec.css">
    <link rel="website icon" type="png" href="../../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Declaração Cadastro único</title>
</head>
<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img src="../../img/h1.svg" alt="Titulocomimagem">
        </h1>
    </div>
<?php
echo $nome . "<br>";
echo $apelido . "<br>";

echo $cpf . "<br>";
echo $dtNasc . "<br>";
echo $telefone . "<br>";
echo $email . "<br>";
echo $cargo . "<br>";
echo $idcargo . "<br>";
echo $func . "<br>";
?>

</body>