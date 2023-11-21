<?php

if(!isset($_SESSION)){
    session_start();
}

if (!isset($_SESSION['id'])){
    die("Você precisa está logado para acessar essa pagina. <p><a href=\"../../index.php\">LOGIN</a></p>");
}
?>