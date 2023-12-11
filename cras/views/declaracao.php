<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
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
    <title>Declarações</title>
</head>
<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img src="../../img/h1-declaração.svg" alt="Titulocomimagem">
        </h1>
    </div>
            <!--INICIO DA DECLARAÇÃO PARA ENCAMINHAMENTO-->
        <div class="encaminhamento">
            <form method="post" action="controller/encaminhamento.php">
                <h2>Encaminhamento</h2>
                <select name="buscar_dados" required>
                    <option value="cpf_dec">CPF:</option>
                    <option value="nis_dec">NIS:</option>
                </select>
                <input type="text" name="valorescolhido" placeholder="Digite aqui:" required>

                <label>Encaminhar para: </label>
                <input id="" name="direcao">

                <label>Texto: </label>
                <textarea id="" name="texto" required  oninput="ajustarTextarea(this)"></textarea>
                <button type="submit">BUSCAR</button>
            </form>
            <div class=lin1>
                <div class="linha"></div>
        </div>
<script>
    function ajustarTextarea(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
    }
</script>
</body>

</html>