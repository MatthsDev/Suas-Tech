<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuários</title>
    <link rel="stylesheet" href="/Suas-Tech/cras    /css/index.css">
    <link rel="website icon" type="png" href="/Suas-Tech/cozinha_comunitaria/img/logo.png">
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
        <form id="formUsuario" action="/Suas-Tech/cras/controller/user_control.php" method="POST">
            <div class="cpf">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="14" onblur="validarCPF(this)"
                    placeholder="Digite o CPF">
            </div>

            <h3>IDENTIFICAÇÃO:</h3>
            <div class="bloco2">
                <div class="bloco1">
                    <div class="element" 1>
                        <label for="nome">NOME: </label>
                        <input type="text" id="nome" name="nome">
                    </div>
                    <div class="element">
                        <label for="nome_social">NOME SOCIAL: </label>
                        <input type="text" id="nome_social" name="nome_social">
                    </div>
                    <div class="element">
                        <label for="nome_mae">NOME MÃE: </label>
                        <input type="text" id="nome_mae" name="nome_mae">
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
                        <input type="email" id="email_pessoa" name="email_pessoa">
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
                        <input type="text" id="nome_pai" name="nome_pai">
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
            <h3>PCD E GRUPOS TRADICIONAIS ESPECIFICOS:</h3>

            <div class="bloco1">
                <h2>PORTADOR DE DEFICIÊNCIA: </h2>
                <div class="bloco">
                    <input type="checkbox" name="tipoDeficiencia" value="1"> &nbsp;1 - CEGUEIRA
                    <input type="checkbox" name="tipoDeficiencia" value="2"> &nbsp;2 - BAIXA VISAO
                </div>
                <div class="bloco">
                    <input type="checkbox" name="tipoDeficiencia" value="3"> &nbsp;3 - SURDEZ SEVERA/PROFUNDA
                    <input type="checkbox" name="tipoDeficiencia" value="4"> &nbsp;4 - SURDEZ LEVE/MODERADA
                    <div class="bloco">
                        <input type="checkbox" name="tipoDeficiencia" value="5"> &nbsp;5 - DEFICIENCIA FISICA
                        <input type="checkbox" name="tipoDeficiencia" value="6"> &nbsp;6 - DEFICIENCIA MENTAL OU
                        INTELECTUAL
                    </div>
                    <div class="bloco">
                        <input type="checkbox" name="tipoDeficiencia" value="7"> &nbsp;7 - SINDROME DE DOWN
                        <input type="checkbox" name="tipoDeficiencia" value="8"> &nbsp;8 - TRANSTORNO/DOENCA MENTAL
                    </div>
                </div>
                <div class="bloco">
                    <h2>3 - PERTENCIMENTO DE GRUPO TRADICIONAL ESPECIFICO: </h2>

                    <label>3.01 - A FAMILIA É INDIGENA?</label>
                    <br>
                    <input type="radio" name="grupoIndigena" value="1">1 - Sim
                    <input type="radio" name="grupoIndigena" value="2">2 - Não
                    </li>

                    <li id="divPovoIndigena" class="bloco">
                        <ul>
                            <li>
                                <label>3.02 - A QUE POVO INDIGENA PERTENCE A FAMILIA?</label>
                                <br>

                                <select name="povoIndigena" id="povoIndigena" style="width: 250px;">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                            </li>
                            <li class="clear"></li>
                            <li>
                                <label>3.03 A FAMILIA RESIDE EM TERRA OU RESERVA INDIGENA?</label>
                                <br>
                                <input type="radio" name="grupoReserva" id="reservaSIM" value="1">1 - Sim
                                <input type="radio" name="grupoReserva" id="reservaNAO" value="2">2 - Não
                            </li>
                            <li class="clear"></li>
                            <li>

                                <label>3.04 - QUAL É O NOME DA TERRA OU RESERVA INDIGENA</label>
                                <br>
                                <select name="terraIndigina" id="terraIndigina" style="width: 275px;">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>


                                <input type="checkbox" name="naoSabeTerraIndigina" value="1" id="naoSabeTerraIndigina"
                                    style="margin-left:25px;"> 2 - Não sabe
                            </li>
                        </ul>
                    </li>

                </div>
                <div class="bloco">
                    <h2> 3.05 - FAMILIA QUILOMBOLA </h2>
                    <li>
                        <input type="radio" name="familiaQuilambola" value="1">1 - Sim
                        <input type="radio" name="familiaQuilambola" value="2">2 - Não
                    </li>
                    <br>
                    <li>
                        <label>3.06 - Qual é o nome da comunidade quilombola?</label>
                        <br>

                        <select name="comunidadeQuilambola" disabled="disabled" id="comunidadeQuilambola"
                            style="width: 270px; font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #666;">
                            <option value=""></option>
                            <option value=""></option>
                        </select>


                        <input type="checkbox" name="naoSabeComunidadeQuilambola" value="1"
                            id="naoSabeComunidadeQuilambola" style="margin-left:25px;">2 - Não consta no município
                    </li>
                    <br>
                </div>

                <h3>DOCUMENTAÇÃO:</h3>

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

                <h3>RENDA E TRABALHOS:</h3>

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

                <h3>RESiDÊNCIA:</h3>

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

                <button type="button" id="btnEnviar" onclick="enviarFormulario()">Enviar</button>
        </form>
    </div>

    <script>

        $(document).ready(function () {
            var timer;

            $('#cpf').on('input', function () {
                clearTimeout(timer);
                timer = setTimeout(function () {
                    verificarUsuario();
                }, 500);
            });

            // Verificar se o campo OUTRO deve ser exibido ao carregar a página
            verificarOutroSexo();

            // Adicionar um evento de alteração para o campo SEXO
            $('#sexo').on('change', function () {
                verificarOutroSexo();
            });
        });



        function verificarUsuario() {
            var cpf = $('#cpf').val();

            $.ajax({
                url: '../controller/busca_user.php',
                method: 'POST',
                data: { cpf: cpf },
                dataType: 'json',
                success: function (data) {
                    if (data.existeUsuario) {
                        $('#nome').val(data.nome);
                        $('#bairro').val(data.bairro);
                        $('#log').val(data.log);
                        $('#numero').val(data.numero);
                        $('#nome_social').val(data.nome_social);

                        var sexoSelect = $('#sexo');
                        sexoSelect.empty();
                        sexoSelect.append('<option value="MASCULINO">MASCULINO</option>');
                        sexoSelect.append('<option value="FEMININO">FEMININO</option>');
                        sexoSelect.append('<option value="OUTRO">OUTRO</option>');

                        if (data.sexo) {
                            sexoSelect.val(data.sexo.toUpperCase());
                        }

                        var outroSexoDiv = $('#outroSexoDiv');
                        var outroSexoInput = $('#outroSexo');
                        sexoSelect.on('change', function () {
                            if ($(this).val().toUpperCase() === 'OUTRO') {
                                outroSexoDiv.show();
                                outroSexoInput.prop('disabled', false);
                            } else {
                                outroSexoDiv.hide();
                                outroSexoInput.prop('disabled', true);
                            }
                        });



                        // ============== CODIGO PCD INDIGENA E QUILOMBOA ===============================

                        var cod_fam_ind = data.cod_fam_ind;
                        if (cod_fam_ind == 1) {
                            $('input[name="grupoIndigena"][value="1"]').prop('checked', true);
                            $('input[name="grupoIndigena"][value="2"]').prop('checked', false);

                        } else {
                            $('input[name="grupoIndigena"][value="1"]').prop('checked', false);
                            $('input[name="grupoIndigena"][value="2"]').prop('checked', true);

                            $('#povoIndigena').val(data.povoIndigena);
                            $('#povoIndigena').prop('disabled', true);
                        }


                        var cod_indigena_res = data.cod_indigena_res;
                        if (cod_indigena_res == 0) {
                            $('input[name="grupoReserva"][value="1"]').prop('checked', false);
                            $('input[name="grupoReserva"][value="2"]').prop('checked', true);

                            $('#terraIndigina').val(data.terraIndigina);
                            $('#terraIndigina').prop('disabled', true);
                            $('#naoSabeTerraIndigina').prop('disabled', true);
                           
                        } else {
                            $('input[name="grupoReserva"][value="1"]').prop('checked', true);
                            $('input[name="grupoReserva"][value="2"]').prop('checked', false);

                            
                        }


                        // Dentro da função verificarUsuario()
                        var povoIndigenaSelect = $('#povoIndigena');
                        povoIndigenaSelect.empty(); // Limpar opções existentes

                        // Adicione a opção com o nome do povo indígena
                        var nomFamInd = data.povoIndigena;
                        if (nomFamInd) {
                            povoIndigenaSelect.append('<option value="' + nomFamInd + '">' + nomFamInd + '</option>');
                        }

                        //==================================================================================




                        $('#nome_mae').val(data.nome_mae);
                        $('#nome_pai').val(data.nome_pai);
                        $('#data_nasc').val(data.data_nasc);
                        $('#nat_pessoa').val(data.nat_pessoa);

                        var ufSelect = $('#uf_pessoa');
                        ufSelect.empty();
                        ufSelect.append('<option value="">SELECIONE</option>');
                        ufSelect.append('<option value="AC">ACRE</option>');
                        ufSelect.append('<option value="AL">ALAGOAS</option>');
                        ufSelect.append('<option value="AP">AMAPÁ</option>');
                        ufSelect.append('<option value="AM">AMAZONAS</option>');
                        ufSelect.append('<option value="BA">BAHIA</option>');
                        ufSelect.append('<option value="CE">CEARÁ</option>');
                        ufSelect.append('<option value="DF">DISTRITO FEDERAL</option>');
                        ufSelect.append('<option value="ES">ESPÍRITO SANTO</option>');
                        ufSelect.append('<option value="GO">GOIÁS</option>');
                        ufSelect.append('<option value="MA">MARANHÃO</option>');
                        ufSelect.append('<option value="MT">MATO GROSSO</option>');
                        ufSelect.append('<option value="MS">MATO GROSSO DO SUL</option>');
                        ufSelect.append('<option value="MG">MINAS GERAIS</option>');
                        ufSelect.append('<option value="PA">PARÁ</option>');
                        ufSelect.append('<option value="PB">PARAÍBA</option>');
                        ufSelect.append('<option value="PR">PARANÁ</option>');
                        ufSelect.append('<option value="PE">PERNAMBUCO</option>');
                        ufSelect.append('<option value="PI">PIAUÍ</option>');
                        ufSelect.append('<option value="RJ">RIO DE JANEIRO</option>');
                        ufSelect.append('<option value="RN">RIO GRANDE DO NORTE</option>');
                        ufSelect.append('<option value="RS">RIO GRANDE DO SUL</option>');
                        ufSelect.append('<option value="RO">RONDÔNIA</option>');
                        ufSelect.append('<option value="RR">RORAIMA</option>');
                        ufSelect.append('<option value="SC">SANTA CATARINA</option>');
                        ufSelect.append('<option value="SP">SÃO PAULO</option>');
                        ufSelect.append('<option value="SE">SERGIPE</option>');
                        ufSelect.append('<option value="TO">TOCANTINS</option>');

                        if (data.uf_pessoa) {
                            ufSelect.val(data.uf_pessoa.toUpperCase());
                        }



                        $('#nac_pessoa').val(data.nac_pessoa);
                        $('#tel_pessoa').val(data.tel_pessoa);
                        // Aplicar máscara ao telefone
                        $('#tel_pessoa').mask('(00) 0 0000-0000');
                        $('#email_pessoa').val(data.email_pessoa);
                        $('#rg').val(data.rg);
                        $('#complemento_rg').val(data.complemento_rg);
                        $('#data_exp_rg').val(data.data_exp_rg);
                        $('#sigla_rg').val(data.sigla_rg);
                        $('#estado_rg').val(data.estado_rg);
                        $('#nis').val(data.nis);
                        $('#num_titulo').val(data.num_titulo);
                        $('#zone_titulo').val(data.zone_titulo);
                        $('#area_titulo').val(data.area_titulo);


                        var profissaoSelect = $('#profissao');
                        profissaoSelect.empty();
                        profissaoSelect.append('<option value="EMPREGADO COM CARTEIRA ASSINADA">EMPREGADO COM CARTEIRA ASSINADA</option>');
                        profissaoSelect.append('<option value="AUTÔNOMO">AUTÔNOMO</option>');
                        profissaoSelect.append('<option value="TRAB. TEMPORARIO EM AREA RURAL">TRAB. TEMPORARIO EM AREA RURAL</option>');
                        profissaoSelect.append('<option value="EMPREGADO SEM CARTEIRA ASSINADA">EMPREGADO SEM CARTEIRA ASSINADA</option>');
                        profissaoSelect.append('<option value="TRABALHADOR NÃO REMUNERADO">TRABALHADOR NÃO REMUNERADO</option>');
                        profissaoSelect.append('<option value="MILITAR OU SERVIDOR PUBLICO">MILITAR OU SERVIDOR PUBLICO</option>');
                        profissaoSelect.append('<option value="ESTAGIÁRIO OU APRENDIZ">ESTAGIÁRIO OU APRENDIZ</option>');
                        profissaoSelect.append('<option value="OUTRO">OUTRO</option>');
                        if (data.profissao) {
                            profissaoSelect.val(data.profissao.toUpperCase());
                        }


                        $('#renda_per').val(data.renda_per);
                        $('#referencia').val(data.referencia);
                        $('#qtd_pessoa').val(data.qtd_pessoa);
                    } else {
                        $('#nome').val('');
                        $('#bairro').val('');
                        $('#log').val('');
                        $('#numero').val('');
                        $('#nome_social').val('');
                        $('#sexo').val('');
                        $('#nome_mae').val('');
                        $('#nome_pai').val('');
                        $('#data_nasc').val('');
                        $('#uf_pessoa').val('');
                        $('#nat_pessoa').val('');
                        $('#nac_pessoa').val('');
                        $('#tel_pessoa').val('');
                        $('#email_pessoa').val('');
                        $('#rg').val('');
                        $('#complemento_rg').val('');
                        $('#data_exp_rg').val('');
                        $('#sigla_rg').val('');
                        $('#estado_rg').val('');
                        $('#nis').val('');
                        $('#num_titulo').val('');
                        $('#zone_titulo').val('');
                        $('#area_titulo').val('');
                        $('#profissao').val('');
                        $('#renda_per').val('');
                        $('#referencia').val('');
                        $('#qtd_pessoa').val('');
                    }
                },
                error: function () {
                    alert('Erro na requisição AJAX');
                }
            });
        }

        function preencherCampos(data) {
            verificarOutroSexo();
        }

        function limparCampos() {
            verificarOutroSexo();
        }

        function verificarOutroSexo() {
            var sexoSelect = $('#sexo');
            var outroSexoDiv = $('#outroSexoDiv');
            var outroSexoInput = $('#outroSexo');

            if (sexoSelect.val().toUpperCase() === 'OUTRO') {
                outroSexoDiv.show();
                outroSexoInput.prop('disabled', false);
            } else {
                outroSexoDiv.hide();
                outroSexoInput.prop('disabled', true);
            }
        }

        function enviarFormulario() {
            var formulario = document.getElementById('formUsuario');
            formulario.submit();
        }

        function enviarFormulario() {
            var formulario = document.getElementById('formUsuario');
            formulario.submit();
        }

    </script>

</body>

</html>