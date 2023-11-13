<?php 

require_once("conexao.php");
session_start();

if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header("location:../index.php");
}

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$res = $pdo->prepare("SELECT * from usuarios where usuario = :usuario and senha = :senha ");

$res->bindValue(":usuario", $usuario);
$res->bindValue(":senha", $senha);
$res->execute();

$dados = $res->fetchAll(PDO::FETCH_ASSOC);
$linhas = count($dados);

if($linhas > 0){
	$_SESSION['nome_usuario'] = $dados[0]['nome'];
	$_SESSION['user_usuario'] = $dados[0]['usuario'];
	$_SESSION['nivel_usuario'] = $dados[0]['nivel'];

	if($_SESSION['nivel_usuario'] == 'admin'){
		header("location:../painel-adm/adm-view.php");
		exit();
	}

	if($_SESSION['nivel_usuario'] == 'usuario'){
		header("location:../painel-usuario/user-painel.php");
		exit();
	}

}else{
	echo "<script language='javascript'>window.alert('Dados Incorretos!!'); </script>";
	echo "<script language='javascript'>window.location='../index.php'; </script>";
}
