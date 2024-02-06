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
                                $uf = $dados[0]['uf_pessoa'];
                                $parentesco = $dados[0]['parentesco'];
                                $cor = $dados[0]['cor_raca'];
                                $nomeMae = $dados[0]['nome_mae'];
                                $nomePai = $dados[0]['nome_pai'];
                                $nacionalidade = $dados[0]['nac_pessoa'];
                                $municipio = $dados[0]['nat_pessoa'];
                                $telefone = $dados[0]['tel_pessoa'];
                                $email = $dados[0]['email_pessoa'];
                                $nis = $dados[0]['nis'];
                                $numTitulo = $dados[0]['num_titulo'];
                                $zonaTitulo = $dados[0]['zone_titulo'];
                                $area_titulo = $dados[0]['area_titulo'];
                                $rg = $dados[0]['rg'];
                                $complemento_rg = $dados[0]['complemento_rg'];
                                $data_exp_rg = $dados[0]['data_exp_rg'];
                                $sigla_rg = $dados[0]['sigla_rg'];
                                $estado_rg = $dados[0]['estado_rg'];
                                $pcd = $dados[0]['pcd'];
                                $profissao = $dados[0]['profissao'];
                                $rendaPerCapita = $dados[0][''];
                                
                                // $grupoIndigena = $dados[0][''];
                                // $povoIndigena = $dados[0][''];
                                // $grupoReserva = $dados[0][''];
                                // $terraIndigina = $dados[0][''];
                                // $familiaQuilambola = $dados[0][''];
                                // $comunidadeQuilambola = $dados[0][''];
                            




                            
                                // $bairro = $dados[0][''];
                                // $logradouro = $dados[0][''];
                                // $numero = $dados[0][''];
                                // $referencia = $dados[0][''];
                                // $qtdPessoasCasa = $dados[0][''];
                            



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
                                        <label for="data_nasc">DATA DE NASCIMENTO: *</label>
                                        <input type="date" class="form-control" id="data_nasc" name="data_nasc"
                                            value="<?php echo $data_nasc ?>" required>
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






                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="cor">COR OU RAÇA: </label>
                                        <select class="form-control" id="cor" name="cor" required>

                                            <?php if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar'): ?>
                                                <option value="<?php echo $cor ?>">
                                                    <?php echo $cor ?>
                                                </option>
                                            <?php endif; ?>

                                            <?php if ($cor != 'BRANCO'): ?>
                                                <option value="BRANCO">BRANCO</option>
                                            <?php endif; ?>

                                            <?php if ($cor != 'PRETO'): ?>
                                                <option value="PRETO">PRETO</option>
                                            <?php endif; ?>

                                            <?php if ($cor != 'AMARELO'): ?>
                                                <option value="AMARELO">AMARELO</option>
                                            <?php endif; ?>

                                            <?php if ($cor != 'PARDO'): ?>
                                                <option value="PARDO">PARDO</option>
                                            <?php endif; ?>

                                            <?php if ($cor != 'INDIGENA'): ?>
                                                <option value="INDIGENA">INDIGENA</option>
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
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tel_pessoa">TELEFONE: </label>
                                        <input type="text" class="form-control" id="telefone"
                                            placeholder="Insira o Telefone " maxlength="15" name="telefone"
                                            value="<?php echo $telefone ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome_mae">NOME MÃE: </label>
                                        <input class="form-control" type="text" id="nome_mae" name="nome_mae"
                                            value="<?php echo $nomeMae ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nome_mae">NOME PAI: </label>
                                        <input class="form-control" type="text" id="nome_pai" name="nome_pai"
                                            value="<?php echo $nomePai ?>" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="nac_pessoa">NACIONALIDADE: </label>
                                        <input type="text" class="form-control" id="nac_pessoa" name="nac_pessoa"
                                            value="<?php echo $nacionalidade ?>">

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

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nat_pessoa">NATURALIDADE: </label>
                                        <input type="text" class="form-control" id="nat_pessoa" name="nat_pessoa"
                                            value="<?php echo $municipio ?>">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email_pessoa">EMAIL: </label>
                                        <input class="form-control" type="email" id="email_pessoa" name="email_pessoa"
                                            value="<?php echo $email ?>">
                                    </div>
                                </div>

                            </div>

                            <diV class="row">
                                <div class="col-3" style="width: 20%;">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">CPF </label>
                                        <input type="text" class="form-control" id="cpf" placeholder="Insira o CPF "
                                            name="cpf" maxlength="14" value="<?php echo isset($cpf) ? $cpf : ''; ?>"
                                            onblur="validarCPF(this)" required>
                                        <div id="res" name="res"></div>
                                    </div>
                                </div>
                                <div class="col-3" style="width: 20%;">
                                    <div class="form-group">
                                        <label for="nis">NIS: </label>
                                        <input type="text" class="form-control" id="nis" name="nis"
                                            value="<?php echo $nis ?>" required>
                                    </div>
                                </div>

                                <div class="col-2" style="width: 20%;">
                                    <div class="form-group">
                                        <label for="num_titulo">TITULO: </label>
                                        <input type="text" class="form-control" id="num_titulo" name="num_titulo"
                                            value="<?php echo $numTitulo ?>">
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="zone_titulo">ZONA</label>
                                        <input type="text" class="form-control" id="zone_titulo" name="zone_titulo"
                                            value="<?php echo $zonaTitulo ?>">
                                    </div>
                                </div>

                                <div class="col-2" style="width: 20%;">
                                    <div class="form-group">
                                        <label for="zone_titulo">SEÇÃO</label>
                                        <input type="text" class="form-control" id="secao_titulo" name="area_titulo"
                                            value="<?php echo $area_titulo ?>">
                                    </div>
                                </div>
                            </diV>

                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="rg">RG: </label>
                                        <input type="text" class="form-control" id="rg" name="rg"
                                            value="<?php echo $rg ?>">
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="complemento_rg">COMPLEMENTO: </label>
                                        <input type="text" class="form-control" id="complemento_rg"
                                            name="complemento_rg" value="<?php echo $complemento_rg ?>">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="data_exp_rg">DATA DE EXPEDIÇÃO: </label>
                                        <input type="date" class="form-control" id="data_exp_rg" name="data_exp_rg"
                                            value="<?php echo $data_exp_rg ?>">
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="sigla_rg">ORGÃO: </label>
                                        <select type="text" class="form-control" id="sigla_rg" name="sigla_rg">

                                            <?php if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar'): ?>
                                                <option value="<?php echo $sigla_rg ?>">
                                                    <?php echo $sigla_rg ?>
                                                </option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'PM'): ?>
                                                <option value="PM">PM</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'SM'): ?>
                                                <option value="SM">SM</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'SEMAD'): ?>
                                                <option value="SEMAD">SEMAD</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'SMED'): ?>
                                                <option value="SMED">SMED</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'SE'): ?>
                                                <option value="SE">SE</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'SDS'): ?>
                                                <option value="SDS">SDS</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'SSP'): ?>
                                                <option value="SSP">SSP</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'SEDUC'): ?>
                                                <option value="SEDUC">SEDUC</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'SETRAN'): ?>
                                                <option value="SETRAN">SETRAN</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'MJ'): ?>
                                                <option value="MJ">MJ</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'MEC'): ?>
                                                <option value="MEC">MEC</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'MMA'): ?>
                                                <option value="MMA">MMA</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'MDS'): ?>
                                                <option value="MDS">MDS</option>
                                            <?php endif; ?>

                                            <?php if ($sigla_rg != 'OUTRO'): ?>
                                                <option value="OUTRO">OUTRO</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="estado_rg">UF: </label>
                                        <select id="estado_rg" class="form-control" name="estado_rg" required>
                                            <?php if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar'): ?>
                                                <option value="<?php echo $estado_rg ?>">
                                                    <?php echo $estado_rg ?>
                                                </option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'AC'): ?>
                                                <option value="AC">ACRE</option>
                                            <?php endif; ?>

                                            <?php if ($estado_rg != 'AC'): ?>
                                                <option value="AC">AC</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'AL'): ?>
                                                <option value="AL">AL</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'AP'): ?>
                                                <option value="AP">AP</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'AM'): ?>
                                                <option value="AM">AM</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'BA'): ?>
                                                <option value="BA">BA</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'CE'): ?>
                                                <option value="CE">CE</option>
                                            <?php endif; ?>
                                            <?php if ($uf != 'DF'): ?>
                                                <option value="DF">DF</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'ES'): ?>
                                                <option value="ES">ES</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'GO'): ?>
                                                <option value="GO">GO</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'MA'): ?>
                                                <option value="MA">MA</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'MT'): ?>
                                                <option value="MT">MT</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'MS'): ?>
                                                <option value="MS">MS</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'MG'): ?>
                                                <option value="MG">MG</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'PA'): ?>
                                                <option value="PA">PA</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'PB'): ?>
                                                <option value="PB">PB</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'PR'): ?>
                                                <option value="PR">PR</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'PE'): ?>
                                                <option value="PE">PE</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'PI'): ?>
                                                <option value="PI">PI</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'RJ'): ?>
                                                <option value="RJ">RJ</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'RN'): ?>
                                                <option value="RN">RN</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'RS'): ?>
                                                <option value="RS">RS</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'RO'): ?>
                                                <option value="RO">RO</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'RR'): ?>
                                                <option value="RR">RR</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'SC'): ?>
                                                <option value="SC">SC</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'SP'): ?>
                                                <option value="SP">SP</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'SE'): ?>
                                                <option value="SE">SE</option>
                                            <?php endif; ?>
                                            <?php if ($estado_rg != 'TO'): ?>
                                                <option value="TO">TO</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipoDeficiencia">POSSUI ALGUMA DEFICIENCIA? </label>
                                        <select class="form-control" name="tipoDeficiencia">
                                            <?php if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar' && $pcd != ''): ?>
                                                <option value="<?php echo $pcd ?>">
                                                    <?php echo $pcd ?>
                                                </option>
                                            <?php endif; ?>


                                            <?php if ($pcd == ''): ?>
                                                <option value="NAO">NAO</option>
                                            <?php endif; ?>

                                            <?php if ($pcd != 'CEGUEIRA'): ?>
                                                <option value="CEGUEIRA">CEGUEIRA</option>
                                            <?php endif; ?>

                                            <?php if ($pcd != 'BAIXA VISAO'): ?>
                                                <option value="BAIXA VISAO">BAIXA VISAO</option>
                                            <?php endif; ?>

                                            <?php if ($pcd != 'SURDEZ SEVERA/PROFUNDA'): ?>
                                                <option value="SURDEZ SEVERA/PROFUNDA">SURDEZ SEVERA/PROFUNDA</option>
                                            <?php endif; ?>

                                            <?php if ($pcd != 'SURDEZ LEVE/MODERADAA'): ?>
                                                <option value="SURDEZ LEVE/MODERADA">SURDEZ LEVE/MODERADA</option>
                                            <?php endif; ?>

                                            <?php if ($pcd != 'DEFICIENCIA FISICA'): ?>
                                                <option value="DEFICIENCIA FISICA">DEFICIENCIA FISICA</option>
                                            <?php endif; ?>

                                            <?php if ($pcd != 'DEFICIENCIA MENTAL OU INTELECTUAL'): ?>
                                                <option value="DEFICIENCIA MENTAL OU INTELECTUAL">DEFICIENCIA MENTAL OU
                                                    INTELECTUAL</option>
                                            <?php endif; ?>

                                            <?php if ($pcd != 'SINDROME DE DOWN'): ?>
                                                <option value="SINDROME DE DOWN">SINDROME DE DOWN</option>
                                            <?php endif; ?>

                                            <?php if ($pcd != 'TRANSTORNO/DOENCA MENTAL'): ?>
                                                <option value="TRANSTORNO/DOENCA MENTAL">TRANSTORNO/DOENCA MENTAL
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="profissao">PROFISSÃO: </label>
                                        <select id="profissao" class="form-control" name="profissao" required>
                                            <?php if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar'): ?>
                                                <option value="<?php echo $profissao ?>">
                                                    <?php echo $profissao ?>
                                                </option>
                                            <?php endif; ?>

                                            <?php if ($profissao != 'EMPREGADO COM CARTEIRA ASSINADA'): ?>
                                                <option value="EMPREGADO COM CARTEIRA ASSINADA">EMPREGADO COM CARTEIRA
                                                    ASSINADA

                                                </option>
                                            <?php endif; ?>

                                            <?php if ($profissao != 'EMPREGADO SEM CARTEIRA ASSINADA'): ?>
                                                <option value="EMPREGADO SEM CARTEIRA ASSINADA">EMPREGADO SEM CARTEIRA
                                                    ASSINADA
                                                </option>
                                            <?php endif; ?>

                                            <?php if ($profissao != 'AUTÔNOMO'): ?>
                                                <option value="AUTÔNOMO">AUTÔNOMO</option>
                                            <?php endif; ?>

                                            <?php if ($profissao != 'TRAB. TEMPORARIO EM AREA RURAL'): ?>
                                                <option value="TRAB. TEMPORARIO EM AREA RURAL">TRAB. TEMPORARIO EM AREA
                                                    RURAL
                                                </option>
                                            <?php endif; ?>

                                            <?php if ($profissao != 'TRABALHADOR NÃO REMUNERADO'): ?>
                                                <option value="TRABALHADOR NÃO REMUNERADO">TRABALHADOR NÃO REMUNERADO
                                                </option>
                                            <?php endif; ?>

                                            <?php if ($profissao != 'MILITAR OU SERVIDOR PUBLICO'): ?>
                                                <option value="MILITAR OU SERVIDOR PUBLICO">MILITAR OU SERVIDOR PUBLICO
                                                </option>
                                            <?php endif; ?>

                                            <?php if ($profissao != 'ESTAGIÁRIO OU APRENDIZ'): ?>
                                                <option value="ESTAGIÁRIO OU APRENDIZ">ESTAGIÁRIO OU APRENDIZ</option>
                                            <?php endif; ?>

                                            <?php if ($profissao != 'OUTRO'): ?>
                                                <option value="OUTRO">OUTRO</option>
                                            <?php endif; ?>


                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="renda_per">RENDA PER CAPITA: </label>
                                        <input type="text" class="form-control" id="renda_per" name="renda_per"
                                            required>
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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
            <script src="../js/mascaras.js"></script>
            <script src="../js/cpfvalid.js"></script>
</body>

</html>