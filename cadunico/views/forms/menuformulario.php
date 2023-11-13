<?php
include "../../config/conexao.php";
session_start(); // Inicie a sessão para acessar as variáveis de sessão

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
// Verifica se o usuário está autenticado como admin ou usuário
if (!isset($_SESSION['nome_usuario']) || ($_SESSION['nivel_usuario'] != 'admin' && $_SESSION['nivel_usuario'] != 'usuario')) {
  header("location:../../index.php");
  exit; // Encerra o script após redirecionar
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSUAS - Formulários</title>
    <link rel="stylesheet" href="../../css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="website icon" type="png" href="../../img/logo.png">
</head>
<body>

  <header>
    <h1 class="titulo-com-imagem">
        <img src="../../img/h1-formularios.svg" alt="Titulocomimagem">
    </h1>
  </header>
  <nav>
    <a href="termo_responsabilidade.php" target="_blank">
      <i class="fas fa-home icon"></i> Termo de Declaração de Residência
    </a>

    <a href="Termo_declaracao.php" target="_blank">
      <i class="fas fa-file-invoice-dollar icon"></i> Termo de Declaração de Renda
    </a>

    <a href="Ficha_de_Exclusão_de_Familia.php" target="_blank">
      <i class="fas fa-user-minus icon"></i> Ficha de Exclusão de Familia
    </a>

    <a href="Ficha_de_Exclusão_de_Pessoa.php" target="_blank">
      <i class="fas fa-user-minus icon"></i> Ficha de Exclusão de Pessoa
    </a>

    <a href="<?php echo $voltar_link; ?>">
      <i class="fas fa-arrow-left"></i> Voltar ao menu
    </a>
  </nav>  
</body>
</html>