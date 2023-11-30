<?php

session_start(); // Inicie a sessão para acessar as variáveis de sessão
include '../config/conexao.php';

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
            <img src="" alt="Titulocomimagem">
        </h1>
    </div>
<div class="container">
    <form method="post" action="">
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