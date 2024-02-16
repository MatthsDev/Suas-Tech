<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/validar_cpf.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_atend.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/Suas-Tech/js/cpfvalid.js"></script>
    <script src="script.js"></script>
    <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
    <title>Cadastro Peixe</title>

</head>

<body>
<?php
            if (!isset($_POST['buscar_dados'])) {
            } else {
                if ($_POST['buscar_dados'] == 'cpf_dec') {
                    $cpf1 = $_POST['valorescolhido'];
                    if ($cpf1 = '0') {
                        $cpf = "12345";
                    } else {
                        $cpf = $_POST['valorescolhido'];
                    }
                    $cpf_limpo = preg_replace('/[^0-9]/', '', $cpf);

                    $sql_peixe = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf");
                    $sql_peixe->execute(array(':cpf' => $cpf_limpo));

                    $data_atual = date('d/m/Y H:i:s');

                    if ($sql_peixe->rowCount() > 0) {
                        $dados = $sql_peixe->fetch(PDO::FETCH_ASSOC);

                        if ($dados['vlr_renda_media_fam'] >= 218) {
                            ?>
                            <script>
                                Swal.fire({
                                    icon: "error",
                                    title: "SEM PERFIL",
                                    text: "Essa família não tem perfil!",
                                    confirmButtonText: 'OK',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "/Suas-Tech/suas/peixe/logado/form.php";
                                    }
                                });
                            </script>
                        <?php
                        }

                        echo $dados['nom_pessoa'];
                        echo $cpf1;
                        echo $dados['num_nis_pessoa_atual'];
                        echo $_POST['entrega'];
                        $cod_familiar = $dados['cod_familiar_fam'];
                        $sql_cod_peixe = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cod");
                        $sql_cod_peixe->execute(array(':cod' => $cod_familiar));

                        if ($sql_cod_peixe->rowCount() < 5) {
                            $dados_cod = $sql_cod_peixe->fetch(PDO::FETCH_ASSOC);
                            $qtd_peixe = "2 kg ";
                        } else {
                            $qtd_peixe = "1 kg ";
                        }
                        echo $qtd_peixe;
                        echo $data_atual;
                        $texto = $dados['num_nis_pessoa_atual'] . " texto dos comprovantes " . $dados['nom_pessoa'];
                    }
                } else {
                    $cpf1 = $_POST['valorescolhido'];
                    if ($cpf1 = '0') {
                        $cpf = "12345";
                    } else {
                        $cpf = $_POST['valorescolhido'];
                    }
                    $sql_peixe = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_nis_pessoa_atual = :cpf");
                    $sql_peixe->execute(array(':cpf' => $cpf));

                    $data_atual = date('d/m/Y H:i:s');

                    if ($sql_peixe->rowCount() > 0) {
                        $dados = $sql_peixe->fetch(PDO::FETCH_ASSOC);

                        echo $dados['nom_pessoa'];
                        echo $dados['num_cpf_pessoa'];
                        echo $_POST['entrega'];
                        $cod_familiar = $dados['cod_familiar_fam'];
                        $sql_cod_peixe = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cod");
                        $sql_cod_peixe->execute(array(':cod' => $cod_familiar));

                        if ($sql_cod_peixe->rowCount() < 5) {
                            $dados_cod = $sql_cod_peixe->fetch(PDO::FETCH_ASSOC);
                            $qtd_peixe = "2 kg ";
                        } else {
                            $qtd_peixe = "1 kg ";
                        }
                        echo $qtd_peixe;
                        echo $data_atual;
                        $texto = $dados['num_nis_pessoa_atual'] . " texto dos comprovantes " . $dados['nom_pessoa'];
                    }
                }
                
                
                // Verifica se o CPF já existe no banco de dados
                $verifica_cod = $conn->prepare("SELECT cod_fam FROM peixe WHERE cod_fam = ?");
                $verifica_cod->bind_param("s", $cod_familiar);
                $verifica_cod->execute();
                $verifica_cod->store_result();

                if ($verifica_cod->num_rows > 0) {
                    // Se o CPF já estiver cadastrado, exibe uma mensagem ou redirecione de volta ao formulário
            ?>
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "JÁ CADASTRADO",
                            text: "Essa família já fez cadastro!",
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/Suas-Tech/suas/peixe/logado/form.php";
                            }
                        });
                    </script>
                <?php
                    exit();
                }
                
                ?>
                <script>
                    window.print()
                </script>
                <?php
                
                //salvamento dos dados ao FLUXO DA COZINHA
                $stpt = $conn->prepare("INSERT INTO peixe (cod_fam, texto, data_registro, operador, local_entrega) VALUES (?, ?, ?, ?, ?)");
                // Verifica se a preparação foi bem-sucedida
                if ($stpt === false) {
                    die('Erro na preparação SQL: ' . $conn->error);
                }
                $stpt->bind_param("sssss", $cod_familiar, $texto, $data_atual, $nome, $_POST['entrega']);

                if ($stpt->execute()) {
                ?>
                    <script>
                        Swal.fire({
                            icon: "success",
                            title: "SALVO",
                            text: "Cadastro Realizado Com Sucesso!",
                            confirmButtonText: 'OK',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "/Suas-Tech/suas/peixe/logado/form.php";
                            }
                        });
                    </script>
            <?php
                } else {
                    echo "Não salvou" . $stpt->error;
                }
                
            }
            ?>
</body>
</html>