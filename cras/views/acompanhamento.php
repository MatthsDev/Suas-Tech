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
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-acompanhamento.svg" alt="Titulocomimagem">
        </h1>
    </div>

    <div class="container">
    <h2>Informe o CPF ou NIS do usuário</h2>
        <div class="bloco">
            <form method="" action="">
                <div class="bloco1">
                    <div class="bloco">
                        <select name="buscar_dados" id="buscar_dados" onchange="selecionarTipoInput()" required>
                        <option value="cpf_dec">CPF:</option>
                        <option value="nis_dec">NIS:</option>
                        </select>
                </div>
                    <div class="bloco">
                        <div id="inputCPF">
                            <input type="text" name="valorescolhido_cpf" id="cpf" placeholder="Digite o CPF:" onblur="validarCPF(this)">
                        </div>

                        <div id="inputNIS" class="hidden">
                            <input type="text" name="valorescolhido_nis" placeholder="Digite o NIS:">
                        </div>
                    </div>
                </div>
                <div class="bloco">
                    <label>Encaminhar para:</label>
                    <select name="predio" required>
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
                    <button type="submit">BUSCAR</button>
                    <a onclick="goBack()">
                        <i class="fas fa-arrow-left"></i> Voltar ao menu
                    </a>
                </div>

        </div>
        </form>
        <?php
if (!isset($_GET['buscar_dados'])) {
} else {
    if ($_GET['buscar_dados'] == 'cpf_dec') {
        $cpf = $_GET['valorescolhido_cpf'];

        $sql = $pdo->prepare("SELECT * FROM cras WHERE cpf = :valorescolhido");
        $sql->execute(array(':valorescolhido' => $cpf));

        $data_atual = date('d/m/Y H:i:s');

        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch(PDO::FETCH_ASSOC);

            //prioridades GPTE
            $indigena = $dados['cod_familia_indigena_fam'];
            $quilombola = $dados['ind_familia_quilombola_fam'];
            $sit_rua = $dados['morador_de_rua'];

            if($indigena == 1 || $quilombola == 1 || $sit_rua == 1){
                $prioridade = 2;
            }else{
                $prioridade = "";
            }
            //formata moeda
            $real_br_formatado = number_format($dados['renda_per'], 2, ',', '.');
            //formata data
            $dataFormatada = date("d/m/Y", strtotime($dados['data_nasc']));

            ?>
                    <form action="../controller/processo_acompanhamento.php">
                        <?php

            //Dados apresentados
            echo "NOME: " . $dados['nome'] . "<br>";
            echo "NIS: " . $dados['nis'] . "<br>";
            echo "DATA DE NASCIMENTO: " . $dataFormatada . "<br>";
            echo "ENDEREÇO: " . $dados['logradouro'] . ", " . $dados['numero'] . " - " . $dados['bairro'] . "<br>";
            echo "RENDA PER-CAPITA: R$ " . $real_br_formatado . "<br>";
            echo "NOME DE MÃE: " . $dados['nome_mae'] . "<br>";
            echo "NATURALIDADE: " . $dados['nat_pessoa'] . "<br>";
            echo "Quantidade de Pessoas: " . $dados['qtd_pessoa'];

            //sessão que passa as variáveis para outra tela
            $_SESSION['nis'] = $dados['nis'];
            $_SESSION['nome'] = $dados['nome'];
            $_SESSION['cpf'] = $cpf;
            $_SESSION['qtd_pessoa'] = $dados['qtd_pessoa'];
            $_SESSION['nome_mae'] = $dados['nome_mae'];
            $_SESSION['predio'] = $_GET['predio'];
            $_SESSION['priori'] = $prioridade;

            ?>
                        <div class="btn">
                            <button type="submit">ENVIAR</button>
                            <a href='/Suas-Tech/cras/views/editar_usuario.php'>Editar informações do usuário</a>
                        </div>
                        <hr>
    </div>

    </form>
<?php
} else {
            echo '<script>alert("Não foi localizado nenhum cadastro com esse CPF"); window.location.href = "acompanhamento.php";</script>';
        }
    } elseif ($_GET['buscar_dados'] == 'nis_dec') {
        echo "CALMA";
    }
}
?>
</div>

<script src='../../controller/back.js'></script>
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
</body>

</html>