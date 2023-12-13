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

// ================================== CODIGO PCD INDIGENA E QUILOMBOA =================================================

                var cod_fam_ind = data.cod_fam_ind;
                if (cod_fam_ind == 1) {
                    $('input[name="grupoIndigena"][value="1"]').prop('checked', true);
                    $('input[name="grupoIndigena"][value="2"]').prop('checked', false);

                    $('#povoIndigena').val(data.povoIndigena);
                    $('#povoIndigena').prop('disabled', false);
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

                    $('#terraIndigina').val(data.terraIndigina);
                    $('#terraIndigina').prop('disabled', false);
                    $('#naoSabeTerraIndigina').prop('disabled', false);
                }
                // Evento quando a opção do grupoReserva é alterada
                $('input[name="grupoReserva"]').on('change', function () {
                    var terraIndiginaSelect = $('#terraIndigina');

                    if ($(this).val() == '1') {
                        terraIndiginaSelect.prop('disabled', false);
                        $('#naoSabeTerraIndigina').prop('checked', false);
                        $('#naoSabeTerraIndigina').prop('disabled', false);

                        if (!$('#naoSabeTerraIndigina').prop('checked')) {
                            terraIndiginaSelect.prop('disabled', false);
                        } else {
                            terraIndiginaSelect.prop('disabled', true);
                            terraIndiginaSelect.val('').trigger('change');
                        }
                    } else {
                        terraIndiginaSelect.prop('disabled', true);
                        $('#naoSabeTerraIndigina').prop('checked', true);
                        $('#naoSabeTerraIndigina').prop('disabled', true);
                        terraIndiginaSelect.val('').trigger('change'); 
                    }
                });

                $('#naoSabeTerraIndigina').on('change', function () {
                    var terraIndiginaSelect = $('#terraIndigina');
                    if ($(this).prop('checked')) {
                        terraIndiginaSelect.prop('disabled', true);
                        terraIndiginaSelect.val('').trigger('change');
                    } else {
                        terraIndiginaSelect.prop('disabled', false);
                    }
                });



                $('input[name="grupoIndigena"]').on('change', function () {
                    if ($(this).val() == '1') {
                        $('#povoIndigena').prop('disabled', false);
                    } else {
                        $('#povoIndigena').prop('disabled', true);
                    }
                });




                //========== FUNCAO SELECT INDIGENA ================================================
                var terraIndiginaSelect = $('#terraIndigina');
                terraIndiginaSelect.empty();
                var terraFam = data.terraIndigina;
                if (terraFam) {
                    terraIndiginaSelect.append('<option value="' + terraFam + '">' + terraFam + '</option>');
                }


                var povoIndigenaSelect = $('#povoIndigena');
                povoIndigenaSelect.empty();


                var nomFamInd = data.povoIndigena;
                if (nomFamInd) {
                    povoIndigenaSelect.append('<option value="' + nomFamInd + '">' + nomFamInd + '</option>');
                }



                var cod_fam_ind = data.cod_fam_ind;
                if (cod_fam_ind == 1) {
                    $('input[name="grupoIndigena"][value="1"]').prop('checked', true);
                    $('input[name="grupoIndigena"][value="2"]').prop('checked', false);

                    $('#povoIndigena').val(data.povoIndigena);
                    $('#povoIndigena').prop('disabled', false);
                } else {
                    $('input[name="grupoIndigena"][value="1"]').prop('checked', false);
                    $('input[name="grupoIndigena"][value="2"]').prop('checked', true);

                    $('#povoIndigena').val(data.povoIndigena);
                    $('#povoIndigena').prop('disabled', true);
                }

//===================================================================================================================================




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