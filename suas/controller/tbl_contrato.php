<?php
// Arquivos necessários
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Suas-Tech/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../views/adm/css/style_tbl_cont.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Consultar Contrato</title>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../views/adm/img/cadas_cont.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <?php

    include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';

    $tbl_contrato = $conn->query("SELECT * FROM tabela_contrato");

    if ($tbl_contrato->num_rows > 0) {
    ?>
        </div>
        <div class="container">
            <div class="btn">
                <button type="button" class="back" onclick="window.location.href ='/Suas-Tech/suas/views/adm/menu_adm.php';">
                    <i class="fas fa-arrow-left"></i>
                    Voltar ao menu
                </button>
            </div>
            <table width="650px" border="1">
                <tr class="titulo">
                    <th class="cabecalho">Nº CONTRATO</th>
                    <th class="cabecalho">DATA ASSINATURA</th>
                    <th class="cabecalho">VIGÊNCIA</th>
                    <th class="cabecalho">NOME EMPRESA</th>
                    <th class="cabecalho">CNPJ</th>
                    <th class="cabecalho">CONTATO</th>
                    <th class="cabecalho">EMAIL</th>
                    <th class="cabecalho">VALOR</th>
                </tr>
                <?php
                $contador = 0;
                while ($linha = $tbl_contrato->fetch_assoc()) {
                    $contador++;
                ?>
                    <tr class="resultado">
                        <td class="resultado"><?php echo $linha['num_contrato']; ?></td>
                        <td class="resultado"><?php echo $linha['data_assinatura']; ?></td>
                        <td class="resultado"><?php echo $linha['vigencia']; ?></td>
                        <td class="resultado"><?php echo $linha['nome_empresa']; ?></td>
                        <td class="resultado"><?php echo $linha['cnpj']; ?></td>
                        <td class="resultado"><?php echo $linha['num_contato']; ?></td>
                        <td class="resultado"><?php echo $linha['email_emp']; ?></td>
                        <td class="resultado"><?php echo $linha['valor_contrato']; ?></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">Resultados da pesquisa</td>
                </tr>
            <?php
            }
            ?>
            </table>
        </div>
        </div>
</body>