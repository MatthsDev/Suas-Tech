<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style-alt-user.css">
    <link rel="website icon" type="image/png" href="../../img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>TechSUAS Concessão</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dt_pg = $_POST['dt_pg'];
    $mes_pg = $_POST['mes_pg'];
    $itens_conc= $_POST['itens_conc'];
    $quantidade = $_POST['quantidade'];
    $valor_unitario = $_POST['valor_unitario'];
    $valor_total = $_POST['valor_total'];
    $situacao = $_POST['situacao'];
    $id_hist = $_POST['id_hist'];

    $smtp = $conn->prepare("UPDATE concessao_historico SET nome_item=?, qtd_item=?, valor_uni=?, valor_total=?, mes_pag=?, pg_data=?, situacao_concessao=? WHERE id_hist=?");
    $smtp->bind_param("ssssssss", $itens_conc, $quantidade, $valor_unitario, $valor_total, $mes_pg, $dt_pg, $situacao, $id_hist);
    if ($smtp->execute()) {
        ?>
        <script>
            Swal.fire({
                icon: "success",
                title: "SALVO",
                text: "Dados salvos com sucesso!",
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "/Suas-Tech/concessao/views/editar_conc.php"
                }
            })
        </script>
        <?php
    exit();
    } else {
        echo "Erro na atualização das informações: " . $smtp->error;
    }
    $smtp->close();
}
?>
</body>
</html>