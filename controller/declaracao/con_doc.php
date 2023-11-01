<!DOCTYPE html>
<html lang="pt-br">

<head>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-image: url('../../img/marca.png');
        background-size: cover;
    }

    select {
        width: auto;
        /* Define a largura para automática */
    }

    /* Seu estilo adicional aqui */

    #form-container {
        width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: rgba(255, 255, 255, 0.9);
        /* Adicione um fundo branco semitransparente ao formulário */
    }

    #title {
        font-size: 26px;
        font-weight: bold;
        text-align: center;
    }

    #subtitle {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin-top: 10px;
    }

    #form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-top: 10px;
        font-weight: bold;
    }

    select,
    input,
    textarea {
        width: 100%;
        padding: 5px;
        margin-top: 5px;
    }

    textarea {
        height: 100px;
    }

    #right-align {
        font-size: 20px;
        text-align: right;
    }

    .signature-line {
        margin-top: 20px;
        font-size: 20px;
        text-align: center;
    }

    #justified-text {
        text-align: justify;
        font-size: 20px;
        text-indent: 50px;
        margin-top: 20px;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../../img/icon.png">
    <title>documento oficial do cadastro único - são bento do una</title>
</head>

<body>
    <br><br><br><br><br><br>
    <div id="title">DECLARAÇÃO DO CADASTRO UNICO PARA PROGRAMAS DO GOVERNO FEDERAL</div>

    <?php

ini_set('memory_limit', '256M');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

include "../../config/conexao.php";

//data criada com formato 'DD de mmmm de YYYY'
$timestampptbr = time();
$data_formatada_at = strftime('%d de %B de %Y', $timestampptbr);

