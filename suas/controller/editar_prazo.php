<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Suas-Tech/img/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Cadastrar Contrato</title>
</head>
<body>

<?php

if (isset($_POST['data_alt']) || isset($_POST['apostilamento_alt'])) {
    if (isset($_SESSION['num_contrato'])) {
        $cont = $_SESSION['num_contrato'];
    }
    $stmt_ed_contrato = $conn->prepare("UPDATE tabela_contrato SET vigencia=? WHERE num_contrato=?");
    if (!$stmt_ed_contrato) {
        die('Erro na preparação da consulta: ' . $conn->error);
    }
    $stmt_ed_contrato->bind_param("ss", $_POST['data_alt'], $cont);

    if ($stmt_ed_contrato->execute()) {
        ?>
<script>
        Swal.fire({
        icon: "success",
        title: "SALVO",
        text: "Alterado com sucesso!",
        confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/Suas-Tech/suas/views/adm/contratos.php";
            }
        });
</script>
        <?php
exit();
    } else {
        echo "Erro na atualização das informações: " . $stmt_ed_contrato->error;
    }

    $stmt_ed_contrato->close();
}
?>
</body>
</html>