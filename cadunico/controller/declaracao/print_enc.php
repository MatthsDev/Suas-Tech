<!DOCTYPE html>

<html lang="pt-BR">

    <head>
<style>

    body {
        font-family: Arial, sans-serif;
        background-image: url('../../img/marca.png');
        background-size: 790px;
        display: flex;
        background-size: cover;
        background-repeat: no-repeat; 
    }

    #title {
        font-size: 26px;
        font-weight: bold;
        text-align: center;
    }

    #subtitle {
        font-size: 16px;
        text-align: center;
        margin-top: 10px;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    textarea {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
        height: 100px;
    }

    .right-align {
        font-size: 20px;
        text-align: right;
    }

    .signature-line {
        margin-top: 20px;
        font-size: 16px;
        text-align: center;
        position: relative;
    }

    #justified-text {
        text-align: justify;
        font-size: 16px;
        text-indent: 50px;
        margin-top: 20px;
    }

    .conteudo{
    display:block;
    padding: 0px 5px 0px 30px;
}
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Menu</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../img/logo.png">
    </head>
<body>
<div id="justified-text" class="conteudo">

<?php
require "encaminhamento.php";
Echo $_GET['conteudo'];
?>
</div>
</body>
</html>
