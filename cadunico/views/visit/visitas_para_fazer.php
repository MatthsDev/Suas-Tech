<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

$data1 = date('Y');
$data2 = $data1 - 8;
$data3 = $data1 - 7;
$data4 = $data1 - 6;
$data5 = $data1 - 5;
$data6 = $data1 - 4;
$data7 = $data1 - 3;
$data8 = $data1 - 2;
$data9 = $data1 - 1;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Visitas para fazer</title>
    <link rel="stylesheet" href="../../css/visitas.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="website icon" type="png" href="../../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <p>Olá, <?php echo $nome; ?>! Você está autenticado para essa operação.</p>

    <form action=''>
        <select id="ano_select" name="ano_select">
        <option value="" disabled selected hidden>Selecione</option>
        <option value="<?php echo $data2; ?>"><?php echo $data2; ?></option>
        <option value="<?php echo $data3; ?>"><?php echo $data3; ?></option>
        <option value="<?php echo $data4; ?>"><?php echo $data4; ?></option>
        <option value="<?php echo $data5; ?>"><?php echo $data5; ?></option>
        <option value="<?php echo $data6; ?>"><?php echo $data6; ?></option>
        <option value="<?php echo $data7; ?>"><?php echo $data7; ?></option>
        <option value="<?php echo $data8; ?>"><?php echo $data8; ?></option>
        <option value="<?php echo $data9; ?>"><?php echo $data9; ?></option>
        <option value="<?php echo $data1; ?>"><?php echo $data1; ?></option>
    </select>
        <label>Fitre a localidade:</label>
            <input name="localidade" class="busca2" placeholder="Qual localdade" type="text">
            <button type="submit">Buscar</button>
    </form>
    <?php include '../../controller/parecer/tbl_tudo.php';?>
</body>
</html>
