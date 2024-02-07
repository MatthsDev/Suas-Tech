<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuários</title>
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
            <img class="titulo-com-imagem" src="/Suas-Tech/cozinha_comunitaria/img/h1-cadusuarios.svg"
                alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">


        <form id="formUsuario" action="/Suas-Tech/creas/controller/user_control.php" method="POST">
            <div class="cpf">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="14" onblur="validarCPF(this)"
                    placeholder="Digite o CPF" required>


                <label for="codigo_familiar">Código da Familia: </label>
                <input type="text" id="codigo_familiar" name="codigo_familiar" placeholder="Digite o código familiar"
                    required>

                <a href="/Suas-Tech/controller/back.php">
                    <i class="fas fa-arrow-left"></i> Voltar ao menu
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
                        <input class="inpu" type="text" id="nome" name="nome" required>
                    </div>

                    <div class="element">
                        <label for="parentesco">PARENTESCO FAMILIAR: </label>
                        <select id="parentesco" name="parentesco" required>
                            <option value="">SELECIONE</option>
                            <option value="RESPONSAVEL FAMILIAR">RESPONSAVEL FAMILIAR</option>
                            <option value="CONJUGUE OU COMPANHEIRO">CONJUGUE OU COMPANHEIRO</option>
                            <option value="FILHO">FILHO</option>
                            <option value="IRMAO OU IRMA">IRMAO OU IRMA</option>
                            <option value="PAI OU MAE">PAI OU MAE</option>
                            <option value="OUTRO PARENTE">OUTRO PARENTE</option>
                            <option value="NAO PARENTE">NAO PARENTE</option>
                        </select>
                    </div>

                    <div class="element">
                        <label for="nome_social">NOME SOCIAL: </label>
                        <input type="text" id="nome_social" name="nome_social">
                    </div>
                    <div class="element">
                        <label for="nome_mae">NOME MÃE: </label>
                        <input class="inpu" type="text" id="nome_mae" name="nome_mae" required>
                    </div>
                    <div class="element">
                        <label for="nac_pessoa">NACIONALIDADE: </label>
                        <input type="text" id="nac_pessoa" name="nac_pessoa">
                    </div>
                    <div class="element">
                        <label for="tel_pessoa">TELEFONE: </label>
                        <input type="text" id="tel_pessoa" name="tel_pessoa" required>
                    </div>
                    <div class="element">
                        <label for="email_pessoa">EMAIL: </label>
                        <input class="inpu" type="email" id="email_pessoa" name="email_pessoa">
                    </div>

                </div>



                <div class="bloco1">
                    <div class="element1">
                        <label for="data_nasc">DATA DE NASCIMENTO: </label>
                        <input type="date" id="data_nasc" name="data_nasc" required>
                    </div>

                    <div class="element">
                        <label for="cor">COR OU RAÇA: </label>
                        <select id="cor" name="cor" required>
                            <option value="">SELECIONE</option>
                            <option value="BRANCO">BRANCO</option>
                            <option value="PRETO">PRETO</option>
                            <option value="AMARELO">AMARELO</option>
                            <option value="PARDO">PARDO</option>
                            <option value="INDIGENA">INDIGENA</option>
                        </select>
                    </div>

                    <div class="element">
                        <label for="sexo">SEXO: </label>
                        <select id="sexo" name="sexo" required>
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
                        <select id="uf_pessoa" name="uf_pessoa" required>
                            <option value="">SELECIONE</option>
                            <option value="AC">ACRE</option>
                            <option value="AL">ALAGOAS</option>
                            <option value="AP">AMAPÁ</option>
                            <option value="AM">AMAZONAS </option>
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
                        <label for="nat_pessoa">NATURALIDADE: </label>
                        <input type="text" id="nat_pessoa" name="nat_pessoa">
                    </div>
                </div>
            </div>
            <div class="titulo">
                <div class="titulo1">
                    <h3>PESSOA EM SITUAÇÃO DE RUA</h3>
                </div>
                <label for="sitRUA_Sim">EM SITUAÇÃO DE RUA</label>
                <input type="radio" id="sitRUA_Sim" name="sitRUA" value="1" required>1 - Sim
                <input type="radio" id="sitRUA_Nao" name="sitRUA" value="2">2 - Não
            </div>

            <div class="titulo">
                <div class="titulo1">
                    <h3>PCD E GRUPOS TRADICIONAIS ESPECIFICOS:</h3>
                </div>
            </div>



            <h5>PORTADOR DE DEFICIÊNCIA: </h5>
            <div class="bloco2">
                <div class="pcd">
                    <select name="tipoDeficiencia">
                        <option value="">SELECIONE</option>
                        <option value="CEGUEIRA">1 - CEGUEIRA</option>
                        <option value="BAIXA VISAO">2 - BAIXA VISAO</option>
                        <option value="SURDEZ SEVERA/PROFUNDA">3 - SURDEZ SEVERA/PROFUNDA</option>
                        <option value="SURDEZ LEVE/MODERADA">4 - SURDEZ LEVE/MODERADA</option>
                        <option value="DEFICIENCIA FISICA">5 - DEFICIENCIA FISICA</option>
                        <option value="DEFICIENCIA MENTAL OU INTELECTUAL">6 - DEFICIENCIA MENTAL OU INTELECTUAL</option>
                        <option value="SINDROME DE DOWN">7 - SINDROME DE DOWN</option>
                        <option value="TRANSTORNO/DOENCA MENTAL">8 - TRANSTORNO/DOENCA MENTAL</option>
                    </select>

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
                <h5>NOME DA COMUNIDADE </h5>
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
                <input type="text" id="nis" name="nis" required>
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
                <select id="profissao" name="profissao" required>
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
                <input type="text" id="renda_per" name="renda_per" required>
            </div>
            <div class="titulo">
                <div class="titulo1">
                    <h3>RESiDÊNCIA:</h3>
                </div>
            </div>
            <div class="bloco1">
                <label for="bairro">BAIRRO: </label>
                <input type="text" id="bairro" name="bairro" required>
            </div>
            <div class="bloco">
                <label for="log">LOGRADOURO: </label>
                <input type="text" id="log" name="log" required>

                <label for="numero">NUMERO: </label>
                <input type="text" id="numero" name="numero" required>
            </div>

            <div class="bloco">
                <label for="referencia">REFERÊNCIA: </label>
                <textarea type="text" id="referencia" name="referencia"></textarea>
            </div>

            <div class="bloco">
                <label for="qtd_pessoa">QUANTIDADE DE PESSOAS NA CASA: </label>
                <input type="text" id="qtd_pessoa" name="qtd_pessoa" required>
            </div>
            <div class="btn">
                <button type="button" id="btnEnviar" onclick="enviarFormulario()">ENVIAR</button>

            </div>
        </form>
    </div>


    <script src="../js/ajax_request.js"></script>
    <script src='../../controller/back.js'></script>
    <script>
        function enviarFormulario() {
            var form = document.getElementById('formUsuario');
            var formData = $('#formUsuario').serialize();
            var situacaoRua = $('input[name="sitRUA"]:checked').val(); // Verifica o valor do radio "sitRUA"

            // Verificar se algum radio está marcado
            if (situacaoRua !== undefined) {
                // Se for "SIM" (valor 1), envia o formulário sem verificar campos obrigatórios
                if (situacaoRua === "1") {
                    $.ajax({
                        type: 'POST',
                        url: '/Suas-Tech/creas/controller/user_control.php',
                        data: formData,
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Dados enviados com sucesso!',
                                text: 'O formulário foi submetido com sucesso.'
                            });
                        },
                        error: function (xhr, status, error) {
                            if (xhr.status === 400) {
                                var errorMessage = JSON.parse(xhr.responseText);
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao enviar os dados!',
                                    text: errorMessage.message
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erro ao enviar os dados!',
                                    text: 'Ocorreu um erro ao enviar o formulário. Tente novamente mais tarde.'
                                });
                            }
                        }
                    });
                } else {
                    // Se for "NÃO" (valor 2), verifica campos obrigatórios antes de enviar
                    var camposNaoPreenchidos = $(':input[required]').filter(function () {
                        return !this.value && this.type !== 'radio';
                    });

                    if (camposNaoPreenchidos.length > 0) {
                        camposNaoPreenchidos.each(function () {
                            $(this).css('border', '1px solid red');
                            var campoLabel = $('label[for="' + $(this).attr('id') + '"]').text();
                            Swal.fire({
                                icon: 'error',
                                title: 'Campo obrigatório não preenchido!',
                                text: 'O campo "' + campoLabel + '" é obrigatório.'
                            });
                        });
                    } else {
                        // Se todos os campos obrigatórios estiverem preenchidos, envia o formulário
                        $.ajax({
                            type: 'POST',
                            url: '/Suas-Tech/creas/controller/user_control.php',
                            data: formData,
                            success: function (response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Dados enviados com sucesso!',
                                    text: 'O formulário foi submetido com sucesso.'
                                });
                            },
                            error: function (xhr, status, error) {
                                if (xhr.status === 400) {
                                    var errorMessage = JSON.parse(xhr.responseText);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao enviar os dados!',
                                        text: errorMessage.message
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro ao enviar os dados!',
                                        text: 'Ocorreu um erro ao enviar o formulário. Tente novamente mais tarde.'
                                    });
                                }
                            }
                        });
                    }
                }
            } else {
                // Se nenhum radio foi selecionado, informar o usuário para selecionar uma opção
                Swal.fire({
                    icon: 'error',
                    title: 'Selecione uma opção para "Em situação de rua"',
                    text: 'Por favor, selecione "Sim" ou "Não" para a situação de rua.'
                });
            }
        }
    </script>


</body>

</html>