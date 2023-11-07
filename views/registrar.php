<?php
// CARREGANDO SCRIPTS DE CONEXÃO E CONFIGURAÇÃO DO SISTEMA (BANCO DE DADOS)
require_once("../config/conexao.php");

// CARREGANDO SESSAO DO USUARIO
session_start();

// Verifica se o usuário está autenticado como admin ou usuário
if (!isset($_SESSION['nome_usuario']) || ($_SESSION['nivel_usuario'] != 'admin' && $_SESSION['nivel_usuario'] != 'usuario')) {
    header("location:../index.php");
    exit; // Encerra o script após redirecionar
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style-registrar.css">
    <link rel="website icon" type="png" href="../img/icon.png">
    <title>Registrar visitas</title>
</head>

<body>
    <h1 class="img">
        <img src="../img/visitash1.svg">
    </h1>
    <div class="container">
        <form method="post" action="../controller/parecer/processo.php">
            <div class="codfamiliar">
                <label>CÓDIGO FAMILIAR: </label>
                <input type="text" name="codigo_familiar" placeholder="Digite o CÓDIGO FAMILIAR." required>
            </div>
            <div class="nomerf">
                <label for="nome">NOME RF: </label>
                <input type="text" name="nomerf" placeholder="Digite o nome do RF." required>
            </div>
            <div class="data">
                <label>DATA DA VISITA: </label>
                <input type="date" id="data_visita" name="data_visita" required>
            </div>
            <div class="cxacao">
                <label>AÇÃO DA VISITA: </label>
                <select name="acao_visita" required>
                    <option value="" disabled selected hidden>Selecione a ação da visita.</option>

                    <option value="2">NÃO LOCALIZADO</option>
                    <option value="3">FALECIMENTO DO RESPONSÁVEL FAMILIAR</option>
                    <option value="4">A FAMÍLIA RECUSOU ATUALIZAR</option>
                </select>
                </label>
            </div>
            <div class="parecer">
                <div class="tituloparecer">
                    <label for="message" class="tituloparecer">PARECER TÉCNICO:</label>
                </div>      
                <textarea rows="7" name="parecer" placeholder="Faça um breve resumo de como foi a visita."></textarea>
            </div>
            <div class="btn">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
</body>

</html>