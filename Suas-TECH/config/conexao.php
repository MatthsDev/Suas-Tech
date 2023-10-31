<?php
//CONEXÃO COM O BANCO DE DADOS
$host = 'localhost';
$usuario = 'u198416735_usercad';
$senha = '@Senha12345';
$banco = 'u198416735_sycad';

date_default_timezone_set('America/Sao_Paulo');

try {
	$pdo = new PDO("mysql:dbname=$banco; host=$host", "$usuario", "$senha");

	//conexao mysql para o backyp
	$conn = mysqli_connect($host, $usuario, $senha, $banco);
} catch (Exception $e) {
	echo "Erro ao conectar com o banco de dados! ".$e;
}
?>