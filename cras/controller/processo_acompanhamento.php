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

$setor_form = $_GET['predio'];
$qtd = $_SESSION['qtd_pessoa'];

if ($_GET['predio'] == 'COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA') {
    echo "FAMÍLIA está sendo ENCAMINHADA PARA <b>" . $setor_form . "</b>";
    echo "<br>Quantidade de pessoas na família: <b>" . $qtd . "</b>";
    ?>
            <form>
            <input type='hidden' name='setor_form' value='<?php echo htmlspecialchars($_GET['predio']); ?>'>
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

    if(!isset($_GET['setor_form'])){
        echo "";
    }else{
        echo "Vai salvar";
    }
} else {
    echo "Está dando erro";
}