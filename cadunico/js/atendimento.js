$(document).ready(function () {
    // Esconde todos os botões no início
    $('button[id^="btn"]').hide();

    // Mostra o alerta por padrão
    $('#btnAlert').show();
    

    // Define a lógica para mostrar os botões com base na opção selecionada
    $('#atendimentos').change(function () {
        var selectedOption = $(this).val();

        // Esconde todos os botões antes de mostrar os relevantes
        $('button[id^="btn"]').hide();

        // Esconde o alerta quando uma opção é selecionada
        $('#btnAlert').hide();

        // Mostra os botões relevantes com base na opção selecionada
        if (selectedOption === 'CADUNICO') {
            $('button[id^="btnCADUNICO"]').show();
        } else if (selectedOption === 'IDENTIDADE') {
            $('button[id^="btnIDENTIDADE"]').show();
        } else if (selectedOption === 'CPF') {
            $('button[id^="btnCPF"]').show();
        } else if (selectedOption === 'CONCESSÃO') {
            $('button[id^="btnCONCESSÃO"]').show();
        }
    });
});
