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
                                $rendaPerCapita = $dados[0]['renda_per'];

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