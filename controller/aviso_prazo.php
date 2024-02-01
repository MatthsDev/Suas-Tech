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
                $exibir_aviso = '';
foreach ($dados_table_fluxo as $linhas) {
        if ($linhas['data_limite'] <= $data_corrente && $linhas['encaminhado_cras'] == $setor) {
            $exibir_aviso = true;
            break;
        }
    }
    if ($exibir_aviso) {
        ?>
        <p>Há pessoas com o prazo limite atingido na Cozinha Comunitária. <a class="veja" href='/Suas-Tech/controller/conexao_table.php'>Veja aqui</a></p>
        <?php
    } else {
        echo 'Sem notificações';
    }
}
?>