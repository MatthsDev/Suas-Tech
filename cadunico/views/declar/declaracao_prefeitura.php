<?php
include "../../../config/sessao.php";
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
            <img src="../../img/h1-declaração.svg" alt="Titulocomimagem">
        </h1>
    </div>
<div class="container">
    <form method="post" action="declaracao_conferir">
        <select name="buscar_dados" required>
            <option value="cpf_dec">CPF:</option>
            <option value="nis_dec">NIS:</option>
        </select>
        <input type="text" name="valorescolhido" placeholder="Digite aqui:" required>
        <button type="submit">BUSCAR</button>
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
