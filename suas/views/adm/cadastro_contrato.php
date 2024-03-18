<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
$ano_atual = date('Y');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Suas-Tech/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/style_cad_consul_cont.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Cadastrar Contrato</title>
</head>

<body>
    <div class="img">
        <h1 class="titulo-com-imagem">
            <img class="titulo-com-imagem" src="../adm/img/cadas_cont.svg" al
            t="Titulocomimagem">
        </h1>
    </div>
    <div class="container">
        <div id='form_contrato'>
            <form action="/Suas-Tech/suas/controller/salvar_contrato.php" method="POST">
                <!-- Campos do Contrato -->
                <div>
                    <label>Número contrato:</label>
                    <input type="text" name="num_contrato">
                </div>
                <div>
                    <label>Nome empresa:</label>
                    <input type="text" name="nome_empresa" class="inpu">
                </div>
                <div>
                    <label>Razão social:</label>
                    <input type="text" name="razao_social" class="inpu">
                </div>
                <div>
                    <label>CNPJ:</label>
                    <input type="text" name="cnpj" id="cnpjInput" maxlength="18">
                </div>
                <div>
                    <label>Telefone:</label>
                    <input type="text" name="num_contato" id="contatoInput" maxlength="16">
                </div>
                <div>
                    <label>E-mail:</label>
                    <input type="email" name="email_emp" class="inpu">
                </div>
                <div>
                    <label for="valor_contrato">Valor do contrato:</label>
                    <span>R$</span>
                    <input type="text" name="valor_contrato" id="valor_contrato" />
                </div>
                <div>
                    <label>Data Assinatura:</label>
                    <input type="date" name="data_assinatura">
                </div>
                <div>
                    <label>Prazo Vigente:</label>
                    <select name="vigencia" id="vigencia" required>
                            <option value="" disabled selected hidden>Selecione</option>
                            <option value="JAN">Janeiro</option>
                            <option value="FEV">Fevereiro</option>
                            <option value="MAR">Março</option>
                            <option value="ABR">Abril</option>
                            <option value="MAI">Maio</option>
                            <option value="JUN">Junho</option>
                            <option value="JUL">Julho</option>
                            <option value="AGO">Agosto</option>
                            <option value="SET">Setembro</option>
                            <option value="OUT">Outubro</option>
                            <option value="NOV">Novembro</option>
                            <option value="DEZ">Dezembro</option>
                        </select>/
                        <input type="text" name="ano_vigencia" value="<?php echo $ano_atual; ?>"

                </div>
                <div class="btns">
                    <button type="submit" name="btn_contrato">Salvar Contrato</button>
                    <button type="button" id='btn_salva_contrato'>Cadastrar Itens</button>
                    <button type="button" class="back" onclick="window.location.href ='/Suas-Tech/suas/views/adm/menu_adm.php';">
                        <i class="fas fa-arrow-left"></i>
                        Voltar ao menu
                    </button>
                </div>
            </form>
        </div>
        <div id='form_itens' style='display: none'>
            <form action="/Suas-Tech/suas/controller/salvar_contrato.php" method="POST">
                <!-- Tabela de Itens -->
                <label>Informe o número contrato:</label>
                <input type=text name="num_contrato" placeholder="Os itens pertence a qual contrato?">
                <table width="500px" border="1" id="tabelaItens">
                    <tr>
                        <th colspan="5">TABELA ITENS</th>
                    </tr>
                    <tr>
                        <th>Código do Item</th>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Valor Unitário</th>
                        <th>Valor Total</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="num_item[]"></td>
                        <td><input type="text" name="nome_produto[]"></td>
                        <td><input type="text" name="quantidade[]" class="quantidade"></td>
                        <td><input type="text" name="valor_unitario[]" class="valor-unitario"></td>
                        <td><input type="text" name="valor_total[]" class="valor-total" readonly></td>
                    </tr>
                </table>

                <!-- Botões -->
                <button type="button" onclick="adicionarLinha()">Adicionar Linha</button>
                <button type="submit" name="btn_itens">Salvar Itens</button>
            </form>
            <div id="voltar1" class="back">
                <button type="button" onclick="window.location.href ='/Suas-Tech/suas/views/adm/menu_adm.php';">
                    <i class="fas fa-arrow-left"></i>
                    Voltar ao menu
                </button>
            </div>
        </div>

    </div>
    <script src="/Suas-Tech/suas/js/script_contrato.js"></script>
    <script>
        $(document).ready(function() {
            $('#valor_contrato').mask('000.000.000.000.000,00', {
                reverse: true
            });
        });
    </script>

</body>

</html>