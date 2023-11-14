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