//receber os dados do formulário
$dados_post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if (isset($_POST['btn-ip1'])) {

    session_start();

    if (isset($_SESSION['dados_conferidos'])) {

        $dados_conferidos = $_SESSION['dados_conferidos'];
        $cpf_formatado = $dados_conferidos['cpf_formatado'];
        $nis_responsavel_formatado = $dados_conferidos['nis_responsavel_formatado'];
        $cod_familiar_formatado = $dados_conferidos['cod_familiar_formatado'];
        $nom_pessoa = $dados_conferidos['nom_pessoa'];
        $sexo = $dados_conferidos['sexo'];
        $nom_pessoa = $dados_conferidos['nom_pessoa'];
        $sexoo = $dados_conferidos['sexoo'];
        $nom_mae_rf = $dados_conferidos['nom_mae_rf'];
        $status_cadastro = $dados_conferidos['status_cadastro'];
        $real_br_formatado = $dados_conferidos['real_br_formatado'];
        $sexooo = $dados_conferidos['sexooo'];
        $perfil = $dados_conferidos['perfil'];
        $recebendo = $dados_conferidos['recebendo'];

        ?>
    <form id="form">
        <br><br><br><br><br><br>
        <div id="justified-text">
            <p>Para os devidos fins, confirmo que <?php echo $sexo; ?> <?php echo $nom_pessoa; ?>, CPF:
                <?php echo $cpf_formatado; ?>, <?php echo $sexoo; ?> <?php echo $nom_mae_rf; ?>, está
                <?php echo $sexooo; ?> no Cadastro Único para Programas do Governo Federal.
                <?php echo $status_cadastro; ?>, com uma renda per capita de R$
                <?php echo $real_br_formatado; ?>. <?php echo $perfil; ?> <?php echo $recebendo; ?>.</p>
        </div><br><br><br><br>
        <div id="right-align">São Bento do Una - PE, <?php echo $data_formatada_at; ?>.</div>
        <br><br><br><br>
        <div class="signature-line">___________________________________________________________<br>DIEGO EMMANUEL
            CADETE<br><span style="font-size:16px">Coord. Cadastro Único e Prog. Bolsa Família</span><br><span
                style="font-size:16px">Mat.: 108026</span></div><br>
        <div class="signature-line"></div><br>

    </form>
    <?php
} else {
        echo "ERRO no armazenamento dos dados.";
    }

    ?>
    <script>
    setTimeout(function() {
        window.location.href = "../../views/declaracao_prefeitura.html";
    }, 500);
    </script>
    <script>
    window.onload = function() {
        window.print();
    };
    </script>
<?php
} elseif (isset($_POST['btn-ip2'])) {
    session_start();

    if (isset($_SESSION['dados_conferidos'])) {

        $dados_conferidos = $_SESSION['dados_conferidos'];
        $cpf_formatado = $dados_conferidos['cpf_formatado'];
        $nis_responsavel_formatado = $dados_conferidos['nis_responsavel_formatado'];
        $cod_familiar_formatado = $dados_conferidos['cod_familiar_formatado'];
        $nom_pessoa = $dados_conferidos['nom_pessoa'];
        $sexo = $dados_conferidos['sexo'];
        $nom_pessoa = $dados_conferidos['nom_pessoa'];
        $sexoo = $dados_conferidos['sexoo'];
        $nom_mae_rf = $dados_conferidos['nom_mae_rf'];
        $status_cadastro = $dados_conferidos['status_cadastro'];
        $real_br_formatado = $dados_conferidos['real_br_formatado'];
        $sexooo = $dados_conferidos['sexooo'];
        $perfil = $dados_conferidos['perfil'];

        ?>
    <form id="form">
        <br><br><br><br><br><br>
        <div id="justified-text">
            <p>Para os devidos fins, confirmo que <?php echo $sexo; ?> <?php echo $nom_pessoa; ?>, CPF:
                <?php echo $cpf_formatado; ?>, <?php echo $sexoo; ?> <?php echo $nom_mae_rf; ?>, está
                <?php echo $sexooo; ?> no Cadastro Único para Programas do Governo Federal.
                <?php echo $status_cadastro; ?>, com uma renda per capita de R$
                <?php echo $real_br_formatado; ?>. <?php echo $perfil; ?>.</p>
        </div><br><br><br><br>
        <div id="right-align">São Bento do Una - PE, <?php echo $data_formatada_at; ?>.</div>
        <br><br><br><br>
        <div class="signature-line">___________________________________________________________<br>DIEGO EMMANUEL
            CADETE<br><span style="font-size:16px">Coord. Cadastro Único e Prog. Bolsa Família</span><br><span
                style="font-size:16px">Mat.: 108026</span></div><br>
        <div class="signature-line"></div><br>

    </form>
    <?php
} else {
        echo "ERRO no armazenamento dos dados.";
    }

    ?>
    <script>
    setTimeout(function() {
        window.location.href = "../../views/declaracao_prefeitura.html";
    }, 500);
    </script>
    <script>
    window.onload = function() {
        window.print();
    };
    </script>
<?php
} elseif (isset($_POST['btn-ip3'])) {
    session_start();

    if (isset($_SESSION['dados_conferidos'])) {

        $dados_conferidos = $_SESSION['dados_conferidos'];
        $cpf_formatado = $dados_conferidos['cpf_formatado'];
        $nis_responsavel_formatado = $dados_conferidos['nis_responsavel_formatado'];
        $cod_familiar_formatado = $dados_conferidos['cod_familiar_formatado'];
        $nom_pessoa = $dados_conferidos['nom_pessoa'];
        $sexo = $dados_conferidos['sexo'];
        $nom_pessoa = $dados_conferidos['nom_pessoa'];
        $sexoo = $dados_conferidos['sexoo'];
        $nom_mae_rf = $dados_conferidos['nom_mae_rf'];
        $status_cadastro = $dados_conferidos['status_cadastro'];
        $real_br_formatado = $dados_conferidos['real_br_formatado'];
        $sexooo = $dados_conferidos['sexooo'];
        $perfil = $dados_conferidos['perfil'];

        ?>
    <form id="form">
        <br><br><br><br><br><br>
        <div id="justified-text">
            <p>Para os devidos fins, confirmo que <?php echo $sexo; ?> <?php echo $nom_pessoa; ?>, CPF:
                <?php echo $cpf_formatado; ?>, <?php echo $sexoo; ?> <?php echo $nom_mae_rf; ?>, está
                <?php echo $sexooo; ?> no Cadastro Único para Programas do Governo Federal.
                <?php echo $status_cadastro; ?>, com uma renda per capita de R$
                <?php echo $real_br_formatado; ?>. <?php echo $perfil; ?>.</p>
        </div><br><br><br><br>
        <div id="right-align">São Bento do Una - PE, <?php echo $data_formatada_at; ?>.</div>
        <br><br><br><br>
        <div class="signature-line">___________________________________________________________<br>DIEGO EMMANUEL
            CADETE<br><span style="font-size:16px">Coord. Cadastro Único e Prog. Bolsa Família</span><br><span
                style="font-size:16px">Mat.: 108026</span></div><br>
        <div class="signature-line"></div><br>

    </form>
    <?php
} else {
        echo "ERRO no armazenamento dos dados.";
    }

    ?>
    <script>
    setTimeout(function() {
        window.location.href = "../../views/declaracao_prefeitura.html";
    }, 5000);
    </script>
    <script>
    window.onload = function() {
        window.print();
    };
    </script>
<?php
} elseif (isset($_POST['btn-ip4'])) {
    session_start();

    if (isset($_SESSION['dados_conferidos'])) {

        $dados_conferidos = $_SESSION['dados_conferidos'];
        $cpf_formatado = $dados_conferidos['cpf_formatado'];
        $nis_responsavel_formatado = $dados_conferidos['nis_responsavel_formatado'];
        $cod_familiar_formatado = $dados_conferidos['cod_familiar_formatado'];
        $nom_pessoa = $dados_conferidos['nom_pessoa'];
        $sexo = $dados_conferidos['sexo'];
        $nom_pessoa = $dados_conferidos['nom_pessoa'];
        $sexoo = $dados_conferidos['sexoo'];
        $nom_mae_rf = $dados_conferidos['nom_mae_rf'];
        $status_cadastro = $dados_conferidos['status_cadastro'];
        $real_br_formatado = $dados_conferidos['real_br_formatado'];
        $sexooo = $dados_conferidos['sexooo'];
        $perfil = $dados_conferidos['perfil'];

        ?>
    <form id="form">
        <br><br><br><br><br><br>
        <div id="justified-text">
            <p>Para os devidos fins, confirmo que <?php echo $sexo; ?> <?php echo $nom_pessoa; ?>, CPF:
                <?php echo $cpf_formatado; ?>, <?php echo $sexoo; ?> <?php echo $nom_mae_rf; ?>, está
                <?php echo $sexooo; ?> no Cadastro Único para Programas do Governo Federal.
                <?php echo $status_cadastro; ?>, com uma renda per capita de R$
                <?php echo $real_br_formatado; ?>. <?php echo $perfil; ?>.</p>
        </div><br><br><br><br>
        <div id="right-align">São Bento do Una - PE, <?php echo $data_formatada_at; ?>.</div>
        <br><br><br><br>
        <div class="signature-line">___________________________________________________________<br>DIEGO EMMANUEL
            CADETE<br><span style="font-size:16px">Coord. Cadastro Único e Prog. Bolsa Família</span><br><span
                style="font-size:16px">Mat.: 108026</span></div><br>
        <div class="signature-line"></div><br>

    </form>
    <?php

    } else {
        echo "ERRO no armazenamento dos dados.";
    }

    ?>
    <script>
    setTimeout(function() {
        window.location.href = "../../views/declaracao_prefeitura.html";
    }, 5000);
    </script>
    <script>
    window.onload = function() {
        window.print();
    };
    </script>
<?php
} elseif (isset($_POST['btn-ip5'])) {
    ?>
    <form id="form">
    <?php
$nome_dec = $_POST['nome_dec'];
    $gender = $_POST['gender'];
    $nome_mae_dec = $_POST['nome_mae_dec'];

    session_start();

    if (isset($_SESSION['dados_conferidos_s'])) {

        $dados_conferidos = $_SESSION['dados_conferidos_s'];
        $cpf_dec = $dados_conferidos['cpf_dec'];
        if ($gender == "male") {
            $sexo = "o Sr.";
        } else {
            $sexo = "a Sra.";
        }
        if ($gender == "male") {
            $sexoo = "filho";
        } else {
            $sexoo = "filha";
        }
        if ($gender == "male") {
            $sexooo = "inscrito";
        } else {
            $sexooo = "inscrita";
        }
        $cpf_formatando = sprintf('%011s', $cpf_dec);
        $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);

        ?>

        <br><br><br><br><br><br>
        <div id="justified-text">
            <p>Para os devidos fins, confirmo que <?php echo $sexo; ?> <?php echo $nome_dec; ?>, CPF:
                <?php echo $cpf_formatado; ?>, <?php echo $sexoo; ?> de <?php echo $nome_mae_dec; ?>, não está
                <?php echo $sexooo; ?> no Cadastro Único para Programas do Governo Federal.</p>
        </div><br><br><br><br>
        <div id="right-align">São Bento do Una - PE, <?php echo $data_formatada_at; ?>.</div>
        <br><br><br><br>
        <div class="signature-line">___________________________________________________________<br>DIEGO EMMANUEL
            CADETE<br><span style="font-size:16px">Coord. Cadastro Único e Prog. Bolsa Família</span><br><span
                style="font-size:16px">Mat.: 108026</span></div><br>
        <div class="signature-line"></div><br>

    </form>
    <script>
    setTimeout(function() {
        window.location.href = "../../views/declaracao_prefeitura.html";
    }, 500);
    </script>
    <script>
    window.onload = function() {
        window.print();
    };
    </script>
    <?php
} else {
        echo "ERRO no armazenamento dos dados.";
    }

}
?>
</body>
</html>