function speakPassword() {
    var password = document.getElementById('passwordOutput').innerText;

    // Utilize a API de síntese de fala do navegador
    if ('speechSynthesis' in window) {
        var speech = new SpeechSynthesisUtterance(password);
        speech.lang = 'pt-BR'; // Defina o idioma desejado
        window.speechSynthesis.speak(speech);
    } else {
        alert('Seu navegador não suporta a síntese de fala.');
    }
}

// Gere uma senha aleatória (você pode substituir isso por sua lógica de geração de senha)
function generatePassword() {
    var length = 8;
    var charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    var password = "";
    for (var i = 0; i < length; i++) {
        var randomIndex = Math.floor(Math.random() * charset.length);
        password += charset.charAt(randomIndex);
    }
    return password;
}

// Exiba a senha no painel
document.getElementById('passwordOutput').innerText = generatePassword();