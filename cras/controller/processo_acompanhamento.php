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

$setor_form = $_POST['setor'];
$nis_pessoa = $_SESSION['nis'];
$nome_pessoa = $_SESSION['nome'];
$cpf_formatado = $_SESSION['cpf'];
$qtd = $_SESSION['qtd_pessoa'];
$mae_pessoa = $_SESSION['nome_mae'];
$setor = "";

if ($setor_form === "COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA") {
    echo "FAMÍLIA está sendo ENCAMINHADA PARA <b>" . $setor_form . "</b>";
    echo "<br>Quantidade de pessoas na família: <b>" . $qtd . "</b>";

    ?>
        <form>
        <input type="hidden" name="setor_form" value="<?php echo htmlspecialchars($setor_form); ?>">
    <div class="bloco1">
        <div class="lab"><label>Parecer técnico: </label></div>
        <textarea id="" name="texto_parecer" required  oninput="ajustarTextarea(this)"></textarea>
    </div>
    <label>Itens concedidos:</label>
    <input class='inpu' type='text' name='itens_conc' placeholder='Descreva o que está sendo concedido a família'>

    <label>Quantidade de marmita: </label>
    <input class='inpu' type='text' name='qtd_itens' placeholder='quantas'>



    <button type="submit">Enviar</button>
</form>
<?php
    if(!isset($_GET['texto_parecer'])){

    }else{

        $texto_parecer = $_GET['texto_parecer'];
        $itens_conc = $_GET['itens_conc'];
        $qtd_itens = $_GET['qtd_itens'];
        $setor_form = $_GET['setor_form'];

        
//salvamento dos dados em histórico CRAS
$smtp = $conn->prepare("INSERT INTO cras_historico (num_parecer_hist, nis, nome, cpf, quant_pessoa, text_parecer, remetent, destino, cod_familia, itens_concedido, data_registro) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
// Verifica se a preparação foi bem-sucedida
if ($smtp === false) {
    die('Erro na preparação SQL: ' . $conn->error);
}
$smtp->bind_param("sssssssssss", $num_ano, $nis_pessoa, $nome_pessoa, $cpf_formatado, $qtd, $texto_parecer, $setor, $setor_form, $ano, $itens_conc, $data_formatada_at);

//salvamento dos dados em histórico CRAS
$stpt = $conn->prepare("INSERT INTO fluxo_diario_coz (nis_benef, num_doc, nome, cpf_benef, encaminhado_cras, qtd_pessoa, qtd_marmita) VALUES (?,?,?,?,?,?,?)");
// Verifica se a preparação foi bem-sucedida
    if ($stpt === false) {
        die('Erro na preparação SQL: ' . $conn->error);
    }
$stpt->bind_param("sssssss", $nis_pessoa, $num_ano, $nome_pessoa, $cpf_formatado, $setor, $qtd, $qtd_itens);

    if ($stpt->execute()) {
        echo "<br><br><br>Encaminhado para Cozinha Comunitária.";
    } else {
        echo "nada";
    }


if ($smtp->execute()) {
    echo "";
} else {
    echo "nada";
}
}
}