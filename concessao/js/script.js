document.addEventListener("DOMContentLoaded", function () {
    var cpfInput = $("#cpf")
    var telefoneInput = $("#telefone")
    // Aplicar máscara para CPF
    cpfInput.mask('000.000.000-00')
    //Aplica máscara para o telefone
    telefoneInput.mask('(00) 0.0000-0000')
});

function validarCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');

    if (cpf === '' || cpf.length !== 11 || /^(.)\1+$/.test(cpf)) {
        return false;
    }

    let soma = 0;
    for (let i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }

    let resto = 11 - (soma % 11);
    resto = (resto === 10 || resto === 11) ? 0 : resto;

    if (resto !== parseInt(cpf.charAt(9))) {
        return false;
    }

    soma = 0;
    for (let i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }

    resto = 11 - (soma % 11);
    resto = (resto === 10 || resto === 11) ? 0 : resto;

    return resto === parseInt(cpf.charAt(10));
}

function validarFormulario() {
    const cpfInput = document.getElementById('cpf');
    const cpf = cpfInput.value;

    if (!validarCPF(cpf)) {
        Swal.fire({
            icon: 'error',
            title: 'CPF INVÁLIDO',
            text: 'Informe um CPF válido!',
        });
        cpfInput.focus();
        return false;
    }
    return true;
}
