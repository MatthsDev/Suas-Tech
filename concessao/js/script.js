document.addEventListener("DOMContentLoaded", function () {
    var cpfInput = $("#cpf")
    var telefoneInput = $("#telefone")
    // Aplicar máscara para CPF
    cpfInput.mask('000.000.000-00')
    //Aplica máscara para o telefone
    telefoneInput.mask('(00) 0.0000-0000')
});

/*

$(document).ready(function () {
    //função calcula total
    function calcularTotal() {
        // loop para cada llinha
        $("#tabelaItens tbody tr").each(function () {
            // recebe a quantidade unitária
            var quantidade = parseFloat($(this).find(".quantidade").val()) || 0;
            var valorUnitario = parseFloat($(this).find(".valor-unitario").val().replace(",", ".")) || 0;

            // calcula total e formata moeda
            var total = quantidade * valorUnitario;
            $(this).find(".valor-total").val(total.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' }));
        });
    }

    // Attach the function to input change events
    $(".quantidade, .valor-unitario").on("input", calcularTotal);
});
*/

document.addEventListener('DOMContentLoaded', function () {
    // Obtém todos os campos de entrada de texto
    var camposTexto = document.querySelectorAll('input[type="text"]');

    // Adiciona um ouvinte de eventos de entrada a cada campo de texto
    camposTexto.forEach(function (campo) {
        campo.addEventListener('input', function () {
            // Converte o valor do campo para maiúsculas
            this.value = this.value.toUpperCase();
        });
    });
});
