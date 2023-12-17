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

echo $data_formatada_at . "<br>";
echo $num_ano . "<br>";
if (isset($_POST['predio'])) {
    echo $_POST['predio'];

    if ($_POST['predio'] == "COZINHA COMUNITÁRIA - NEUZA MARIA DA SILVA") {
        ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type='hidden' name='setor_form' value='<?php echo htmlspecialchars($_POST['predio']); ?>'>
            <div class="bloco1">
                <div class="lab"><label>Parecer técnico: </label></div>
                <textarea id="" name="texto_parecer" required oninput="ajustarTextarea(this)"></textarea>
            </div>
            <label>Itens concedidos:</label>
            <input class='inpu' type='text' name='itens_conc' placeholder='Descreva o que está sendo concedido a família'>
            <label>Quantidade de marmita: </label>
            <input class='inpu' type='text' name='qtd_itens' placeholder='quantas'>
            <button type="submit">Enviar</button>
        </form>
        <?php
if (isset($_POST['setor_form'])) {
            // Processar os dados do formulário aqui
            echo $_POST['setor_form'] . "<br>";
            echo $_POST['texto_parecer'] . "<br>";
            echo $_POST['qtd_itens'] . "<br>";
            echo $_POST['itens_conc'] . "<br>";
        }
    }
} else {
    // Código que será executado inicialmente (antes de enviar o formulário)
}
?>
