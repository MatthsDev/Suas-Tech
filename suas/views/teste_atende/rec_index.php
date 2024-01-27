<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/conexao.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/Suas-Tech/config/sessao.php';

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
    <link rel="shortcut icon" href="../../img/logo.png" type="image/x-icon">
    <title>Atendimento</title>

</head>

<body>
    <h1>ATENDIMENTO</h1>
    
    <div id="divcpf">
        <label>CPF:</label>
        <input type="text" name="cpf" id="cpf" maxlength="14" onblur="validarCPF(this)" placeholder="Digite o CPF" required>
    </div>
    <p id="nomePessoa"></p>
    <p id="tituloAtendimento" style="display:none">Escolha seu atendimento</p>

    <div id="mensagemSucesso" class="mensagem-sucesso"></div>

    <div id="conteiner_atendimento">
        <div class="opcad">
            <div class="cadunico1" id="btnCadUnico" style="display:none">
                <button name="cadun">CADUNICO</button>
            </div>
            <div id="cadUnicoOptions" style="display:none">
                <button id="btnCadastro">CADASTRO</button>
                <button id="btnAtualizacao">ATUALIZAÇÃO</button>
            </div>
        </div>
        <div class="opbolsa">
            <div class="bolsa">
            <button id="btnBolsaFamilia" style="display:none" name="sibec">BOLSA FAMÍLIA</button>
            </div>
            <div id="bolsaFamiliaOptions" style="display:none">
                <button id="btnFolha">FOLHA</button>
                <button id="btnBloqueio">BLOQUEIO</button>
                <button id="btnInformacao">INFORMAÇÃO</button>
            </div>
        </div>    
        <div class="concessao">
            <button id="btnConcessao" style="display:none" name="conc">CONCESSÃO</button>
        </div>
        <div class="alistamento">
            <button id="btnAlistamentoMilitar" style="display:none" name="alis">ALISTAMENTO MILITAR</button>
        </div>
        <div class="opreceita">
            <div class="receita">
                <button id="btnReceitaFederal" style="display:none" name="refe">RECEITA FEDERAL</button>
            </div>
            <div id="receitaFederalOptions" style="display:none">
                <button id="btnCPF">CPF</button>
                <button id="btnCTD">CTD</button>
            </div>
        </div>
    </div>
    <div id="mensagemCadOptions" class="mensagem-Options"></div>

    <div id="conteiner_prioridade">
        <div id="opcoesAtendimento" style="display: none;">
            <p>Escolha a prioridade:</p>
            <button id="alta" onclick="gerarSenha('A')" name="especial">ESPECIAL</button>
            <button id="media" onclick="gerarSenha('M')" name="prioridade">PRIORIDADE</button>
            <button id="medbaixa" onclick="gerarSenha('S')" name="rural">RURAL</button>
            <button id="baixa" onclick="gerarSenha('B')" name="urbano">URBANO</button>
            <br>
        </div>
    </div>

    <div id="mensagemErro" class="mensagem-erro"></div>
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

</body>

</html>