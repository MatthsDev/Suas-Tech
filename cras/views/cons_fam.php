<?php
// Incluir o arquivo de conexão com o banco de dados
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Famílias</title>
    <link rel="stylesheet" href="/Suas-Tech/cras/css/style_fam_cons.css">
    <link rel="stylesheet" href="/Suas-Tech/cras/css/style-cad-usuario.css">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-edit.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <form id="consultaForm">
            <label for="codigo_busca">Buscar Famílias por Código:</label>
            <input type="text" id="codigo_busca" name="codigo_busca" required>
            <button type="button" onclick="consultarFamilias()">Buscar</button>
        </form>
        <div id="resultado"></div>




        <div class="col-md-6">
            <div class="float-right">
                <a id="btn-novo" data-toggle="modal" data-target="#modal"></a>
            </div>
        </div>
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <?php
                            if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar') {
                                $nome_botao = 'Editar';
                                $id_reg = $_GET['id'];

                                // Buscar dados do registro a ser editado
                                $res = $pdo->query("select * from cras where id = '$id_reg'");
                                $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                                $cpf = $dados[0]['cpf'];
                                $cod_familiar = $dados[0]['cod_familiar_fam'];
                                $nome = $dados[0]['nome'];
                                $data_nasc = $dados[0]['data_nasc'];
                                $nomeSocial = $dados[0]['nome_social'];
                                $sexo = $dados[0]['sexo'];
                                $outr_sexo = $dados[0]['outro_sex'];
                                // $grupoIndigena = $dados[0][''];
                                // $povoIndigena = $dados[0][''];
                                // $grupoReserva = $dados[0][''];
                                // $terraIndigina = $dados[0][''];
                                // $familiaQuilambola = $dados[0][''];
                                // $comunidadeQuilambola = $dados[0][''];
                                // $nomeMae = $dados[0][''];
                                // $nomePai = $dados[0][''];
                                // $nacionalidade = $dados[0][''];
                            
                                // $municipio = $dados[0][''];
                                // $telefone = $dados[0][''];
                                // $email = $dados[0][''];
                                // $pcd = $dados[0][''];
                                // $rg = $dados[0][''];
                                // $complemento_rg = $dados[0][''];
                                // $data_exp_rg = $dados[0][''];
                                // $sigla_rg = $dados[0][''];
                                // $estado_rg = $dados[0][''];
                                // $nis = $dados[0][''];
                                // $numTitulo = $dados[0][''];
                                // $zonaTitulo = $dados[0][''];
                                // $area_titulo = $dados[0][''];
                                // $profissao = $dados[0][''];
                                // $rendaPerCapita = $dados[0][''];
                                // $bairro = $dados[0][''];
                                // $logradouro = $dados[0][''];
                                // $numero = $dados[0][''];
                                // $referencia = $dados[0][''];
                                // $qtdPessoasCasa = $dados[0][''];
                            

                                $uf = $dados[0]['uf_pessoa'];
                                $parentesco = $dados[0]['parentesco'];
                                $cor = $dados[0]['cor_raca'];

                            } else {

                                $nome_botao = 'Salvar';
                                $id_reg = '';
                                $cpf = '';
                                $cod_familiar = '';
                                $nome = '';
                                $data_nasc = '';
                                $nomeSocial = '';
                                $sexo = '';
                                $outr_sexo = '';
                                $grupoIndigena = '';
                                $povoIndigena = '';
                                $grupoReserva = '';
                                $terraIndigina = '';
                                $familiaQuilambola = '';
                                $comunidadeQuilambola = '';
                                $nomeMae = '';
                                $nomePai = '';
                                $nacionalidade = '';
                                $uf = '';
                                $municipio = '';
                                $telefone = '';
                                $email = '';
                                $pcd = '';
                                $rg = '';
                                $complemento_rg = '';
                                $data_exp_rg = '';
                                $sigla_rg = '';
                                $estado_rg = '';
                                $nis = '';
                                $numTitulo = '';
                                $zonaTitulo = '';
                                $area_titulo = '';
                                $profissao = '';
                                $rendaPerCapita = '';
                                $bairro = '';
                                $logradouro = '';
                                $numero = '';
                                $referencia = '';
                                $qtdPessoasCasa = '';
                                $parentesco = '';
                                $cor = '';
                            }
                            ?>
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form method="post">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input type="hidden" id="id" name="id" value="<?php echo $id_reg ?>" required>

                                        <input type="hidden" id="campo_antigo" name="campo_antigo"
                                            value="<?php echo $cpf ?>" required>

                                        <label for="exampleFormControlInput1">Nome *</label>
                                        <input type="text" class="form-control" id="nome" placeholder="Insira o Nome "
                                            name="nome" value="<?php echo $nome ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">CPF </label>
                                        <input type="text" class="form-control" id="cpf" placeholder="Insira o CPF "
                                            name="cpf" maxlength="14" value="<?php echo isset($cpf) ? $cpf : ''; ?>"
                                            onblur="validarCPF(this)" required>

                                        <div id="res" name="res"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="parentesco">PARENTESCO FAMILIAR: </label>
                                        <select class="form-control" id="parentesco" name="parentesco" required>

                                            <?php if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar'): ?>
                                                <option value="<?php echo $parentesco ?>">
                                                    <?php echo $parentesco ?>
                                                </option>
                                            <?php endif; ?>

                                            <?php if ($parentesco != 'RESPONSAVEL FAMILIAR'): ?>
                                                <option value="RESPONSAVEL FAMILIAR">RESPONSAVEL FAMILIAR</option>
                                            <?php endif; ?>

                                            <?php if ($parentesco != 'CONJUGUE OU COMPANHEIR'): ?>
                                                <option value="CONJUGUE OU COMPANHEIRO">CONJUGUE OU COMPANHEIRO</option>
                                            <?php endif; ?>

                                            <?php if ($parentesco != 'FILHO'): ?>
                                                <option value="FILHO">FILHO</option>
                                            <?php endif; ?>

                                            <?php if ($parentesco != 'IRMAO OU IRMA'): ?>
                                                <option value="IRMAO OU IRMA">IRMAO OU IRMA</option>
                                            <?php endif; ?>

                                            <?php if ($parentesco != 'PAI OU MAE'): ?>
                                                <option value="PAI OU MAE">PAI OU MAE</option>
                                            <?php endif; ?>

                                            <?php if ($parentesco != 'OUTRO PARENTE'): ?>
                                                <option value="OUTRO PARENTE">OUTRO PARENTE</option>
                                            <?php endif; ?>

                                            <?php if ($parentesco != 'NAO PARENTE'): ?>
                                                <option value="NAO PARENTE">NAO PARENTE</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>


                                <div id="mensagem" class="">

                                </div>

                            </div>


                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">COD FAMILIA: </label>
                                        <input type="text" class="form-control" id="codfamiliar"
                                            placeholder="Insira o Nº " name="nreg" value="<?php echo $cod_familiar ?>"
                                            required>
                                    </div>
                                </div>


                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nome_social">NOME SOCIAL: </label>
                                        <input type="text" class="form-control" id="nome_social" name="nome_social"
                                            value="<?php echo $nomeSocial ?>">
                                    </div>
                                </div>



                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="data_nasc">DATA DE NASCIMENTO: *</label>
                                        <input type="date" class="form-control" id="data_nasc" name="data_nasc"
                                            value="<?php echo $data_nasc ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="uf_pessoa">UF: </label>
                                        <select id="uf_pessoa" class="form-control" name="uf_pessoa" required>
                                            <?php if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar'): ?>
                                                <option value="<?php echo $uf ?>">
                                                    <?php echo $uf ?>
                                                </option>
                                            <?php endif; ?>
                                            <?php if ($sexo != 'AC'): ?>
                                                <option value="AC">ACRE</option>
                                            <?php endif; ?>

                                            <?php if ($uf != 'AC'): ?>
                                                <option value="AC">AC</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'AL'): ?>
                                                <option value="AL">AL</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'AP'): ?>
                                                <option value="AP">AP</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'AM'): ?>
                                                <option value="AM">AM</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'BA'): ?>
                                                <option value="BA">BA</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'CE'): ?>
                                                <option value="CE">CE</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'DF'): ?>
                                                <option value="DF">DF</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'ES'): ?>
                                                <option value="ES">ES</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'GO'): ?>
                                                <option value="GO">GO</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'MA'): ?>
                                                <option value="MA">MA</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'MT'): ?>
                                                <option value="MT">MT</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'MS'): ?>
                                                <option value="MS">MS</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'MG'): ?>
                                                <option value="MG">MG</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'PA'): ?>
                                                <option value="PA">PA</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'PB'): ?>
                                                <option value="PB">PB</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'PR'): ?>
                                                <option value="PR">PR</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'PE'): ?>
                                                <option value="PE">PE</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'PI'): ?>
                                                <option value="PI">PI</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'RJ'): ?>
                                                <option value="RJ">RJ</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'RN'): ?>
                                                <option value="RN">RN</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'RS'): ?>
                                                <option value="RS">RS</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'RO'): ?>
                                                <option value="RO">RO</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'RR'): ?>
                                                <option value="RR">RR</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'SC'): ?>
                                                <option value="SC">SC</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'SP'): ?>
                                                <option value="SP">SP</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'SE'): ?>
                                                <option value="SE">SE</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'TO'): ?>
                                                <option value="TO">TO</option>
                                            <?php endif; ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="sexo">SEXO: </label>
                                        <select class="form-control" id="sexo" name="sexo" required>

                                            <?php if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar'): ?>
                                                <option value="<?php echo $sexo ?>">
                                                    <?php echo $sexo ?>
                                                </option>
                                            <?php endif; ?>

                                            <?php if ($sexo != 'MASCULINO'): ?>
                                                <option value="MASCULINO">MASCULINO</option>
                                            <?php endif; ?>

                                            <?php if ($sexo != 'FEMININO'): ?>
                                                <option value="FEMININO">FEMININO</option>
                                            <?php endif; ?>

                                            <?php if ($sexo != 'OUTRO'): ?>
                                                <option value="OUTRO">OUTRO</option>
                                            <?php endif; ?>
                                    </div>
                                </div>




                            </div>



                            <div class="modal-footer">
                                <button id="btn-fechar" type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Cancelar</button>

                                <button type="submit" name="<?php echo $nome_botao ?>" id="<?php echo $nome_botao ?>"
                                    class="btn btn-primary">
                                    <?php echo $nome_botao ?>
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <!--CHAMADA DA MODAL NOVO -->
            <?php
            if (isset($_GET['funcao']) && $_GET['funcao'] == 'novo' && empty($item_paginado)) {

                ?>
                <script>$('#btn-novo').click();</script>
            <?php } ?>


            <!--CHAMADA DA MODAL EDITAR -->
            <?php
            if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar' && empty($item_paginado)) {

                ?>
                <script>$('#btn-novo').click();</script>
            <?php } ?>



            <script>
                function consultarFamilias() {
                    var codigoBusca = $("#codigo_busca").val();
                    $.ajax({
                        type: "POST",
                        url: "../controller/exibir_fam.php",
                        data: { codigo_busca: codigoBusca },
                        success: function (response) {
                            $("#resultado").html(response);
                        },
                        error: function () {
                            $("#resultado").html("Erro ao fazer a requisição AJAX.");
                        }
                    });
                }
            </script>
</body>

</html>