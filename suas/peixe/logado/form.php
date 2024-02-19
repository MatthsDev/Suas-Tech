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
    <link rel="shortcut icon" href="/Suas-Tech/cadunico/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style_peixe.css">
    <title>TechSUAS - Cadastro Peixe</title>

</head>

<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-peixe.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="apelido">    
        <h3>Bem-vindo (a)
            <?php echo $apelido; ?>.
        </h3> 
    </div> 
    <div class="corpo">
        <div id="cardF">

            <form method="POST" target="_blank" id="formCont" action='conferir.php'>

                <div class="cont-form">
                    <label for="estado">Local de Cadastramento</label>
                    <select id="" class="form-select" name="lc_cadastro" autocomplete="off" required>
                        <option value="" data-default disabled selected></option>
                        <option value="CRAS ANTONIO MATIAS">CRAS - ANTONIO MATIAS</option>
                        <option value="PAULO CORDEIRO">PAULO CORDEIRO</option>
                        <option value="CRAS SANTO AFONSO">CRAS - SANTO AFONSO</option>
                        <option value="MONICA BRAGA">MONICA BRAGA</option>
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
                            <input type="text" class="form-control" name="comprova" maxLength="04" autocomplete="off" required>
                        </div>

                        <select name="buscar_dados" required>
                            <option value="cpf_dec">CPF:</option>
                            <option value="nis_dec">NIS:</option>
                        </select>
                        <input type="text" name="valorescolhido" placeholder="Digite aqui:" maxlength="14" required>

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
                    <div class="btn">
                        <button class="menu-button" type="submit">CADASTRAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div>
    <footer><img src="../img/footer-peixe.svg" alt=""></footer>
    </div>

</body>
</html>