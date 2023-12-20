<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuários</title>
    <link rel="stylesheet" href="/Suas-Tech/cras/css/style-cad-usuario.css">
    <link rel="website icon" type="png" href="/Suas-Tech/cozinha_comunitaria/img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.7/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../js/cpfvalid.js"></script>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../img/h1-edit.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <!-- BLOCO MODAL HEADER -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <?php
                            if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar') {
                                $nome_botao = 'Editar';
                                $id_reg = $_GET['id'];

                                // Buscar dados do registro a ser editado
                                $res = $pdo->query("select * from pacientes where id = '$id_reg'");
                                $dados = $res->fetchAll(PDO::FETCH_ASSOC);

                                $cpf = $dados[0][''];
                                $cod_familiar = $dados[0][''];
                                $nome = $dados[0][''];
                                $data_nasc = $dados[0][''];
                                $nomeSocial = $dados[0][''];
                                $sexo = $dados[0][''];
                                $outr_sexo = $dados[0][''];
                                $grupoIndigena = $dados[0][''];
                                $povoIndigena = $dados[0][''];
                                $grupoReserva = $dados[0][''];
                                $terraIndigina = $dados[0][''];
                                $familiaQuilambola = $dados[0][''];
                                $comunidadeQuilambola = $dados[0][''];
                                $nomeMae = $dados[0][''];
                                $nomePai = $dados[0][''];
                                $nacionalidade = $dados[0][''];
                                $uf = $dados[0][''];
                                $municipio = $dados[0][''];
                                $telefone = $dados[0][''];
                                $email = $dados[0][''];
                                $pcd = $dados[0][''];
                                $rg = $dados[0][''];
                                $complemento_rg = $dados[0][''];
                                $data_exp_rg = $dados[0][''];
                                $sigla_rg = $dados[0][''];
                                $estado_rg = $dados[0][''];
                                $nis = $dados[0][''];
                                $numTitulo = $dados[0][''];
                                $zonaTitulo = $dados[0][''];
                                $area_titulo = $dados[0][''];
                                $profissao = $dados[0][''];
                                $rendaPerCapita = $dados[0][''];
                                $bairro = $dados[0][''];
                                $logradouro = $dados[0][''];
                                $numero = $dados[0][''];
                                $referencia = $dados[0][''];
                                $qtdPessoasCasa = $dados[0][''];
                                $parentesco = $dados[0][''];
                                $cor = $dados[0][''];

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


                    <!--- CORPO DA MODAL --->
                    <div class="modal-body">
                        <form id="formUsuario" action="/Suas-Tech/cras/controller/user_control.php" method="POST">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nome">NOME: </label>
                                    <input class="inpu" type="text" id="nome" name="nome">
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- <form id="formUsuario" action="/Suas-Tech/cras/controller/user_control.php" method="POST">
            <div class="cpf">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="14" onblur="validarCPF(this)"
                    placeholder="Digite o CPF">
                <a onclick="goBack()">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>

            </div>
            <div class="titulo">
                <div class="titulo1">
                    <h3>IDENTIFICAÇÃO:</h3>
                </div>
            </div>
            <div class="bloco2">
                <div class="bloco1">
                    <div class="element1">
                        <label for="nome">NOME: </label>
                        <input class="inpu" type="text" id="nome" name="nome">
                    </div>
                    <div class="element">
                        <label for="nome_social">NOME SOCIAL: </label>
                        <input type="text" id="nome_social" name="nome_social">
                    </div>
                    <div class="element">
                        <label for="nome_mae">NOME MÃE: </label>
                        <input class="inpu" type="text" id="nome_mae" name="nome_mae">
                    </div>
                    <div class="element">
                        <label for="nac_pessoa">NACIONALIDADE: </label>
                        <input type="text" id="nac_pessoa" name="nac_pessoa">
                    </div>
                    <div class="element">
                        <label for="tel_pessoa">TELEFONE: </label>
                        <input type="text" id="tel_pessoa" name="tel_pessoa">
                    </div>
                    <div class="element">
                        <label for="email_pessoa">EMAIL: </label>
                        <input class="inpu" type="email" id="email_pessoa" name="email_pessoa">
                    </div>

                </div>

                <div class="bloco1">
                    <div class="element1">
                        <label for="data_nasc">DATA DE NASCIMENTO: </label>
                        <input type="date" id="data_nasc" name="data_nasc">
                    </div>
                    <div class="element">
                        <label for="sexo">SEXO: </label>
                        <select id="sexo" name="sexo">
                            <option value="">SELECIONE</option>
                            <option value="MASCULINO">MASCULINO</option>
                            <option value="FEMININO">FEMININO</option>
                            <option value="OUTRO">OUTRO</option>
                        </select>
                        <div class="bloco" id="outroSexoDiv" style="display: none;">
                            <label for="outroSexo">ESPECIFIQUE: </label>
                            <input type="text" id="outroSexo" name="outroSexo">
                        </div>
                    </div>
                    <div class="element">
                        <label for="nome_pai">NOME PAI: </label>
                        <input class="inpu" type="text" id="nome_pai" name="nome_pai">
                    </div>
                    <div class="element">
                        <label for="uf_pessoa">UF: </label>
                        <select id="uf_pessoa" name="uf_pessoa">
                            <option value="">SELECIONE</option>
                            <option value="AC">ACRE</option>
                            <option value="AL">ALAGOAS</option>
                            <option value="AP">AMAPÁ</option>
                            <option value="AM">AMAZONAS</option>
                            <option value="BA">BAHIA</option>
                            <option value="CE">CEARÁ</option>
                            <option value="DF">DISTRITO FEDERAL</option>
                            <option value="ES">ESPÍRITO SANTO</option>
                            <option value="GO">GOIÁS</option>
                            <option value="MA">MARANHÃO</option>
                            <option value="MT">MATO GROSSO</option>
                            <option value="MS">MATO GROSSO DO SUL</option>
                            <option value="MG">MINAS GERAIS</option>
                            <option value="PA">PARÁ</option>
                            <option value="PB">PARAÍBA</option>
                            <option value="PR">PARANÁ</option>
                            <option value="PE">PERNAMBUCO</option>
                            <option value="PI">PIAUÍ</option>
                            <option value="RJ">RIO DE JANEIRO</option>
                            <option value="RN">RIO GRANDE DO NORTE</option>
                            <option value="RS">RIO GRANDE DO SUL</option>
                            <option value="RO">RONDÔNIA</option>
                            <option value="RR">RORAIMA</option>
                            <option value="SC">SANTA CATARINA</option>
                            <option value="SP">SÃO PAULO</option>
                            <option value="SE">SERGIPE</option>
                            <option value="TO">TOCANTINS</option>
                        </select>
                    </div>
                    <div class="element">
                        <label for="nat_pessoa">MUNICIPIO: </label>
                        <input type="text" id="nat_pessoa" name="nat_pessoa">
                    </div>
                </div>
            </div>
            <div class="titulo">
                <div class="titulo1">
                    <h3>PCD E GRUPOS TRADICIONAIS ESPECIFICOS:</h3>
                </div>
            </div>
            <h5>PORTADOR DE DEFICIÊNCIA: </h5>
            <div class="bloco2">
                <div class="pcd">
                    <div class=pcd2><input type="checkbox" name="tipoDeficiencia" value="1" disabled> &nbsp;1 -
                        CEGUEIRA
                    </div>
                    <div class=pcd2><input type="checkbox" name="tipoDeficiencia" value="2" disabled> &nbsp;2 -
                        BAIXA
                        VISAO</div>
                    <div class=pcd2><input type="checkbox" name="tipoDeficiencia" value="3" disabled> &nbsp;3 -
                        SURDEZ
                        SEVERA/PROFUNDA</div>
                    <div class=pcd2><input type="checkbox" name="tipoDeficiencia" value="4" disabled> &nbsp;4 -
                        SURDEZ
                        LEVE/MODERADA</div>
                </div>
                <div class="pcd">
                    <div class=pcd2><input type="checkbox" name="tipoDeficiencia" value="5" disabled> &nbsp;5 -
                        DEFICIENCIA
                        FISICA</div>
                    <div class=pcd2><input type="checkbox" name="tipoDeficiencia" value="6" disabled> &nbsp;6 -
                        DEFICIENCIA
                        MENTAL OU
                        INTELECTUAL</div>
                    <div class=pcd2><input type="checkbox" name="tipoDeficiencia" value="7" disabled> &nbsp;7 -
                        SINDROME
                        DE DOWN
                    </div>
                    <div class=pcd2><input type="checkbox" name="tipoDeficiencia" value="8" disabled> &nbsp;8 -
                        TRANSTORNO/DOENCA
                        MENTAL</div>
                </div>
            </div>
            <div class="bloco">
                <div class="bloco1">
                    <h5> PERTENCIMENTO DE GRUPO TRADICIONAL ESPECIFICO: </h5>

                    <h5> A FAMILIA É INDIGENA?</h5>
                    <input type="radio" name="grupoIndigena" value="1">1 - Sim
                    <input type="radio" name="grupoIndigena" value="2">2 - Não
                </div>
                <div class="bloco">
                    <h5> A QUE POVO INDIGENA PERTENCE A FAMILIA?</h5>

                    <select name="povoIndigena" id="povoIndigena" style="width: 250px;">
                        <option value="">SELECIONE</option>
                        <option value="teste">teste</option>
                    </select>
                </div>

                <div class="bloco">
                    <h5> RESIDE EM RESERVA INDIGENA? </h5>
                    <input type="radio" name="grupoReserva" id="reservaSIM" value="1">1 - Sim
                    <input type="radio" name="grupoReserva" id="reservaNAO" value="2">2 - Não
                </div>
                <div class="bloco">
                    <h5> QUAL É O NOME DA TERRA OU RESERVA INDIGENA</h5>
                    <br>
                    <select name="terraIndigina" id="terraIndigina" style="width: 275px;">
                        <option value="">SELECIONE</option>
                        <option value="teste">teste</option>
                    </select>
                    <input type="checkbox" name="naoSabeTerraIndigina" value="1" id="naoSabeTerraIndigina"
                        style="margin-left:25px;"> 2 - Não sabe
                </div>
            </div>
            <div class="bloco">
                <h5> FAMILIA QUILOMBOLA </h5>
                <input type="radio" name="familiaQuilambola" id="reservaSIM" value="1">1 - Sim
                <input type="radio" name="familiaQuilambola" id="reservaNAO" value="2">2 - Não
            </div>
            <div class="bloco">
                <h5> Qual é o nome da comunidade quilombola?</h5>
                <select name="comunidadeQuilambola" id="comunidadeQuilambola"
                    style="width: 270px; font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #666;">
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <input type="checkbox" name="naoSabeTerraQuilo" value="1" id="naoSabeTerraQuilo"
                    style="margin-left:25px;">2 - Não consta no município
            </div>
            <div class="titulo">
                <div class="titulo1">
                    <h3>DOCUMENTAÇÃO:</h3>
                </div>
            </div>
            <div class="bloco1">
                <label for="rg">RG: </label>
                <input type="text" id="rg" name="rg">

                <label for="complemento_rg">COMPLEMENTO: </label>
                <input type="text" id="complemento_rg" name="complemento_rg">

                <label for="data_exp_rg">DATA DE EXPEDIÇÃO: </label>
                <input type="date" id="data_exp_rg" name="data_exp_rg">
            </div>
            <div class="bloco">
                <label for="sigla_rg">ORGÃO: </label>
                <input type="text" id="sigla_rg" name="sigla_rg">

                <label for="estado_rg">UF: </label>
                <input type="text" id="estado_rg" name="estado_rg">
            </div>
            <div class="bloco">
                <label for="nis">NIS: </label>
                <input type="text" id="nis" name="nis">
            </div>
            <div class="bloco">
                <label for="num_titulo">TITULO: </label>
                <input type="text" id="num_titulo" name="num_titulo">

                <label for="zone_titulo">ZONA: </label>
                <input type="text" id="zone_titulo" name="zone_titulo">

                <label for="area_titulo">SEÇÃO: </label>
                <input type="text" id="secao_titulo" name="area_titulo">
            </div>
            <div class="titulo">
                <div class="titulo1">
                    <h3>RENDA E TRABALHOS:</h3>
                </div>
            </div>
            <div class="bloco1">
                <label for="profissao">PROFISSÃO: </label>
                <select id="profissao" name="profissao">
                    <option value="">SELECIONE</option>
                    <option value="EMPREGADO COM CARTEIRA ASSINADA">EMPREGADO COM CARTEIRA ASSINADA</option>
                    <option value="AUTÔNOMO">AUTÔNOMO</option>
                    <option value="TRAB. TEMPORARIO EM AREA RURAL">TRAB. TEMPORARIO EM AREA RURAL</option>
                    <option value="EMPREGADO SEM CARTEIRA ASSINADA">EMPREGADO SEM CARTEIRA ASSINADA</option>
                    <option value="TRABALHADOR NÃO REMUNERADO">TRABALHADOR NÃO REMUNERADO</option>
                    <option value="MILITAR OU SERVIDOR PUBLICO">MILITAR OU SERVIDOR PUBLICO</option>
                    <option value="ESTAGIÁRIO OU APRENDIZ">ESTAGIÁRIO OU APRENDIZ</option>
                    <option value="OUTRO">OUTRO</option>
                </select>
            </div>
            <div class="bloco">
                <label for="renda_per">RENDA PER CAPITA: </label>
                <input type="text" id="renda_per" name="renda_per">
            </div>
            <div class="titulo">
                <div class="titulo1">
                    <h3>RESiDÊNCIA:</h3>
                </div>
            </div>
            <div class="bloco1">
                <label for="bairro">BAIRRO: </label>
                <input type="text" id="bairro" name="bairro">
            </div>
            <div class="bloco">
                <label for="log">LOGRADOURO: </label>
                <input type="text" id="log" name="log">

                <label for="numero">NUMERO: </label>
                <input type="text" id="numero" name="numero">
            </div>

            <div class="bloco">
                <label for="referencia">REFERÊNCIA: </label>
                <textarea type="text" id="referencia" name="referencia"></textarea>
            </div>

            <div class="bloco">
                <label for="qtd_pessoa">QUANTIDADE DE PESSOAS NA CASA: </label>
                <input type="text" id="qtd_pessoa" name="qtd_pessoa">
            </div>
            <div class="btn">
                <button type="button" id="btnEnviar" onclick="enviarFormulario()">SALVAR INFORMAÇÕES</button>

            </div>
        </form> -->
    </div>
    <script src="../js/ajax_request.js"></script>
    <script src='../../controller/back.js'></script>

    <script>
        function enviarFormulario() {
            var formData = $("#formUsuario").serialize();
            $.ajax({
                type: "POST",
                url: "/Suas-Tech/cras/controller/user_control.php",
                data: formData,
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {

                        Swal.fire({
                            icon: 'success',
                            title: 'Cadastro realizado com sucesso!',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro ao cadastrar',
                            text: response.message
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro ao conectar ao servidor',
                        text: 'Por favor, tente novamente mais tarde.'
                    });
                }
            });
        }
        function goBack() {
            window.history.back();
        }
    </script>
    <script>
        function ajustarTextarea(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }
    </script>
</body>

</html>