<?php

session_start(); // Inicie a sessão para acessar as variáveis de sessão
include '../cadunico/config/conexao.php';

// Verifique o nível do usuário
if (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'admin') {
    // O usuário é um administrador.
    $voltar_link = '../../painel-adm/adm-view.php';
} elseif (isset($_SESSION['nivel_usuario']) && $_SESSION['nivel_usuario'] === 'usuario') {
    // O usuário é um usuário comum.
    $voltar_link = '../../painel-usuario/user-painel.php';
} else {
    // Redirecionar para a página de login ou exibir uma mensagem de erro, pois o nível do usuário não está definido.
    $voltar_link = '../../index.php'; // Altere o link para a página de login
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessão</title>
</head>
<body>
<div class="img">
        <h1 class="titulo-com-imagem">
            <img src="../../img/h1-declaração.svg" alt="Titulocomimagem">
        </h1>
    </div>
<div class="container">
    <form method="post" action="declaracao_conferir">
        <select name="buscar_dados" required>
            <option value="cpf_dec">CPF:</option>
            <option value="nis_dec">NIS:</option>
        </select>
        <input type="text" name="valorescolhido" placeholder="Digite aqui:" required>
        <button type="submit">BUSCAR</button>
        <a
            href="<?php echo $voltar_link; ?>">
                <i class="fas fa-arrow-left"></i> Voltar ao menu
            </a>
    </form>
    <div class=lin1>
        <div class="linha"></div>
    </div>
</div>
</body>
</html>