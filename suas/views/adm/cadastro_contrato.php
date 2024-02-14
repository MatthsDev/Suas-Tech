<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/cadunico/controller/acesso_user/dados_usuario.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/Suas-Tech/img/logo.png" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Cadastrar Contrato</title>
</head>
<body>
<div id='form_contrato'>
<form action="/Suas-Tech/suas/controller/salvar_contrato.php" method="POST">
        <!-- Campos do Contrato -->
        <label>Data Assinatura:</label>
        <input type="date" name="data_assinatura">
        <label>Prazo Vigente:</label>
        <input type="date" name="vigencia">
        <label>Número contrato:</label>
        <input type="text" name="num_contrato">
        <label>Nome empresa:</label>
        <input type="text" name="nome_empresa">
        <label>Razão social:</label>
        <input type="text" name="razao_social">
        <label>CNPJ:</label>
        <input type="text" name="cnpj" id="cnpjInput" maxlength="18">
        <label>Contato:</label>
        <input type="text" name="num_contato" id="contatoInput" maxlength="16">

    <button type="submit" name="btn_contrato">Salvar Contrato</button>
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
</div>
<button id='btn_salva_contrato'>Cadastrar Itens</button>

    <script src="/Suas-Tech/suas/js/script_contrato.js"></script>
</body>
</html>
