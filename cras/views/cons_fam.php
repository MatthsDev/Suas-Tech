<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Famílias</title>
    <link rel="stylesheet" href="/Suas-Tech/cras/css/style_fam_cons.css">
    <link rel="stylesheet" href="/Suas-Tech/cras/css/style-cad-usuario.css">
    <link rel="stylesheet" href="../css/painel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
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
                    <!-- CORPO DA MODAL -->
                    <div class="modal-body">
                        <form id="formUsuario" action="/Suas-Tech/cras/controller/user_control.php" method="POST">
                            <!-- Adicionar campos do formulário para edição do paciente -->
                            <!-- Exemplo: -->
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nome">NOME: </label>
                                    <input class="inpu" type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['funcao']) && $_GET['funcao'] == 'editar' && empty($item_paginado)) {
        ?>
        <script>
            $(document).ready(function () {
                $('#modal').modal('show'); // Comando para mostrar a modal automaticamente
            });
        </script>
    <?php } ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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