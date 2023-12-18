<?php

require 'encaminhamento_cras.php';
echo $_GET['conteudo'];
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

    $arquivoCSS = '';

    if ($setor === "CRAS - ANTONIO MATIAS" || $setor === "CRAS - SANTO AFONSO") {
        $arquivoCSS = "../css/timbrecras.css";
    } else if ($setor === "CREAS - GILDO SOARES") {
        $arquivoCSS = "../css/timbrecreas.css";
    }
    ?>

<!DOCTYPE html>
<html lang="pt-BR">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link id="estilo-setor" rel="stylesheet" type="text/css" href="<?php echo $arquivoCSS; ?>">

    <head>
        
<style>
#modal {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.5);
                    justify-content: center;
                    align-items: center;
                }

                #modal-form {
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 5px;
                }
</style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imprimir encaminhamento</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../../img/logo.png">
    </head>
<body>
<div class="justified-text">
</div>
</body>

<script>
    setTimeout(function(){
        history.go(-2);
    }, 3000);

    window.onload = function() {
        window.print();
    };
    </script>

</html>
