<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/validar_cpf.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Cadastro Peixe</title>

</head>


<body>
    <div class="corpo">
        <div id="cardF">

            <form method="POST" id="formCont" action=''>

            <div class="cont-form">
                            <label for="estado">Local de Cadastramento</label>
                            <select id="" class="form-select" name="entrega" autocomplete="off" required>
                                <option value="" data-default disabled selected></option>
                                <option value="CRAS ANTONIO MATIAS">CRAS - ANTONIO MATIAS</option>
                                <option value="ESTER SIQUEIRA">ESTER SIQUEIRA</option>
                                <option value="ODETE COSTA">ODETE COSTA</option>
                                <option value="PAULO CORDEIRO">PAULO CORDEIRO</option>
                                <option value="CRAS SANTO AFONSO">CRAS - SANTO AFONSO</option>
                                <option value="MONICA BRAGA">MONICA BRAGA</option>
                                <option value="SEDE">SEDE</option>
                                <option value="MANICOBA SOARES">MANICOBA SOARES</option>
                                <option value="MINADOR">MINADOR</option>
                                <option value="UNA DO SIMAO">UNA DO SIMAO</option>
                                <option value="TAMANDUA">TAMANDUA</option>
                                <option value="JURUBEBA">JURUBEBA</option>
                                <option value="GAMA">GAMA</option>
                                <option value="ARMAZEM">ARMAZEM</option>
                                <option value="ACUDE NOVO">AÇUDE NOVO</option>
                                <option value="QUEIMADA GRANDE">QUEIMADA GRANDE</option>
                                <option value="SODRE">SODRE</option>
                                <option value="IMPUEIRA">IMPUEIRA</option>
                                <option value="BATALHA">BATALHA</option>
                                <option value="ZE BENTO">ZE BENTO</option>
                                <option value="CAIANA">CAIANA</option>
                                <option value="PRIMAVERA">PRIMAVERA</option>
                                <option value="SERROTE">SERROTE</option>
                                <option value="CALDEIRAOZINHO">CALDEIRAOZINHO</option>
                                <option value="ESPIRITO SANTO">ESPIRITO SANTO</option>
                                <option value="PIMENTA">PIMENTA</option>
                                <option value="CALUMBI">CALUMBI</option>
                                <option value="RIACHO DA PORTEIRAS">RIACHO DA PORTEIRAS</option>
                                <option value="PASSAGEM">PASSAGEM</option>
                                <option value="BARRO BRANCO">BARRO BRANCO</option>
                                <option value="SERRA VERDE">SERRA VERDE</option>
                                <option value="POCO COMPRIDO">POÇO COMPRIDO</option>
                                <option value="BAIXA">BAIXA</option>
                                <option value="BASILIO">BASILIO</option>
                            </select>
                        </div>

                <!-- ========= INICIO DO FORMULARIO ============== -->
                <div class="form-group">
                    <!-- ========= DIVISORIA DO FORMULARIO ============== -->
                    <div class="cont-input1">
                        <div class="cont-formSus">
                            <label> Codigo </label>
                            <input type="text" class="form-control" name="comprova" maxLength="04" autocomplete="off">
                        </div>

                        <select name="buscar_dados" required>
                            <option value="cpf_dec">CPF:</option>
                            <option value="nis_dec">NIS:</option>
                        </select>
                    <input type="text" name="valorescolhido" placeholder="Digite aqui:" required>

                        <div class="cont-form">
                            <label for="estado">Local de Entrega</label>
                            <select id="" class="form-select" name="entrega" autocomplete="off" required>
                                <option value="" data-default disabled selected></option>
                                <option value="CRAS ANTONIO MATIAS">CRAS - ANTONIO MATIAS</option>
                                <option value="ESTER SIQUEIRA">ESTER SIQUEIRA</option>
                                <option value="ODETE COSTA">ODETE COSTA</option>
                                <option value="PAULO CORDEIRO">PAULO CORDEIRO</option>
                                <option value="CRAS SANTO AFONSO">CRAS - SANTO AFONSO</option>
                                <option value="MONICA BRAGA">MONICA BRAGA</option>
                                <option value="SEDE">SEDE</option>
                                <option value="MANICOBA SOARES">MANICOBA SOARES</option>
                                <option value="MINADOR">MINADOR</option>
                                <option value="UNA DO SIMAO">UNA DO SIMAO</option>
                                <option value="TAMANDUA">TAMANDUA</option>
                                <option value="JURUBEBA">JURUBEBA</option>
                                <option value="GAMA">GAMA</option>
                                <option value="ARMAZEM">ARMAZEM</option>
                                <option value="ACUDE NOVO">AÇUDE NOVO</option>
                                <option value="QUEIMADA GRANDE">QUEIMADA GRANDE</option>
                                <option value="SODRE">SODRE</option>
                                <option value="IMPUEIRA">IMPUEIRA</option>
                                <option value="BATALHA">BATALHA</option>
                                <option value="ZE BENTO">ZE BENTO</option>
                                <option value="CAIANA">CAIANA</option>
                                <option value="PRIMAVERA">PRIMAVERA</option>
                                <option value="SERROTE">SERROTE</option>
                                <option value="CALDEIRAOZINHO">CALDEIRAOZINHO</option>
                                <option value="ESPIRITO SANTO">ESPIRITO SANTO</option>
                                <option value="PIMENTA">PIMENTA</option>
                                <option value="CALUMBI">CALUMBI</option>
                                <option value="RIACHO DA PORTEIRAS">RIACHO DA PORTEIRAS</option>
                                <option value="PASSAGEM">PASSAGEM</option>
                                <option value="BARRO BRANCO">BARRO BRANCO</option>
                                <option value="SERRA VERDE">SERRA VERDE</option>
                                <option value="POCO COMPRIDO">POÇO COMPRIDO</option>
                                <option value="BAIXA">BAIXA</option>
                                <option value="BASILIO">BASILIO</option>
                            </select>
            </div>
        </div>
        <button type="submit">CADASTRAR</button>
</form>
        <?php
if (!isset($_POST['buscar_dados'])) {

} else {
    if ($_POST['buscar_dados'] == 'cpf_dec') {
        $cpf1 = $_POST['valorescolhido'];
        if ($cpf1 = '0'){
            $cpf = "12345";
        } else {
            $cpf = $_POST['valorescolhido'];
        }
        $sql_peixe = $pdo->prepare("SELECT * FROM tbl_tudo WHERE num_cpf_pessoa = :cpf");
        $sql_peixe->execute(array(':cpf' => $cpf));

        $data_atual = date('d/m/Y H:i:s');

        if ($sql_peixe->rowCount() > 0) {
            $dados = $sql_peixe->fetch(PDO::FETCH_ASSOC);

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
        if ($cpf1 = '0'){
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
    <script>window.print()</script>
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
                        text: "cadastro realizado com sucesso!",
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
