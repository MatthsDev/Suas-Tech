<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acompanhamento</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style-processo-acomp.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body>
    <h1 class="titulo-com-imagem">
        <img class="titulo-com-imagem" src="../img/h1-acompanhamento.svg" alt="Titulocomimagem">
    </h1>
    <div class="container">
        <?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//data criada com formato 'DD de mmmm de YYYY'
$timestampptbr = time();
$data_formatada_at = strftime('%d de %B de %Y', $timestampptbr);

// Consulta SQL para contar os registros
$sqlr = "SELECT COUNT(*) as total_registros FROM cras_historico";
$result = $pdo->query($sqlr);
$row = $result->fetch(PDO::FETCH_ASSOC);
$totalRegistros = $row['total_registros'];
$numero_parecer = $totalRegistros + 1;
$ano = date('Y');
$num_ano = $numero_parecer . "/" . $ano;

$setor_form = $_SESSION['predio'];
$qtd = $_SESSION['qtd_pessoa'];
$nis_pessoa = $_SESSION['nis'];
$nome_pessoa = $_SESSION['nome'];
$cpf = $_SESSION['cpf'];
$gpte = $_SESSION['priori'];

if ($setor_form == 'COZINHA COMUNITÁRIA - NEUMA MARIA DA SILVA') {
    echo "FAMÍLIA está sendo ENCAMINHADA PARA <b>" . $setor_form . "</b>";
    echo "<br>Quantidade de pessoas na família: <b>" . $qtd . "</b>";
    ?>

            <form>
                <div class="bloco">
                    <div class="bloco1">
                        <div class="lab"><label>Observação: </label></div>
                        <textarea id="" name="texto_parecer" required oninput="ajustarTextarea(this)"></textarea>
                    </div>
                    <div class="bloco11">
                        <label class="urg">
                            Encaminhado com urgência:
                            <input type="checkbox" name="prioridade">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="bloco">
                    <div class="bloco1">
                        <label>Itens concedidos:</label>
                        <input class='inpu' type='text' name='itens_conc' placeholder='Descreva o que está sendo concedido a família'>
                    </div>
                    <div class="bloco1">
                        <label>Quantidade de marmita: </label>
                        <input type='text' name='qtd_itens' placeholder='Digitar Números'>
                    </div>
                    <div class="bloco1">
                        <label>Periodo de acompanhamento: </label>
                        <input type='date' name='data_periodo' placeholder='quantas'>
                    </div>
                </div>
                <div class="bloco">
                    <button type="submit">Enviar</button>
                </div>
            </form>

        <?php
if (!isset($_GET['texto_parecer'])) {
    } else {

        $texto_parecer = $_GET['texto_parecer'];
        $itens_conc = $_GET['itens_conc'];
        $qtd_itens = $_GET['qtd_itens'];
        $data_periodo = $_GET['data_periodo'];

        //preparando as prioridades
        if (isset($_GET['prioridade'])) {
            $priori = 1;
        }elseif($gpte == 2){
            $priori = 2;
        }else{
            $priori = 3;
        }
        $nao = "não";

        //salvamento dos dados em histórico CRAS
        $smtp = $conn->prepare("INSERT INTO cras_historico (num_parecer_hist, nis, nome, cpf, quant_pessoa, text_parecer, remetent, destino, itens_concedido, data_registro) VALUES (?,?,?,?,?,?,?,?,?,?)");
        // Verifica se a preparação foi bem-sucedida
        if ($smtp === false) {
            die('Erro na preparação SQL: ' . $conn->error);
        }
        $smtp->bind_param("ssssssssss", $num_ano, $nis_pessoa, $nome_pessoa, $cpf, $qtd, $texto_parecer, $setor, $setor_form, $itens_conc, $data_formatada_at);

        //salvamento dos dados ao FLUXO DA COZINHA
        $stpt = $conn->prepare("INSERT INTO fluxo_diario_coz (nis_benef, num_doc, nome, cpf_benef, encaminhado_cras, qtd_pessoa, qtd_marmita, entregue, prioridade) VALUES (?,?,?,?,?,?,?,?,?)");
        // Verifica se a preparação foi bem-sucedida
        if ($stpt === false) {
            die('Erro na preparação SQL: ' . $conn->error);
        }
        $stpt->bind_param("sssssssss", $nis_pessoa, $num_ano, $nome_pessoa, $cpf, $setor, $qtd, $qtd_itens, $nao, $priori);

        if ($stpt->execute() && $smtp->execute()) {
            echo '<script>alert("Salvo e encaminhado com sucesso!"); window.location.href = "../views/acompanhamento.php";</script>';
        } else {
            echo "Não salvou" . $stpt->error;
        }
        $stpt->close();
        $smtp->close();
        $conn->close();
    }
} else {
    echo '<script>alert("SISTEMA EM DESENVOLVIMENTO, NESTE MOMENTO SÓ ENCAMINHAMENTO PARA COZINHA!"); window.location.href = "../views/acompanhamento.php";</script>';
}
?>
        <script>
            function ajustarTextarea(textarea) {
                textarea.style.height = 'auto';
                textarea.style.height = textarea.scrollHeight + 'px';
            }
        </script>
    </div>
</body>

</html>