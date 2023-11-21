<?php
include "../../../config/protecao.php";
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
    <!--INICIO DA DECLARAÇÃO PARA PREFEITURA-->
<div class="container">
    <form method="post" action="declaracao_conferir">
    <h2>Declaração Para Contratação</h2>
    <select name="buscar_dados" required>
            <option value="cpf_dec">CPF:</option>
            <option value="nis_dec">NIS:</option>
        </select>
        <input type="text" name="valorescolhido" placeholder="Digite aqui:" required>
        <button type="submit">BUSCAR</button>
    </form>
    <div class=lin1>
        <div class="linha"></div>
    </div>
</div>
    <!--INICIO DA DECLARAÇÃO PARA DESLIGAMENTO VOLUNTÁRIO-->
<div class="container">
    <form method="post" action="../../controller/declaracao/desligamento_voluntario.php">
    <h2>Declaração Desligamento Voluntário</h2>

            <label>NIS: </label>
            <input type="text" name="nis_dec" placeholder="Digite aqui:" required>
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
