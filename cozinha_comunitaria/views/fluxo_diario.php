<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

// Define o tempo de atualização em segundos
$tempo_atualizacao = 600;

// Cabeçalho HTTP para a atualização automática
header("refresh:$tempo_atualizacao;url=/Suas-Tech/cozinha_comunitaria/views/fluxo_diario.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link rel="website icon" type="png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/style-fluxo.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../js/encerrarEntregas.js"></script>

    <title>Fluxo Diário</title>

</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-fluxo.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <div class="bloco">
            <div class="bloco2">
                <a onclick="goBack()">
                    <i class="fas fa-arrow-left"></i> Voltar ao menu
                </a>
            </div>
            <?php
include_once '../controller/tbl_fluxo.php';
?>
            <div id="buscar" class="buscar">
                <form action="">
                    <label>Buscar Beneficiário: </label>
                    <input type="text" id="nis" name="nis" placeholder="Pelo NIS." maxlength="11" required>
                    <button type="submit">BUSCAR</button>
                </form>
            </div>
            <div class="resultado">
                <?php
if (!isset($_GET['nis'])) {
} else {
    $sql_cod = $conn->real_escape_string($_GET['nis']);
    $sql_dados = "SELECT * FROM fluxo_diario_coz WHERE nis_benef LIKE $sql_cod";
    $sql_query = $conn->query($sql_dados) or die("ERRO ao consultar !" . $conn->error);
    if ($sql_query->num_rows == 0) {
        echo '<script>alert("Nenhum NIS encontrado!"); window.location.href = "fluxo_diario.php";</script>';
    } else {
        $dados = $sql_query->fetch_assoc();
        ?>
<b><?php
if ($dados['entregue'] == 'ok') {
            echo '<div class="resul">Essa família já recebeu hoje.</div>';
        } else {
        }
        ?></b>

                        <div class="resul">
                            NOME: <?php echo $dados['nome']; ?>
                        </div>
                        <div class="resul">
                            Quantidades de marmitas: <div class="resulmarmitas"><?php echo $dados['qtd_marmita']; ?></div>
                        </div>
                        <div class="blocoresultado">
                            <div class="resul">
                                CPF: <?php echo $dados['cpf_benef']; ?>
                            </div>
                            <div>
                                <form method="POST" action="">
                                    <input type=text class="qntm" name="qtd" placeholder="Nº de marmitas">
                                    <button type="submit">ENTREGAR</button>
                                </form>
                            </div>
                        </div>
                <?php

        if (!isset($_POST['qtd'])) {
        } else {
            $sql_cod = $conn->real_escape_string($_GET['nis']);
            $sql_dados = "SELECT * FROM fluxo_diario_coz WHERE nis_benef LIKE $sql_cod";
            $sql_query = $conn->query($sql_dados) or die("ERRO ao consultar !" . $conn->error);
            $dados = $sql_query->fetch_assoc();
            if ($dados['entregue'] == 'ok') {
                echo '<script>alert("Já foi entregue hoje para esta família!"); window.location.href = "fluxo_diario.php";</script>';
            } else {
                $data_entrega = date('Y-m-d H:i');
                $timestampptbr = time();
                $get_rec = "ok";
                $qtd_entregue = $_POST['qtd'];
                $nomeOperador = $nome;
                $sqld = $conn->prepare("UPDATE fluxo_diario_coz SET data_de_entrega=?, marm_entregue=?, entregue=?, entregue_por=? WHERE nis_benef=?");
                $sqld->bind_param("sssss", $data_entrega, $qtd_entregue, $get_rec, $nomeOperador, $dados['nis_benef']);

                if ($sqld->execute()) {
                    // Inserção no histórico mensal
                    if ($get_rec == 'ok') {
                        $get_rec1 = 'SIM';
                    }else{
                        $get_rec1 = 'NÃO';
                    }
                    $sql_insert_historico = $conn->prepare("INSERT INTO historico_mensal (id_beneficiario, data, entregue, quantidade_dia) VALUES (?, ?, ?, ?)");
                    $sql_insert_historico->bind_param("ssss", $dados['id'], $data_entrega, $get_rec1, $qtd_entregue);

                    if ($sql_insert_historico->execute()) {
                        echo '<script>alert("Entrega registrada!"); window.location.href = "fluxo_diario.php";</script>';
                    } else {
                        echo "Erro ao inserir no histórico mensal: " . $sql_insert_historico->error;
                    }
                } else {
                    echo "Não salvou" . $sqld->error . "contate o suporte.";
                }
            }
        }
    }
}
?>
            </div>
        </div>
    </div>
    <div class="encerrar">
    <p id="mensagem_bloqueio"></p>
        <button id='gerar_relatorio' type="submit" name="gerar_relatorio">ENCERRAR AS ENTREGAS</button>
    </form>
    </div>
    <script src='../../controller/back.js'></script>
</body>
</html>
