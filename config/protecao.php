<?php

if(!isset($_SESSION)){
    session_start();
}


if (!isset($_SESSION['user_usuario'])){
    die("Você precisa está logado para acessar essa pagina. <p><a href=\"/Suas-Tech/Suas-Tech-1/index.php\">LOGIN</a></p>");
}

?>