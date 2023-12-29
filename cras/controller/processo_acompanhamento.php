<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

//include_once '../../cozinha_comunitaria/controller/tbl_fluxo.php';
// Execute a query para somar os valores da coluna
$sql_soma = "SELECT SUM(qtd_marmita) as soma_total FROM fluxo_diario_coz";
$sqli_soma = "SELECT SUM(marm_entregue) as soma_total FROM fluxo_diario_coz";

$resultado_soma = $conn->query($sql_soma);
$resultado2_soma = $conn->query($sqli_soma);

if ($resultado_soma && $resultado2_soma) {
    $soma_total = $resultado_soma->fetch_assoc()['soma_total'];
    if ($soma_total <= 0) {
        $sum_all = 0;
    } else {
        $sum_all = $soma_total;
    }
    $soma2_total = $resultado2_soma->fetch_assoc()['soma_total'];
    $faltando = $soma_total - $soma2_total;

} else {
    echo "Erro ao calcular a soma: " . $conn->error;
}

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
?>
<!DOCTYPE html>
<html lang="pt-br">

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
if ($setor_form == 'COZINHA COMUNITARIA - MARIA NEUMA DA SILVA') {
    echo "FAMÍLIA de <u>". $nome_pessoa . "</u> está sendo ENCAMINHADA PARA: <b>" . $setor_form . "</b>";
    echo "<br>Quantidade de pessoas na família: <b>" . $qtd . "</b>";
        ?>

            <form method="POST">
                <div class="bloco">
                    <div class="bloco1">
                        <div class="lab"><label>Observação: </label></div>
                        <textarea id="" name="texto_parecer" required oninput="ajustarTextarea(this)"></textarea>
                    </div>
                    <div class="bloco11">
                        <label class="urg">
                            Encaminhar com urgência:
                            <input type="checkbox" name="prioridade">
                            <span class="checkmark"></span>
                        </label>
                    </div>
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
if (!isset($_POST['texto_parecer'])) {
    } else {
        if ($soma_total <= 200) {

            $texto_parecer = $_POST['texto_parecer'];

            $qtd_itens = $_POST['qtd_itens'];
            $data_periodo = $_POST['data_periodo'];

            //preparando as prioridades
            if (isset($_POST['prioridade'])) {
                $priori = 1;
            } elseif ($gpte == 2) {
                $priori = 2;
            } else {
                $priori = 3;
            }
            $nao = "não";

            //salvamento dos dados em histórico CRAS
            $smtp = $conn->prepare("INSERT INTO cras_historico (num_parecer_hist, nis, nome, cpf, quant_pessoa, text_parecer, remetent, destino, data_registro) VALUES (?,?,?,?,?,?,?,?,?)");
            // Verifica se a preparação foi bem-sucedida
            if ($smtp === false) {
                die('Erro na preparação SQL: ' . $conn->error);
            }
            $smtp->bind_param("sssssssss", $num_ano, $nis_pessoa, $nome_pessoa, $cpf, $qtd, $texto_parecer, $setor, $setor_form, $data_formatada_at);

            //salvamento dos dados ao FLUXO DA COZINHA
            $stpt = $conn->prepare("INSERT INTO fluxo_diario_coz (nis_benef, num_doc, nome, cpf_benef, encaminhado_cras, qtd_pessoa, qtd_marmita, entregue, prioridade, data_limite) VALUES (?,?,?,?,?,?,?,?,?,?)");
            // Verifica se a preparação foi bem-sucedida
            if ($stpt === false) {
                die('Erro na preparação SQL: ' . $conn->error);
            }
            $stpt->bind_param("ssssssssss", $nis_pessoa, $num_ano, $nome_pessoa, $cpf, $setor, $qtd, $qtd_itens, $nao, $priori, $data_periodo);

            if ($stpt->execute() && $smtp->execute()) {
                echo '<script>alert("Salvo e encaminhado com sucesso!"); window.location.href = "../views/acompanhamento.php";</script>';
            } else {
                echo "Não salvou" . $stpt->error;
            }
            $stpt->close();
            $smtp->close();
            $conn->close();
        } else {
            $texto_parecer = $_POST['texto_parecer'];
            $qtd_itens = $_POST['qtd_itens'];
            $data_periodo = $_POST['data_periodo'];

            //preparando as prioridades
            if (isset($_POST['prioridade'])) {
                $priori = 1;
            } elseif ($gpte == 2) {
                $priori = 2;
            } else {
                $priori = 3;
            }
            $nao = "não";

            //salvamento dos dados em histórico CRAS
            $smtp = $conn->prepare("INSERT INTO cras_historico (num_parecer_hist, nis, nome, cpf, quant_pessoa, text_parecer, remetent, destino, data_registro) VALUES (?,?,?,?,?,?,?,?,?)");
            // Verifica se a preparação foi bem-sucedida
            if ($smtp === false) {
                die('Erro na preparação SQL: ' . $conn->error);
            }
            $smtp->bind_param("sssssssss", $num_ano, $nis_pessoa, $nome_pessoa, $cpf, $qtd, $texto_parecer, $setor, $setor_form, $data_formatada_at);

            //salvamento dos dados ao FLUXO DA COZINHA
            $stpt = $conn->prepare("INSERT INTO fila_cozinha (nis_benef, num_doc, nome, cpf_benef, encaminhado_cras, qtd_pessoa, qtd_marmita, entregue, prioridade) VALUES (?,?,?,?,?,?,?,?,?)");
            // Verifica se a preparação foi bem-sucedida
            if ($stpt === false) {
                die('Erro na preparação SQL: ' . $conn->error);
            }
            $stpt->bind_param("sssssssss", $nis_pessoa, $num_ano, $nome_pessoa, $cpf, $setor, $qtd, $qtd_itens, $nao, $priori);

            if ($stpt->execute() && $smtp->execute()) {
                if ($setor == "CREAS - GILDO SOARES") {
                echo '<script>alert("Salvo e encaminhado com sucesso! Essa família está na fila de espera."); window.location.href = "../../creas/views/acompanhamento.php";</script>';
                }else{
                echo '<script>alert("Salvo e encaminhado com sucesso! Essa família está na fila de espera."); window.location.href = "../views/acompanhamento.php";</script>';
                }
            } else {
                echo "Não salvou" . $stpt->error;
            }
            $stpt->close();
            $smtp->close();
            $conn->close();
        }
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