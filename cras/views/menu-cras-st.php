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
    <link rel="stylesheet" href="../css/style-menu.css">
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Cras Santo Afonso</title>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-cras-santo.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="apelido">
        <h3>Bem-vindo (a).
            <?php echo $apelido; ?>.
        </h3>
    </div>
    </div>
    <div class="container">
        <div class="menu">
            <nav>
                <div class="btn">
                    <a class="menu-button" onclick="location.href='cadastro_usuarios.php';">
                        <span class="material-symbols-outlined">
                            deployed_code_account
                        </span>
                        Cadastro de Usuários
                    </a>
                </div>
                <div class="btn">
                    <a class="menu-button" onclick="location.href='acompanhamento.php';">
                        <span class="material-symbols-outlined">
                            deployed_code_account
                        </span>
                        Acompanhamento de Usuários
                    </a>
                </div>
                <div class="btn">
                    <a class="menu-button" onclick="location.href='declaracao.php';">
                        <span class="material-symbols-outlined">
                            content_paste_go
                        </span>
                        Encaminhamento
                    </a>
                </div>
            </nav>
        </div>
        <div class="mural">
        <h4><span class="material-symbols-outlined">campaign</span>Mural de Avisos</h4>
            <?php
            $data_corrente = date('Y-m-d');
            $table_fluxo = $pdo->prepare('SELECT * FROM fluxo_diario_coz');
            $table_fluxo->execute();
            if ($table_fluxo) {
                $dados_table_fluxo = $table_fluxo->fetchAll(PDO::FETCH_ASSOC);
            ?>

                <?php
                foreach ($dados_table_fluxo as $linhas) {
                    if ($linhas['data_limite'] <= $data_corrente && $linhas['encaminhado_cras'] == $setor) {
                ?>
                        <p><?php echo $linhas['nome']; ?> está com prazo finalizado - Cozinha Comunitária. <a class="veja" href='/Suas-Tech/controller/conexao_table.php'>Veja aqui</a> </p>


            <?php
                    }
                }
            }
            ?>
        </div>
        <div class="drop-all">
            <div class="menu-drop">
                <button class="logout" type="button" name="drop">
                    <span class="material-symbols-outlined">
                        Settings
                    </span>
                    <div class="drop-content">
                        <a title="Sair" href='../../config/logout.php' ;>
                            <span title="Sair" class="material-symbols-outlined">logout</span>
                        </a>
                        <a title="Alterar Usuário" href='conta.php' ;>
                            <span class="material-symbols-outlined">manage_accounts</span>
                        </a>
                        <?php
                        if ($nivel == 'suport') {
                        ?> <a title="Suporte" href='/Suas-Tech/acesso_suporte/index.php' ;>
                                <span class="material-symbols-outlined">rule_settings</span>
                            </a> <?php
                                    exit();
                                }
                                    ?>
                    </div>
            </div>

            <?php
            if ($nivel == 'suport') {
            ?> <a href="../../acesso_suporte/index.php">SUPORTE</a> <?php
                                                                exit();
                                                            }
                                                                ?>


</body>

</html>