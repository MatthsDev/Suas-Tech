<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_atend.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="../../js/cpfvalid.js"></script>
    <script src="script.js"></script>
    <title>Atendimento</title>

</head>

<body>
    <h1>ATENDIMENTO</h1>
        <div id="divcpf">
            <label>CPF:</label>
            <input type="text" name="cpf" id="cpf" maxlength="14" onblur="validarCPF(this)" placeholder="Digite o CPF" required>
        </div>
        <p id="nomePessoa"></p>

    <div id="mensagemSucesso" class="mensagem-sucesso"></div>
    <div id="mensagemErro" class="mensagem-erro"></div>
    <div id="conteiner_atendimento">
        <div id="btnCadUnico" style="display:none">
            <p style="">Escolha seu atendimento</p>
            <button>CADUNICO</button>
        </div>
        <div id="cadUnicoOptions" style="display:none">
            <button id="btnCadastro">CADASTRO</button>
            <button id="btnAtualizacao">ATUALIZAÇÃO</button>
        </div>

        <button id="btnBolsaFamilia" style="display:none">BOLSA FAMÍLIA</button>
        <div id="bolsaFamiliaOptions" style="display:none">
            <button id="btnFolha">FOLHA</button>
            <button id="btnBloqueio">BLOQUEIO</button>
            <button id="btnInformacao">INFORMAÇÃO</button>
        </div>

        <button id="btnConcessao" style="display:none">CONCESSÃO</button>

        <button id="btnAlistamentoMilitar" style="display:none">ALISTAMENTO MILITAR</button>

        <button id="btnReceitaFederal" style="display:none">RECEITA FEDERAL</button>
        <div id="receitaFederalOptions" style="display:none">
            <button id="btnCPF">CPF</button>
            <button id="btnCTD">CTD</button>
        </div>
    </div>
    <div id="mensagemCadOptions" class="mensagem-Options"></div>
    <div id="conteiner_prioridade">
        <div id="opcoesAtendimento" style="display: none;">
            <p>Escolha a prioridade:</p>
            <button id="alta" onclick="gerarSenha('A')">ESPECIAL</button>
            <button id="media" onclick="gerarSenha('M')">PRIORIDADE</button>
            <button id="medbaixa" onclick="gerarSenha('S')">RURAL</button>
            <button id="baixa" onclick="gerarSenha('B')">URBANO</button>
            <br>
        </div>
    </div>

    <p id="senhaFormatada"></p>

    <button id="btnImprimir" onclick="imprimirTicket()" style="display: none;">Imprimir</button>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="fechar" onclick="fecharModal()">&times;</span>
        <div id="modalMensagem" class="modal-mensagem"></div>
            <button onclick="imprimirTicket()">Imprimir</button>
        </div>
    </div>
</div>

<script>
        // Limpar mensagens no início
        $(document).ready(function () {
            limparMensagens();
            $('#btnImprimir').hide();
        });
    </script>

</body>

</html>
