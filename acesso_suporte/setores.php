<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../cadunico/img/logo.png">
    <link rel="stylesheet" href="../cadunico/css/style-cadast-setores.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../cadunico/js/cpfvalid.js"></script>

    <script>

        // Função para preencher o CPF no campo após a busca
        function preencheCPF(cpf){
            $("#cpf").val(cpf);
        }
        </script>


    <title>Cadastro de setores</title>
</head>
<body>
<div class="img">
    <h1 class="titulo-com-imagem">
        <img class="titulo-com-imagem" src="../cadunico/img/h1-setores.svg" alt="Titulocomimagem">
    </h1>
</div>
<div class="container">
    <div class="cpf">
        <form method="post" action="controller/salva_setor.php">
            <label>CPF da Coordenação: </label>
            <input type="text" name="cpf_coord" onblur="validarCPF(this)" maxlength="14" id="cpf" placeholder="Usar enter após digitar." required>
            <p id="nomeCoordenador"></p>

    </div>
    <div class="bloco1">
        <label>Nome do Responsável: </label>
        <input type="text" name="nome_coord_resp" placeholder="Nome completo do coordenador" required>

        <label>INSTITUIÇÃO: </label>
        <input type="text" name="instituicao" placeholder="Segmento." required>

        <label>NOME DA INSTITUIÇÃO: </label>
        <input type="text" name="nome_instit" placeholder="Digite o nome da instituição." required>
    </div>
    <div class="bloco2">
        <label>Logradouro: </label>
        <input type="text" name="rua" placeholder="Rua, Avenida, Rodovia." required>
        <label>Número: </label>
        <input type="text" name="num" required>
        <label>Bairro: </label>
        <input type="text" name="bairro" required>
    </div>
    <div class="bloco3">
        <label>Código Contrato: </label>
        <input type="text" name="cod_contrato" required>
        <label>Código Institucional: </label>
        <input type="text" name="cod_instit " placeholder="Caso tenha..">
    </div>
    <div class="bloco4">
        <label>Contato: </label>
        <input type="text" name="contato" placeholder="Apenas números." required>
        <label>E-mail Institucional: </label>
        <input type="email" name="emailInstit" required>
    </div>
    <div class="btn">
        <button type="submit">SALVAR</button>

        <a href="index.php">
        <i class="fas fa-arrow-left"></i> Voltar ao menu
        </a>
    </div>
    </div>
        </form>
</div>
    <script src="../cadunico/js/cpfvalid.js"></script>
    <script src="../cadunico/js/personalise.js"></script>
    <script src='../controller/back.js'></script>
</body>

</html>
<div class="btns">
    <a onclick="goBack()">
    <i class="fas fa-arrow-left"></i> Voltar ao menu
    </a>
</div>

    <script src='../controller/back.js'></script>
