async function gerarSenha(tipoSenha){
    const dados = await fetch('gerar_senha.php?tipo=' + tipoSenha)
}