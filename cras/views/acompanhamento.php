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
    <link rel="stylesheet" href="">
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/style-acompanhamento.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Acompanhamento</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../js/cpfvalid.js"></script>

</head>
<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-acompanhamento.svg"
                alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <div class="bloco">
            <form method="" action="">
                <h2>Informe o CPF ou NIS para buscar o usuário</h2>
                <select name="buscar_dados" required>
                    <option value="cpf_dec">CPF:</option>
                    <option value="nis_dec">NIS:</option>
                </select>

                <input type="text" name="valorescolhido" placeholder="Digite aqui:" required>
                <button type="submit">BUSCAR</button>
                <a onclick="goBack()">
                        <i class="fas fa-arrow-left"></i> Voltar ao menu
                </a>
            </form>
        </div>
                <?php
        if (!isset($_GET['buscar_dados'])) {

        } else {
            if ($_GET['buscar_dados'] == 'cpf_dec') {

                $cpf = $_GET['valorescolhido'];

                $cpf_formatando = sprintf('%011s', $cpf);
                $cpf_formatado = substr($cpf_formatando, 0, 3) . '.' . substr($cpf_formatando, 3, 3) . '.' . substr($cpf_formatando, 6, 3) . '-' . substr($cpf_formatando, 9, 2);

                $sql = $pdo->prepare("SELECT * FROM cras WHERE cpf = :valorescolhido");
                $sql->execute(array(':valorescolhido' => $cpf_formatado));

                $data_atual = date('d/m/Y H:i:s');

                if ($sql->rowCount() > 0) {
                    $dados = $sql->fetch(PDO::FETCH_ASSOC);
                    $real_br_formatado = number_format($dados['renda_per'], 2, ',', '.');
                    $dataFormatada = date("d/m/Y", strtotime($dados['data_nasc']));
                    ?>
                    <form method="POST" action="../controller/processo_acompanhamento.php">
                    <?php

                    //Dados apresentados
                    echo "NOME: " . $dados['nome'] . "<br>";
                    echo "NIS: " . $dados['nis'] . "<br>";
                    echo "DATA DE NASCIMENTO: " . $dataFormatada . "<br>";
                    echo "ENDEREÇO: " . $dados['logradouro'] . ", " . $dados['numero'] . " - " . $dados['bairro'] . "<br>";
                    echo "RENDA PER-CAPITA: R$ " . $real_br_formatado . "<br>";
                    echo "NOME DE MÃE: " . $dados['nome_mae'] . "<br>";
                    echo "NATURALIDADE: " . $dados['nat_pessoa'] . "<br>";
                    echo "DATA: " . $data_atual . "<br>";
                    echo "Quantidade de Pessoas: " . $dados['qtd_pessoa'];

                    //$smtp = $conn->prepare("INSERT INTO cras (num_parecer_hist, nis, nome, cpf, quant_pessoa, text_parecer, remetent, destino, cod_familia, itens_concedido, data_registro) VALUES (?,?,?,?,?,?,?,?,?,?, NOW())");


                    $_SESSION['nis'] = $dados['nis'];
                    $_SESSION['nome'] = $dados['nome'];
                    $_SESSION['cpf'] = $cpf_formatado;
                    $_SESSION['qtd_pessoa'] = $dados['qtd_pessoa'];
                    $_SESSION['nome_mae'] = $dados['nome_mae'];
                    
                    ?>
                    <div class="btn1">    
                        <button  type=" ">Editar informações do usuário</button>
                    </div>
                    <hr>
                    <div class="bloco1">
                            <div class="lab"><label>Parecer técnico: </label></div>
                            <textarea id="" name="texto_parecer" required  oninput="ajustarTextarea(this)"></textarea>
                    </div>
                    <div class="bloco">
                        <label>Encaminhar para:</label>
                        <select name="setor" required>
                        <option value="" disabled selected hidden>Selecione</option>
                    </div>    
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

            <label>Itens concedidos:</label>
            <input class="inpu" type="text" name="itens_conc" placeholder="Descreva o que está sendo concedido a família">
        </div>
                    <div class="btn">    
                        <button  type="submit">ENVIAR</button>
                    </div>

                </form>
                    <?php

                } else {
                    echo '<script>alert("Não foi localizado nenhum cadastro com esse CPF"); window.location.href = "acompanhamento.php";</script>';
                }

            } elseif ($_GET['buscar_dados'] == 'nis_dec') {

                $nis = $_GET['valorescolhido'];
                $sql = $pdo->prepare("SELECT * FROM cras WHERE nis = :valorescolhido");
                $sql->execute(array(':valorescolhido' => $nis));

                $data_atual = date('d/m/Y H:i:s');

                if ($sql->rowCount() > 0) {
                    $dados = $sql->fetch(PDO::FETCH_ASSOC);
                    $real_br_formatado = number_format($dados['renda_per'], 2, ',', '.');
                    $dataFormatada = date("d/m/Y", strtotime($dados['data_nasc']));

                    echo "NOME: " . $dados['nome'] . "<br>";
                    echo "NIS: " . $dados['nis'] . "<br>";
                    echo "DATA DE NASCIMENTO: " . $dataFormatada . "<br>";
                    echo "ENDEREÇO: " . $dados['logradouro'] . ", " . $dados['numero'] . " - " . $dados['bairro'] . "<br>";
                    echo "RENDA PER-CAPITA: R$ " . $real_br_formatado . "<br>";
                    echo "NOME DE MÃE: " . $dados['nome_mae'] . "<br>";
                    echo "NATURALIDADE: " . $dados['nat_pessoa'] . "<br>";
                    echo "DATA: " . $data_atual . "<br>";
                    echo "Quantidade de Pessoas: " . $dados['qtd_pessoa'];

                } else {
                    echo '<script>alert("Não foi localizado nenhum cadastro com esse CPF"); window.location.href = "acompanhamento.php";</script>';
                }
            }

        }

        ?>
    </div>
    <script>
    function ajustarTextarea(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
    }
</script>
<script src='../../controller/back.js'></script>
</body>
</html>