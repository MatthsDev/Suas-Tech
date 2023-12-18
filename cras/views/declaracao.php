<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styledec.css">
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Declarações</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="../js/cpfvalid.js"></script>
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img src="../img/h1-encaminhamento.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <form method="post" action="../controller/print_enc_cras.php">
            <h2>Informe o CPF ou NIS do usuário</h2>
            <div class="bloco1">
                <select name="buscar_dados" id="buscar_dados" onchange="selecionarTipoInput()" required>
                    <option value="cpf_dec">CPF:</option>
                    <option value="nis_dec">NIS:</option>
                </select>

                <div id="inputCPF">
                    <input type="text" name="valorescolhido_cpf" id="cpf" placeholder="Digite o CPF:" onblur="validarCPF(this)">
                </div>

                <div id="inputNIS" class="hidden">
                    <input type="text" name="valorescolhido_nis" placeholder="Digite o NIS:">
                </div>

                <a onclick="goBack()">
                    <i class="fas fa-arrow-left"></i> Voltar ao menu
                </a>
            </div>

            <div class="bloco">
                <label>Encaminhar para: </label>
                <select name="setor" required>
                    <option value="" disabled selected hidden>Selecione</option>
                    <?php

                    $consultaSetores = $conn->query("SELECT instituicao, nome_instit FROM setores");

                    // Verifica se há resultados na consulta
                    if ($consultaSetores->num_rows > 0) {

                        // Loop para criar as opções do select
                        while ($setor = $consultaSetores->fetch_assoc()) {
                            echo '<option value="' . $setor['instituicao'] . ' - ' . $setor['nome_instit'] . '">' . $setor['instituicao'] . ' - ' . $setor['nome_instit'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="bloco">
                <label>Parecer: </label>
                    <textarea id="" name="texto" required oninput="ajustarTextarea(this)"></textarea>
                <button type="submit">ENVIAR</button>
            </div>
        </form>
    </div>


    <script>
        function selecionarTipoInput() {
            var select = document.getElementById("buscar_dados");
            var inputCPF = document.getElementById("inputCPF");
            var inputNIS = document.getElementById("inputNIS");

            if (select.value === "cpf_dec") {
                inputCPF.style.display = "block";
                inputCPF.querySelector('input').removeAttribute('disabled');
                inputNIS.style.display = "none";
                inputNIS.querySelector('input').setAttribute('disabled', 'disabled');
            } else if (select.value === "nis_dec") {
                inputNIS.style.display = "block";
                inputNIS.querySelector('input').removeAttribute('disabled');
                inputCPF.style.display = "none";
                inputCPF.querySelector('input').setAttribute('disabled', 'disabled');
            }
        }

        function ajustarTextarea(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }
    </script>
    <script>
        function ajustarTextarea(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }
    </script>
    <script src='../../controller/back.js'></script>
</body>


</html>