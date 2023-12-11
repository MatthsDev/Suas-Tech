<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech-Suas</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="website icon" type="png" href="img/logo.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../js/cpfvalid.js"></script>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="img/h1-cadusuarios.svg" alt="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <form id="formUsuario" action="/Suas-Tech/conzinha_comunitaria/controller/user_control.php" method="POST">
            <div class="cpf">
                <label for="cpf">CPF:</label>
                <input type="text" id="cpf" name="cpf" maxlength="14" placeholder="Digite o CPF">
            </div>

            <h3>IDENTIFICAÇÃO:</h3>

            <div class="bloco1">
                <label for="nome">NOME: </label>
                <input type="text" id="nome" name="nome">

                <label for="data_nasc">DATA DE NASCIMENTO: </label>
                <input type="date" id="data_nasc" name="data_nasc">
            </div>

            <div class="bloco">
                <label for="nome_social">NOME SOCIAL: </label>
                <input type="text" id="nome_social" name="nome_social">

                <label for="sexo">SEXO: </label>
                <select id="sexo" name="sexo">
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                </select>


            </div>

            <div class="bloco">
                <label for="nome_mae">NOME MÃE: </label>
                <input type="text" id="nome_mae" name="nome_mae">

                <label for="nome_pai">NOME PAI: </label>
                <input type="text" id="nome_pai" name="nome_pai">
            </div>
            <div class="bloco">
                <label for="nat_pessoa">NATURALIDADE: </label>
                <input type="text" id="nat_pessoa" name="nat_pessoa">

                <label for="nac_pessoa">NACIONALIDADE: </label>
                <input type="text" id="nac_pessoa" name="nac_pessoa">
            </div>
            <div class="bloco">
                <label for="tel_pessoa">TELEFONE: </label>
                <input type="text" id="tel_pessoa" name="tel_pessoa">

                <label for="email_pessoa">EMAIL: </label>
                <input type="email" id="email_pessoa" name="email_pessoa">
            </div>

            <h3>PCD E GRUPOS TRADICIONAIS ESPECIFICOS:</h3>

            <div class="bloco1">
                <label for="pcd">PORTADOR DE DEFICIÊNCIA: </label>
                <!-- <input type="text" id="pcd" name="pcd"> -->
            </div>
            <div class="bloco">
                <label for="gpte">PERTENCIMENTO DE GRUPO TRADICIONAL ESPECIFICO: </label>
                <!-- <input type="text" id="gpte" name="gpte"> -->
            </div>
            <div class="bloco">
                <label for="quilombo">INDIGENA OU QUILOMBOLA: </label>
                <!-- <input type="text" id="quilombo" name="quilombo"> -->
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
                    <option value="CARTEIRA ASSINADA">CARTEIRA ASSINADA</option>
                    <option value="AUTONOMO">AUTONOMO</option>
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
        });

        function verificarUsuario() {
            var cpf = $('#cpf').val();

            $.ajax({
                url: 'busca_user.php',
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
                        sexoSelect.append('<option value="MASCULINO">Masculino</option>');
                        sexoSelect.append('<option value="FEMININO">Feminino</option>');
                        if (data.sexo) {
                            sexoSelect.val(data.sexo.toUpperCase());
                        }

                        $('#nome_mae').val(data.nome_mae);
                        $('#nome_pai').val(data.nome_pai);
                        $('#data_nasc').val(data.data_nasc);
                        $('#nat_pessoa').val(data.nat_pessoa);
                        $('#nac_pessoa').val(data.nac_pessoa);
                        $('#tel_pessoa').val(data.tel_pessoa);
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
                        profissaoSelect.append('<option value="CARTEIRA ASSINADA">CARTEIRA ASSINADA</option>');
                        profissaoSelect.append('<option value="AUTONOMO">AUTONOMO</option>');
                        if (data.profissao) {
                            profissaoSelect.val(data.profissao.toUpperCase());
                        }


                        $('#renda_per').val(data.renda_per);
                        $('#referencia').val(data.referncia);
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
    </script>

</body>

</html>