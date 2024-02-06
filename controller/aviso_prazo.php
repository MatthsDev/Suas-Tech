<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

$data_corrente = date('Y-m-d');
$table_fluxo = $pdo->prepare('SELECT * FROM fluxo_diario_coz');
$table_fluxo->execute();
if ($table_fluxo) {
    $dados_table_fluxo = $table_fluxo->fetchAll(PDO::FETCH_ASSOC);
    ?>

                <?php
$exibir_aviso_prazo = '';
$exibir_aviso_faltas = '';
    foreach ($dados_table_fluxo as $linhas) {
        if ($linhas['data_limite'] <= $data_corrente && $linhas['encaminhado_cras'] == $setor) {
            $exibir_aviso_prazo = true;
            break;
        }
    }
    foreach ($dados_table_fluxo as $linhas) {
        if ($linhas['limiter'] >= 3) {
            $exibir_aviso_faltas = true;
            break;
        }
    }
    if ($exibir_aviso_prazo) {
        ?>
        <p>Há famílias com o prazo limite atingido na Cozinha Comunitária. <a class="veja" href='/Suas-Tech/controller/conexao_table.php'>Veja aqui</a></p>
        <?php
} else {
        echo '';
    }

    if ($exibir_aviso_faltas) {
        ?>
        <p>Famílias com 3 faltas consecutivas. <a class="veja" href='/Suas-Tech/controller/conexao_table.php'>Veja aqui</a></p>
        <?php
} else {
        echo 'Sem notificações';
    }
}
?>